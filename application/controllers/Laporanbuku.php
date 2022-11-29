<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporanbuku extends CI_Controller {
	function __construct(){
	 parent::__construct();
	 	//validasi jika user belum login
     $this->data['CI'] =& get_instance();
     $this->load->helper(array('form', 'url'));
     $this->load->model('M_Admin');
		if($this->session->userdata('masuk_perpus') != TRUE){
				$url=base_url('login');
				redirect($url);
		}
		$this->load->library('pdf');
	}

	public function index()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['buku'] =  $this->db->query("SELECT * FROM tbl_buku ORDER BY id_buku DESC");
        $this->data['title_web'] = 'Data Buku';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('buku/laporan_buku',$this->data);
        $this->load->view('footer_view',$this->data);
	}
	public function cetak()
    {
		$this->data['buku'] = $this->M_Admin->get_bukuu('tbl_buku');
		$this->load->view('buku/buku_print',$this->data);
        
	}
}