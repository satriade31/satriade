<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model {

    // Method to update user information
    
    
    public function get_all() {
        return $this->db->get('user')->result_array();
    }
    
    public function get_by_id($id) {
        return $this->db->get_where('user', ['id_user' => $id])->row_array();
    }
    
    public function insert($data) {
        return $this->db->insert('user', $data);
    }
    
    public function update($id, $data) {
        return $this->db->where('id', $id)->update('user', $data);
    }

    public function hapus($id) {
        return $this->db->where('id', $id)->delete('user');
    }
    public function updateUser($id_user, $data)
    {
        // Update the user in the database where id_user matches
        $this->db->where('id_user', $id_user);
        return $this->db->update('user', $data);
    }
    

        // Method to delete user from the database
        public function deleteUser($id_user)
        {
            // Delete the user where the id_user matches
            $this->db->where('id_user', $id_user);
            return $this->db->delete('user');
        }
    
    
}


