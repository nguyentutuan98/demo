$(document).ready(function() {
	$('.change-btn').click(function(){
		var id=$(this).val();
		
		
		console.log(id);
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
		$.ajax({
			url:"change",
			type:"get",
			data:{
				id:id,
				
			},
			
		}).done(function(res){
			if(res.code== 200)
			{
				document.getElementById("id_change").value=res.data;
				$("#myModal").modal('hide');
			}
			else if(res.code == 404)
				alert('fail');

		})
	});
});
$(document).ready(function(){
	$('#btn_change').click(function(){
		var id =$('#id_change').val();
		var old =$('#old_password').val();
		var change =$('#new_password').val();
		var confirm =$('#confirm_password').val();
		$('#oldpass_error').text('');
		$('#newpass_error').text('');
		$('#cfpass_error').text('');

		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
		$.ajax({
			url:"change",
			type:"post",
			data:{
				id:id,
				old:old,
				new:change,
				confirm:confirm,
			},
			
		}).done(function(res){
			if(res.code == 200)
			{
				$("#changeModal").modal('hide');
				location.reload();
			}

			else if(res.code == 400)
			{
				$.each(res.error, function(key, value) 
				{
		 			console.log(key);
		 			console.log(value);
		 			if (key === 'old') {
		 				$('#oldpass_error').text(value[0]);
		 			}

		 			
		 			if(key === 'new')
		 			{
		 				$('#newpass_error').text(value[0]);
		 			}
		 			if(key === 'confirm')
		 			{
		 				$('#cfpass_error').text(value[0]);
		 			}
				});
			}

			else if(res.code == 100)
			{
				$('#error').text('Sai mật khẩu ');
			}

			else if(res.code == 404)
				alert('fail');

		})

	});
});