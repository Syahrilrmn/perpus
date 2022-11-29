<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php if ($this->session->userdata('level') == 'Anggota') {
  redirect(base_url('transaksi'));
} ?>
<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Dashboard <small>> Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-sm-12">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="icon">
              <i class="fa-solid fa-users"></i>
            </div>
            <div class="inner">
              <h3><?= $count_pengguna; ?></h3>
              <p>Anggota</p>
            </div>
            <a href="anggota" class="small-box-footer">More info  <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!--small box-->
          <div class="small-box bg-blue">

            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <div class="inner">
              <h3><?= $count_buku; ?></h3>

              <p>Jenis Buku</p>
            </div>
            <a href="data" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">

            <div class="icon">
              <i class="fa-regular fa-address-book"></i>
            </div>
            <div class="inner">
              <h3><?= $count_pinjam; ?></h3>

              <p>Di Pinjam</p>
            </div>
            <a href="transaksi" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">

            <div class="icon">
              <i class="fa-solid fa-handshake-angle"></i>
            </div>
            <div class="inner">
              <h3><?= $count_kembali; ?></h3>

              <p>Di Kembalikan</p>
            </div>
            <a href="transaksi/kembali" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

      </div>
    </div>
    <br>
    
    <!-- isi conten -->
    <div class="row">
      <div class="col" style="width: 98%; padding-left:30px;">
        <div class="box">
          <div class="box-header with-border">
            <!-- <a href="pengunjung/pengunjungtambah"><button class="btn btn-primary"><i class="fa fa-plus"> </i> Tambah pengunjung</button></a> -->
            <h3>Data Pengunjung </h3>
            
          </div>
          
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <br />
              <table id="example1" class="table table-bordered table-striped table" width="100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>ID</th>
                    <!-- <th>Foto</th> -->
                    <th>Nama</th>
                    <!-- <th>User</th> -->
                    <th>Jenis_kelamin</th>
                    <th>perlu</th>
                    <th>cari</th>
                    <th>Tgl_kunjung</th>
                    <th>jam_kunjung</th>
                    <!-- <th>Aksi</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($pengunjung as $isi) { ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $isi['pengunjung_id']; ?></td>
                      <!-- isi foto -->
                      <td><?= $isi['nama']; ?></td>
                      <!-- user -->
                      <td><?= $isi['jenkel']; ?></td>
                      <td><?= $isi['perlu']; ?></td>
                      <td><?= $isi['cari']; ?></td>
                      <td><?= $isi['tgl_kunjung']; ?></td>
                      <td><?= $isi['jam_kunjung']; ?></td>
                      <!-- <td style="width:20%;">
                        <a href="<?= base_url('pengunjung/pengunjungedit/' . $isi['id_pengunjung']); ?>"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                        <a href="<?= base_url('pengunjung/del/' . $isi['id_pengunjung']); ?>" onclick="return confirm('Anda yakin pengunjung akan dihapus ?');">
                          <button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                        <a href="<?= base_url('pengunjung/detail/' . $isi['id_pengunjung']); ?>" target="_blank"><button class="btn btn-primary">
                            <i class="fa fa-print"></i> Cetak Kartu</button></a>
                      </td> -->
                    </tr>
                  <?php $no++;
                  } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  

</div>
<!-- /.content -->