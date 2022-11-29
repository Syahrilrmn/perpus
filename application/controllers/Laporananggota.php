<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporananggota extends CI_Controller {
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
        $this->data['anggota'] = $this->M_Admin->get_table('tbl_anggota');

        $this->data['title_web'] = 'Data Anggota ';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('anggota/laporan_anggota',$this->data);
        $this->load->view('footer_view',$this->data);
    }
	public function cetak()
    {
		$this->data['anggota'] = $this->M_Admin->get_anggotaa('tbl_anggota');
		$this->load->view('anggota/anggota_print',$this->data);
        
	}
}