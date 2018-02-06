   $(document).ready(function() {

   

    $('#problem').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });

    

    $('#problemModal').on('show.bs.modal', function (event) {

    
     setTimeout(function (){
       
          $('#problem-name').focus();

      }, 1000);
    
      

  });

  });