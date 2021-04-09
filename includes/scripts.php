<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<!-- <script src="bower_components/fastclick/lib/fastclick.js"></script> -->
<!-- AdminLTE App -->
<!-- <script src="dist/js/adminlte.min.js"></script> -->
<!-- CK Editor -->
<!-- <script src="bower_components/ckeditor/ckeditor.js"></script> -->

<!-- jQuery UI 1.11.4 -->
<!-- <script src="../bower_components/jquery-ui/jquery-ui.min.js"></script> -->

<!-- Select2 -->
<!-- <script src="../bower_components/select2/dist/js/select2.full.min.js"></script> -->
<!-- Moment JS -->
<!-- <script src="../bower_components/moment/moment.js"></script> -->

<!-- ChartJS -->
<!-- <script src="../bower_components/chart.js/Chart.js"></script> -->
<!-- daterangepicker -->
<!-- <script src="../bower_components/moment/min/moment.min.js"></script> -->

<!-- CK Editor -->
<!-- <script src="../bower_components/ckeditor/ckeditor.js"></script> -->
<!-- Active Script -->


<script>
  $(function() {

    $('#requests').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true,
      'scrollX'     : true
    
    });
    $('#history').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true,
      'scrollX'     : true
    
    });
    $('#pets').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true,
      'scrollX'     : true
    
    });
    $('#messages').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true,
      'scrollX'     : true
    
    });
  
  });
</script>


<!-- <script>
$(function(){
	$('.zoom').magnify();
});
</script> -->
<!-- Custom Scripts -->
<!-- <script>
$(function(){
  $('#navbar-search-input').focus(function(){
    $('#searchBtn').show();
  });

  $('#navbar-search-input').focusout(function(){
    $('#searchBtn').hide();
  });

  $(document).on('click', '.close', function(){
  	$('#callout').hide();
  });

});

</script> -->