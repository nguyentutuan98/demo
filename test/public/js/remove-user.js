
$(document).ready(function(){
	$('#btn_remove ').click(function() {
		 
		var id=$('#id_remove').val();
		
		 console.log('ok');
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
		$.ajax({
			url:"remove",
			type:"post",
			data:{
				id:id,
				
			},
			
		}).done(function(res){
			if(res.code== 200)
				location.reload();
			else if(res.code == 404)
				alert('fail');

		})

		
	});
});

