<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caraousel_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    // Fungsi untuk mendapatkan data caraousel berdasarkan ID
    public function get_caraousel_by_id($id_caraousel) {
        return $this->db->get_where('caraousel', ['id_caraousel' => $id_caraousel])->row_array();
    }

    // Fungsi untuk menyimpan data caraousel
    public function save_caraousel($data) {
        $this->db->insert('caraousel', $data);
    }

    // Fungsi untuk memperbarui data caraousel
    public function update_caraousel($id_caraousel, $data) {
        $this->db->where('id_caraousel', $id_caraousel);
        $this->db->update('caraousel', $data);
    }

    // Fungsi untuk menghapus data caraousel
    public function delete_caraousel($id_caraousel) {
        $this->db->where('id_caraousel', $id_caraousel);
        $this->db->delete('caraousel');
    }
}
