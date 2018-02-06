


   $(document).ready(function() {
    
    
    
   
    $('#status').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });


    $('#statusModal').on('show.bs.modal', function (event) {
		 setTimeout(function (){
			 
        	$('#status-name').focus();

    	}, 1000);
      var button = $(event.relatedTarget) 
      var recipient = button.data('whatever') 
  
      var modal = $(this)
        modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body input').val(recipient)

  });



    
  });
