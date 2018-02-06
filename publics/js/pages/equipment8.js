


   $(document).ready(function() {
  
   
    $('#equipment').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });


    $('#equipmentModal').on('show.bs.modal', function (event) {

      $(".select2").select2();
		
		 setTimeout(function (){
			 
        	$('#equipment-name').focus();

    	}, 1000);

		  //var button = $(event.relatedTarget) 
      //var recipient = button.data('whatever') 
  
      
        //modal.find('.modal-body input').val(recipient)
		
     
	$('#equipment-save').click(function(){

    var modal = $(this)
        
		var sap = $('#equipment-sap').val().toString().length;

      if(sap != 12){
        modal.find('.modal-title').text('Equipment : SAP is numeric 12');
        $('#equipment-sap').focus();
        return false;
      }

      return true;
		
		
	});


 
	

  });
  

    
  });
