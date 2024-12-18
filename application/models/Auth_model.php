<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model {
    return $this_load->db->get_where('user', ['username'])->row_array(); 
}


