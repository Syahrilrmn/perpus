<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengunjung extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		//validasi jika user belum login
		$this->data['CI'] = &get_instance();
		$this->load->helper(array('form', 'url'));
		$this->load->model('M_Admin');
		if ($this->session->userdata('masuk_perpus') != TRUE) {
			$url = base_url('login');
			redirect($url);
		}
		$this->load->library('pdf');
	}

	public function index()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['pengunjung'] = $this->M_Admin->get_table('tbl_pengunjung');

		$this->data['title_web'] = 'Data Pengunjung ';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('pengunjung/pengunjung_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}
	// public function cetak()
	// {
	// 	$this->data['anggota'] = $this->M_Admin->get_anggotaa('tbl_anggota');
	// 	$this->load->view('anggota/anggota_print',$this->data);

	// }
	

	public function tambah()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['pengunjung'] = $this->M_Admin->get_table('tbl_pengunjung');

		$this->data['title_web'] = 'Tambah pengunjung ';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('pengunjung/tambah_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function add()
	{
		// format tabel / kode baru 3 hurup / id tabel / order by limit ngambil data terakhir
		$id = $this->M_Admin->buat_kode('tbl_pengunjung', 'PN', 'id', 'ORDER BY id DESC LIMIT 1');
		$nama = htmlentities($this->input->post('nama', TRUE));
		// $user = htmlentities($this->input->post('user',TRUE));
		// $pass = md5(htmlentities($this->input->post('pass',TRUE)));
		// $level = htmlentities($this->input->post('level',TRUE));
		$jenkel = htmlentities($this->input->post('jenkel', TRUE));
		$perlu = htmlentities($this->input->post('perlu', TRUE));
		$cari = htmlentities($this->input->post('cari', TRUE));
		$tgl_kunjung = htmlentities($this->input->post('tgl_kunjung', TRUE));
		$jam_kunjung = htmlentities($this->input->post('jam_kunjung', TRUE));
		// $jam_kunjung = $_POST['email'];

		$dd = $this->db->query("SELECT * FROM tbl_pengunjung WHERE id = '$id' OR nama = '$nama'");
		if ($dd->num_rows() > 0) {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-warning">
			<p> Gagal Update User : ' . $nama . ' !, Username / Email Anda Sudah Terpakai</p>
			</div></div>');
			redirect(base_url('pengunjung/tambah'));
		} else {
			// setting konfigurasi upload
			// $nmfile = "anggota_".time();
			// $config['upload_path'] = './assets_style/image/';
			// $config['allowed_types'] = 'gif|jpg|jpeg|png';
			// $config['file_name'] = $nmfile;
			// // load library upload
			// $this->load->library('upload', $config);
			// // upload gambar 1
			// $this->upload->do_upload('gambar');
			// $result1 = $this->upload->data();
			// $result = array('gambar'=>$result1);
			// $data1 = array('upload_data' => $this->upload->data());
			$data = array(
				'pengunjung_id' => $id,
				'nama' => $nama,
				// 'user'=>$user,
				// 'pass'=>$pass,
				// 'level'=>$level,
				// 'tempat_lahir'=>$_POST['lahir'],
				// 'tgl_lahir'=>$_POST['tgl_lahir'],
				// 'level'=>$level,
				// 'email'=>$_POST['email'],
				// 'telepon'=>$telepon,
				// 'foto'=>$data1['upload_data']['file_name'],
				'jenkel' => $jenkel,
				'perlu' => $perlu,
				'cari' => $cari,
				'tgl_kunjung' => date('Y-m-d'),
				'jam_kunjung' => $jam_kunjung

			);
			$this->db->insert('tbl_pengunjung', $data);

			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
            <p> Daftar User telah berhasil !</p>
            </div></div>');
			redirect(base_url('pengunjung'));
		}
	}

	public function edit()
	{
		if ($this->session->userdata('level') == 'Petugas') {
			if ($this->uri->segment('3') == '') {
				echo '<script>alert("halaman tidak ditemukan");window.location="' . base_url('pengunjung') . '";</script>';
			}
			$this->data['idbo'] = $this->session->userdata('ses_id');
			$count = $this->M_Admin->CountTableId('tbl_pengunjung', 'id', $this->uri->segment('3'));
			if ($count > 0) {
				$this->data['pengunjung'] = $this->M_Admin->get_tableid_edit('tbl_pengunjung', 'id', $this->uri->segment('3'));
			} else {
				echo '<script>alert("pengunjung TIDAK DITEMUKAN");window.location="' . base_url('pengunjung') . '"</script>';
			}
		} elseif ($this->session->userdata('level') == 'Anggota') {
			$this->data['idbo'] = $this->session->userdata('ses_id');
			$count = $this->M_Admin->CountTableId('tbl_pengunjung', 'id', $this->uri->segment('3'));
			if ($count > 0) {
				$this->data['pengunjung'] = $this->M_Admin->get_tableid_edit('tbl_pengunjung', 'id', $this->session->userdata('ses_id'));
			} else {
				echo '<script>alert("pengunjung TIDAK DITEMUKAN");window.location="' . base_url('pengunjung') . '"</script>';
			}
		}
		$this->data['title_web'] = 'Edit Pengunjung ';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('pengunjung/edit_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function detail()
	{
		if ($this->session->userdata('level') == 'Petugas') {
			if ($this->uri->segment('3') == '') {
				echo '<script>alert("halaman tidak ditemukan");window.location="' . base_url('pengunjung') . '";</script>';
			}
			$this->data['idbo'] = $this->session->userdata('ses_id');
			$count = $this->M_Admin->CountTableId('tbl_pengunjung', 'id', $this->uri->segment('3'));
			if ($count > 0) {
				$this->data['pengunjung'] = $this->M_Admin->get_tableid_edit('tbl_pengunjung', 'id', $this->uri->segment('3'));
			} else {
				echo '<script>alert("pengunjung TIDAK DITEMUKAN");window.location="' . base_url('pengunjung') . '"</script>';
			}
		} elseif ($this->session->userdata('level') == 'Anggota') {
			$this->data['idbo'] = $this->session->userdata('ses_id');
			$count = $this->M_Admin->CountTableId('tbl_pengunjung', 'id', $this->session->userdata('ses_id'));
			if ($count > 0) {
				$this->data['pengunjung'] = $this->M_Admin->get_tableid_edit('tbl_pengunjung', 'id_login', $this->session->userdata('ses_id'));
			} else {
				echo '<script>alert("pengunjung TIDAK DITEMUKAN");window.location="' . base_url('pengunjung') . '"</script>';
			}
		}
		$this->data['title_web'] = 'Print Kartu pengguna ';
		$this->load->view('pengguna/detail', $this->data);
	}

	public function upd()
	{
		$nama = htmlentities($this->input->post('nama', TRUE));
		$jenkel = htmlentities($this->input->post('jenkel', TRUE));
		$perlu = htmlentities($this->input->post('perlu', TRUE));
		// $status = htmlentities($this->input->post('status',TRUE));
		$cari = htmlentities($this->input->post('cari', TRUE));
		$tgl_kunjung = htmlentities($this->input->post('tgl_kunjung', TRUE));
		$jam_kunjung = htmlentities($this->input->post('jam_kunjung', TRUE));
		$id = htmlentities($this->input->post('id', TRUE));

		$data = array(
			'nama' => $nama,
			'jenkel' => $jenkel,
			'perlu' => $perlu,
			'cari' => $cari,
			'tgl_kunjung' => date('Y-m-d'),
			'jam_kunjung' => $jam_kunjung


			// 'user'=>$user,
			// 'tempat_lahir'=>$_POST['lahir'],
			// 'tgl_lahir'=>$_POST['tgl_lahir'],
			// // 'level'=>$level,
			// 'email'=>$_POST['email'],
			// 'telepon'=>$telepon,
			// 'foto'=>$data1['upload_data']['file_name'],
			// 'jenkel'=>$jenkel,
			// 'alamat'=>$alamat
		);
		$this->M_Admin->update_table('tbl_pengunjung', 'id', $id, $data);

		if ($this->session->userdata('level') == 'Petugas') {

			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
			<p> Berhasil Update Anggota : ' . $nama . ' !</p>
			</div></div>');
			redirect(base_url('pengunjung'));
		} elseif ($this->session->userdata('level') == 'Anggota') {

			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
			<p> Berhasil Update Anggota : ' . $nama . ' !</p>
			</div></div>');
			redirect(base_url('pengunjung/edit/' . $id));
		}
	}
	//     setting konfigurasi upload
	//     $nmfile = "anggota_".time();
	//     $config['upload_path'] = './assets_style/image/';
	//     $config['allowed_types'] = 'gif|jpg|jpeg|png';
	//     $config['file_name'] = $nmfile;
	//     load library upload
	//     $this->load->library('upload', $config);
	// 	upload gambar 1


	// 	if(!$this->upload->do_upload('gambar'))
	// 	{
	// 		if($this->input->post('pass') !== ''){
	// 			$data = array(
	// 				'nama'=>$nama,
	// 				'user'=>$user,
	// 				// 'pass'=>md5($pass),
	// 				'tempat_lahir'=>$_POST['lahir'],
	// 				'tgl_lahir'=>$_POST['tgl_lahir'],
	// 				// 'level'=>$level,
	// 				'email'=>$_POST['email'],
	// 				'telepon'=>$telepon,
	// 				'jenkel'=>$jenkel,
	// 				'alamat'=>$alamat,
	// 			);
	// 			$this->M_Admin->update_table('tbl_anggota','id_login',$id_login,$data);
	// 			if($this->session->userdata('level') == 'Petugas')
	// 			{

	// 				$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
	// 				<p> Berhasil Update Anggota : '.$nama.' !</p>
	// 				</div></div>');
	// 				redirect(base_url('anggota'));  
	// 			}elseif($this->session->userdata('level') == 'Anggota'){

	// 				$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
	// 				<p> Berhasil Update Anggota : '.$nama.' !</p>
	// 				</div></div>');
	// 				redirect(base_url('anggota/edit/'.$id_login)); 
	// 			}
	// 		}else{
	// 			$data = array(
	// 				'nama'=>$nama,
	// 				'user'=>$user,
	// 				'tempat_lahir'=>$_POST['lahir'],
	// 				'tgl_lahir'=>$_POST['tgl_lahir'],
	// 				// 'level'=>$level,
	// 				'email'=>$_POST['email'],
	// 				'telepon'=>$telepon,
	// 				'jenkel'=>$jenkel,
	// 				'alamat'=>$alamat,
	// 			);
	// 			$this->M_Admin->update_table('tbl_anggota','id_login',$id_login,$data);

	// 			if($this->session->userdata('level') == 'Petugas')
	// 			{

	// 				$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
	// 				<p> Berhasil Update Anggota : '.$nama.' !</p>
	// 				</div></div>');
	// 				redirect(base_url('anggota'));  
	// 			}elseif($this->session->userdata('level') == 'Anggota'){

	// 				$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
	// 				<p> Berhasil Update anggota : '.$nama.' !</p>
	// 				</div></div>');
	// 				redirect(base_url('anggota/edit/'.$id_login)); 
	// 			} 

	// 		}
	// 	}else{
	// 		$result1 = $this->upload->data();
	// 		$result = array('gambar'=>$result1);
	// 		$data1 = array('upload_data' => $this->upload->data());
	// 		unlink('./assets_style/image/'.$this->input->post('foto'));
	// 		if($this->input->post('pass') !== ''){
	// 			$data = array(
	// 				'nama'=>$nama,
	// 				'user'=>$user,
	// 				'tempat_lahir'=>$_POST['lahir'],
	// 				'tgl_lahir'=>$_POST['tgl_lahir'],
	// 				// 'pass'=>md5($pass),
	// 				// 'level'=>$level,
	// 				'email'=>$_POST['email'],
	// 				'telepon'=>$telepon,
	// 				'foto'=>$data1['upload_data']['file_name'],
	// 				'jenkel'=>$jenkel,
	// 				'alamat'=>$alamat
	// 			);
	// 			$this->M_Admin->update_table('tbl_anggota','id_login',$id_login,$data);

	// 			if($this->session->userdata('level') == 'Petugas')
	// 			{

	// 				$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
	// 				<p> Berhasil Update anggota : '.$nama.' !</p>
	// 				</div></div>');
	// 				redirect(base_url('anggota'));  
	// 			}elseif($this->session->userdata('level') == 'Anggota'){

	// 				$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
	// 				<p> Berhasil Update anggota : '.$nama.' !</p>
	// 				</div></div>');
	// 				redirect(base_url('anggota/edit/'.$id_login)); 
	// 			} 

	// 		}else{
	// 			$data = array(
	// 				'nama'=>$nama,
	// 				'user'=>$user,
	// 				'tempat_lahir'=>$_POST['lahir'],
	// 				'tgl_lahir'=>$_POST['tgl_lahir'],
	// 				// 'level'=>$level,
	// 				'email'=>$_POST['email'],
	// 				'telepon'=>$telepon,
	// 				'foto'=>$data1['upload_data']['file_name'],
	// 				'jenkel'=>$jenkel,
	// 				'alamat'=>$alamat
	// 			);
	// 			$this->M_Admin->update_table('tbl_anggota','id_login',$id_login,$data);

	// 			if($this->session->userdata('level') == 'Petugas')
	// 			{

	// 				$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
	// 				<p> Berhasil Update Anggota : '.$nama.' !</p>
	// 				</div></div>');
	// 				redirect(base_url('anggota'));  
	// 			}elseif($this->session->userdata('level') == 'Anggota'){

	// 				$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
	// 				<p> Berhasil Update Anggota : '.$nama.' !</p>
	// 				</div></div>');
	// 				redirect(base_url('anggota/edit/'.$id_login)); 
	// 			}
	// 		}
	// 	}
	// }
	public function del()
	{
		if ($this->uri->segment('3') == '') {
			echo '<script>alert("halaman tidak ditemukan");window.location="' . base_url('anggota') . '";</script>';
		}

		$user = $this->M_Admin->get_tableid_edit('tbl_anggota', 'id_login', $this->uri->segment('3'));
		unlink('./assets_style/image/' . $user->foto);
		$this->M_Admin->delete_table('tbl_anggota', 'id_login', $this->uri->segment('3'));

		$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-warning">
		<p> Berhasil Hapus Anggota !</p>
		</div></div>');
		redirect(base_url('anggota'));
	}
}
