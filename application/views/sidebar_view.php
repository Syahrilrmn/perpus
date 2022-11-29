<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php
            $d = $this->db->query("SELECT * FROM tbl_login WHERE id_login='$idbo'")->row();
            if(isset($d->foto)){
          ?>
          <br/>
          <img src="<?php echo base_url();?>assets_style/image/<?php echo $d->foto;?>" alt="#" c
          lass="user-image" style="border-radius:50%;"/>
          <?php }else{?>
            <!--<img src="" alt="#" class="user-image" style="border:2px solid #fff;"/>-->
            <i class="fa fa-user fa-4x" style="color:#fff;"></i>
          <?php }?>
        </div>
        <div class="pull-left info" style="margin-top: 5px;">
          <p><?php echo $d->nama;?></p>
          <p><?= $d->level;?>
          </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
        
		</div>
        <ul class="sidebar-menu" data-widget="tree">
			<?php if($this->session->userdata('level') == 'Petugas'){?>
                <hr class="sidebar-divider">
            <li class="header">MAIN NAVIGATION</li>
            <li class="<?php if($this->uri->uri_string() == 'dashboard'){ echo 'active';}?>">
                <a href="<?php echo base_url('dashboard');?>">
                <i class="fa-solid fa-desktop"></i> <span style="padding-left: 15px;"> Dashboard</span>
                </a>
            </li>
            <li class="<?php if($this->uri->uri_string() == 'pengunjung'){ echo 'active';}?>
                <?php if($this->uri->uri_string() == 'pengunjung/pengunjungtambah'){ echo 'active';}?>
                <?php if($this->uri->uri_string() == 'pengunjung/pengunjungedit/'.$this->uri->segment('3')){ echo 'active';}?>">
                <a href="<?php echo base_url('pengunjung');?>" class="cursor">
                <i class="fa-solid fa-fw fa-people-pulling"></i> <span style="padding-left: 15px;"> Data Pengunjung</span></a>
			</li>
            <li class="<?php if($this->uri->uri_string() == 'anggota'){ echo 'active';}?>
                <?php if($this->uri->uri_string() == 'anggota/tambah'){ echo 'active';}?>
                <?php if($this->uri->uri_string() == 'anggota/edit/'.$this->uri->segment('3')){ echo 'active';}?>">
                <a href="<?php echo base_url('anggota');?>" class="cursor">
                <i class="fa-solid fa-users"></i> <span style="padding-left: 15px;">Data Anggota</span></a>
			</li>
            <li class="<?php if($this->uri->uri_string() == 'user'){ echo 'active';}?>
                <?php if($this->uri->uri_string() == 'user/tambah'){ echo 'active';}?>
                <?php if($this->uri->uri_string() == 'user/edit/'.$this->uri->segment('3')){ echo 'active';}?>">
                <a href="<?php echo base_url('user');?>" class="cursor">
                    <i class="fa fa-user"></i> <span style="padding-left: 12px;">Data Users</span></a>
			</li>
			<li class="treeview <?php if($this->uri->uri_string() == 'data/kategori'){ echo 'active';}?>
				<?php if($this->uri->uri_string() == 'data/rak'){ echo 'active';}?>
				<?php if($this->uri->uri_string() == 'data'){ echo 'active';}?>
				<?php if($this->uri->uri_string() == 'data/bukutambah'){ echo 'active';}?>
				<?php if($this->uri->uri_string() == 'data/bukudetail/'.$this->uri->segment('3')){ echo 'active';}?>
				<?php if($this->uri->uri_string() == 'data/bukuedit/'.$this->uri->segment('3')){ echo 'active';}?>">
                <a href="#">
                <i class="fa-solid fa-fw fa-layer-group"></i>
                    <span style="padding-left: 15px;">Data Master </span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if($this->uri->uri_string() == 'data'){ echo 'active';}?>
                        <?php if($this->uri->uri_string() == 'data/bukutambah'){ echo 'active';}?>
                        <?php if($this->uri->uri_string() == 'data/bukudetail/'.$this->uri->segment('3')){ echo 'active';}?>
                        <?php if($this->uri->uri_string() == 'data/bukuedit/'.$this->uri->segment('3')){ echo 'active';}?>">
                        <a href="<?php echo base_url("data");?>" class="cursor">
                            <span class="fa fa-book"></span> Data Buku
                            
                        </a>
                    </li>
                    <li class=" <?php if($this->uri->uri_string() == 'data/kategori'){ echo 'active';}?>">
                        <a href="<?php echo base_url("data/kategori");?>" class="cursor">
                            <span class="fa fa-tags"></span> Kategori
                            
                        </a>
                    </li>
                    <li class=" <?php if($this->uri->uri_string() == 'data/rak'){ echo 'active';}?>">
                        <a href="<?php echo base_url("data/rak");?>" class="cursor">
                            <span class="fa fa-list"></span> Rak
                            
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview 
                <?php if($this->uri->uri_string() == 'transaksi'){ echo 'active';}?>
                <?php if($this->uri->uri_string() == 'transaksi/kembali'){ echo 'active';}?>
                <?php if($this->uri->uri_string() == 'transaksi/pinjam'){ echo 'active';}?>
                <?php if($this->uri->uri_string() == 'transaksi/detailpinjam/'.$this->uri->segment('3')){ echo 'active';}?>
                <?php if($this->uri->uri_string() == 'transaksi/kembalipinjam/'.$this->uri->segment('3')){ echo 'active';}?>">
                <a href="#">
                    <i class="fa fa-exchange"></i>
                    <span style="padding-left: 12px;">Transaksi</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if($this->uri->uri_string() == 'transaksi'){ echo 'active';}?>
                        <?php if($this->uri->uri_string() == 'transaksi/pinjam'){ echo 'active';}?>
                        <?php if($this->uri->uri_string() == 'transaksi/kembalipinjam/'.$this->uri->segment('3')){ echo 'active';}?>">
                        <a href="<?php echo base_url("transaksi");?>" class="cursor">
                            <span class="fa fa-upload"></span> Peminjaman
                            
                        </a>
                    </li>
                    <li class="<?php if($this->uri->uri_string() == 'transaksi/kembali'){ echo 'active';}?>">
                        <a href="<?php echo base_url("transaksi/kembali");?>" class="cursor">
                            <span class="fa fa-download"></span> Pengembalian
                        </a>
                    </li>
                </ul>
            </li>
       
            <li class="treeview 
                <?php if($this->uri->uri_string() == 'laporanpengunjung'){ echo 'active';}?>
               ">
                <a href="#">
                     <i class="fa-solid fa-print"></i>
                    <span style="padding-left: 18px;">Data Laporan Perpus</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if($this->uri->uri_string() == 'laporanpengunjung'){ echo 'active';}?>
                        ">
                        <a href="<?php echo base_url("Laporanpengunjung");?>" class="cursor">
                        <i class="fa-solid fa-print"></i> Pengunjung
                            
                        </a>
                    </li>
                    <li class="<?php if($this->uri->uri_string() == 'laporananggota'){ echo 'active';}?>">
                        <a href="<?php echo base_url("laporananggota");?>" class="cursor">
                        <i class="fa-solid fa-print"></i> Anggota
                        </a>
                    </li>
                    <li class="<?php if($this->uri->uri_string() == 'laporanuser'){ echo 'active';}?>">
                        <a href="<?php echo base_url("laporanuser");?>" class="cursor">
                        <i class="fa-solid fa-print"></i> User
                        </a>
                    </li>
                    <li class="<?php if($this->uri->uri_string() == 'laporanbuku'){ echo 'active';}?>">
                        <a href="<?php echo base_url("laporanbuku");?>" class="cursor">
                        <i class="fa-solid fa-print"></i></span> Buku
                        </a>
                    </li>
                    <li class="<?php if($this->uri->uri_string() == 'laporanpinjam'){ echo 'active';}?>">
                        <a href="<?php echo base_url("laporanpinjam");?>" class="cursor">
                        <i class="fa-solid fa-print"></i> Peminjam
                        </a>
                    </li>
                    
                </ul>
            </li>
            <li class="<?php if($this->uri->uri_string() == 'transaksi/denda'){ echo 'active';}?>">
                <a href="<?php echo base_url("transaksi/denda");?>" class="cursor">
                    <i class="fa fa-money"></i> <span style="padding-left: 12px;">Denda</span>
                    
                </a>
            </li>

            <!-- bagian Bawah sidebar -->

            <li class="keluar" style="padding-top: 70px;" >
                <a href="<?php echo base_url(); ?>login/logout"  class="cursor">
                <i class="fa-solid fa-fw fa-power-off " ></i><span style="padding-left: 15px;">Logout</span>
                </a>
            </li>
            
                      
			<?php }?>
            <!-- sebagai anggota -->
			<?php if($this->session->userdata('level') == 'Anggota'){?>
                <hr class="sidebar-divider">
				<li class="<?php if($this->uri->uri_string() == 'transaksi'){ echo 'active';}?>">
					<a href="<?php echo base_url("transaksi");?>" class="cursor">
						<i class="fa fa-upload"></i> <span>Data Peminjaman </span>
					</a>
				</li>
				<li class="<?php if($this->uri->uri_string() == 'transaksi/kembali'){ echo 'active';}?>">
					<a href="<?php echo base_url("transaksi/kembali");?>" class="cursor">
						<i class="fa fa-upload"></i> <span>Data Pengambilan</span>
					</a>
				</li>
				<li class="<?php if($this->uri->uri_string() == 'data'){ echo 'active';}?>
				<?php if($this->uri->uri_string() == 'data/bukudetail/'.$this->uri->segment('3')){ echo 'active';}?>">
					<a href="<?php echo base_url("data");?>" class="cursor">
						<i class="fa fa-search"></i>  <span>Cari Buku</span>
					</a>
				</li>
				<li class="<?php if($this->uri->uri_string() == 'user/edit/'.$this->uri->segment('3')){ echo 'active';}?>">
					<a href="<?php echo base_url('user/edit/'.$this->session->userdata('ses_id'));?>" class="cursor">
						<i class="fa fa-user"></i>  <span>Data Anggota</span>
					</a>
				</li>
				<li class="">
					<a href="<?php echo base_url('user/detail/'.$this->session->userdata('ses_id'));?>" target="_blank" class="cursor">
						<i class="fa fa-print"></i> <span>Cetak kartu Anggota</span>
					</a>
				</li>
			<?php }?>
        </ul>
        <div class="clearfix"></div>
        <br/>
        <br/>
    </section>
    <!-- /.sidebar -->
  </aside>
