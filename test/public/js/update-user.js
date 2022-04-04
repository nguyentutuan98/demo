$(document).ready(function(){
	$('#btn_update ').click(function() {
		//var id=$(this).val();
		var id=$('#id_edit').val();
		var email=$('#email_edit').val();
		var name=$('#name_edit').val();
		var note=$('#textnote_edit').val();
		var birth=$('#datepicker_edit').find("input").val();
		var gender= $('#gender_edit').find('option:selected').val();
		var role= $('#role_edit').find('option:selected').val();
		$('#email_error2').text('');
		$('#name_error2').text('');
		$('#gender_error2').text('');
		 
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
		$.ajax({
			url:"update",
			method:"post",
			data:{
				"_token": $("input[name=_token]").val(),
				id:id,
				email:email,
				name:name,
				gender:gender,
				role:role,
				birth:birth,
				note:note,
				
			},
			
		}).done(function(res)
		{
			console.log(res);
			if(res.code== 200)
			{
				$("#editModal").modal('hide');
				location.reload();
			}
			else if(res.code==400)
				$.each(res.error, function(key, value) {
		 			console.log(key);
		 			console.log(value);
		 			if (key === 'email') {
		 				$('#email_error2').text(value[0]);
		 			}

		 			
		 			if(key === 'name')
		 			{
		 				$('#name_error2').text(value[0]);
		 			}
		 			if(key === 'gender')
		 			{
		 				$('#gender_error2').text(value[0]);
		 			}

		 			
		 			
		 			
		 		});
			else if(res.code==100)
			{
				$('#email_error2').text('email đã tồn tại');
			}
		})

		
	});
});

$(document).ready(function(){
	$('#btn_save ').click(function() {
		var id=$(this).val();
		//var id=$('#id_edit').val();
		var email=$('#email_input').val();
		var name=$('#name_input').val();
		var note=$('#textnote').val();
		var gender= $('#gender').find('option:selected').val();
		$('#email_error').text('');
		
		$('#name_error').text('');
		$('#gender_error').text('');
		 
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
		$.ajax({
			url:"../update",
			method:"post",
			data:{
				"_token": $("input[name=_token]").val(),
				id:id,
				email:email,
				name:name,
				gender:gender,
				note:note,
				
			},
			
		}).done(function(res)
		{
			console.log(res);
			if(res.code== 200)
			{
				window.location.href='../list';
			}
			else if(res.code==400)
				$.each(res.error, function(key, value) {
		 			console.log(key);
		 			console.log(value);
		 			if (key === 'email') {
		 				$('#email_error').text(value[0]);
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
			else if(res.code==100)
			{
				$('#email_error2').text('email đã tồn tại');
			}
		})

		
	});
});