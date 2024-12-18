<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function index() {
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $this->template->load('template_admin','admin/kategori_index', $data);
    }

    public function tambah() {
        $this->load->view('admin/kategori_tambah');
    }

    public function simpan() {
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori')
        ];
        $this->db->insert('kategori', $data);
        redirect('admin/kategori');
    }

    public function edit($id) {
        $data['kategori'] = $this->db->get_where('kategori', ['id_kategori' => $id])->row_array();
        $this->load->view('kategori/edit', $data);
    }

    public function update() {
        $id = $this->input->post('id_kategori');
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori')
        ];
        $this->db->where('id_kategori', $id);
        $this->db->update('kategori', $data);
        redirect('admin/kategori');
    }

    public function hapus($id) {
        $this->db->delete('kategori', ['id_kategori' => $id]);
        redirect('admin/kategori');
    }
}
