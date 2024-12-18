<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row();


		$this->db->from('caraousel');	
		$caraousel = $this->db->get()->result_array();

		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();

		$this->db->from('konten1');
		$this->db->join('kategori','konten1.nama_kategori=kategori.nama_kategori','left');
		$this->db->join('user','konten1.username=user.username','left');
		$konten = $this->db->get()->result_array();

		
		$data = array(
			'judul'	=> "Beranda | Web Ade",
			'konfig'	=> $konfig,	
			'kategori'	=> $kategori,
			'caraousel' => $caraousel,
			'konten1'	=> $konten,
		);
		$this->load->view('blog', $data);
	}
	public function kategori($id){
		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row();
		$this->db->from('caraousel');	
		$caraousel = $this->db->get()->result_array();
		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();
		$this->db->from('konten1');
		$this->db->join('kategori','konten1.nama_kategori=kategori.nama_kategori','left');
		$this->db->join('user','konten1.username=user.username','left');
		$this->db->where('konten1.nama_kategori',$id);
		$konten = $this->db->get()->result_array();

		$this->db->from('kategori');
		$this->db->where('nama_kategori',$id);
		$nama_kategori = $this->db->get()->row()->nama_kategori;

		
		$data = array(
			'judul'	=> $nama_kategori." | Web Ade",
			'konfig'	=> $konfig,
			'nama_kategori'=> $nama_kategori,
			'kategori'	=> $kategori,
			'konten1'	=> $konten,
		);
		$this->load->view('blog', $data);
	}
	public function artikel($id){
		$this->db->from('konfigurasi');
		$konfig = $this->db->get()->row();

		$this->db->from('kategori');
		$kategori = $this->db->get()->result_array();

		$this->db->from('konten1');
		$this->db->join('kategori','konten1.nama_kategori=kategori.nama_kategori','left');
		$this->db->join('user','konten1.username=user.username','left');
		$this->db->where('slug',$id);
		$konten = $this->db->get()->row();

		
		$data = array(
			'judul'	=> $konten->judul." | Web Ade",
			'konfig'	=> $konfig,	
			'kategori'	=> $kategori,
			'konten1'	=> $konten,
		);
		$this->load->view('blog', $data);

	}
	
}