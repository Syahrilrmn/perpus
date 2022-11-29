<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporanuser extends CI_Controller {
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
        $this->data['user'] = $this->M_Admin->get_table('tbl_login');

        $this->data['title_web'] = 'Data User ';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('user/laporan_user',$this->data);
        $this->load->view('footer_view',$this->data);
    }
	public function cetak()
    {
		$this->data['user'] = $this->M_Admin->get_userr('tbl_login');
		$this->load->view('user/user_print',$this->data);
        
	}
}