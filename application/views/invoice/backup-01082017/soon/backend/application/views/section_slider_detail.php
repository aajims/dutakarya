<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Paypro | Data Slider</title>
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
                  <h3 class="box-title">Data Slider</h3>
                  <a href="<?php echo base_url()."Section/UpdateSectionSlider/".$id_sections."/".$id_page;?>" class="btn btn-info"> Gallery Slider</a>
                  <a href="<?php echo base_url()."Section/PageSections/".$id_page;?>" class="btn btn-success">Kembali Ke Page</a>
                  <a href="<?php echo base_url()."Section/MiniSlider/".$id_page.'/'.$id_sections;?>" class="btn btn-warning">Mini Slider</a><br><br>
                  
                  <form role="form" action="<?php echo base_url()."Section/SetBgSlider/";?>" method="post">                 
                    <input type="hidden" name="section_id_page" id="section_id_page" value="<?php echo $page[0]->id;?>"/>
                    <input type="hidden" name="section_id_section" id="section_id_section" value="<?php echo $section_detail[0]->id;?>"/>
                    <input type="hidden" name="section_type_slider" id="section_type_slider" value="<?php echo $section_detail[0]->slider_type?>"/>
                  <div class="box-body">                  
                    <div class="form-group">
                      <div class="col-md-2">
                        <label for="exampleInputPassword1"> Type Slider A</label>
                        <input type="radio" name="optionsRadios" onClick="setTypeSlider('A');" <?php echo $typea;?>><br>
                        <img src="<?php echo base_url();?>assets/dist/img/slider/type_B.png" style="border:2px solid;"/> 
                      </div>
                      <div class="col-md-2">
                        <label for="exampleInputPassword1"> Type Slider B</label>
                        <input type="radio" name="optionsRadios" onClick="setTypeSlider('B');" value="b" <?php echo $typeb;?>><br>
                        <img src="<?php echo base_url();?>assets/dist/img/slider/type_a.png" style="margin-left:26px;border:2px solid;"/> 
                      </div>
                    </div>                       
                  </div><!-- /.box-body -->
                  <button class="btn btn-info">Submit</button>
                </form>  

                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th style="width:45%;">Images</th>
                        <th>Link</th>
                        <th>Action</th>
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
                      if ( isset($gallery_slider) && $gallery_slider !== "" ){
                        foreach ( $gallery_slider as $data_slider ){
                    ?>
                      <tr>
                        <td><?php echo ($i+1);?></td>
                        <td>
                          <?php
                            if ( count( $gallery_slider[$i]['img'] ) > 0  ){
                          ?>
                          <img src="<?php echo base_url()."assets/dist/img/slider/".$gallery_slider[$i]['img'];?>" style="width:20%;"/>
                          <?php } else { ?>
                          <span><?php echo $gallery_slider[$i]['title']?></span>
                          <?php } ?>
                        </td>
                        <td><a href="<?php echo $gallery_slider[$i]['links'];?>" class="btn btn-info" target="_blank">Open</a></td>
                        <td><a href="<?php echo base_url()."Section/RemoveSectionSlider/".$gallery_slider[$i]['id']."/".$id_sections."/".$id_page;?>" class="btn btn-warning">Remove from this Section</a></td>
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
    <script src="<?php echo base_url();?>assets/dist/js/jscolor.js"></script>
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

      function setTypeSlider(type){
        $('#section_type_slider').val(type);
      }
    </script>
  </body>
</html>
