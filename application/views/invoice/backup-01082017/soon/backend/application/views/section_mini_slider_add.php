<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Paypro | Sections</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
       <?php $this->load->view("header");?>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <?php $this->load->view("sidebar");?>
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
 

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Section Page <strong><?php echo $page[0]->page;?></strong></h3>
                  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <a class="btn btn-warning" href="<?php echo base_url()."Section/addSection/".$page[0]->id;?>">Add Sections</a><br><br>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Title Sections</th>
                        <th>Details</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $i=0;

                      $arrColor = array(
                          "A" => "green",
                          "N" => "red"
                      );

                      $arrStatus = array(
                          "A" => array( "label" => "Active", "setstatus" => "N", "color" => "btn-danger", "labelButton" => "Non Active" ),
                          "N" => array( "label" => "Non Active", "setstatus" => "A", "color" => "btn-info", "labelButton" => "Active")
                      );

                      if ( isset($sections_list) && $sections_list !== "" ){
                        foreach ( $sections_list as $data_sections_list ){
                    ?>
                      <tr>
                        <td><?php echo ($i+1);?></td>
                        <td><?php echo $sections_list[$i]['title_sections'];?></td>
                        <td>
                          <a class="btn btn-primary" href="<?php echo base_url()."Mini/DetailMiniSlider/".$sections_list[$i]['id_sections']."/".$page[0]->id;?>">Details</a>
                          <a class="btn btn-info" href="<?php echo base_url()."Section/AddMiniSlider/".$sections_list[$i]['id_sections']."/".$sections_list[$i]['id_slider']."/".$sections_list[$i]['id_page'];?>">Tambah ke slider</a>
                        </td>
                    <?php
                          $i++;
                        }
                      }
                    ?>
                      </tr>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://suka.studio">Suka Studio</a>.</strong> All rights reserved.
      </footer>

     
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url();?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>assets/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src=".<?php echo base_url();?>assets/dist/js/demo.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });

      function removeSection(idSec,idPage){
        if ( confirm("Apakah anda yakin menghapus section ini ? ")){
          window.location.href = "<?php echo base_url()."Section/DelSection/";?>" + idSec + "/" + idPage;
        }else{
          return false;
        }
      }
    </script>
  </body>
</html>
