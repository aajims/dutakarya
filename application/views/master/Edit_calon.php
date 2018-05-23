    
	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Edit Data Karyawan</div>
					  	<form method="post" action="<?php echo site_url(); ?>calon/update" enctype="multipart/form-data" id="form_error"  >
					  <div class="panel-body">
						<div class="col-md-6">
								
								<div class="form-group">
									<label>No KTP</label>
									<input type="hidden" name="id" value="<?php echo $kar->id_calon; ?>"/>
									<input name="ktp" class="form-control" value="<?php echo $kar->no_ktp; ?>" placeholder="Input No KTP" data-validation="required">
								</div>
								
								<div class="form-group">
									<label>Nama Karyawan</label>
									<input name="nama" class="form-control" placeholder="Input Nama Lengkap" value="<?php echo $kar->nm_karyawan; ?>" data-validation="length" data-validation-length="min4">
								</div>
								<div class="form-group">
									<label>Alamat</label>
									<textarea name="alamat" class="form-control" rows="3" data-validation="required"><?php echo $kar->alamat; ?></textarea>
								</div>
								<div class="form-group">
									<label>Kota</label>
									<input name="kota" class="form-control" placeholder="Input Nama Kota" value="<?php echo $kar->kota; ?>" data-validation="length" data-validation-length="min4">
								</div>
								<div class="form-group">
									<label>Provinsi</label>
									<input name="prov" class="form-control" placeholder="Input Nama Provinsi" value="<?php echo $kar->provinsi; ?>" data-validation="length" data-validation-length="min4">
								</div>								
								<div class="form-group">
									<label>No Telepon 1</label>
									<input type="number" name="telp" class="form-control" placeholder="Input Max 12 Digit" value="<?php echo $kar->no_telepon; ?>" data-validation="length" data-validation-length="max12">
								</div>
								<div class="form-group">
									<label>No Telepon 2</label>
									<input type="number" name="telp2" class="form-control" placeholder="Input Max 12 Digit" value="<?php echo $kar->no_telp; ?>" data-validation="length" data-validation-length="max12">
								</div>
									<div class="form-group">
									<label>Posisi</label>
									<select name="jabatan" class="form-control">
									    <option value="<?php echo $kar->jabatan; ?>"><?php echo $kar->jabatan; ?></option>
										<option value="">--- Pilih Posisi ---</option>
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
										<option value="<?php echo $kar->agama; ?>"><?php echo $kar->agama; ?></option>
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
										<?php if ($kar->kelamin == 'Laki-laki') {
											echo "<div class='segmented-control' style='width: 50%; color: #5FBAAC'>
											  <input type='radio' name='jk' value='Laki-laki' id='laki' checked=''>
											  <input type='radio' name='jk' value='Perempuan' id='perem'>
											  <label for='laki' data-value='laki-laki'>Laki-laki</label>
											  <label for='perem' data-value='Perempuan'>Perempuan</label>
										</div>";
										} else {
											echo "<div class='segmented-control' style='width: 50%; color: #5FBAAC'>
											  <input type='radio' name='jk' value='Laki-laki' id='laki' >
											  <input type='radio' name='jk' value='Perempuan' id='perem' checked=''>
											  <label for='laki' data-value='laki-laki'>Laki-laki</label>
											  <label for='perem' data-value='Perempuan'>Perempuan</label>
										</div>";
											}
										 ?>
								</div>
							    <div class="form-group">
									<label>Tempat Lahir</label>
									<input name="tempat" class="form-control" placeholder="Input Nama Kota" value="<?php echo $kar->tempat_lahir; ?>" data-validation="length" data-validation-length="min5">
								</div>
								<div class="form-group">
									<label>Tanggal Lahir</label>
									<div class="input-group date">
					                  <div class="input-group-addon">
					                    <i class="fa fa-calendar"></i>
					                  </div>
					                  <input name="tgl" id="tgl" type="text" value="<?php echo $kar->tgl_lahir; ?>" class="form-control pull-right" data-validation="required">
					                </div>
								</div>		
								<div class="form-group">
									<label>Status Kawin</label><br />
									<?php if ($kar->status_kawin == 'Kawin') {
										echo "<div class='segmented-control' style='width: 50%; color: #5FBAAC'>
										  <input type='radio' name='status' value='Kawin' id='kawin' checked=''>
										  <input type='radio' name='status' value='Tidak Kawin' id='tidak'>
										  <label for='kawin' data-value='Kawin'>Kawin</label>
										  <label for='tidak' data-value='Tidak Kawin'>Tidak Kawin</label>
										</div>";
										} else {
											echo "<div class='segmented-control' style='width: 50%; color: #5FBAAC'>
										  <input type='radio' name='status' value='Kawin' id='kawin' >
										  <input type='radio' name='status' value='Tidak Kawin' id='tidak' checked=''>
										  <label for='kawin' data-value='Kawin'>Kawin</label>
										  <label for='tidak' data-value='Tidak Kawin'>Tidak Kawin</label>
										</div>";
											}
										 ?>
								</div>
								<div class="form-group">
									<label>Tanggal Masuk</label>
									<input name="tgl_masuk" id="tgl_masuk" class="form-control datepicker" value="<?php echo $kar->tgl_masuk; ?>" data-validation="required">
								</div>
								<div class="form-group">
									<label>Pendidikan</label>
									<select name="didik" class="form-control" data-validation="required">
										<option value="<?php echo $kar->pendidikan; ?>"><?php echo $kar->pendidikan; ?></option>
										<option value="">--- Pilih Pendidikan ---</option>
										<option value="Strata 2">Strata 2</option>
										<option value="Strata 1">Strata 1</option>
										<option value="SMU">SMU Sederajat</option>
										<option value="SMP">SMP Sederajat</option>
									</select>
								</div>
								<div class="form-group">
									<label>Referensi dari</label>
									<input name="ref" class="form-control" placeholder="Input Nama orang yang kasih Referensi" value="<?php echo $kar->ref; ?>" data-validation="length" data-validation-length="min5">
								</div>
								
								<button  class="btn btn-primary">Update Data</button>
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