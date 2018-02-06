$(document).ready(function() {
    
        //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    $('#change').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });

    
  });