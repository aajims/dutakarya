    
	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Form Data Customer</div>
					  	<form method="post" action="<?php echo site_url(); ?>Partner/tambah" enctype="multipart/form-data" id="form_error"  >
					  <div class="panel-body">
						<div class="col-md-6">
								
								<div class="form-group">
									<label >Nama Customer</label>
		                           <input type="text" required="" name="nama" placeholder="Input Nama Customer" class="form-control" >
								</div>
								<div class="form-group">
									<label>Alamat</label>
									<input type="text"  name="alamat" placeholder="Input Alamat" class="form-control">
								</div>
								<div class="form-group">
									<label>Nama Manager</label>
									<input type="text" maxlength="25" name="manager" placeholder="Input Nama Lengkap" class="form-control" required="" >
								</div>
								<div class="form-group">
									<label>No Telp</label>
									<input type="text" maxlength="12" name="telp" placeholder="Input dengan angka" class="form-control" required="" >
								</div>								
								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" placeholder="Input Email Valid" class="form-control" required="" > 
								</div>
								
								<button  class="btn btn-primary">Simpan Data</button>
								<a href="<?php echo site_url('Partner');?>" class="btn btn-danger">Kembali</a>
							</div>						
						</div>
					</form>	
					</div>
				  </div>
				</div>
				
	 <script type="text/javascript">
	  $(function () {
   	//Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: "yyyy-mm-dd",
        todayHighlight: true,
    });
    
    $('#tgl_masuk').datepicker({
      autoclose: true,
      format: "yyyy-mm-dd",
        todayHighlight: true,
    });
    
    $('#tgl_awal').datepicker({
      autoclose: true,
      format: "yyyy-mm-dd",
        todayHighlight: true,
    });
    
    $('#tgl_akhir').datepicker({
      autoclose: true,
      format: "yyyy-mm-dd",
        todayHighlight: true,
    });
    
    
   });
   </script>	 		  	
	