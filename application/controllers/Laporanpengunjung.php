<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporanpengunjung extends CI_Controller {
	function __construct(){
	 parent::__construct();
	 	//validasi jika user belum login
     $this->data['CI'] =& get_instance();
     $this->load->helper(array('form', 'url'));
     $this->load->model('M_Pengunjung');
     	if($this->session->userdata('masuk_perpus') != TRUE){
			$url=base_url('login');
			redirect($url);
		}
		$this->load->library('pdf');
     }
	
     
    public function index()
    {	
        $this->data['idbo'] = $this->session->userdata('ses_id');
        $this->data['pengunjung'] = $this->M_Pengunjung->get_table('tbl_pengunjung');

        $this->data['title_web'] = 'DataPengunjung ';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('pengunjung/laporan_pengunjung',$this->data);
        $this->load->view('footer_view',$this->data);
    }
    public function cetak()
    {
		$this->data['pengunjung'] = $this->M_Pengunjung->get_pengunjungg('tbl_pengunjung');
		$this->load->view('pengunjung/pengunjung_print',$this->data);
        
	}
}