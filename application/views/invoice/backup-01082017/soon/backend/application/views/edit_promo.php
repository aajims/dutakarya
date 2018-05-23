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
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

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
                <div class="box-body">
                   <form role="form" action="<?php echo base_url().'Promo/SavePromo';?>" method="post">
                      <input type="hidden" name="promo_method" id="promo_method" value="update"/>
                      <input type="hidden" name="promo_id" id="promo_id" value="<?php echo $promo[0]->id;?>"/>
                      <input type="hidden" name="promo_kategori" id="promo_kategori" value="<?php echo $promo[0]->kategori;?>"/>
                      <input type="hidden" name="promo_images" id="promo_images" value="<?php echo $promo[0]->img;?>"/>
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Title (maks 32 karakter)</label>
                          <input type="text" value="<?php echo $promo[0]->title;?>" class="form-control" id="sections_title" name="sections_title" maxlength="64" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Title (maks 32 karakter) English Version</label>
                          <input type="text" value="<?php echo $promo_en[0]->title;?>" class="form-control" id="sections_title_en" name="sections_title_en"  maxlength="64" required>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Intro (maks 256 karakter)</label>
                          <input type="text" value="<?php echo $promo[0]->intro;?>" class="form-control" id="sections_intro" name="sections_intro" maxlength="256" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Intro (maks 256 karakter) English Version</label>
                          <input type="text" value="<?php echo $promo_en[0]->intro;?>" class="form-control" id="sections_intro_en" name="sections_intro_en"  maxlength="256" required>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Description (maks 64 karakter)</label>
                          <textarea id="editor1" name="sections_description" rows="10" cols="80"><?php echo $promo[0]->promo;?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Description (maks 64 karakter) English Version</label>
                          <textarea id="editor2" name="sections_description_en" rows="10" cols="80"><?php echo $promo_en[0]->promo;?></textarea>
                        </div>  
                        <button type="submit" class="btn btn-primary" id="btnsubmit" style="display:none;">Submit</button>       
                    </form> 
                      <div class="form-group">
                        <form id="promo_form_upload_images" name="promo_form_upload_images" enctype="multipart/form-data">
                          <label for="exampleInputPassword1">Images (maks 1Mb)</label>
                          <input type="file" id="promo_upload_images" name="promo_upload_images">
                          <div id="promo_images_preview" name="promo_images_preview"><?php echo $html_images;?></div>
                          </form>
                        </div>
                      </div><!-- /.box-body -->
                    
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" onclick="submitform();">Submit</button>
                    </div>                    
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
        <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="<?php echo base_url();?>assets/dist/js/jscolor.js"></script>
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
        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor2');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });

      $('#promo_form_upload_images').on('submit',function(e){
        $('#promo_upload_images').hide();
        $('#promo_images_preview').html("<span>Loading...</span>");
        e.preventDefault();
        $.ajax({
          url: "<?php echo base_url()."Promo/UploadImages/"?>", // Url to which the request is send
          type: "POST",             // Type of request to be send, called as method
          data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
          contentType: false,       // The content type used when sending data to the server.
          cache: false,             // To unable request pages to be cached
          processData:false,        // To send DOMDocument or non processed data file it is set to false,
          dataType:"json",
          success: function(data)   // A function to be called if request succeeds
          {
            //Success action            
            if ( data.status == "0" ){
              $('#promo_images').val(data.img_name);
              $('#promo_images_preview').html(data.html);
              
            }else{
              $('#promo_upload_images').show();
              alert(data.error);
            }
          }
        });
      });

      $("#promo_upload_images").on("change", function() {
        $("#promo_form_upload_images").submit();
      }); 

      function deleteBgImages(){
        $('#promo_upload_images').show();
        $('#promo_images').val("");
        $('#promo_images_preview').html("");
      }

      function submitform(){
        $('#btnsubmit').click();
      }

       
    </script>
  </body>
</html>
