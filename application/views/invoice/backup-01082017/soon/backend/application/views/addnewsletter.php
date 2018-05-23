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
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
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
       
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Add News Letter</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="<?php echo base_url();?>Suscriber/saveNewsLetter/" method="post" name="form1" id="form1">
                  <input type="hidden" name="form_addnewsletter_url_images" id="form_addnewsletter_url_images"/>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <input type="text" class="form-control" id="form_addnewsletter_title" name="form_addnewsletter_title">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Konten</label>
                      <textarea id="editor1" name="editor1" rows="10" cols="80"></textarea>
                    </div>
                     <button type="submit" class="btn btn-primary" style="display: none;" id="submitbtn">Submit</button>
                </form>
                <form id="form_upload_thumbnail" name="form_upload_thumbnail">
                    <div class="form-group">
                      <label for="exampleInputFile">Images ( Maksimal 1 Mb )</label>
                      <input type="file" id="form_addnewsletter_images" name="form_addnewsletter_images">
                      <div id="form_addnewsletter_preview"></div>
                    </div>
                  </div><!-- /.box-body -->
                </form>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" onclick="submitnewsletter();">Submit</button>
                  </div>                
              </div><!-- /.box -->

             

            </div><!--/.col (left) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://suka.studio">Suka Studio</a>.</strong> All rights reserved.
      </footer>

      
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>assets/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });


      $('#form_upload_thumbnail').on('submit',function(e){
        $('#form_addnewsletter_images').hide();
        $('#form_addnewsletter_preview').html("<span>Loading...</span>");
        e.preventDefault();
        $.ajax({
          url: "<?php echo base_url()."Suscriber/uploadFile/"?>", // Url to which the request is send
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
              $('#form_addnewsletter_url_images').val(data.img_name);
              $('#form_addnewsletter_preview').html(data.html);
              
            }else{
              $('#form_addnewsletter_images').show();
              alert(data.error);
            }
          }
        });
      });

      $("#form_addnewsletter_images").on("change", function() {
        $("#form_upload_thumbnail").submit();
      }); 

      function deletePreview(){
        $('#form_addnewsletter_images').show();
        $('#form_addnewsletter_url_images').val("");
        $('#form_addnewsletter_preview').html("");
      }

      function submitnewsletter(){
        $('#submitbtn').click();
      }
    </script>
  </body>
</html>
