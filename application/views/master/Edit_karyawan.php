    
	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Form Data Karyawan</div>
					  	<form method="post" action="<?php echo site_url(); ?>karyawan/update" enctype="multipart/form-data" id="form_error"  >
					  <div class="panel-body">
						<div class="col-md-6">
								<div class="form-group">
									<label>Kode Karyawan</label>
									<input type="hidden" name="id" value="<?php echo $kar->id_karyawan; ?>"/>
									<input name="kode" readonly="" class="form-control"  value="<?php $kar->kd_karyawan?>" placeholder="Kode">
								</div>
								<div class="form-group">
									<label>NIK Karyawan</label>
									<input name="nik" class="form-control" value="<?php echo $kar->nik; ?>" placeholder="Input NIK Karyawan">
								</div>
								
								<div class="form-group">
									<label>No PKWT</label>
									<input name="pkwt" class="form-control" value="<?php echo $kar->no_pkwt; ?>" placeholder="Input No PKWT" data-validation="required">
								</div>
								<div class="form-group">
									<label>No MOU</label>
									<input name="mou" class="form-control" value="<?php echo $kar->no_mou; ?>" placeholder="Input No MOU" data-validation="required">
								</div>
								<div class="form-group">
									<label>No KTP</label>
									<input name="ktp" class="form-control" value="<?php echo $kar->no_ktp; ?>" placeholder="Input No KTP" data-validation="required">
								</div>
								<div class="form-group">
									<label>No NPWP</label>
									<input name="npwp" class="form-control" value="<?php echo $kar->no_npwp; ?>" placeholder="Input No NPWP" data-validation="required">
								</div>
								<div class="form-group">
									<label>No KPJ</label>
									<input name="kpj" class="form-control" value="<?php echo $kar->no_kpj; ?>" placeholder="Input No KPJ" data-validation="required">
								</div>
								<div class="form-group">
									<label>No BPJS</label>
									<input name="bpjs" class="form-control" value="<?php echo $kar->no_bpjs; ?>" placeholder="Input No BPJS" data-validation="required">
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
									<label>Jabatan</label>
									<select name="jabatan" class="form-control">
									    <option value="<?php echo $kar->jabatan; ?>"><?php echo $kar->jabatan; ?></option>
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
							        <label class="col-lg-2 control-label">Foto</label>
							        <div class="col-lg-5">
							        	<img src="<?php echo base_url('./Admin/images/karyawan/'.$kar->foto_karyawan);?>" height="100px" width="120px">            
							        </div>
							    </div>
							</div>
							<div class="col-md-6">
							    
							    	<div class="form-group">
									<label>Nama Bank</label>
									<select name="bank" class="form-control" data-validation="required">
									  <option value="<?php echo $kar->id_bank; ?>"><?php echo $kar->nm_bank; ?></option>  
										<option value="">-- Pilih --</option>
				                      <?php $jenis = $this->db->get('bank');
				                        foreach ($jenis->result()as $row){
				                      ?>
			                      <option class="form-control" value="<?php echo $row->id_bank ?>"><?php echo $row->nm_bank; ?></option>
			                      <?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label>No Rekening</label>
									<input name="rek" class="form-control" placeholder="Input No Rekening" value="<?php echo $kar->no_rek; ?>" data-validation="length" data-validation-length="min5">
								</div>
								<div class="form-group">
									<label>Size Baju</label>
									<select name="baju" class="form-control" data-validation="required">>
										<option value="<?php echo $kar->size_baju; ?>"><?php echo $kar->size_baju; ?></option>
										<option value="">--- Pilih Size ---</option>
										<option value="XL">Xtra Large</option>
										<option value="L">Large</option>
										<option value="M">Medium</option>
									</select>
								</div>
								<div class="form-group">
									<label>Size Celana</label>
									<select name="celana" class="form-control" data-validation="required">>
										<option value="<?php echo $kar->size_celana; ?>"><?php echo $kar->size_celana; ?></option>
										<option value="">--- Pilih Size ---</option>
										<option value="30">Size 30</option>
										<option value="31">Size 31</option>
										<option value="32">Size 32</option>
										<option value="33">Size 33</option>
										<option value="34">Size 34</option>
										<option value="35">Size 35</option>
									</select>
								</div>
								<div class="form-group">
									<label>Size Sepatu</label>
									<select name="sepatu" class="form-control" data-validation="required">>
										<option value="<?php echo $kar->size_sepatu; ?>"><?php echo $kar->size_sepatu; ?></option>
										<option value="">--- Pilih Size ---</option>
										<option value="36">Size 36</option>
										<option value="37">Size 37</option>
										<option value="38">Size 38</option>
										<option value="39">Size 39</option>
										<option value="40">Size 40</option>
										<option value="41">Size 41</option>
										<option value="42">Size 42</option>
										<option value="43">Size 43</option>
									</select>
								</div>
								<div class="form-group">
									<label>Penempatan Lokasi</label>
									<input name="lokasi" class="form-control" value="<?php echo $kar->penempatan; ?>" placeholder="Input Penempatan Lokasi" data-validation="length" data-validation-length="min5">
								</div>
								<input type="hidden" name="filelama" value="<?php echo $kar->foto_karyawan; ?>" />
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
									<label>Status Karyawan</label>
									<select name="sts" class="form-control" data-validation="required">
										<option value="<?php echo $kar->status_karyawan; ?>"><?php echo $kar->status_karyawan; ?></option>
										<option value="">--- Pilih Status ---</option>
										<option value="Kontrak">Kontrak</option>
										<option value="Tetap">Tetap</option>
										<option value="Harian">Harian</option>
									</select>
								</div>
								<div class="form-group">
									<label>Partner Perusahaan</label>
									<select name="partner" class="form-control" data-validation="required">
										<option value="<?php echo $kar->id_partner; ?>"><?php echo $kar->nm_partner; ?></option>
										<option value="">-- Pilih --</option>
				                      <?php $jenis = $this->db->get('partner');
				                        foreach ($jenis->result()as $row){
				                      ?>
			                      <option class="form-control" value="<?php echo $row->id_partner ?>"><?php echo $row->nm_partner; ?></option>
			                      <?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label>Nama Manager</label>
									<input name="manager" class="form-control" placeholder="Input Nama Manager" value="<?php echo $kar->manager; ?>" data-validation="length" data-validation-length="min5">
								</div>
								<div class="form-group">
									<label>Tanggal Awal Kontrak</label>
									<input name="tgl_awal" id="tgl_awal" class="form-control datepicker" value="<?php echo $kar->awal_kontrak; ?>" data-validation="required">
								</div>
								<div class="form-group">
									<label>Tanggal Akhir Kontrak</label>
									<input name="tgl_akhir" id="tgl_akhir" class="form-control datepicker" value="<?php echo $kar->akhir_kontrak; ?>" data-validation="required">
								</div>
								<div class="form-group">
									<label>Kontrak Ke</label>
									<select name="kontrak" class="form-control" data-validation="required">
										<option value="<?php echo $kar->kontrak_ke; ?>"><?php echo $kar->kontrak_ke; ?></option>
										<option value="">--- Pilih ---</option>
										<option value="satu">Satu</option>
										<option value="dua">Dua</option>
										<option value="Tiga">Tiga</option>
										<option value="Empat">Empat</option>
									</select>
								</div>
								<div class="form-group">
									<label>Penyebab Berhenti</label>
									<input name="stop" class="form-control" value="<?php echo $kar->sebab_henti; ?>" placeholder="Input Penyebab Berhenti Kerja" data-validation="required" >
								</div>
								<div class="form-group">
									<label>Referensi dari</label>
									<input name="ref" class="form-control" placeholder="Input Nama orang yang kasih Referensi" value="<?php echo $kar->ref; ?>" data-validation="length" data-validation-length="min5">
								</div>
								<div class="form-group">
									<label>Upload Foto</label>
									<input name="gambar" type="file">
									 <p >*) Size Foto Max. 1 Mb &nbsp; Recomended (300 x 200)pixel</p>
								</div>
								<div class="form-group">
									<label>Status Aktif</label><br />
									<?php if ($kar->sts_aktif == 'Aktif') {
										echo "<div class='segmented-control' style='width: 50%; color: #0000FF'>
										  <input type='radio' name='sts_aktif' value='Aktif'id='aktif' checked=''>
										  <input type='radio' name='sts_aktif' value='Tidak Aktif' id='tidak'>
										  <label for='aktif' data-value='Aktif'>Aktif</label>
										  <label for='tidak' data-value='Tidak Aktif'>Tidak Aktif</label>
										</div>";
										} else {
										echo "<div class='segmented-control' style='width: 50%; color: #0000FF'>
										  <input type='radio' name='sts_aktif' value='Aktif' id='aktif' >
										  <input type='radio' name='sts_aktif' value='Tidak Aktif' id='tidak' checked=''>
										  <label for='aktif' data-value='Aktif'>Aktif</label>
										  <label for='tidak' data-value='Tidak Aktif'>Tidak Aktif</label>
										</div>";
											}
										 ?>
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
