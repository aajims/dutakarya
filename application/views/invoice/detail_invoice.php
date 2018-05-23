<section class="content">
	<div class="box box-default">
		<div class="row">
			<div class="col-lg-12">
				<form action="" method="get" accept-charset="utf-8" id="form-utama">
					<div class="panel panel-default">
						<div class="panel-heading">Form Data</div>
						<div class="panel-body">
							<div class="col-md-6">
								<div class="form-group">
									<label>Nama Customer</label>
									<select name="customer" id="customer" class="form-control">
										<option value="">-- Pilih --</option>
				                      <?php $jenis = $this->db->get('partner');
				                        foreach ($jenis->result()as $row){
				                      ?>
			                      <option class="form-control" value="<?php echo $row->id_partner ?>"<?php echo ($row->nm_partner == $inv->nm_partner) ? ' selected=""' : ''?> readonly=""><?php echo $row->nm_partner; ?></option>
			                      <?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label for="nama">Nama Karyawan</label>
									<input type="text" class="form-control form-control1" id="nama" name="nama" value="<?php echo $inv->nm_karyawan;?>" readonly="" />
									<input type="hidden" name="id_kar" id="id_kar"/>
								</div>
								<div class="form-group">
									<label for="gaji">Gaji Pokok</label>
									<input type="text" class="form-control" id="gaji" name="gaji" readonly="" placeholder="Pilih karyawan untuk menampilkan gaji"  value="Rp <?php echo number_format($inv->gaji);?>,-" readonly=""  />
								</div>
								<div class="form-group">
									<label for="periode">Periode</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="text" class="form-control" id="periode" name="periode"  value="<?php echo $inv->periode;?>" readonly=""  />
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="tunjdinas">Tunjangan Dinas</label>
									<input type="text" name="tunjdinas" id="tunjdinas" class="form-control"  value="Rp <?php echo number_format($inv->tunj_dinas);?>,-" readonly=""  />
								</div>
								<input type="hidden" name="harikerja" id="harikerja" value="">
								<div class="form-group">
									<label for="seragam">Biaya Seragam</label>
									<input type="text" name="seragam" class="form-control" id="seragam" placeholder="Input Biaya seragam"  value="Rp <?php echo number_format($inv->seragam);?>,-" readonly=""  />
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="panel panel-info" id="rincian-data">
						<div class="panel-heading">Rincian</div>
						<div class="panel-body">
							<div class="col-md-6">
								<div class="form-group">
									<label for="tunjhadir">Tunjangan Kehadiran</label>
									<input type="text" name="tunjhadir" id="tunjhadir" class="form-control"  value="Rp <?php echo number_format($inv->tunj_hadir);?>,-" readonly=""  />
								</div>
								<div class="form-group">
									<label for="lembur">Lembur</label>
									<input type="text" name="lembur" id="lembur" class="form-control"  value="Rp <?php echo number_format($inv->lembur);?>,-" readonly=""  />
								</div>
								<!-- <div class="form-group"> -->
									<!-- <label for="harilebih">Kelebihan Hari</label> -->
									<!-- <input type="text" name="harilebih" id="harilebih" class="form-control" /> -->
								<!-- </div> -->
								<div class="form-group">
									<label for="subtotal1">Sub Total 1</label>
									<input type="text" name="subtotal1" id="subtotal1" class="form-control"  value="Rp <?php echo number_format($inv->sub_total);?>,-" readonly=""  />
								</div>
								<div class="form-group">
									<label for="bpjs-tk">BPJS Ketenagakerjaan</label>
									<input type="text" name="bpjs-tk" id="bpjs-tk" class="form-control"  value="Rp <?php echo number_format($inv->bpjs_tk);?>,-" readonly=""  />
								</div>
								<div class="form-group">
									<label for="bpjs-kes">BPJS Kesehatan</label>
									<input type="text" name="bpjs-kes" id="bpjs-kes" class="form-control" value="Rp <?php echo number_format($inv->bpjs_kes);?>,-" readonly=""/>
								</div>
								<div class="form-group">
									<label for="thr">THR</label>
									<input type="text" name="thr" id="thr" class="form-control"  value="Rp <?php echo number_format($inv->thr);?>" readonly=""  />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="tunjtaliasih">Tunjangan Tali Asih</label>
									<input type="text" name="tunjtaliasih" id="tunjtaliasih" class="form-control"  value="Rp <?php echo number_format($inv->tunj_tali);?>,-" readonly=""  />
								</div>
								<div class="form-group">
									<label for="subtotal2">Sub Total 2</label>
									<input type="text" name="subtotal2" id="subtotal2" class="form-control"  value="Rp <?php echo number_format($inv->sub_total2);?>,-" readonly=""  />
								</div>
								<div class="form-group">
									<label for="fee">FEE</label>
									<input type="text" name="fee" id="fee" class="form-control"  value="Rp <?php echo number_format($inv->fee);?>,-" readonly=""  />
								</div>
								<div class="form-group">
									<label for="subtotal3">Sub Total 3</label>
									<input type="text" name="subtotal3" id="subtotal3" class="form-control"  value="Rp <?php echo number_format($inv->sub_total3);?>,-" readonly=""  />
								</div>
								<div class="form-group">
									<label for="ppn">PPN</label>
									<input type="text" name="ppn" id="ppn" class="form-control"  value="Rp <?php echo number_format($inv->ppn);?>,-" readonly=""  />
								</div>
								<div class="form-group">
									<label for="total">Total</label>
									<input type="text" name="total" id="total" class="form-control"  value="Rp <?php echo number_format($inv->total);?>,-" readonly=""  />
								</div>
								<div class="form-group">
									<br>
									<a href="<?php echo site_url('invoice');?>" class="btn btn-danger">Kembali</a>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	$('#periode').datepicker({
		autoclose: true,
		format: "yyyy-mm",
		todayHighlight: true,
	});
</script>
