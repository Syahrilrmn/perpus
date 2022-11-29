<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <i class="fa fa-edit" style="color:green"> </i>  Update anggota - <?= $anggota->user;?>
    </h1>
    <ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-edit"></i>&nbsp; Update anggota - <?= $anggota->user;?></li>
    </ol>
  </section>
  <section class="content">
	<div class="row">
	    <div class="col-md-12">	
			<?php if(!empty($this->session->flashdata())){ echo $this->session->flashdata('pesan');}?>

	        <div class="box box-primary">
                <div class="box-header with-border">
                </div>
			    <!-- /.box-header -->
			    <div class="box-body">
                    <form action="<?php echo base_url('anggota/upd');?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nama Anggota</label>
                                    <input type="text" class="form-control" value="<?= $anggota->user;?>" name="user" required="required" placeholder="Nama Pengguna">
                                </div>
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" class="form-control" name="lahir" value="<?= $anggota->tempat_lahir;?>" required="required" placeholder="Contoh : Bekasi">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tgl_lahir" value="<?= $anggota->tgl_lahir;?>" required="required" placeholder="Contoh : 1999-05-18">
                                </div>
                                <!-- <div class="form-group">
                                    <label>Panggilan_Nama</label>
                                    <input type="text" class="form-control" readonly value="<?= $anggota->user;?>"  name="user" required="required" placeholder="Username">
                                </div> -->
                                <!-- <div class="form-group">
                                    <label>Password (opsional)</label>
                                    <input type="password" class="form-control" name="pass" placeholder="Isi Password Jika di Perlukan Ganti">
                                </div> -->
                             
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <br/>
                                    <input type="radio" name="jenkel" <?php if($anggota->jenkel == 'Laki-Laki'){ echo 'checked';}?> value="Laki-Laki" required="required"> Laki-Laki
                                    <br/>
                                    <input type="radio" name="jenkel" <?php if($anggota->jenkel == 'Perempuan'){ echo 'checked';}?> value="Perempuan" required="required"> Perempuan
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Telepon</label>
                                    <input id="uintTextBox" class="form-control" value="<?= $anggota->telepon;?>" name="telepon" required="required" placeholder="Contoh : 089618173609">
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email"  value="<?= $anggota->email;?>" readonly class="form-control" name="email" required="required" placeholder="Contoh : fauzan1892@codekop.com">
                                </div>
                                <div class="form-group">
                                    <label>Pas Foto</label>
                                    <input type="file" accept="image/*" name="gambar">
                                    
                                    <br/>
                                    <img src="<?= base_url('assets_style/image/'.$anggota->foto);?>" class="img-responsive" alt="#">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" name="alamat"  required="required"><?= $anggota->alamat;?></textarea>
                                    <input type="hidden" class="form-control" value="<?= $anggota->id_login;?>" name="id_login">
                                    <input type="hidden" class="form-control" value="<?= $anggota->foto;?>" name="foto">
                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary btn-md">Edit Data</button> 
						</form>
						<?php if($this->session->userdata('level') == 'Petugas'){?>
							<a href="<?= base_url('anggota');?>" class="btn btn-danger btn-md">Kembali</a>
						<?php }elseif($this->session->userdata('level') == 'Anggota'){?>
							<a href="<?= base_url('transaksi');?>" class="btn btn-danger btn-md">Kembali</a>
						<?php }?>
                        </div>
		        </div>
	        </div>
	    </div>
    </div>
</section>
</div>
