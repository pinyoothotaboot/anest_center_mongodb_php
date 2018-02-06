$(document).ready(function() {
    
        //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    $('#parcel').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });

    
  });