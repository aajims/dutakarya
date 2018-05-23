<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Paypro | Footer</title>
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
                  <h3 class="box-title">Data Footer Menu</strong></h3>
                  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form role="form" action="<?php echo base_url().'Footer/AddMaster/'?>" method="post" name="form1" id="form1">
                    <input type="hidden" name="footer_type" id="footer_type" value="add"/>
                    <input type="hidden" name="footer_id" id="footer_id" value=""/>
                    <div class="box-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Title Indonesia</label>
                        <input type="text" class="form-control" id="footer_master" name="footer_master" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Title English</label>
                        <input type="text" class="form-control" id="footer_master_en" name="footer_master_en" required>
                      </div>
                    </div>
                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Tambah Master Menu</button>
                    </div>
                  </form>

                  <form role="form" action="<?php echo base_url().'Footer/AddFooter/'?>" method="post" name="form1" id="form1">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Title Indonesia</label>
                        <input type="text" class="form-control" id="footer_title" name="footer_title" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Title English</label>
                        <input type="text" class="form-control" id="footer_title_en" name="footer_title_en" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Links</label>
                        <input type="text" class="form-control" id="footer_links" name="footer_links" required>
                      </div>
                    </div><!-- /.box-body -->
                    <div class="form-group">
                      <label for="exampleInputPassword1">Master Menu</label>
                      <select class="form-control" id="footer_id_page" name="footer_id_page" >
                          <?php
                          $i=0;
                          if ( isset($get_page) && $get_page !== "" ){
                            foreach ( $get_page as $data_get_page ){
                        ?>
                        <option value="<?php echo $get_page[$i]['page_id'];?>"><?php echo $get_page[$i]['title'];?></option>
                        <?php $i++; } }?>
                      </select>
                    </div>
                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                  </form>

                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Page</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $i=0;


                      if ( isset($get_page) && $get_page !== "" ){
                        foreach ( $get_page as $data_get_page ){
                    ?>
                      <tr>
                        <td><?php echo ($i+1);?></td>
                        <td><?php echo $get_page[$i]['title'];?></td>
                        <td>
                          <a href="<?php echo base_url().'Footer/Detail/'.$get_page[$i]['page_id'];?>" class="btn btn-info" >Detail</a>
                          <a href="#" onclick="removeFooter('<?php echo $get_page[$i]['page_id'];?>');" class="btn btn-primary">Edit Master Menu</a>
                          <a href="#" onclick="removeHeader('<?php echo $get_page[$i]['page_id'];?>');" class="btn btn-danger">Delete Master Menu</a>
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

      function removeHeader(idakun){
        if ( confirm("Apakah anda yakin menghapus menu ini ? ")){
          window.location.href = "<?php echo base_url()."Footer/DelHeader/";?>" + idakun ;
        }else{
          return false;
        }
      }

      function removeFooter(idmaster){
        var request = $.ajax({
          url :"<?php echo base_url();?>Footer/GetDetail/",
          dataType:"json",
          type:"post",
          data:{
            id:idmaster
          }
        });

        request.done(function(data){
          $('#footer_id').val(data.id);
          $('#footer_type').val("update");
          $('#footer_master').val(data.title_id);
          $('#footer_master_en').val(data.title_en);
        });
      }
    </script>
  </body>
</html>
