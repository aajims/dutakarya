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
                  <h3>Page : <strong><?php echo $page[0]->page;?></strong></h3>
                   <form role="form" action="<?php echo base_url().'Section/SaveSections';?>" method="post">
                      <input type="hidden" name="section_bg_images" id="section_bg_images"/>
                      <input type="hidden" name="section_images" id="section_images"/>
                      <input type="hidden" name="section_slider_icon" id="section_slider_icon" />
                      <input type="hidden" name="section_id_page" id="section_id_page" value="<?php echo $page[0]->id;?>"/>
                      <input type="hidden" name="section_gif_value" id="section_gif_value"/>
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Title (maks 32 karakter)</label>
                          <input type="text" class="form-control" id="sections_title" name="sections_title" maxlength="64" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Title (maks 32 karakter) English Version</label>
                          <input type="text" class="form-control" id="sections_title_en" name="sections_title_en" maxlength="64" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Background Type</label>
                          <select class="form-control" onchange="setBg()" id="sections_background_type" name="sections_background_type" >
                            <option value="C">Color</option>
                            <option value="I">Image</option>
                          </select>
                        </div>
                        <div class="form-group" id="bg_color">
                          <label for="exampleInputPassword1">Color</label>
                          <input class="form-control jscolor" id="sections_background_color" name="sections_background_color" required />
                        </div>                        
                        <div class="form-group">
                          <label for="exampleInputPassword1">Class Attribute</label>
                          <input type="text" class="form-control" id="form_slider_class" name="form_slider_class" required>
                        </div> 
                        <div class="form-group">
                          <label for="exampleInputEmail1">Description (maks 64 karakter)</label>
                          <textarea id="editor1" name="sections_description" rows="10" cols="80"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Description (maks 64 karakter) English Version</label>
                          <textarea id="editor2" name="sections_description_en" rows="10" cols="80"></textarea>
                        </div>  
                        <button type="submit" class="btn btn-primary" id="btnsubmit" style="display:none;">Submit</button>       
                    </form> 
                    <form id="section_form_background_images" name="section_form_background_images" enctype="multipart/form-data">              
                        <div class="form-group" id="bg_img" style="display:none;">
                          <label for="exampleInputPassword1">Background Images (maks 1Mb)</label>
                          <input type="file" id="section_upload_background_images" name="section_upload_background_images">
                          <div id="section_background_images_preview"></div>
                        </div>
                    </form><br><br>
                    <form id="section_form_upload_images" name="section_form_upload_images" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Images (maks 1Mb)</label>
                          <input type="file" id="section_upload_images" name="section_upload_images">
                          <div id="section_images_preview" name="sections_images_preview"></div>
                          <input type="checkbox" name="sections_images_gif_checkbox" id="sections_images_gif_checkbox" onclick="setGif();" />Gif
                        </div>
                      </div><!-- /.box-body -->
                    </form>
                    <form id="form_slider_submit_icon" name="form_slider_submit_icon" enctype="multipart/form-data">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Icon (maksimal 3Mb) bertype png, jpg</label>
                          <input type="file" id="form_slider_icon_upload" name="form_slider_icon_upload" required>
                          <div id="form_slider_icon_preview"></div>
                        </div>                    
                      </div>
                    </form>
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

      function setBg(){
        if ( $('#sections_background_type').val() == "C" ){
          $('#bg_color').show();
          $('#bg_img').hide();
        }else{
          $('#bg_color').hide();
          $('#bg_img').show();
        }
      }


      $('#section_form_upload_images').on('submit',function(e){
        $('#section_upload_images').hide();
        $('#section_images_preview').html("<span>Loading...</span>");
        e.preventDefault();
        $.ajax({
          url: "<?php echo base_url()."Section/UploadImages/"?>", // Url to which the request is send
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
              $('#section_images').val(data.img_name);
              $('#section_images_preview').html(data.html);
              
            }else{
              $('#section_upload_background_images').show();
              alert(data.error);
            }
          }
        });
      });

      $("#section_upload_images").on("change", function() {
        $("#section_form_upload_images").submit();
      }); 

      function deleteImages(){
        $('#section_upload_images').show();
        $('#section_images').val("");
        $('#section_images_preview').html("");
      }

      $('#section_form_background_images').on('submit',function(e){
        $('#section_upload_background_images').hide();
        $('#section_background_images_preview').html("<span>Loading...</span>");
        e.preventDefault();
        $.ajax({
          url: "<?php echo base_url()."Section/UploadBackground/"?>", // Url to which the request is send
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
              $('#section_bg_images').val(data.img_name);
              $('#section_background_images_preview').html(data.html);
              
            }else{
              $('#section_upload_background_images').show();
              alert(data.error);
            }
          }
        });
      });

      $("#section_upload_background_images").on("change", function() {
        $("#section_form_background_images").submit();
      }); 

      function deleteBgImages(){
        $('#section_upload_background_images').show();
        $('#section_bg_images').val("");
        $('#section_background_images_preview').html("");
      }

      function submitform(){
        $('#btnsubmit').click();
      }

       $('#form_slider_submit_icon').on('submit',function(e){
        $('#form_slider_icon_upload').hide();
        $('#form_slider_icon_preview').html("<span>Loading...</span>");
        e.preventDefault();
        $.ajax({
          url: "<?php echo base_url()."Section/UploadIcon/"?>", // Url to which the request is send
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
              $('#section_slider_icon').val(data.img_name);
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
        $('#section_slider_icon').val("");
        $('#form_slider_icon_preview').html("");
      }
      
      function setGif(){
        if ( $('#sections_images_gif_checkbox').is(":checked")){
          $('#section_gif_value').val("Y");
        }else{
          $('#section_gif_value').val("T");
        }
      }

    </script>
  </body>
</html>
