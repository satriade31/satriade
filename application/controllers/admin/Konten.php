<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konten extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Konten_model');
        if ($this->session->userdata('level') === NULL) {
            redirect('auth');
        }
    }

    public function index() {
        // Fetch categories
        $this->db->from('kategori');
        $this->db->order_by('nama_kategori', 'ASC');
        $kategori = $this->db->get()->result_array();


        // Fetch konten (content)
        $this->db->from('konten1'); // Ensure the table name is 'konten'
        $this->db->order_by('tanggal', 'DESC');
        $konten = $this->db->get()->result_array();

        // Pass the data to the view
        $data = array(
            'kategori' => $kategori,
            'konten1' => $konten // Corrected from 'konten1' to 'konten'
        );
        $this->template->load('template_admin', 'admin/konten_index', $data);
    }

    public function tambah() {
        $this->db->from('kategori');
        $this->db->order_by('nama_kategori', 'ASC');
        $kategori = $this->db->get()->result_array();

        $data = array(
            'kategori' => $kategori,
        );
        // Load view to add new content
        $this->template->load('template_admin', 'admin/konten_tambah', $data); // Corrected view loading path
    }

    public function simpan() {
        // Validation and file upload configuration
        $config['upload_path'] = './upload/konten/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 10000;

        $this->load->library('upload', $config);

        $foto = ''; // Default value in case no file is uploaded
        if ($_FILES['foto']['name']) {
            if (!$this->upload->do_upload('foto')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('konten'); // Adjust redirection after error
            } else {
                $file = $this->upload->data();
                $foto = $file['file_name'];
            }
        }

        // Prepare data for saving to database
        $data = [
            'judul' => $this->input->post('judul'),
            'keterangan' => $this->input->post('keterangan'),
            'foto' => $foto, // If no file uploaded, will save as empty string
            'slug' => url_title($this->input->post('judul'), '-', TRUE),
            'nama_kategori' => $this->input->post('nama_kategori'),
            'tanggal' => date('Y-m-d'),
            'username' => 'admin', // Change to dynamic user system if needed
        ];

        // Save the new content to the database
        $this->Konten_model->save_konten($data);
        $this->session->set_flashdata('success', 'Konten berhasil disimpan.');
        redirect('admin/konten'); // Corrected redirection path
    }

    public function hapus($id) {
        $where = array('id_konten' => $id);
        $this->db->delete('konten1', $where); // Use 'konten' table name
        redirect('admin/konten'); // Corrected redirection after deletion
    }

    public function update()
    {
        $id_konten = $this->input->post('id_konten');
        $data = [
            'judul' => $this->input->post('judul'),
            'keterangan' => $this->input->post('keterangan'),
            'slug' => $this->input->post('slug'),
            'nama_kategori' => $this->input->post('nama_kategori'),
            'tanggal' => $this->input->post('tanggal'),
            'username' => $this->input->post('username'),
        ];

        // Handle file upload (jika ada)
        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path'] = './upload/konten/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 10000;
    
            $this->load->library('upload', $config);
    
            if ($this->upload->do_upload('foto')) {
                $file = $this->upload->data();
                $data['foto'] = $file['file_name'];
    
                // Hapus file lama
                $old_foto = $this->Konten_model->get_konten_by_id($id_konten)['foto'];
                if ($old_foto && file_exists('./upload/konten/' . $old_foto)) {
                    unlink('./upload/konten/' . $old_foto);
                }
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/konten');
            }
        }
        // Update data di database menggunakan Query Builder
        $this->db->where('id_konten', $id_konten);
        $this->db->update('konten1', $data); // Pastikan tabel Anda bernama 'konten'
    
        // Redirect dengan pesan sukses
        $this->session->set_flashdata('success', 'Caraousel berhasil diperbarui!');
        redirect('admin/konten');
    }
}
