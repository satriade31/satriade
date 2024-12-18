<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct(){
        parent::__construct();
        
        // Load the form validation library
        $this->load->library('form_validation');
    }

    public function index(){
        $this->load->view('login');
    }

    public function login(){
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            
            $username = $this->input->post('username', TRUE); 
            $password = $this->input->post('password', TRUE); 

            
            $this->db->from('user');
            $this->db->where('username', $username);
            $user = $this->db->get()->row();

            if ($user == NULL) {
               
                $this->session->set_flashdata('error', 'Invalid Username or Password');
                redirect('auth');
            } else {                                                     
                if (password_verify($password, $user->password)) {
                    
                    $data = array(
                        'username' => $user->username,
                        'nama' => $user->nama,
                        'level' => $user->level,
                        'id_user' => $user->id_user,
                    );
                    $this->session->set_userdata($data);

                    redirect('admin/home');
                } else {
                    $this->session->set_flashdata('error', 'Invalid Username or Password');
                    redirect('auth');
                }
            }
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('home');
    }
}
