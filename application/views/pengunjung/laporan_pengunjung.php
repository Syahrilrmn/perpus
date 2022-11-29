<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-edit" style="color:green"> </i> Daftar Data Pengunjung
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
            <li class="active"><i class="fa fa-file-text"></i>&nbsp; Daftar Data Pengunjung</li>
        </ol>
    </section>
    <section class="content">
        <?php if (!empty($this->session->flashdata())) {
            echo $this->session->flashdata('pesan');
        } ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <!-- <a href="pengunjung/pengunjungtambah"><button class="btn btn-primary"><i class="fa fa-plus"> </i> Tambah pengunjung</button></a> -->
                        <a href="laporanpengunjung/cetak"><button class="btn btn-info" style="font-size: 16px; "><i class="fa-sharp fa-solid fa-file-pdf" style="font-size: 20px; "></i><span style="padding-left: 15px;">Import Pdf</span> </button></a>

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
                                        <th>Jenkel</th>
                                        <th>perlu</th>
                                        <th>cari</th>
                                        <th>Tgl_kunjung</th>
                                        <th>jam_kunjung</th>
                                        <th>Aksi</th>
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
                                            <td style="width:20%;">
                                              <a href="<?= base_url('pengunjung/detail/' . $isi['id_pengunjung']); ?>" target="_blank"><button class="btn btn-primary">
                                              <i class="fa fa-print"></i> Cetak Pengunjung</button></a>
                                            </td>


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