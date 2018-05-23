<link rel="stylesheet" href="<?=base_url();?>Admin/plugins/datepicker/datepicker3.css">


<script type="text/javascript" src="<?=base_url();?>Admin/bootstrap/js/jquery.form-validator.min.js"></script>
  	<script>
  		 //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  	</script>
  
    <script>
	var myLanguage = {
      errorTitle : 'Tidak dapat dilanjutkan!',
      requiredFields : 'inputan ini harus diisi',
      badTime : 'Harus format waktu',
      badEmail : 'Harus format email',
      badTelephone : 'Harus format telepon',
      badSecurityAnswer : 'Pertanyaan keamanan salah',
      badDate : 'Kesalahan menulis tanggal',
      lengthBadStart : 'Harus input karakter antara ',
      lengthBadEnd : ' Karakter',
      lengthTooLongStart : 'Panjang karakter harus Kurang dari ',
      lengthTooShortStart : 'Panjang karakter harus Minimal ',
      notConfirmed : 'Konfirmasi terlebih dahulu',
      badDomain : 'Harus format nama domain',
      badUrl : 'Harus format URL',
      badCustomVal : 'You gave an incorrect answer',
      badInt : 'Harus karakter angka',
      badSecurityNumber : 'Your social security number was incorrect',
      badUKVatAnswer : 'Incorrect UK VAT Number',
      badStrength : 'The password isn\'t strong enough',
      badNumberOfSelectedOptionsStart : 'You have to choose at least ',
      badNumberOfSelectedOptionsEnd : ' answers',
      badAlphaNumeric : 'The answer you gave must contain only alphanumeric characters ',
      badAlphaNumericExtra: ' and ',
      wrongFileSize : 'The file you are trying to upload is too large',
      wrongFileType : 'The file you are trying to upload is of wrong type',
      groupCheckedRangeStart : 'Please choose between ',
      groupCheckedTooFewStart : 'Please choose at least ',
      groupCheckedTooManyStart : 'Please choose a maximum of ',
      groupCheckedEnd : ' item(s)'
    };
	$.validate({
    language : myLanguage
  	});	
    </script>

<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 
    </div>
    <strong>Copyright &copy; 2017 .</strong> All rights
    reserved.
  </footer>


