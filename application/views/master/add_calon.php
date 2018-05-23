    
	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Form Data Karyawan</div>
					  	<form method="post" action="<?php echo site_url(); ?>calon/add" enctype="multipart/form-data" id="form_error"  >
					  <div class="panel-body">
						<div class="col-md-6">
								<div class="form-group">
									<label>No KTP</label>
									<input name="ktp" class="form-control" placeholder="Input No KTP" data-validation="required">
								</div>
								<div class="form-group">
									<label>Nama Karyawan</label>
									<input name="nama" class="form-control" placeholder="Input Nama Lengkap" data-validation="length" data-validation-length="min4">
								</div>
								<div class="form-group">
									<label>Alamat</label>
									<textarea name="alamat" class="form-control"  rows="3" data-validation="required"></textarea>
								</div>
								<div class="form-group">
									<label>Kota</label>
									<input name="kota" class="form-control" placeholder="Input Nama Kota" data-validation="length" data-validation-length="min4">
								</div>
								<div class="form-group">
									<label>Provinsi</label>
									<input name="prov" class="form-control" placeholder="Input Nama Provinsi" data-validation="length" data-validation-length="min4">
								</div>								
								<div class="form-group">
									<label>No Telepon 1</label>
									<input type="number" name="telp" class="form-control" placeholder="Input Max 12 Digit" data-validation="length" data-validation-length="max12">
								</div>
								<div class="form-group">
									<label>No Telepon 2</label>
									<input type="number" name="telp2" class="form-control" placeholder="Input Max 12 Digit" data-validation="length" data-validation-length="max12">
								</div>
								<div class="form-group">
									<label>Jabatan</label>
									<select name="jabatan" class="form-control">
										<option value="">--- Pilih Jabatan ---</option>
										<option value="Direksi">Direksi</option>
										<option value="Staff">Staff</option>
										<option value="Driver">Driver</option>
										<option value="Cleaning Service">Cleaning Service</option>
										<option value="Ofice Boy">Office Boy</option>
										<option value="Office Girl">Office Girl</option>
										<option value="Gardener">Gardener</option>
										<option value="Atm Monitoring">Atm Monitoring</option>
										<option value="Receptionist">Receptionist</option>
									</select>
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
									<label>Agama</label>
									<select name="agama" class="form-control" data-validation="required">
										<option value="">--- Pilih Agama ---</option>
										<option value="Islam">Islam</option>
										<option value="Protestan">Protestan</option>
										<option value="Katolik">Katolik</option>
										<option value="Hindu">Hindu</option>
										<option value="Budha">Budha</option>
									</select>
								</div>
								<div class="form-group">
									<label>Jenis Kelamin</label><br />
									<div class="segmented-control" style="width: 50%; color: #5FBAAC">
									  <input type="radio" name="jk" value="Laki-laki" id="sc-1-1-1" checked="">
									  <input type="radio" name="jk" value="Perempuan" id="sc-1-1-2">
									  <label for="sc-1-1-1" data-value="Laki-laki">Laki-laki</label>
									  <label for="sc-1-1-2" data-value="Perempuan">Perempuan</label>
									</div>
								</div>
								<div class="form-group">
									<label>Tempat Lahir</label>
									<input name="tempat" class="form-control" placeholder="Input Nama Kota" data-validation="length" data-validation-length="min4">
								</div>
								<div class="form-group">
									<label>Tanggal Lahir</label>
									<div class="input-group date">
					                  <div class="input-group-addon">
					                    <i class="fa fa-calendar"></i>
					                  </div>
					                  <input name="tgl" type="text" class="form-control pull-right" id="datepicker">
					                </div>
								</div>
								<div class="form-group">
									<label>Status Kawin</label><br />
									<div class="segmented-control" style="width: 50%; color: #5FBAAC">
									  <input type="radio" name="status" value="Kawin" id="kawin" checked="">
									  <input type="radio" name="status" value="Tidak Kawin" id="tidak">
									  <label for="kawin" data-value="Kawin">Kawin</label>
									  <label for="tidak" data-value="Tidak Kawin">Tidak Kawin</label>
									</div>
								</div>
								<div class="form-group">
									<label>Tanggal Masuk</label>
									<div class="input-group date">
					                  <div class="input-group-addon">
					                    <i class="fa fa-calendar"></i>
					                  </div>
					                  <input name="tgl_masuk" type="text" class="form-control pull-right" id="tgl_masuk" data-validation="required">
					                </div>
									
								</div>
								<div class="form-group">
									<label>Pendidikan</label>
									<select name="didik" class="form-control" data-validation="required">
										<option value="">--- Pilih Pendidikan ---</option>
										<option value="Strata 2">Strata 2</option>
										<option value="Strata 1">Strata 1</option>
										<option value="SMU">SMU Sederajat</option>
										<option value="SMP">SMP Sederajat</option>
									</select>
								</div>
								
								<div class="form-group">
									<label>Referensi dari</label>
									<input name="ref" class="form-control" placeholder="Input Nama orang yang kasih Referensi" data-validation="length" data-validation-length="min5">
								</div>
								
								<button  class="btn btn-primary">Simpan Data</button>
								<button type="reset" class="btn btn-default">Reset Data</button>
								<a href="<?php echo site_url('Karyawan');?>" class="btn btn-danger">Kembali</a>
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
	