$(document).ready(function(){
  $('#btn_login').click(function(){
  		//console.log('ok');
	   	var email=$("#email_input").val();
	   	var password=$(".pass_input").val();
	   	$.ajax({
	   		url:"check_login",
	   		method:"post",
	   		data:{
	   			"_token": $("input[name=_token]").val(),
	   			email:email,
	   			password:password

	   		}
	   		

	   	}).done(function(res) {
	   		
	   		if(res.code == 200){
	   			window.location.href="./welcome";
	   			

	   		}else if (res.code == 404)
	   		{
	   			$('#msg_login').css('display','inline').html('email hoặc password không đúng');
	   		}
	   		else if (res.code == 400) 
	   		{
		 			$.each(res.error, function(key, value) {
		 			
		 			if (key === 'email') {
		 				$('#email_error').text(value[0]);
		 			}

		 			if (key === 'password') {
		 				$('#pass_error').text(value[0]);
		 			}
		 			
		 			
		 		});

		 	}

	   			
	   		
  		
	   		
});
	   });
});