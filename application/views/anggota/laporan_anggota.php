<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <i class="fa fa-edit" style="color:green"> </i>  Daftar Data Anggota
    </h1>
    <ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-file-text"></i>&nbsp; Daftar Data Anggota</li>
    </ol>
  </section>
  <section class="content">
	<?php if(!empty($this->session->flashdata())){ echo $this->session->flashdata('pesan');}?>
	<div class="row">
	    <div class="col-md-12">
	        <div class="box box-primary">
                <div class="box-header with-border">
                    <!-- <a href="anggota/tambah"><button class="btn btn-primary"><i class="fa fa-plus"> </i> Tambah anggota</button></a> -->
                    <a href="laporananggota/cetak"><button class="btn btn-info" style="font-size: 16px; "><i class="fa-sharp fa-solid fa-file-pdf" style="font-size: 20px; "></i><span style="padding-left: 15px;">Import Pdf</span> </button></a>

                </div>
				<!-- /.box-header -->
				<div class="box-body">
				<div class="table-responsive">
                    <br/>
                    <table id="example1" class="table table-bordered table-striped table" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <!-- <th>Panggilan_Nama</th> -->
                                <th>Jenkel</th>
                                <th>Telepon</th>              
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=1;foreach($anggota as $isi){?>
                            <tr>
                                <td><?= $no;?></td>
                                <td><?= $isi['anggota_id'];?></td>
                                <td>
                                    <center>
                                        <?php if(!empty($isi['foto'] !== "-")){?>
                                        <img src="<?php echo base_url();?>assets_style/image/<?php echo $isi['foto'];?>" alt="#" 
                                        class="img-responsive" style="height:auto;width:100px;"/>
                                        <?php }else{?>
                                            <!--<img src="" alt="#" class="user-image" style="border:2px solid #fff;"/>-->
                                            <i class="fa fa-user fa-3x" style="color:#333;"></i>
                                        <?php }?>
                                    </center>
                                </td>
                                
                                <td><?= $isi['user'];?></td>
                                <td><?= $isi['jenkel'];?></td>
                                <td><?= $isi['telepon'];?></td>
                                
                                <td><?= $isi['alamat'];?></td>
                                <!--  -->
                                <td style="width:20%;">
                                    <!-- <a href="<?= base_url('anggota/edit/'.$isi['id_login']);?>"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                                    <a href="<?= base_url('anggota/del/'.$isi['id_login']);?>" onclick="return confirm('Anda yakin anggota akan dihapus ?');">
									<button class="btn btn-danger"><i class="fa fa-trash"></i></button></a> -->
									<a href="<?= base_url('anggota/detail/'.$isi['id_login']);?>" target="_blank"><button class="btn btn-primary">
										<i class="fa fa-print"></i> Cetak Anggota </button></a>
                                </td>
                            </tr>
                        <?php $no++;}?>
                        </tbody>
                    </table>
			    </div>
			    </div>
	        </div>
    	</div>
    </div>
</section>
</div>
