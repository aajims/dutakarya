<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Laporan Data Karyawan</h3>
            </div>
            <div class="box-header">
           	<?php echo form_open('karyawan/lap', array('id' => 'FormLaporan')); ?>
	<!-- Date range -->
             <div class="form-group">
                <label>Periode Tanggal:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>                  
                  <input type="text" class="input-xlarge datepicker" id="tanggal_dari" name="from">
                  </div>                 
                  <label>&nbsp;- Sampai -&nbsp;</label>&nbsp;                  
                  <i class="fa fa-calendar"></i>&nbsp;                 
                  <input type="text" name="to" class="input-xlarge datepicker" id="tanggal_sampai" /> 
	&nbsp;&nbsp;<button class="btn btn-primary btn-sm" type="submit" name="submit">Tampilkan</button>
	 <?php echo form_close(); ?>
           	</div>
          </div> 	           	
           	<br />
            <div class="box-body">
    		<br />    		
			<div id='result'></div>
  <script>
$(document).ready(function(){	
	$('#tanggal_dari').datepicker({
      autoclose: true,
      format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,
    });
    
	$('#tanggal_sampai').datepicker({
      autoclose: true,
      format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,
    });
		
	$('#FormLaporan').submit(function(e){
		e.preventDefault();

		var TanggalDari = $('#tanggal_dari').val();
		var TanggalSampai = $('#tanggal_sampai').val();

		if(TanggalDari == '' || TanggalSampai == '')
		{
			$('.modal-dialog').removeClass('modal-lg');
			$('.modal-dialog').addClass('modal-sm');
			$('#ModalHeader').html('Oops !');
			$('#ModalContent').html("Tanggal harus diisi !");
			$('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok, Saya Mengerti</button>");
			$('#ModalGue').modal('show');
		}
		else
		{
			var URL = "<?php echo site_url('karyawan/aksi_laporan'); ?>/" + TanggalDari + "/" + TanggalSampai;
			$('#result').load(URL);
		}
	});
});
</script>  
    