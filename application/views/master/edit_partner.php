    
	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Edit Data Customer</div>
					  	<form method="post" action="<?php echo site_url(); ?>Partner/update" enctype="multipart/form-data" id="form_error"  >
					  <div class="panel-body">
						<div class="col-md-6">
								
								<div class="form-group">
									<label>Nama Customer</label>
									<input type="hidden" name="id" value="<?php echo $kar->id_partner; ?>"/>
									<input name="nama" class="form-control" placeholder="Input Nama Customer" value="<?php echo $kar->nm_partner; ?>" data-validation="length" data-validation-length="min4">
								</div>
								<div class="form-group">
									<label>Alamat</label>
									<textarea name="alamat" class="form-control" rows="3" data-validation="required"><?php echo $kar->alamat; ?></textarea>
								</div>			
								<div class="form-group">
									<label>No Telepon</label>
									<input type="number" name="telp" class="form-control" placeholder="Input Max 12 Digit" value="<?php echo $kar->no_telp; ?>" data-validation="length" data-validation-length="max12">
								</div>
								
								<div class="form-group">
									<label>Email</label>
									<input name="ref" class="form-control" placeholder="Input Email" value="<?php echo $kar->email; ?>" data-validation="length" data-validation-length="min5">
								</div>
								
								<button  class="btn btn-primary">Update Data</button>
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
    $('#tgl').datepicker({
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