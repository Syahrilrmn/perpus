<?php
error_reporting(0);
if (!empty($_GET['download'] == 'doc')) {
	header("Content-Type: application/vnd.ms-word");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("content-disposition: attachment;filename=" . date('d-m-Y') . "_laporan_rekam_medis.doc");
}
if (!empty($_GET['download'] == 'xls')) {
	header("Content-Type: application/force-download");
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: 0");
	header("content-disposition: attachment;filename=" . date('d-m-Y') . "_laporan_rekam_medis.xls");
}
?>
<?php
$tgla = $pinjam->tgl_bergabung;
$tglk = $pinjam->tgl_lahir;
$bulan = array(
	'01' => 'Januari',
	'02' => 'Februari',
	'03' => 'Maret',
	'04' => 'April',
	'05' => 'Mei',
	'06' => 'Juni',
	'07' => 'Juli',
	'08' => 'Agustus',
	'09' => 'September',
	'10' => 'Oktober',
	'11' => 'November',
	'12' => 'Desember',
);

$array1 = explode("-", $tgla);
$tahun = $array1[0];
$bulan1 = $array1[1];
$hari = $array1[2];
$bl1 = $bulan[$bulan1];
$tgl1 = $hari . ' ' . $bl1 . ' ' . $tahun;


$array2 = explode("-", $tglk);
$tahun2 = $array2[0];
$bulan2 = $array2[1];
$hari2 = $array2[2];
$bl2 = $bulan[$bulan2];
$tgl2 = $hari2 . ' ' . $bl2 . ' ' . $tahun2;
?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_style/assets/bower_components/font-awesome/css/font-awesome.min.css">
	<title><?= $title_web; ?></title>
	<style>
		body {
			background: rgba(0, 0, 0, 0.2);
		}

		page[size="A4"] {
			background: white;
			width: 21cm;
			height: 29.7cm;
			display: block;
			margin: 0 auto;
			margin-bottom: 0.5pc;
			box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
			padding-left: 2.54cm;
			padding-right: 2.54cm;
			padding-top: 1.54cm;
			padding-bottom: 1.54cm;
		}

		@media print {

			body,
			page[size="A4"] {
				margin: 0;
				box-shadow: 0;
			}
		}
	</style>
</head>

<body>
	<!-- <div class="container">
            <br/> 
            <div class="pull-left">
                Codekop - Preview HTML to DOC [ size paper A4 ]
            </div>
            <div class="pull-right"> 
            <button type="button" class="btn btn-success btn-md" onclick="printDiv('printableArea')">
                <i class="fa fa-print"> </i> Print File
            </button>
            </div>
        </div> -->
	<br />
	<button type="button" style="margin-left: 75.5em;" class="btn btn-success btn-md" onclick="printDiv('printableArea')">
		<i class="fa fa-print"> </i> Print File
	</button>
	<div id="printableArea">
		<page size="A4">
			<div class="panel panel-default">
				<div class="panel-body bg-primary">
					<h4 class="text-center">KARTU PEMINJAM PERPUSTAKAAN</h4>
					<br />
					<div class="row">
						<div class="col-sm-8">
							<table class="table table-stripped">
								<tr>
									<td>No_Peminjaman</td>
									<td>:</td>
									<td>
										<?= $pinjam->pinjam_id; ?>
									</td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td>
										<?php
										$user = $this->M_Admin->get_tableid_edit('tbl_login', 'anggota_id', $pinjam->anggota_id);
										error_reporting(0);
										if ($user->nama != null) {
											echo '
															<tr>
																<td>Nama Anggota</td>
																<td>:</td>
																<td>' . $user->nama . '</td>
															</tr>
															<tr>
																<td>Telepon</td>
																<td>:</td>
																<td>' . $user->telepon . '</td>
															</tr>
															<tr>
																<td>E-mail</td>
																<td>:</td>
																<td>' . $user->email . '</td>
															</tr>
															<tr>
																<td>Alamat</td>
																<td>:</td>
																<td>' . $user->alamat . '</td>
															</tr>
															<tr>
																<td>Level</td>
																<td>:</td>
																<td>' . $user->level . '</td>
															</tr>
														';
										} else {
											echo 'Anggota Tidak Ditemukan !';
										}
										?>
									</td>
								</tr>
								<tr>
									<td>Tgl_Pinjaman</td>
									<td>:</td>
									<td>
										<?= $pinjam->tgl_pinjam; ?>
									</td>
								</tr>
								<tr>
									<td>Tgl_pengembalian</td>
									<td>:</td>
									<td>
										<?= $pinjam->tgl_balik; ?>
									</td>
								</tr>


								<td></td>
								<td></td>
								<td></td>




							</table>

							</table>
						</div>
						<div class="col-sm-4 text-center">
							<center>
								<img src="<?php echo base_url(); ?>assets_style/image/<?php echo $user->foto; ?>" style="width:7cm;height:7cm; " class="img-responsive">
							</center>
						</div>
					</div>
				</div>
			</div>
		</page>
	</div>
</body>
<script>
	function printDiv(divName) {
		var printContents = document.getElementById(divName).innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
	}
</script>

</html>