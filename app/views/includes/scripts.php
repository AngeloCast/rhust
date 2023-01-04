<!-- jQuery 3 -->
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/dist/js/adminlte.min.js"></script>
<!-- CK Editor -->
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/bower_components/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    // Datatable
    $('#example1').DataTable()

    $('#example2').DataTable({
      'paging'      : true,
      'searching'   : false,
      'ordering'    : true,
      'sorting'     : false,
      'info'        : false,
      'bLengthChange': false,
      'autoWidth'   : true
    });
    //CK Editor
    CKEDITOR.replace('editor1')
  });
</script>
<!--Magnify -->
<!-- Custom Scripts -->
<script>
$(function(){
  $('#navbar-search-input').focus(function(){
    $('#searchBtn').show();
  });

  $('#navbar-search-input').focusout(function(){
    $('#searchBtn').hide();
  });

}
</script>
<script>
            $('#demo1_thumbs').desoSlide({
              main: {
                container: '#demo1_main_image',
                cssClass: 'img-responsive'
              },
              effect: 'sideFade',
              caption: true
            });
</script>

          <!-- requried-jsfiles-for owl -->
<script>
            $(window).load(function () {
              $("#flexiselDemo1").flexisel({
                visibleItems: 3,
                animationSpeed: 1000,
                autoPlay: true,
                autoPlaySpeed: 3000,
                pauseOnHover: true,
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: {
                  portrait: {
                    changePoint: 480,
                    visibleItems: 1
                  },
                  landscape: {
                    changePoint: 640,
                    visibleItems: 2
                  },
                  tablet: {
                    changePoint: 768,
                    visibleItems: 3
                  }
                }
              });

            });
</script>
<script>
            $(window).load(function () {
              $("#flexiselDemo2").flexisel({
                visibleItems: 3,
                animationSpeed: 1000,
                autoPlay: true,
                autoPlaySpeed: 3000,
                pauseOnHover: true,
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: {
                  portrait: {
                    changePoint: 480,
                    visibleItems: 1
                  },
                  landscape: {
                    changePoint: 640,
                    visibleItems: 2
                  },
                  tablet: {
                    changePoint: 768,
                    visibleItems: 3
                  }
                }
              });

            });
</script>