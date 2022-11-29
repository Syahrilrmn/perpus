<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-plus" style="color:green"> </i> Tambah Pengunjung
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-plus"></i>&nbsp; Tambah Pengunjung</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="<?php echo base_url('pengunjung/prosespengunjung'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama Pengunjung</label>
                                        <input type="text" class="form-control" name="nama" required="required" placeholder="Nama Pengunjung....">
                                    </div>

                                    <!-- <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="user" required="required" placeholder="Username">
                                    </div> -->
                                    <div class="form-group">
                                        <label>Perlu</label>
                                        <input type="text" class="form-control" name="perlu" required="required" placeholder="Membaca,Cari Referensi....">
                                    </div>

                                    <div class="form-group">
                                        <label>Cari</label>
                                        <input type="text" class="form-control" name="cari" required="required" placeholder="Buku cerpen,Buku Sejarah...">
                                    </div>
                                   


                                </div>
                                <div class="col-sm-6">
                                <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <br />
                                        <input type="radio" name="jenkel" value="Laki-Laki" required="required"> Laki-Laki
                                        <br />
                                        <input type="radio" name="jenkel" value="Perempuan" required="required"> Perempuan
                                    </div>

                                
                                    <div class="form-group">
                                        <label>Tanggal Kunjung</label>
                                        <input type="date" class="form-control" name="tgl_kunjung" required="required" placeholder="Contoh : 1999-05-18">
                                    </div>
                                    <div class="form-group">
                                        <label>jam_kunjung</label>
                                        <input type="time" class="form-control" name="jam_kunjung" required="required" placeholder="Contoh : 1999-05-18">
                                    </div>
                                    <!-- <div class="form-group">
                                    <label>Pas Foto</label>
                                    <input type="file" accept="image/*" name="gambar" required="required">
                                </div> -->

                                </div>
                            </div>
                            <div class="pull-right">
                                <input type="hidden" name="tambah" value="tambah">
                                <button type="submit" class="btn btn-primary btn-md">Submit</button>
                            
                        </form>
                        <a href="<?= base_url('pengunjung'); ?>" class="btn btn-danger btn-md">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>