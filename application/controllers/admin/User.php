<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('User_model');
	}
	public function index(){
		$this->db->from('user');
		$this->db->order_by('nama','ASC');
		$user = $this->db->get()->result_array();
		$data = array(
			'judul_halaman' => 'Data Pengguna',
			'user'			=> $user
		);
		$this->template->load('template_admin','admin/user_index',$data);

	}
	public function tambah(){
		$this->load->view('admin/user_tambah');
	}
	public function simpan() {
        $data = [
            'username' => $this->input->post('username'),
            'nama' => $this->input->post('nama'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'level' => $this->input->post('level')
        ];
        
        $this->db->insert('user', $data);
        redirect('admin/user');
    }
	public function edit($id){
		$this->db->select('*')->from('user');
		$this->db->where('id_user', $id);
		$user = $this->db->get()->result_array();
		$data = array(
			'nama'		=> $this->input->post('nama'),
			'username'		=> $this->input->post('username')
		);
		$where = array(
			'id_user'		=> $this->input->post('id_user')
		);
		$this->db->update('user',$data,$where);
		redirect('admin/user/index');
	}
	public function hapus($id){
		$where = array('id_user' => $id);
		$this->db->delete('user' ,$where);
		redirect('admin/user/index');
	}
}