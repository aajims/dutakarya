    
	<div class="row">
			<div class="col-lg-12 col-md-9 col-xs-12 col-sm-10">
				<div class="panel panel-default">
					<div class="panel-heading">Form Data WO(Work Order)</div>
					  	<form method="post" action="<?php echo site_url(); ?>wo/tambah" enctype="multipart/form-data" id="form_error"  >
					  <div class="panel-body">
						<div class="col-md-6">
								<div class="form-group">
									<label>Nama WO</label>
		                           <input type="text" name="nama" placeholder="Input Nama WO" class="form-control" data-validation="length" data-validation-length="min4">
								</div>
                            <div class="form-group">
                                <label>Keterangan WO</label>
                                <input type="text" name="ket" placeholder="Input Nama WO" class="form-control" data-validation="length" data-validation-length="min4">
                            </div>
								<div class="form-group">
									<label>Status WO</label>
									<select name="status" class="form-control" data-validation="required">
										<option value="">-- Pilih Status --</option>
										<option value="Proses">Proses</option>
										<option value="Selesai">Selesai</option>
									</select>
								</div>
								
								
								<button  class="btn btn-primary">Simpan Data</button>
								<button class="btn btn-danger" onclick="self.history.back()">Kembali</button>
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
	