 <section class="content">
   	<div class="box box-default">
   		
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading">Form Data PPU</div>
					  	<form method="post" action="" method="post" >
						  <div class="panel-body">
							<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="form-group">
									<label>No PPU</label>
									<input name="no" id="no" readonly="" class="form-control" value="<?php echo $ppu->no_ppu; ?>" >
								</div>
								<div class="form-group">
									<label>Departemen</label><br />
									<input name="per" readonly="" class="form-control" value="<?php echo $ppu->dept; ?>" >
								</div>
								<div class="form-group">
									<label>Periode Pembayaran</label><br />
									<input name="per" readonly="" class="form-control" value="<?php echo $ppu->periode; ?>" >
								</div>
								<div class="form-group">
									<label>Rincian Pembayaran</label><br />
									<input name="rinc" readonly="" class="form-control" value="<?php echo $ppu->ket; ?>" >
								</div>
								<div class="form-group">
									<label>Keterangan</label><br />
									<input name="per" readonly="" class="form-control" value="<?php echo $ppu->keterangan; ?>" >
								</div>
							  </div>
							  <div class="col-md-6 col-sm-6 col-xs-6">	
								<div class="form-group">
									<label>Tanggal Pengajuan</label><br />
									<input name="per" readonly="" class="form-control" value="<?php echo tgl_indo($ppu->tgl_pengajuan); ?>" >
								</div>
								<div class="form-group">
									<label>Tanggal Persetujuan</label>
									<div class="input-group date">
					                  <div class="input-group-addon">
					                    <i class="fa fa-calendar"></i>
					                  </div>
					                  <input name="per" readonly="" class="form-control" value="<?php echo tgl_indo($ppu->tgl_setuju); ?>" >
					                </div>
								</div>
								<div class="form-group">
									<label>Status Pengajuan</label><br />
									<?php
										if ($ppu->status == 'Di ajukan') {
											echo "<div class='segmented-control' style='width: 90%; color: #000AAC'>
											  <input type='radio' name='status' value='Di ajukan' id='ajukan' checked=''>
											  <input type='radio' name='status' value='Pending' id='pending'>
											  <input type='radio' name='status' value='Approve' id='approve'>
											  <label for='ajukan' data-value='Di ajukan'>Di ajukan</label>
											  <label for='pending' data-value='Pending'>Pending</label>
											  <label for='approve' data-value='Approve'>Approve</label>
											</div>";	
										} else if($ppu->status == 'Pending'){
											echo "<div class='segmented-control' style='width: 90%; color: #000AAC'>
											  <input type='radio' name='status' value='Di ajukan' id='ajukan'>
											  <input type='radio' name='status' value='Pending' id='pending' checked=''>
											  <input type='radio' name='status' value='Approve' id='approve'>
											  <label for='ajukan' data-value='Di ajukan'>Di ajukan</label>
											  <label for='pending' data-value='Pending'>Pending</label>
											  <label for='approve' data-value='Approve'>Approve</label>
											</div>";
										} else {
											echo "<div class='segmented-control' style='width: 90%; color: #000AAC'>
											  <input type='radio' name='status' value='Di ajukan' id='ajukan'>
											  <input type='radio' name='status' value='Pending' id='pending'>
											  <input type='radio' name='status' value='Approve' id='approve' checked=''>
											  <label for='ajukan' data-value='Di ajukan'>Di ajukan</label>
											  <label for='pending' data-value='Pending'>Pending</label>
											  <label for='approve' data-value='Approve'>Approve</label>
											</div>";
										}
									 ?>
								</div>
								<div class="form-group">
									<label>Yang Mengajukan</label>
									<input name="nama" class="form-control" readonly="" value="<?php echo $ppu->nama_lengkap; ?>" >
								</div>
								
							</div>						
						 </div>
					 	</form>
					</div>
				  </div>
				</div>
				
					<div class="panel panel-success">
				    	<div class="panel-heading">
				        Rincian Permintaan Uang
				    	</div>
				    <div class="panel-body">
				        <div class="col-md-7 col-sm-7 col-xs-7">
				           <table class="table table-striped">
					        <thead>
					            <tr>
					                <td>No</td>
					                <td>Keterangan</td>
					                <td>Jumlah</td>
					                <td></td>
					            </tr>
					        </thead>
					         <?php $no=1; $total=0;  foreach($detail as $tmp){ ?>
					        <tr>
					            <td><?php echo $no; ?></td>
					            <td><?php echo $tmp->ket;?></td>
					            <td><?php echo number_format($tmp->jumlah);?></td>
					        </tr>
					        <?php $total += $tmp->jumlah;  $no++;}  ?>
					        <tr>
					        	<td colspan="2"><strong>Total</strong></td>
					        	<td><strong>Rp. <?php echo number_format($total, 0, ',', '.') ?>,-</strong></td>
					        </tr>
					    </table>                      
				        </div>
				    </div>
				    
				    <div class="panel-footer">
				        <button class="btn btn-danger" onclick="self.history.back()">Kembali</button>
				    </div>
				</div>
			  
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