<!-- jQuery 3 -->
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- Moment JS -->
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/bower_components/moment/moment.js"></script>
<!-- DataTables -->
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- ChartJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<!-- daterangepicker -->
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/dist/js/adminlte.min.js"></script>
<!-- CK Editor -->
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/bower_components/ckeditor/ckeditor.js"></script>

<!-- Active Script -->
<script>
$(function(){
	/** add active class and stay opened when selected */
	var url = window.location;
  
	// for sidebar menu entirely but not cover treeview
	$('ul.sidebar-menu a').filter(function() {
	    return this.href == url;
	}).parent().addClass('active');

	// for treeview
	$('ul.treeview-menu a').filter(function() {
	    return this.href == url;
	}).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');

});
</script>
<!-- Data Table Initialize -->
<script>
  $(function () {
    $('#example1').DataTable({
      responsive : true
    });
    $('#example2').DataTable({
      responsive : true,
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true
    });
  });
</script>
<script>
  $(function(){
    //Initialize Select2 Elements
    $('.select2').select2()

    //CK Editor
    CKEDITOR.replace('editor1')
    CKEDITOR.replace('editor2')
  });
</script>




