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

                <div class="box-header with-border">

                  <h3 class="box-title">Tambah Slider</h3>

                </div><!-- /.box-header -->

                <!-- /.box-header -->

                  <!-- form start -->

                <form role="form" action="<?php echo base_url()."Slider/SaveTitle";?>" method="post" name="form1">

                  <input type="hidden" name="form_slider_images" id="form_slider_images" required />

                  <input type="hidden" name="form_slider_icon" id="form_slider_icon" />

                  <input type="hidden" name="form_slider_type" id="form_slider_type" value="A" required />

                  <input type="hidden" name="form_slider_gif" id="form_slider_gif" />

                  <div class="box-body">

                    <div class="form-group">

                      <label for="exampleInputEmail1">Title ( maks 500 karakter )</label>

                      <input type="text" class="form-control" id="form_slider_title" name="form_slider_title"  maxlength="500">

                    </div>

                    <div class="form-group">

                      <label for="exampleInputEmail1">Title ( maks 500karakter ) English Version</label>

                      <input type="text" class="form-control" id="form_slider_title_en" name="form_slider_title_en"  maxlength="500">

                    </div>

                    <div class="form-group">

                      <label for="exampleInputPassword1">Description  </label>

                      <textarea class="form-control" id="form_slider_karakter" name="form_slider_karakter" ></textarea>

                    </div>

                    <div class="form-group">

                      <label for="exampleInputPassword1">Description  English Version</label>

                      <textarea class="form-control" id="form_slider_karakter_en" name="form_slider_karakter_en"></textarea>

                    </div>

                    <div class="form-group">

                      <label for="exampleInputPassword1">URL </label>

                      <input type="text" class="form-control" id="form_slider_url" name="form_slider_url">

                    </div> 

                    <div class="form-group">

                      <label for="exampleInputPassword1">Class Attribute</label>

                      <input type="text" class="form-control" id="form_slider_class" name="form_slider_class">

                    </div>                     

                    <div class="form-group" id="bg_color">

                      <label for="exampleInputPassword1">Color</label>

                      <input class="form-control jscolor" id="form_slider_background_color" name="form_slider_background_color"/>

                    </div>                    

                    <div class="form-group">

                      <div class="col-md-4">

                        <label for="exampleInputPassword1"> Type Slider A ( image sebelah kanan )</label>

                        <input type="radio" name="optionsRadios" onClick="setType('A');" checked><br>

                        <img src="<?php echo base_url();?>assets/dist/img/type1.png"/> 

                      </div>

                      <div class="col-md-4">

                        <label for="exampleInputPassword1"> Type Slider B ( background image )</label>

                        <input type="radio" name="optionsRadios" onClick="setType('B');" value="b"><br>

                        <img src="<?php echo base_url();?>assets/dist/img/type2.png"/> 

                      </div>  

                    </div>                       

                  </div><!-- /.box-body -->

                  <button class="btn btn-info" id="submitbtn" style="display:none;">Submit</button>

                </form>  

                

                  <div class="box-body">

                    <div class="form-group">

                    <form id="form_slider_submit_images" name="form_slider_submit_images" enctype="multipart/form-data">

                      <label for="exampleInputEmail1">Images (maksimal 3Mb) bertype png, jpg</label>

                      <input type="file" id="form_slider_photo" name="form_slider_photo" required>

                      <div id="form_slider_preview"></div>

                      <input type="checkbox" name="sections_images_gif_checkbox" id="sections_images_gif_checkbox" onclick="setGif();" />Gif

                    </form>

                    </div>                    

                  </div>              

                

                  <div class="box-body">

                    <div class="form-group">

                      <form id="form_slider_submit_icon" name="form_slider_submit_icon" enctype="multipart/form-data">

                      <label for="exampleInputEmail1">Icon (maksimal 3Mb) bertype png, jpg</label>

                      <input type="file" id="form_slider_icon_upload" name="form_slider_icon_upload">

                      <div id="form_slider_icon_preview"></div>

                      </form>   

                    </div>                    

                  </div>

                  <div class="box-body">

                    <div class="form-group">

                      <button class="btn btn-info" onclick="submitform();">Submit</button>

                    </div>

                  </div>                                       

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

    <!-- CK Editor -->

    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>

    <!-- Bootstrap WYSIHTML5 -->

    <script src="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

    <!-- page script -->

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



        CKEDITOR.replace('form_slider_karakter');

        CKEDITOR.replace('form_slider_karakter_en');

        //bootstrap WYSIHTML5 - text editor

        $(".textarea").wysihtml5();

      });



      $('#form_slider_submit_images').on('submit',function(e){

        $('#form_slider_photo').hide();

        $('#form_slider_preview').html("<span>Loading...</span>");

        e.preventDefault();

        $.ajax({

          url: "<?php echo base_url()."Slider/uploadFile/"?>", // Url to which the request is send

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

              $('#form_slider_images').val(data.img_name);

              $('#form_slider_preview').html(data.html);

              

            }else{

              $('#form_slider_photo').show();

              alert(data.error);

            }

          }

        });

      });



      $("#form_slider_photo").on("change", function() {

        $("#form_slider_submit_images").submit();

      }); 



      function deletePreview(){

        $('#form_slider_photo').show();

        $('#form_slider_images').val("");

        $('#form_slider_preview').html("");

      }



      function submitform(){

        $('#submitbtn').click();

      }



      function setType(idtype){

        $('#form_slider_type').val(idtype);

      }



      $('#form_slider_submit_icon').on('submit',function(e){

        $('#form_slider_icon_upload').hide();

        $('#form_slider_icon_preview').html("<span>Loading...</span>");

        e.preventDefault();

        $.ajax({

          url: "<?php echo base_url()."Slider/uploadIcon/"?>", // Url to which the request is send

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

              $('#form_slider_icon').val(data.img_name);

              $('#form_slider_icon_preview').html(data.html);

              

            }else{

              $('#form_slider_icon_upload').show();

              alert(data.error);

            }

          }

        });

      });



      $("#form_slider_icon_upload").on("change", function() {

        $("#form_slider_submit_icon").submit();

      }); 



      function deletePreviewIcon(){

        $('#form_slider_icon_upload').show();

        $('#form_slider_icon').val("");

        $('#form_slider_icon_preview').html("");

      }



      function setGif(){

        if ( $('#sections_images_gif_checkbox').is(":checked")){

          $('#form_slider_gif').val("Y");

        }else{

          $('#form_slider_gif').val("T");

        }

      }





    </script>

  </body>

</html>

