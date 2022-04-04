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
$(document).ready(function(){

		var data = [];
         $('.choose').click(function(){
    	if ($(this).prop('checked') == true)
    	{ 
    		$(this).each(function(){
    		var id=$(this).val();
    		console.log(id);
    		data.push(id);
    		console.log(data);
    		});


    		
    	}
		else if($(this).prop('checked') == true)
			
		{
			
		}
	
       
       
       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
		$.ajax({
			url:"export",
			method:"get",
			data:{
				"_token": $("input[name=_token]").val(),
				
				
				data:data,

			},
			})/*.done(function(res){
				if(res.code == 200)
				{
					
					location.reload();
				}
				else
				{
					alert('fail');
				}
			});*/
   
   });
});
