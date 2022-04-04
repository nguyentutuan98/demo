$(document).ready(function(){
	$('.change-1').click(function(){
    if ($(this).prop('checked') == false)
    { 
       var id=$(this).val();
       console.log('ok');
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
		$.ajax({
			url:"unactive",
			method:"get",
			data:{
				
				
				id:id,

			},
			}).done(function(res){
				if(res.code == 200)
				{
					
					location.reload();
				}
				else
				{
					alert('fail');
				}
			});
    }
	});
});
$(document).ready(function(){
	$('.change-0[type="checkbox"]').click(function(){
    if ($(this).prop('checked') == true)
    { 
       var id=$(this).val();
       console.log('ok');
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
		$.ajax({
			url:"active",
			method:"get",
			data:{
				"_token": $("input[name=_token]").val(),
				
				id:id,

			},
			}).done(function(res){
				if(res.code == 200)
				{
					
					location.reload();
				}
				else
				{
					alert('fail');
				}
			});
    }
	});
});
