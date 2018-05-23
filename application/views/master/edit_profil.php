 <section class="content">
   	<div class="box box-default">
   	  <form method="post" action="<?php echo site_url(); ?>profil/update" method="post" enctype="multipart/form-data" >	
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Edit Profil</div>
					  	
						  <div class="panel-body">
							<div class="col-md-6">
								<div class="form-group">
									<label>Username</label>
									<input type="hidden" name="kode" value="<?php echo $row->id_admin; ?>" />
									<input type="text" name="user" readonly="" class="form-control" value="<?php echo $row->username; ?>" >
								</div>
								<div class="form-group">
									<label>Password</label><br />
									<input type="password" name="pass" class="form-control" placeholder="Kosongkan Jika tidak di Rubah">
								</div>
								<div class="form-group">
									<label>Nama Lengkap</label><br />
									<input type="text" name="nama" class="form-control" value="<?php echo $row->nama_lengkap; ?>" >
								</div>
							  </div>
							 <div class="col-md-6">	
								<div class="form-group">
									<label>No Telepon</label><br />
									<input type="number" name="telp" class="form-control" value="<?php echo $row->no_telp; ?>" >
								</div>						
								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" class="form-control" value="<?php echo $row->email; ?>" >
								</div>
								<div class="form-group">
									<label>Foto</label>
									<div><img src="<?php echo site_url();?>Admin/images/staff/<?php echo $row->foto; ?>" alt="Foto Profil" class="img-responsive img-thumbnail" style="width: 200px !important;height:200px !important;"></div>
									<input type="hidden" name="filelama" value="<?php echo $row->foto;?>">
								</div>
								<div class="form-group">
									<label>Upload Foto</label>
									<input type="file" name="gambar" class="form-control"  >
								</div>
								<input type="hidden" name="id_admin" value="<?php echo $row->id_admin;?>">
							</div>						
						 </div>
						</div>
					  </div>
					</div>
				    <div class="panel-footer">
				        <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Update Data</button>
				        <button class="btn btn-danger" onclick="self.history.back()">Kembali</button>
				    </div>
				
			  </form>
			 </div>
		  </section>
		  
	<script type="text/javascript">
	  $(function () {
   	//Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: "yyyy-mm-dd",
        todayHighlight: true,
    });
    
    
   });
   </script>
