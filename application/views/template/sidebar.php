 <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img witdh="45" height="35" src="<?php echo base_url('./Admin/images/staff/'.$this->session->userdata('foto')); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata("nama_lengkap"); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN MENU</li>
        <?php 
			$sess_level = $this->session->userdata('level');
			if ($sess_level == "admin") { ?>
        <li class="active treeview">
          <a href="<?php echo site_url(); ?>Dashboard">
            <i class="fa fa-dashboard"></i> <span>Home</span>
          </a>
       </li>
       <li>
          <a href="<?php echo site_url(); ?>profil">
            <i class="fa fa-male"></i> <span>Data Profil</span>
          </a>
        </li>
       <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Master </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url(); ?>staff"><i class="fa fa-circle-o"></i>Data Staff</a></li>
            <li><a href="<?php echo site_url(); ?>Partner"><i class="fa fa-circle-o"></i>Data Customer</a></li>
            <li><a href="<?php echo site_url(); ?>Bank"><i class="fa fa-circle-o"></i>Data Bank</a></li>
          </ul>
        </li>
        <li>
          <a href="<?php echo site_url(); ?>karyawan">
            <i class="fa fa-male"></i> <span>Data Karyawan</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url(); ?>calon">
            <i class="fa fa-folder-open"></i> <span>Data Calon Karyawan</span>
          </a>
        </li>
		<li>
          <a href="<?php echo site_url(); ?>karyawan/fin">
            <i class="fa fa-male"></i> <span>Data Karyawan FINANCE</span>
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo site_url(); ?>ppu/approve">
            <i class="fa fa-edit"></i> <span>Data PPU Approve</span>
         </a>
        </li>
        <li class="treeview">
          <a href="<?php echo site_url(); ?>kegiatan">
            <i class="fa fa-files-o"></i> <span>Data Kegiatan</span>
         </a>
        </li>
        <li class="treeview">
            <a href="<?php echo site_url(); ?>wo">
                <i class="fa fa-files-o"></i> <span>Request WO Aplikasi</span>
            </a>
        </li>
        <li class="treeview">
            <a href="<?php echo site_url(); ?>wo/view">
                <i class="fa fa-files-o"></i> <span>Data WO Aplikasi</span>
            </a>
        </li>
        <li class="treeview">
          <a href="<?php echo site_url(); ?>ppu">
            <i class="fa fa-edit"></i> <span>Data PPU</span>
         </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-industry"></i>
            <span>Data Invoice</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url(); ?>gaji"><i class="fa fa-circle-o"></i>Data Gaji & Lembur</a></li>
            <li><a href="<?php echo site_url(); ?>invoice"><i class="fa fa-circle-o"></i>Data Invoice</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Data Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          	<li><a href="<?php echo site_url(); ?>Laporan"><i class="fa fa-circle-o"></i>Laporan Karyawan</a></li>
          	<li><a href="<?php echo site_url(); ?>calon"><i class="fa fa-circle-o"></i>Laporan Calon Karyawan</a></li>
          </ul>	
        </li>
        <?php } else if ($sess_level == "DIREKSI") { ?>
         <li class="active treeview">
          <a href="<?php echo site_url(); ?>Dashboard">
            <i class="fa fa-dashboard"></i> <span>Home</span>
          </a>
       </li>
       <li>
          <a href="<?php echo site_url(); ?>profil">
            <i class="fa fa-male"></i> <span>Data Profil</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url(); ?>karyawan/look">
            <i class="fa fa-male"></i> <span>Data Karyawan</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url(); ?>calon/look">
            <i class="fa fa-folder-open"></i> <span>Data Calon Karyawan</span>
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo site_url(); ?>kegiatan/view">
            <i class="fa fa-files-o"></i> <span>Data Kegiatan</span>
         </a>
        </li>
        <li class="treeview">
          <a href="<?php echo site_url(); ?>ppu/looks">
            <i class="fa fa-edit"></i> <span>Data PPU</span>
         </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Data Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          	<li><a href="<?php echo site_url(); ?>Laporan"><i class="fa fa-circle-o"></i>Laporan Karyawan</a></li>
          </ul>
          <ul class="treeview-menu">
          	<li><a href="<?php echo site_url(); ?>kegiatan/laporan"><i class="fa fa-circle-o"></i>Laporan Kegiatan</a></li>
          </ul>		
        </li>
        <?php } else if ($sess_level == "MANAGER") { ?>
         <li class="active treeview">
          <a href="<?php echo site_url(); ?>Dashboard">
            <i class="fa fa-dashboard"></i> <span>Home</span>
          </a>
       </li>
       <li>
          <a href="<?php echo site_url(); ?>profil">
            <i class="fa fa-male"></i> <span>Data Profil</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url(); ?>karyawan/look">
            <i class="fa fa-male"></i> <span>Data Karyawan</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url(); ?>calon/look">
            <i class="fa fa-folder-open"></i> <span>Data Calon Karyawan</span>
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo site_url(); ?>ppu">
            <i class="fa fa-edit"></i> <span>Data Pengajuan PPU</span>
         </a>
        </li>
        <li class="treeview">
          <a href="<?php echo site_url(); ?>kegiatan/view">
            <i class="fa fa-files-o"></i> <span>Data Kegiatan</span>
         </a>
        </li>
        <li class="treeview">
          <a href="<?php echo site_url(); ?>ppu/look">
            <i class="fa fa-edit"></i> <span>Data PPU</span>
         </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Data Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          	<li><a href="<?php echo site_url(); ?>Laporan"><i class="fa fa-circle-o"></i>Laporan Karyawan</a></li>
          </ul>
          <ul class="treeview-menu">
          	<li><a href="<?php echo site_url(); ?>kegiatan/laporan"><i class="fa fa-circle-o"></i>Laporan Kegiatan</a></li>
          </ul>		
        </li>		
        <?php } else if ($sess_level == "HRD") { ?>
         <li class="active treeview">
          <a href="<?php echo site_url(); ?>Dashboard">
            <i class="fa fa-dashboard"></i> <span>Home</span>
          </a>
       </li>
       <li>
          <a href="<?php echo site_url(); ?>profil">
            <i class="fa fa-male"></i> <span>Data Profil</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url(); ?>karyawan">
            <i class="fa fa-male"></i> <span>Data Karyawan</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url(); ?>calon">
            <i class="fa fa-folder-open"></i> <span>Data Calon Karyawan</span>
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo site_url(); ?>kegiatan">
            <i class="fa fa-files-o"></i> <span>Data Kegiatan</span>
         </a>
        </li>
        <li class="treeview">
          <a href="<?php echo site_url(); ?>ppu">
            <i class="fa fa-edit"></i> <span>Data PPU</span>
         </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Data Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          	<li><a href="<?php echo site_url(); ?>karyawan/lap"><i class="fa fa-circle-o"></i>Laporan Karyawan</a></li>
          </ul>	
        </li>
        <?php } else if ($sess_level == "GA") { ?>
         <li class="active treeview">
          <a href="<?php echo site_url(); ?>Dashboard">
            <i class="fa fa-dashboard"></i> <span>Home</span>
          </a>
       </li>
       <li>
          <a href="<?php echo site_url(); ?>profil">
            <i class="fa fa-male"></i> <span>Data Profil</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url(); ?>karyawan/look">
            <i class="fa fa-male"></i> <span>Data Karyawan</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url(); ?>calon/look">
            <i class="fa fa-folder-open"></i> <span>Data Calon Karyawan</span>
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo site_url(); ?>kegiatan">
            <i class="fa fa-files-o"></i> <span>Data Kegiatan</span>
         </a>
        </li>
        <li class="treeview">
          <a href="<?php echo site_url(); ?>ppu">
            <i class="fa fa-edit"></i> <span>Data PPU</span>
         </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Data Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          	<li><a href="<?php echo site_url(); ?>karyawan/lap"><i class="fa fa-circle-o"></i>Laporan Karyawan</a></li>
          </ul>	
        </li>
         <?php } else if ($sess_level == "OPERASIONAL") { ?>
         <li class="active treeview">
          <a href="<?php echo site_url(); ?>Dashboard">
            <i class="fa fa-dashboard"></i> <span>Home</span>
          </a>
       </li>
       <li>
          <a href="<?php echo site_url(); ?>profil">
            <i class="fa fa-male"></i> <span>Data Profil</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url(); ?>karyawan/look">
            <i class="fa fa-male"></i> <span>Data Karyawan</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url(); ?>calon/look">
            <i class="fa fa-folder-open"></i> <span>Data Calon Karyawan</span>
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo site_url(); ?>kegiatan">
            <i class="fa fa-files-o"></i> <span>Data Kegiatan</span>
         </a>
        </li>
        <li class="treeview">
          <a href="<?php echo site_url(); ?>ppu">
            <i class="fa fa-edit"></i> <span>Data PPU</span>
         </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Data Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          	<li><a href="<?php echo site_url(); ?>karyawan/lap"><i class="fa fa-circle-o"></i>Laporan Karyawan</a></li>
          </ul>	
        </li>
        <?php } else if ($sess_level == "FINANCE") { ?>
         <li class="active treeview">
          <a href="<?php echo site_url(); ?>Dashboard">
            <i class="fa fa-dashboard"></i> <span>Home</span>
          </a>
       </li>
       <li>
          <a href="<?php echo site_url(); ?>profil">
            <i class="fa fa-male"></i> <span>Data Profil</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url(); ?>karyawan/fin">
            <i class="fa fa-male"></i> <span>Data Karyawan</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url(); ?>calon/look">
            <i class="fa fa-folder-open"></i> <span>Data Calon Karyawan</span>
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo site_url(); ?>ppu/approve">
            <i class="fa fa-edit"></i> <span>Data PPU Approve</span>
         </a>
        </li>
        <li class="treeview">
          <a href="<?php echo site_url(); ?>kegiatan">
            <i class="fa fa-files-o"></i> <span>Data Kegiatan</span>
         </a>
        </li>
        <li class="treeview">
          <a href="<?php echo site_url(); ?>ppu">
            <i class="fa fa-edit"></i> <span>Data PPU</span>
         </a>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-industry"></i>
            <span>Data Invoice</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url(); ?>gaji"><i class="fa fa-circle-o"></i>Data Gaji & Lembur</a></li>
            <li><a href="<?php echo site_url(); ?>invoice"><i class="fa fa-circle-o"></i>Data Invoice</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <?php } else if ($sess_level == "Accounting") { ?>
         <li class="active treeview">
          <a href="<?php echo site_url(); ?>Dashboard">
            <i class="fa fa-dashboard"></i> <span>Home</span>
          </a>
       </li>
       <li>
          <a href="<?php echo site_url(); ?>profil">
            <i class="fa fa-male"></i> <span>Data Profil</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url(); ?>karyawan/look">
            <i class="fa fa-male"></i> <span>Data Karyawan</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url(); ?>calon/look">
            <i class="fa fa-folder-open"></i> <span>Data Calon Karyawan</span>
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo site_url(); ?>ppu/approve">
            <i class="fa fa-edit"></i> <span>Data PPU Approve</span>
         </a>
        </li>
        <li class="treeview">
          <a href="<?php echo site_url(); ?>kegiatan">
            <i class="fa fa-files-o"></i> <span>Data Kegiatan</span>
         </a>
        </li>
        <li class="treeview">
          <a href="<?php echo site_url(); ?>ppu">
            <i class="fa fa-edit"></i> <span>Data PPU</span>
         </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Data Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          	<li><a href="<?php echo site_url(); ?>karyawan/lap"><i class="fa fa-circle-o"></i>Laporan Karyawan</a></li>
          </ul>	
        </li>
         <?php ;} ?>	
        <li class="treeview">
          <a href="<?php echo site_url(); ?>Auth/logout">
            <i class="fa fa-sign-out"></i> <span>Logout</span>
         </a>
        </li>
      
      </ul>
    </section>