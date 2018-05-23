 <script type='text/javascript'>
        var site = "<?php echo site_url();?>";
        $(function(){
            $('.form-control1').autocomplete({
                // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
                serviceUrl: site+'/gaji/search',
                // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
                onSelect: function (suggestion) {
                    $('#nik').val(''+suggestion.nik);
                    $('#kar').val(''+suggestion.kar);
                    $('#id_kar').val(''+suggestion.id_kar);
                    $('#jab').val(''+suggestion.jabatan);
                    $('#gaji').val(''+(suggestion.gaji)); 
                    $('#gajii').val(''+(suggestion.gaji));
                }
            });
        });
  </script>  
 
 <script type='text/javascript'>       
    $(function(){
        
        function loadData(args) {
            //code
            $("#tampil").load("<?php echo site_url('gaji/tampil');?>");
        }
        loadData();
        
        function kosong(args) {
            //code
            $("#selecthari").val('');
            $("#tgl").val('');
            $("#masuk").val('');
            $("#pulang").val('');
            $("#lem").val('');
            $("#total").val('');
            $("#nom").val('');
            $("#ket").val('');
        }
               
        $("#tambah").click(function(){            
            var Tgl=$("#tgl").val();
            var Masuk=$("#masuk").val();
            var Pul=$("#pulang").val();
            var Lembur=$("#lem").val();
            var Hari=$("#hari").val();
            var Total=$("#total").val();
            var Nom=$("#nom").val();
            var Ket=$("#ket").val();
            
            if (lem=="") {
                alert("Data Jumlah Lembur Belum di Input ");
                return false
            }
            else if (tgl=="")
            {
            	alert('Tanggal Belum di input');
            	return false;
            } else {
                $.ajax({
                    url:"<?php echo site_url('gaji/tambahrinci');?>",
                    type:"POST",
                    data:"tgl="+Tgl+"&masuk="+Masuk+"&pulang="+Pul+"&lem="+Lembur+"&total="+Total+"&nom="+Nom+"&ket="+Ket,
                    cache:false,
                    success:function(html){
                    	$.ajax({
                    		url:"<?php echo base_url('gaji/tampil');?>",
                    		cache: false,
                    		dataType: "HTML",
                    		success: function(html){
                    			$("#tampil").html(html);
                    			kosong();
                    		}
                    		
                    	});
                    }
                })    
            }
            
        })
              
        $("#simpan").click(function(){
            var Cust=$("#cust").val();
            var Id_kar=$("#id_kar").val();
            var NIK=$("#nik").val();
            var Kar=$("#kar").val();
            var Jab=$("#jab").val();
            var Gaji=$("#gaji").val();
            var Periode=$("#per").val();
           
            
            if (Periode=="") {
                alert("Data Periode Belum di Isi");
                return false;
            }else{
                $.ajax({
                    url:"<?php echo site_url('gaji/sukses');?>",
                    type:"POST",
                    data: {
                    	id_par: Cust,
                    	nik: NIK,
                    	kar: Kar,
                    	jab: Jab,
                    	gaji: Gaji,
                    	periode: Periode,
                    	id_kar: Id_kar
                    },
                    cache:false,
                    success:function(html){
                        alert("Transaksi Data Gaji Berhasil Di Simpan");
                        location.assign("<?php echo base_url();?>gaji");
                    }
                })
            }
            
        }) 
    });
    jQuery(document).ready(function($) {
	    function hitungNominalLembur()
	    {
	    		/* Act on the event */
	    		var lem = $("#lem");
	    		var hari = $('#selecthari');
	    		var gaji = $("#gaji");
	    		var total = $("#total");
	    		var nom = $("#nom");
	    		
	    		if (parseInt(lem.val()) < 0 )
	    		{
	    			alert("Jam lembur harus lebih dari angka 1");
	    			lem.focus();
	    			return false;
	    		}
	    		if (gaji.val() == "")
	    		{
	    			alert('Silangkan pilih karyawan terlebih dahulu');
	    			gaji.focus();
	    			return false;
	    		}
	    		
	    		if (hari.val() == "Biasa")
	    		{
	    			total.val(parseInt(lem.val()) * 2 - 0.5);
	    		}
	    		else if (hari.val() == "Libur")
	    		{
	    			total.val(parseInt(lem.val()) * 2);
	    		}
	    		
	    		var nominal = parseInt(parseFloat(total.val()) * parseFloat(gaji.val()) / 173);
	    		
	    		if (nominal !== NaN)
	    		{
		    		nom.val(parseInt(nominal));
	    		}
	    		
	    }
    	$("#selecthari").change(function(event) {
    		hitungNominalLembur();
    	});
    	$("#lem").change(function(event){
    		hitungNominalLembur();
    	});
    });
</script>

  <section class="content">
   	<div class="box box-default">
   		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Form Data gaji</div>
					  	<form  method="post" action="<?php echo site_url(); ?>gaji/sukses">
						  <div class="panel-body">
							<div class="col-md-6">
								<div class="form-group">
									<label>Nama Customer</label>
									<select name="cust" id="cust" class="form-control" data-validation="required">
										<option value="">-- Pilih --</option>
				                      <?php $jenis = $this->db->get('partner');
				                        foreach ($jenis->result()as $row){
				                      ?>
			                      <option class="form-control" value="<?php echo $row->id_partner ?>"><?php echo $row->nm_partner; ?></option>
			                      <?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label>Nik Karyawan</label><br />
									<input type="hidden" name="kode" id="kode" value="" />
									<input name="nik" id="nik" type="text" readonly="" class="form-control">
								</div>
								<div class="form-group">
									<label>Nama Karyawan</label><br />
									<input type="hidden" name="id_kar" id="id_kar" />
									<input name="kar" id="kar" type="text" class="form-control1 form-control">
								</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Jabatan</label>
										<input name="jab" id="jab" class="form-control" readonly="" >
									</div>
									<div class="form-group">
										<label>Gaji Pokok</label>
										<input type="text" name="gaji" id="gajii" onfocus="startCalc();" onblur="stopCalc();" readonly="" class="form-control"  >
									</div>
									<div class="form-group">
										<label>Periode Gaji</label><br />
										<div class="input-group date">
						                  <div class="input-group-addon">
						                    <i class="fa fa-calendar"></i>
						                  </div>
						                  <input name="per" id="per" type="text" class="form-control pull-right">
						                </div>  
									</div>
								</div>						
							 </div>
						 	</form>
						</div>
					  </div>
					</div>
				 <form name="autoSumForm" id="form">	
					<div class="panel panel-success">
				    	<div class="panel-heading">
				        Rincian Biaya Lembur Karyawan
				    	</div>
				    	<div class="panel-body">
				        <div class="col-md-6">
				            <div class="form-group">
				            	<label>Tanggal</label>
				            	<input type="hidden" name="kode" value="<?php echo $kode; ?>" /> 
				                <div class="input-group date">
					                  <div class="input-group-addon">
					                    <i class="fa fa-calendar"></i>
					                  </div>
					                  <input name="tgl" id="tgl" type="text" class="form-control pull-right">
					                </div>  
				            </div>
				            <div class="bootstrap-timepicker">
					            <div class="form-group">  
					            	<label>Jam Masuk</label>              
					                <div class="input-group">
				                    <div class="input-group-addon">
				                      <i class="fa fa-clock-o"></i>
				                     </div>  
				                      <input name="masuk" id="masuk" class="form-control timepicker">
				                  </div>
					            </div>
					        </div>  
					        <div class="bootstrap-timepicker">  
				            <div class="form-group">  
				            	<label>Jam Pulang</label>              
				                <div class="input-group">
				                	<div class="input-group-addon">
				                      <i class="fa fa-clock-o"></i>
				                    </div>
			                    <input name="pulang" id="pulang" class="form-control timepicker">
			                  </div>
				            </div>
				           </div>
				            <div class="form-group">
								<label>Lembur</label>
								<input name="lem" id="lem" placeholder="Input Total Jam Lembur" class="form-control" >
							</div>
								<div class="form-group">
									<label>Jenis Hari</label>
									<select name="hari" id="selecthari" class="form-control">
										<option value="" id="selectharidefault">---Pilih Hari---</option>
										<option value="Biasa">Hari Biasa</option>
										<option value="Libur">Hari Libur</option>
									</select>
								</div>
						   </div>	
							<div class="col-md-6">
								<div class="form-group">
										<label>Gaji Pokok</label>
										<input type="text" name="gaji" id="gaji" readonly="" class="form-control"  >
									</div>
								<div class="form-group">
									<label>Total Lembur</label>
									<input name="total" id="total" readonly="" class="form-control" >
								</div>
								<div class="form-group">
									<label>Nominal Lembur</label>
									<input name="nom" id="nom"  readonly="" class="form-control" >
								</div>
								<div class="form-group">
									<label>Keterangan</label>
									<input name="ket" id="ket" placeholder="Input Keterangan Jika Ada" class="form-control" >
								</div>
									
				            <div class="form-group">                
				                <button id="tambah" type="button" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah Data</button>                
				            </div>
				           </div>                        
				        </div>
				     </div>
				   </form> 
				    <div id="tampil"></div>
				    
				    <div class="panel-footer">
				        <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan Data</button>
				        <a href="<?php echo site_url('gaji');?>" class="btn btn-danger">Kembali</a>
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
     $('#tgl').datepicker({
      autoclose: true,
      format: "yyyy-mm-dd",
        todayHighlight: true,
    }); 

     $(".timepicker").timepicker({
      showInputs: false
    });
    
   });
   </script>	 		  	
	
