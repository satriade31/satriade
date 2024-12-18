<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caraousel extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Caraousel_model');
        if ($this->session->userdata('level') === NULL) {
            redirect('auth');
        }
    }

    public function index() {
        // Fetch categories
        $this->db->from('caraousel');
        $caraousel = $this->db->get()->result_array();

        // Fetch caraousel (content)

        // Pass the data to the view
        $data = array(
            'judul_halaman' => 'Halaman Caraousel',
            'caraousel' => $caraousel // Corrected from 'caraousel1' to 'caraousel'
        );
        $this->template->load('template_admin', 'admin/caraousel_index', $data);
    }

    public function tambah() {
        $this->db->from('kategori1');
        $this->db->order_by('nama_kategori', 'ASC');
        $kategori = $this->db->get()->result_array();

        $data = array(  
            'kategori1' => $kategori,
        );
        // Load view to add new content
        $this->template->load('template_admin', 'admin/caraousel_tambah', $data); // Corrected view loading path
    }

    public function simpan() {
        // Validation and file upload configuration
        $config['upload_path'] = './upload/caraousel/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048;

        $this->load->library('upload', $config);

        $foto = ''; // Default value in case no file is uploaded
        if ($_FILES['foto']['name']) {
            if (!$this->upload->do_upload('foto')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('caraousel'); // Adjust redirection after error
            } else {
                $file = $this->upload->data();
                $foto = $file['file_name'];
            }
        }

        // Prepare data for saving to database
        $data = [
            'judul' => $this->input->post('judul'),
            'judul1' => $this->input->post('judul1'),
            'foto' => $foto, // If no file uploaded, will save as empty string
            
        ];

        // Save the new content to the database
        $this->Caraousel_model->save_caraousel($data);
        $this->session->set_flashdata('success', 'caraousel berhasil disimpan.');
        redirect('admin/caraousel'); // Corrected redirection path
    }
    

    public function hapus($id) {
        $where = array('id_caraousel' => $id);
        $this->db->delete('caraousel', $where); // Use 'caraousel' table name
        redirect('admin/caraousel'); // Corrected redirection after deletion
    }

    public function update() {
        $id_caraousel = $this->input->post('id_caraousel'); // Ambil ID dari input form
        $data = [
            'judul' => $this->input->post('judul'),
            'judul1' => $this->input->post('judul1'),
        ];
    
        // Handle file upload jika ada file baru
        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path'] = './upload/caraousel/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 5000;
    
            $this->load->library('upload', $config);
    
            if ($this->upload->do_upload('foto')) {
                $file = $this->upload->data();
                $data['foto'] = $file['file_name'];
    
                // Hapus file lama
                $old_foto = $this->Caraousel_model->get_caraousel_by_id($id_caraousel)['foto'];
                if ($old_foto && file_exists('./upload/caraousel/' . $old_foto)) {
                    unlink('./upload/caraousel/' . $old_foto);
                }
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/caraousel');
            }
        }
    
        // Update data di database menggunakan Query Builder
        $this->db->where('id_caraousel', $id_caraousel);
        $this->db->update('caraousel', $data); // Pastikan tabel Anda bernama 'caraousel'
    
        // Redirect dengan pesan sukses
        $this->session->set_flashdata('success', 'Caraousel berhasil diperbarui!');
        redirect('admin/caraousel');
    }
    
}
