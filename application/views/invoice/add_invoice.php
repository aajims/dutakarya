<script type="text/javascript">
	var site = "<?php echo site_url();?>";
	$(function(){
		$('.form-control1').autocomplete({
			// serviceUrl berisi URL ke controller/fungsi yang menangani request kita
			serviceUrl: site+'/invoice/search/',
			// fungsi ini akan dijalankan ketika user memilih salah satu hasil request
			onSelect: function (suggestion) {
				$('#gaji').val(suggestion.gaji_pokok);
				$('#harikerja').val(suggestion.hari_kerja);
				$('#id_kar').val(suggestion.id_karyawan);
				$('#lembur').val(suggestion.lembur);
			}
		});
	});
</script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('#update-data').click(function(event) {
			/* Act on the event */
			var customer = $('#customer');
			var nama = $('#nama');
			var gaji = $('#gaji');
			var tunjdinas = $('#tunjdinas');
			var harikerja = $('#harikerja');
			var seragam = $('#seragam');
			var tunjhadir = $('#tunjhadir');
			var lembur = $('#lembur');
			var subtotal1 = $('#subtotal1');
			var harilebih = $('#harikerja');
			var bpjs_tk = $('#bpjs-tk');
			var bpjs_kes = $('#bpjs-kes');
			var thr = $('#thr');
			var tunjtaliasih = $('#tunjtaliasih');
			var subtotal2 = $('#subtotal2');
			var fee = $('#fee');
			var subtotal3 = $('#subtotal3');
			var ppn = $('#ppn');
			var total = $('#total');
			
			if (customer.val() == "") {
				alert('Harap Pilih Partner !');
				customer.focus();
				return false;
			}
			if (nama.val() == "") {
				alert('Nama harus diisi !');
				nama.focus();
				return false;
			}
			if (gaji.val() == "") {
				alert('Gaji harus diisi !');
				gaji.focus();
				return false;
			}
			if (harikerja.val() == "") {
				alert('Masukkan hari kerja !');
				harikerja.focus();
				return false;
			}
			// Hitung tunjangan kehadiran
			// alert(harikerja.val());
			tunjhadir.val(
				(isNaN(hk = parseInt(harikerja.val())) ? 0 : hk) 
				* 
				10000);
			
			// Hitung Sub Total
			subtotal1.val(parseInt(
				(isNaN(gj=parseInt(gaji.val())) ? 0 : gj)
				+ 
				(isNaN(th=parseInt(tunjhadir.val())) ? 0 : th)
				+ 
				(isNaN(td=parseInt(tunjdinas.val())) ? 0 : td)
				));
			
			// Hitung BPJS TK
			bpjs_tk.val(parseInt((isNaN(gj=parseInt(gaji.val())) ? 0 : gj) * 4.24 / 100));
			
			// Hitung BPJS Kes
			bpjs_kes.val(parseInt((isNaN(gj=parseInt(gaji.val())) ? 0 : gj) * 4 / 100));
			
			// Hitung THR
			thr.val(parseInt((isNaN(gj=parseInt(gaji.val())) ? 0 : gj) / 12));
			
			// Hitung Tunjangan Tali Asih
			tunjtaliasih.val(parseInt((isNaN(gj=parseInt(gaji.val())) ? 0 : gj)/24));
			
			// Hitung Total 2
			subtotal2.val(parseInt(
				(isNaN(st1=parseInt(subtotal1.val())) ? 0 : st1)
				+
				(isNaN(bk=parseInt(bpjs_kes.val())) ? 0 : bk)
				+
				(isNaN(bt=parseInt(bpjs_tk.val())) ? 0 : bt)
				+
				(isNaN(tr=parseInt(thr.val())) ? 0 : tr)
				+
				(isNaN(tta=parseInt(tunjtaliasih.val())) ? 0 :tta)
				+
				(isNaN(srm=parseInt(seragam.val())) ? 0 : srm)
			));
			
			// Hitung FEE
			fee.val(parseInt(parseInt(subtotal2.val()) * 9 / 100));
			
			// Hitung SubsTotal3
			subtotal3.val(parseInt(
				(isNaN(st2=parseInt(subtotal2.val())) ? 0 :st2)
				+
				(isNaN(fe=parseInt(fee.val())) ? 0 :fe)
				));
			
			// Hitung PPN
			ppn.val(parseInt(parseInt(subtotal3.val()) * 10 / 100));
			
			// Hitung Total
			total.val(parseInt(parseInt(subtotal3.val()) + parseInt(ppn.val())));
			
			$("#rincian-data").show();
		});
		$('#save2db').click(function(event) {
			/* Act on the event */
			$.ajax({
				url: '<?php echo site_url();?>/invoice/save',
				type: 'POST',
				dataType: 'json',
				data: $('#form-utama').serialize(),
				success: function(res) {
					window.location.assign('<?php echo site_url();?>invoice');
				}
			});
			
		});
	});
</script>
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
			                      <option class="form-control" value="<?php echo $row->id_partner ?>"><?php echo $row->nm_partner; ?></option>
			                      <?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label for="nama">Nama Karyawan</label>
									<input type="text" class="form-control form-control1" id="nama" name="nama" value="" />
									<input type="hidden" name="id_kar" id="id_kar"/>
								</div>
								<div class="form-group">
									<label for="gaji">Gaji Pokok</label>
									<input type="text" class="form-control" id="gaji" name="gaji" readonly="" placeholder="Pilih karyawan untuk menampilkan gaji" />
								</div>
								<div class="form-group">
									<label for="periode">Periode</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="text" class="form-control" id="periode" name="periode" />
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="tunjdinas">Tunjangan Dinas</label>
									<input type="number" name="tunjdinas" id="tunjdinas" class="form-control" />
								</div>
								<input type="hidden" name="harikerja" id="harikerja" value="">
								<div class="form-group">
									<label for="seragam">Biaya Seragam</label>
									<input type="number" name="seragam" class="form-control" id="seragam" placeholder="Input Biaya seragam" />
								</div>
								<div class="form-group">
									<br/>
									<button type="button" class="btn btn-info" id="update-data">Tampilkan</button>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="panel panel-info" id="rincian-data" hidden="">
						<div class="panel-heading">Rincian</div>
						<div class="panel-body">
							<div class="col-md-6">
								<div class="form-group">
									<label for="tunjhadir">Tunjangan Kehadiran</label>
									<input type="text" name="tunjhadir" id="tunjhadir" class="form-control" />
								</div>
								<div class="form-group">
									<label for="lembur">Lembur</label>
									<input type="text" name="lembur" id="lembur" class="form-control" />
								</div>
								<!-- <div class="form-group"> -->
									<!-- <label for="harilebih">Kelebihan Hari</label> -->
									<!-- <input type="text" name="harilebih" id="harilebih" class="form-control" /> -->
								<!-- </div> -->
								<div class="form-group">
									<label for="subtotal1">Sub Total 1</label>
									<input type="text" name="subtotal1" id="subtotal1" class="form-control" />
								</div>
								<div class="form-group">
									<label for="bpjs-tk">BPJS Ketenagakerjaan</label>
									<input type="text" name="bpjs-tk" id="bpjs-tk" class="form-control" />
								</div>
								<div class="form-group">
									<label for="bpjs-kes">BPJS Kesehatan</label>
									<input type="text" name="bpjs-kes" id="bpjs-kes" class="form-control" />
								</div>
								<div class="form-group">
									<label for="thr">THR</label>
									<input type="text" name="thr" id="thr" class="form-control" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="tunjtaliasih">Tunjangan Tali Asih</label>
									<input type="text" name="tunjtaliasih" id="tunjtaliasih" class="form-control" />
								</div>
								<div class="form-group">
									<label for="subtotal2">Sub Total 2</label>
									<input type="text" name="subtotal2" id="subtotal2" class="form-control" />
								</div>
								<div class="form-group">
									<label for="fee">FEE</label>
									<input type="text" name="fee" id="fee" class="form-control" />
								</div>
								<div class="form-group">
									<label for="subtotal3">Sub Total 3</label>
									<input type="text" name="subtotal3" id="subtotal3" class="form-control" />
								</div>
								<div class="form-group">
									<label for="ppn">PPN</label>
									<input type="text" name="ppn" id="ppn" class="form-control" />
								</div>
								<div class="form-group">
									<label for="total">Total</label>
									<input type="text" name="total" id="total" class="form-control" />
								</div>
								<div class="form-group">
									<br>
									<button type="button" id="save2db" class="btn btn-success">Simpan</button>
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
