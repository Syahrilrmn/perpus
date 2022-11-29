<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengunjung extends CI_Controller {
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
        $this->load->view('pengunjung/pengunjung_view',$this->data);
        $this->load->view('footer_view',$this->data);
    }
	public function detail()
    {	
		if($this->session->userdata('level') == 'Petugas'){
			if($this->uri->segment('3') == ''){ echo '<script>alert("halaman tidak ditemukan");window.location="'.base_url('user').'";</script>';}
			$this->data['idbo'] = $this->session->userdata('ses_id');
			$count = $this->M_Pengunjung->CountTableId('tbl_pengunjung','id_pengunjung',$this->uri->segment('3'));
			if($count > 0)
			{			
				$this->data['pengunjung'] = $this->M_Pengunjung->get_tableid_edit('tbl_pengunjung','id_pengunjung',$this->uri->segment('3'));
			}else{
				echo '<script>alert("PENGUNJUNG TIDAK DITEMUKAN");window.location="'.base_url('pengunjung').'"</script>';
			}		
		}elseif($this->session->userdata('level') == 'Anggota'){
			$this->data['idbo'] = $this->session->userdata('ses_id');
			$count = $this->M_Pengunjung->CountTableId('tbl_pengunjung','id_pengunjung',$this->session->userdata('ses_id'));
			if($count > 0)
			{			
				$this->data['pengunjung'] = $this->M_Pengunjung->get_tableid_edit('tbl_pengunjung','id_pengunjung',$this->session->userdata('ses_id'));
			}else{
				echo '<script>alert("PENGUNJUNG TIDAK DITEMUKAN");window.location="'.base_url('pengunjung').'"</script>';
			}
		}
        $this->data['title_web'] = 'Print Kartu Anggota ';
        $this->load->view('pengunjung/detail',$this->data);
    }
	// public function cetak()
    // {
	// 	$this->data['buku'] = $this->M_Pengunjung->get_bukuu('tbl_buku');
	// 	$this->load->view('buku/buku_print',$this->data);
        
	// }

	// public function pengunjungdetail()
	// {
	// 	$this->data['idbo'] = $this->session->userdata('ses_id');
	// 	$count = $this->M_Pengunjung->CountTableId('tbl_buku','id_buku',$this->uri->segment('3'));
	// 	if($count > 0)
	// 	{
	// 		$this->data['buku'] = $this->M_Pengunjung->get_tableid_edit('tbl_buku','id_buku',$this->uri->segment('3'));
	// 		$this->data['kats'] =  $this->db->query("SELECT * FROM tbl_kategori ORDER BY id_kategori DESC")->result_array();
	// 		$this->data['rakbuku'] =  $this->db->query("SELECT * FROM tbl_rak ORDER BY id_rak DESC")->result_array();

	// 	}else{
	// 		echo '<script>alert("BUKU TIDAK DITEMUKAN");window.location="'.base_url('data').'"</script>';
	// 	}

	// 	$this->data['title_web'] = 'Data Buku Detail';
    //     $this->load->view('header_view',$this->data);
    //     $this->load->view('sidebar_view',$this->data);
    //     $this->load->view('buku/detail',$this->data);
    //     $this->load->view('footer_view',$this->data);
	// }
	

	public function pengunjungedit()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Pengunjung->CountTableId('tbl_pengunjung','id_pengunjung',$this->uri->segment('3'));
		if($count > 0)
		{
			
			$this->data['pengunjung'] = $this->M_Pengunjung->get_tableid_edit('tbl_pengunjung','id_pengunjung',$this->uri->segment('3'));
	   
			// $this->data['kats'] =  $this->db->query("SELECT * FROM tbl_kategori ORDER BY id_kategori DESC")->result_array();
			// $this->data['rakbuku'] =  $this->db->query("SELECT * FROM tbl_rak ORDER BY id_rak DESC")->result_array();

		}else{
			echo '<script>alert("pengunjung TIDAK DITEMUKAN");window.location="'.base_url('pengunjung').'"</script>';
		}

		$this->data['title_web'] = 'Data pengunjung Edit';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('pengunjung/edit_view',$this->data);
        $this->load->view('footer_view',$this->data);
	}

	public function pengunjungtambah()
	{
		// $this->data['idbo'] = $this->session->userdata('ses_id');

		// $this->data['kats'] =  $this->db->query("SELECT * FROM tbl_kategori ORDER BY id_kategori DESC")->result_array();
		// $this->data['rakbuku'] =  $this->db->query("SELECT * FROM tbl_rak ORDER BY id_rak DESC")->result_array();
		$this->data['idbo'] = $this->session->userdata('ses_id');
        $this->data['pengunjung'] = $this->M_Pengunjung->get_table('tbl_pengunjung');


        $this->data['title_web'] = 'Tambah Buku';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('pengunjung/tambah_view',$this->data);
        $this->load->view('footer_view',$this->data);
	}


	public function prosespengunjung()
	{
		if($this->session->userdata('masuk_perpus') != TRUE){
			$url=base_url('login');
			redirect($url);
		}

		// hapus aksi form proses buku
		// if(!empty($this->input->get('buku_id')))
		// {
        
		// 	$buku = $this->M_Pengunjung->get_tableid_edit('tbl_pengunjung','id_buku',htmlentities($this->input->get('buku_id')));
			
		// 	$sampul = './assets/image/buku/'.$buku->sampul;
		// 	if(file_exists($sampul))
		// 	{
		// 		unlink($sampul);
		// 	}
			
		// 	$lampiran = './assets/image/buku/'.$buku->lampiran;
		// 	if(file_exists($lampiran))
		// 	{
		// 		unlink($lampiran);
		// 	}
			
		// 	$this->M_Pengunjung->delete_table('tbl_buku','id_buku',$this->input->get('buku_id'));
			
		// 	$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
		// 			<p> Berhasil Hapus Buku !</p>
		// 		</div></div>');
		// 	redirect(base_url('data'));  
		// }

		// tambah aksi form proses buku
		if(!empty($this->input->post('tambah')))
		{
			$post= $this->input->post();
			$pengunjung_id = $this->M_Pengunjung->buat_kode('tbl_pengunjung','PN','id_pengunjung','ORDER BY id_pengunjung DESC LIMIT 1'); 
			$data = array(
				'pengunjung_id'=>$pengunjung_id,
				'nama'=>htmlentities($post['nama']), 
				// 'user' => htmlentities($post['user']), 
				'jenkel' => htmlentities($post['jenkel']),  
				'perlu'=> htmlentities($post['perlu']), 
				'cari'=> htmlentities($post['cari']),     
				'tgl_kunjung' => htmlentities($post['tgl_kunjung']), 
				'jam_kunjung' => $this->input->post('jam_kunjung'), 
			);
			
			$this->db->insert('tbl_pengunjung', $data);

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Pengunjung Sukses !</p>
			</div></div>');
			redirect(base_url('pengunjung')); 
		}

		// edit aksi form proses buku
		if(!empty($this->input->post('edit')))
		{
			$post = $this->input->post();
			$data = array(
				'nama'=>htmlentities($post['nama']), 
				// 'user' => htmlentities($post['user']), 
				'jenkel' => htmlentities($post['jenkel']),  
				'perlu'=> htmlentities($post['perlu']), 
				'cari'=> htmlentities($post['cari']),    
				'tgl_kunjung' => htmlentities($post['tgl_kunjung']), 
				'jam_kunjung' => $this->input->post('jam_kunjung'), 
			);
						
			$this->db->where('id_pengunjung',htmlentities($post['edit']));
			$this->db->update('tbl_pengunjung', $data);

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
					<p> Edit Pengunjung Sukses !</p>
				</div></div>');
				redirect(base_url('pengunjung')); 
			// redirect(base_url('pengunjung/pengunjungedit/'.$post['edit'])); 
		}
	}
    public function del()
    {
        if($this->uri->segment('3') == ''){ echo '<script>alert("halaman tidak ditemukan");window.location="'.base_url('pengunjung').'";</script>';}
        
        $user = $this->M_Pengunjung->get_tableid_edit('tbl_pengunjung','id_pengunjung',$this->uri->segment('3'));
        unlink('./assets_style/image/'.$user->foto);
		$this->M_Pengunjung->delete_table('tbl_pengunjung','id_pengunjung',$this->uri->segment('3'));
		
		$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
		<p> Berhasil Hapus User !</p>
		</div></div>');
		redirect(base_url('pengunjung'));  
    }
}
