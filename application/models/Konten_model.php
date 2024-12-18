<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konten_model extends CI_Model {
    // Fungsi untuk mendapatkan data caraousel berdasarkan ID
    public function get_konten_by_id($id_caraousel) {
        return $this->db->get_where('konten1', ['id_konten' => $id_konten])->row_array();
    }


    public function get_all_kategori() {
        return $this->db->get('kategori')->result_array(); // Get all categories
    }

    public function get_all_konten() {
        return $this->db->get('konten1')->result_array(); // Get all contents from 'konten' table
    }

    public function save_konten($data) {
        $this->db->insert('konten1', $data); // Insert new content into 'konten' table
        return $this->db->insert_id(); // Return the inserted ID
    }

    public function update_konten($id, $data) {
        $this->db->where('id_konten', $id);
        return $this->db->update('konten1', $data); // Update content in 'konten' table
    }

    public function delete_konten($id) {
        $this->db->where('id_konten', $id);
        return $this->db->delete('konten1'); // Delete content from 'konten' table
    }
    public function update_caraousel($id_caraousel, $data) {
        $this->db->where('id_caraousel', $id_caraousel);
        $this->db->update('caraousel', $data);
    }
    public function search_content($keyword) {
		$this->db->like('judul', $keyword);
		return $this->db->get('konten1')->result_array();
	}
    public function count_all_konten() {
        return $this->db->count_all('konten1'); // Hitung total data di tabel 'konten'
    }
    public function get_konten_limit($limit, $start) {
        $this->db->limit($limit, $start); // Query dengan limit
        return $this->db->get('konten1')->result_array(); // Ambil data
    }   
}
