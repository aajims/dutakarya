<!DOCTYPE html>
<html>

<?php echo $headernya; ?>
<?php echo $jsnya; ?>
<script type="text/javascript">
    setInterval(function(){
        $("#load_row").load('<?=base_url()?>notif/load_row')
    }, 5000); //menggunakan setinterval jumlah notifikasi akan selalu update setiap 2 detik diambil dari controller notifikasi fungsi load_row

    setInterval(function(){
        $("#load_data").load('<?=base_url()?>notif/load_data')
    }, 5000); //yang ini untuk sela

    function myFunction() {
        $.ajax({
            url: "<?=site_url()?>notif/view",
            type: "POST",
            processData:false,
            success: function(data){
                $("#load_row").remove();
                $("#notif-latest").show();$("#notif-latest").html(data);
            },
            error: function(){}
        });
    }

    $(document).ready(function() {
        $('body').click(function(e){
            if ( e.target.id != 'notif-icon'){
                $("#notif-latest").hide();
            }
        });
    });
</script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo site_url(); ?>Dashboard" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="<?php echo base_url(); ?>Admin/images/pavicondks.png" /><b>DKS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Aplikasi Karyawan DKS</b></span>
    </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
              <span class="sr-only">Toggle navigation</span>
          </a>

          <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">

                  <!-- Notifications: style can be found in dropdown.less -->
                  <li class="dropdown notifications-menu">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" onclick="myFunction()">
                          <i class="fa fa-bell-o"></i>
                          <span class="label label-warning" id="load_row"><?=$jnotif ?></span>
                      </a>
                      <ul class="dropdown-menu">
                          <? $no=0; foreach($getnotif as $rnotif){ $no++;
                              if($no % 2==0){$strip='strip1';}  //agar pesan yang tampil striped beda warna
                              else{$strip='strip2';}
                              ?>
                              <?php if(isset($success)) { ?> <div class="success"><?php echo $success;?></div> <?php } ?>
                              <li><a href="#" >
                                      <div>

                                          <?=$rnotif->no_ppu; ?> -
                                          <span class=" text-muted small"><?=$rnotif->ket; ?></span>
                                      </div>
                                  </a>
                              </li>
                          <? }?>
                          <li class="divider"></li>
                      </ul>
                  </li>
   <?php echo $topbarnya; ?> 
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
   <?php echo $sidebarnya; ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $judul; ?>
      </h1>
      <ol class="breadcrumb">
       <li><?php echo $judul; ?></li>
      </ol>
    </section>
     <section class="content">
     	<div class="clearfix"></div>
      <div class="row">
	<?php echo $contentnya; ?>
    <!-- Main content -->
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php echo $footnya; ?>
</body>
</html>
