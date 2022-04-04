$(document).ready(function(){
	$('#btn_save1').click(function(){
		
		
		var email=$('#email_input').val();
		var password=$('#password_input').val();
		var name=$('#name_input').val();
		var birth=$('#datepicker').find("input").val();
		var note=$('#textnote').val();
		var gender= $('#gender').find('option:selected').val();
		var role= $('#role_input').find('option:selected').val();
		$('#email_error').text('');
		$('#pass_error').text('');
		$('#name_error').text('');
		$('#gender_error').text('');
		$('#role_error').text('');


		//$('#gender option:selected').val();
		console.log('ok');
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
		$.ajax({
			url:"save",
			method:"post",
			data:{
				"_token": $("input[name=_token]").val(),
				
				email:email,
				password:password,
				name:name,
				birth:birth,
				gender:gender,
				role:role,
				note:note,

			},

		}).done(function(res){

			if(res.code == 200)
				{
				$("#myModal").modal('hide');
				location.reload();
				}
			else if(res.code == 404)

		 	 alert('fail');
		 	else if(res.code == 100)

		 	$('#email_error').text('email đã tồn tại');
		 	else if (res.code == 400) {

		 		$.each(res.error, function(key, value) {
		 			console.log(key);
		 			console.log(value);
		 			if (key === 'email') {
		 				$('#email_error').text(value[0]);
		 			}

		 			if (key === 'password') {
		 				$('#pass_error').text(value[0]);
		 			}
		 			if(key === 'name')
		 			{
		 				$('#name_error').text(value[0]);
		 			}
		 			if(key === 'gender')
		 			{
		 				$('#gender_error').text(value[0]);
		 			}
		 			 
		 			
		 			
		 			
		 		});


		 	}
		})
	});
});

$(document).ready(function(){
	$('#btn_save').click(function(){
		
		
		var email=$('#email_input').val();
		var password=$('#password_input').val();
		var name=$('#name_input').val();
		var note=$('#textnote').val();
		var gender= $('#gender').find('option:selected').val();
		$('#email_error').text('');
		$('#pass_error').text('');
		$('#name_error').text('');
		$('#gender_error').text('');


		//$('#gender option:selected').val();
		console.log('ok');
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
		$.ajax({
			url:"save",
			method:"post",
			data:{
				"_token": $("input[name=_token]").val(),
				
				email:email,
				password:password,
				name:name,
				gender:gender,
				note:note,

			},

		}).done(function(res){

			if(res.code == 200)
				{
				window.location.href='./list';
				}
			else if(res.code == 404)

		 	 alert('fail');
		 	else if(res.code == 100)

		 	$('#email_error').text('email đã tồn tại');
		 	else if (res.code == 400) {

		 		$.each(res.error, function(key, value) {
		 			console.log(key);
		 			console.log(value);
		 			if (key === 'email') {
		 				$('#email_error').text(value[0]);
		 			}

		 			if (key === 'password') {
		 				$('#pass_error').text(value[0]);
		 			}
		 			if(key === 'name')
		 			{
		 				$('#name_error').text(value[0]);
		 			}
		 			if(key === 'gender')
		 			{
		 				$('#gender_error').text(value[0]);
		 			}
		 			 
		 			
		 			
		 			
		 		});


		 	}
		})
	});
});
