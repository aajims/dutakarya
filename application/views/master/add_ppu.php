 <script type='text/javascript'>       
    $(function(){
        
        function loadData(args) {
            //code
            $("#tampil").load("<?php echo site_url('ppu/tampil');?>");
        }
        loadData();
        
        function kosong(args) {
            //code
            $("#ket").val('');
            $("#jum").val('');
        }
        
               
        $("#tambah").click(function(){            
            var Kete=$("#kete").val();
            var Jumlah=$("#jum").val();
            
            if (Kete=="") {
                //code
                alert(" Input Data Keterangan Masih Kosong");
                return false;
            }else if (Jumlah=="") {
                //code
                alert("Data Nominal Jumlah Belum di Input ");
                return false
            }else{
                $.ajax({
                    url:"<?php echo site_url('ppu/tambahrinci');?>",
                    type:"POST",
                    data:"kete="+Kete+"&jum="+Jumlah,
                    cache:false,
                    success:function(html){
                        loadData();
                        kosong();
                    }
                })    
            }
            
        })
              
        $("#simpan").click(function(){
            var no=$("#no").val();
            var rinc=$("#rinc").val();
            var Periode=$("#per").val();
            var Kode = $("#kode").val();
            var Ket = $("#ket").val();
            
            if (rinc=="") {
                alert("Data Rincian Belum di Isi");
                return false;
            }else{
                $.ajax({
                    url:"<?php echo site_url('ppu/sukses');?>",
                    type:"POST",
                    data:"no="+no+"&rinc="+rinc+"&per="+Periode+"&kode="+Kode+"&ket="+Ket,
                    cache:false,
                    success:function(html){
                        alert("Transaksi Data Pengajuan Berhasil Di Simpan");
                        location.reload();
                    }
                })
            }
            
        }) 
    });
</script>
  <section class="content">
   	<div class="box box-default">
   		
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading">Form Data PPU</div>
					  	<form method="post" action="<?php echo site_url(); ?>ppu/sukses" method="post" >
						  <div class="panel-body">
							<div class="col-md-6 col-sm-6 col-xs-6">
								<div class="form-group">
									<label>No PPU</label>
									<input type="hidden" name="kode" id="kode" value="<?php echo $kode; ?>" />
									<input name="no" id="no" readonly="" class="form-control" value="<?php echo $kodeunik; ?>" placeholder="Input No PPU" data-validation="required">
								</div>
								<div class="form-group">
									<label>Periode Pembayaran</label><br />
									<div class="input-group date">
					                  <div class="input-group-addon">
					                    <i class="fa fa-calendar"></i>
					                  </div>
					                  <input name="per" type="text" class="form-control pull-right" id="per">
					                </div>  
								</div>
								<div class="form-group">
									<label>Rincian Pembayaran</label>
                                    <select name="rinc" class="form-control" >
                                        <option value="">-- Pilih Keterangan --</option>
                                        <option value="BPJS Kesehatan">BPJS Kesehatan</option>
                                        <option value="BPJS TK Factory">BPJS TK Factory</option>
                                        <option value="BPJS TK Office">BPJS TK Office</option>
                                        <option value="Backup Ops">Backup Ops</option>
                                        <option value="Pembayaran pajak Pph 21">Pembayaran pajak Pph 21</option>
                                        <option value="Pembayaran pajak PPN">Pembayaran pajak PPN</option>
                                        <option value="Claim Reimburse">Claim Reimburse</option>
                                        <option value="Claim Reimburse BPJS TK & Kes">Claim Reimburse BPJS TK & Kes</option>
                                        <option value="Backup Recept, Suster, adm">Backup Recept, Suster, adm</option>
                                        <option value="PPU entertainment">PPU Entertainment</option>
                                        <option value="PPU Driver Backup">PPU Driver Backup</option>
                                        <option value="PPU Pulsa">PPU Pulsa</option>
                                        <option value="Pembelian Chemical">Pembelian Chemical</option>
                                        <option value="Uang Sampah">Uang Sampah</option>
                                        <option value="Permintaan Tissu">Permintaan Tissu</option>
                                        <option value="Permintaan Petty Cash">Permintaan Petty Cash</option>
                                        <option value="Angsuran Mobil Luxio">Angsuran Mobil Luxio</option>
                                        <option value="Pembelian Kaos">Pembelian Kaos</option>
                                        <option value="Biaya Umum dan Dokumen">Biaya Umum dan Dokumen</option>
                                    </select>
								</div>
								<div class="form-group">
									<label>Keterangan Transfer</label>
                                    <select name="ket" class="form-control" >
                                        <option value="">-- Pilih Transfer --</option>
                                        <option value="Transfer Ke Ika">Transfer Ke Ika</option>
                                        <option value="Transfer Ke Irma">Transfer Ke Irma</option>
                                        <option value="Transfer Ke Ichan">Transfer Ke Ichsan</option>
                                        <option value="Transfer Ke Rizky">Transfer Ke Rizky</option>
                                        <option value="Transfer Ke Gilang">Transfer Ke Gilang</option>
                                        <option value="Transfer Ke lainya">Transfer Ke Lainya</option>
                                    </select>
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
				        <div class="col-md-6 col-sm-6 col-xs-6">
				            <div class="form-group">
				            	<label>Keterangan Keperluan</label>
				            	<input type="hidden" name="kode" value="<?php echo $kode; ?>" /> 
				                <input type="text" class="form-control" placeholder="Input Keterangan Keperluan Pengajuan" id="kete" name="kete" >
				            </div>
				            <div class="form-group">  
				            	<label>Nominal Jumlah</label>              
				                <input type="number" class="form-control" placeholder="Input Nominal Jumlah tanpa Tanda Titik dan Koma" id="jum" name="jum" >
				            </div>
				            <div class="form-group">                
				                <button id="tambah" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah Rincian</button>                
				            </div>                       
				        </div>
				    </div>
				    
				    <div id="tampil"></div>
				    
				    <div class="panel-footer">
				        <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan Data</button>
				        <a href="<?php echo site_url('ppu');?>" class="btn btn-danger">Kembali</a>
				    </div>
				</div>
			  
			 </div>
		  </section>	 	
				
	 <script type="text/javascript">
	  $(function () {
   	//Date picker
    $('#per').datepicker({
      autoclose: true,
      format: "yyyy-mm",
        todayHighlight: true,
    });
        
   });
   </script>	 		  	
	