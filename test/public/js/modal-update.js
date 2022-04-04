$(document).ready(function(){
	$('.update-btn').click(function(){
		var id=$(this).val();
		console.log(id);
		$('#email_error2').text('');
		$('#name_error2').text('');
		$('#gender_error2').text('');
		$.ajax({
			url:"edit",
			method:"get",
			data:{
				
				id:id,
				
			},
			
		}).done(function(res){
			if(res.code== 200)
			{
				//console.log(res.data);
				//console.log(res.day);
				
					//$datepicker.datepicker();
				$('#datepicker_edit').datepicker('setDate',res.day);
				$.each(res.data, function(key, value){
					//console.log(key);
					//console.log(value);
				if(key === 'id')
				{
					document.getElementById("id_edit").value = value;
				}
				if(key === 'email')
				{
					//$('#email_edit').text('du lieu hien thi');
					document.getElementById("email_edit").value =value;
				}
				if(key === 'name')
				{
					document.getElementById("name_edit").value = value;
				}
				if(key === 'gender'){
					document.getElementById("gender_edit").value = value;
				}
				if(key === 'note'){
					document.getElementById("textnote_edit").value = value;
				}
				if(key ==='permission_role')
				{
					document.getElementById("role_edit").value = value;
				}
				
					
					
					
				
				});
			}
			//
			else if(res.code == 404)
				console.log('fail');
		})
	});
});
$(document).ready(function() {
	$('.remove-btn').click(function(){
		var id=$(this).val();
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
		$.ajax({
			url:"remove",
			method:"get",
			data:{
				
				id:id,
				
			},
		}).done(function(res) {
			
			if(res.code == 200)
			{
				document.getElementById("id_remove").value=res.data;
			}
			else
				console.log('fail');
		})


		

	});
});
$(function(){
  
  $('#datepicker').datepicker({
    format: 'dd-mm-yyyy'
	});
});
$(function(){
  
  $('#datepicker_edit').datepicker({
    format: 'dd-mm-yyyy'
	});
});