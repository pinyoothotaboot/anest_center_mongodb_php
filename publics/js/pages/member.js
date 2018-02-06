


   $(document).ready(function() {
    
    
  	
  
    
    
    $('#staff').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });


    $('#staffModal').on('show.bs.modal', function (event) {
		
		 setTimeout(function (){
			 
        	$('#staff-name').focus();

          

    	}, 1000);

     
       
          

          $(".select2").select2();

   
		
		
      //var button = $(event.relatedTarget) 
      //var recipient = button.data('whatever') 
  		
      //var modal = $(this)
        //modal.find('.modal-title').text('New message to ' + recipient)
        //modal.find('.modal-body input').val(recipient)
	$('#staff-save').click(function(){
		var password = $('#staff-pass').val();
		var confirmPassword = $('#staff-cpass').val();
			
			if(password != '' || confirmPassword != ''){
				if(password != confirmPassword){
				
					alert("Passwords do not match.");
						$('#staff-cpass').focus();
						return false;
				} 
			}
			return true;
	});
	
	

  });
  

    
  });
