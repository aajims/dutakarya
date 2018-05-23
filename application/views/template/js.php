<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>Admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>Admin/bootstrap/js/bootstrap.min.js"></script>

<!-- DataTables -->
<script src="<?php echo base_url(); ?>Admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>Admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>Admin/bootstrap/js/dataTables.responsive.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>Admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>Admin/plugins/fastclick/fastclick.js"></script>
<script src="<?=base_url();?>Admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?=base_url();?>Admin/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>Admin/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>Admin/dist/js/demo.js"></script>
<script type='text/javascript' src='<?php echo base_url();?>Admin/bootstrap/js/jquery.autocomplete.js'></script>
<!-- page script -->
	
<script>
  $(function () {
    
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>