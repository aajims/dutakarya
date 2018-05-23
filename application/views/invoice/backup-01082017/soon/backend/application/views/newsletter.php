<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Paypro | News Letter</title>
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
                  <h3 class="box-title">Data Suscriber</h3>
                  <br><br>
                  <a href="<?php echo base_url();?>Suscriber/" class="btn btn-warning">Suscriber</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $i=0;
                      $arrMonth = array(
                        "1" => "Januari",
                        "2" => "Februari",
                        "3" => "Maret",
                        "4" => "April",
                        "5" => "Mei",
                        "6" => "Juni",
                        "7" => "Juli",
                        "8" => "Agustus",
                        "9" => "Sepetember",
                        "10" => "Oktober",
                        "11" => "November",
                        "12" => "Desember"
                      );

                      $arrColor = array(
                          "P" => "green",
                          "S" => "blue"
                      );

                      $arrStatus = array(
                          "P" => array( "label" => "Pending", "setstatus" => "N", "color" => "btn-danger", "labelButton" => "Non Active" ),
                          "S" => array( "label" => "Sended", "setstatus" => "A", "color" => "btn-info", "labelButton" => "Active")
                      );
                      
                      if ( isset($newsletter_list) && count($newsletter_list) > 0 ){
                        foreach ( $newsletter_list as $data_newsletter_list ){
                    ?>
                      <tr>
                        <td><?php echo ($i+1);?></td>
                        <td><?php echo $newsletter_list[$i]->title;?></td>
                        <td><span style="color:<?php echo $arrColor[$newsletter_list[$i]->status]; ?>"><strong><?php echo $arrStatus[$newsletter_list[$i]->status]['label'];?></strong></span></td>
                        <td><?php echo $newsletter_list[$i]->dates." ".$arrMonth[$newsletter_list[$i]->months]." ".$newsletter_list[$i]->years ;?></td>
                        <td>
                          <!-- <a href="<?php //echo base_url()."Suscriber/SendingNewsLetter/".$newsletter_list[$i]->id;?>" class="btn-sm btn-success">Sending</a> -->
                          <a href="#" onclick="openPreview('<?php echo $newsletter_list[$i]->id;?>')" class="btn-sm btn-info">Preview</a>
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

      function removeSlider(idslide){
        if ( confirm("Apakah anda yakin menghapus slide ini ? ")){
          window.location.href = "<?php echo base_url()."Slider/DelSlide/";?>" + idslide;
        }else{
          return false;
        }
      }

      function openPreview(id){
        window.open("<?php echo base_url()."Suscriber/PreviewNewsLetter/";?>" + id, "Preview", "width=600;height=480");
      }
    </script>
  </body>
</html>
