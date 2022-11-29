<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <i class="fa fa-edit" style="color:green"> </i>  <?= $title_web;?>
    </h1>
    <ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-file-text"></i>&nbsp; <?= $title_web;?></li>
    </ol>
  </section>
  <section class="content">
	<?php if(!empty($this->session->flashdata())){ echo $this->session->flashdata('pesan');}?>
	<div class="row">
	    <div class="col-md-12">
	        <div class="box box-primary">
                <div class="box-header with-border"><?php if($this->session->userdata('level') == 'Petugas'){ ?>
                    <a href="laporanpinjam/cetak"><button class="btn btn-info" style="font-size: 16px; "><i class="fa-sharp fa-solid fa-file-pdf" style="font-size: 20px; "></i><span style="padding-left: 15px;">Import Pdf</span> </button></a><?php }?>
                <!-- <a href="anggota/cetak"><button class="btn btn-info"><i class="fa-solid fa-print"></i> Cetak anggota</button></a> -->

                </div>
				<!-- /.box-header -->
				<div class="box-body">
                    <br/>
					<div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped table" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Pinjam</th>
                                <th>ID Anggota</th>
                                <th>Nama</th>
                                <th>Pinjam</th>
                                <th>Balik</th>
                                <th style="width:10%">Status</th>
                                <th>Denda</th>
                                <th>Aksi</th>
                            </tr>
						</thead>
						<tbody>
						<?php 
							$no=1;
							foreach($pinjam->result_array() as $isi){
									$anggota_id = $isi['anggota_id'];
									$ang = $this->db->query("SELECT * FROM tbl_login WHERE anggota_id = '$anggota_id'")->row();

									$pinjam_id = $isi['pinjam_id'];
									$denda = $this->db->query("SELECT * FROM tbl_denda WHERE pinjam_id = '$pinjam_id'");
									$total_denda = $denda->row();
						?>
                            <tr>
                                <td><?= $no;?></td>
                                <td><?= $isi['pinjam_id'];?></td>
                                <td><?= $isi['anggota_id'];?></td>
                                <td><?= $ang->nama;?></td>
                                <td><?= $isi['tgl_pinjam'];?></td>
                                <td><?= $isi['tgl_balik'];?></td>
                                <td><?= $isi['status'];?></td>
                                <td>
									<?php 
										if($isi['status'] == 'Di Kembalikan')
										{
											echo $this->M_Admin->rp($total_denda->denda);
										}else{
											$jml = $this->db->query("SELECT * FROM tbl_pinjam WHERE pinjam_id = '$pinjam_id'")->num_rows();			
											$date1 = date('Ymd');
											$date2 = preg_replace('/[^0-9]/','',$isi['tgl_balik']);
											$diff = $date1 - $date2;
											if($diff > 0 )
											{
												echo $diff.' hari';
												$dd = $this->M_Admin->get_tableid_edit('tbl_biaya_denda','stat','Aktif'); 
												echo '<p style="color:red;font-size:18px;">
												'.$this->M_Admin->rp($jml*($dd->harga_denda*$diff)).' 
												</p><small style="color:#333;">* Untuk '.$jml.' Buku</small>';
											}else{
												echo '<p style="color:green;">
												Tidak Ada Denda</p>';
											}
										}
									?>
								</td> 
								<td style="text-align:center;">
									<?php if($this->session->userdata('level') == 'Petugas'){ ?>
										
										<a href="<?= base_url('laporanpinjam/cetakpinjam/'.$isi['pinjam_id']);?>" 
											class="btn btn-primary btn-sm" title="detail pinjam">
											<i class="fa fa-eye"></i> Cetak Pinjam</a>
									<?php }?>
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
