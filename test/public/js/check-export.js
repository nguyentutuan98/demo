$('#select-all').click(function(event) {   
   
	if(this.checked) {
        // Iterate each checkbox
        $('.choose').each(function() {
            this.checked = true;                        
        });
    } else {
        $('.choose').each(function() {
            this.checked = false;                       
        });
    }
});
  function removeElement(array, elem) {
      var index = array.indexOf(elem);
      if (index > -1) {
          array.splice(index, 1);
      }
  }
      
$(document).ready(function(){
		
		var check=[];
         $('.choose').click(function(){
    	if ($(this).prop('checked') == true)
    	{ 
    		$(this).each(function(){
    		
    		check.push($(this).val());
    		console.log(check);
    	
    		});
    	}
    	else if ($(this).prop('checked') == false)
    	{
    		$(this).each(function(){
    		
    		removeElement(check,$(this).val());
    	
    		});
    	}
				
		
		
			$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
			$.ajax({
				url:"getid",
				method:"get",
				data:{
					"_token": $("input[name=_token]").val(),
					check:check,
					
	
				},
			});
		
			
});
});