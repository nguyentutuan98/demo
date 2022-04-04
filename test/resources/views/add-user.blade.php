<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>add user</title>
	<link rel="stylesheet" type="text/css" href="../public/css/bootstrap.css" >
</head>
<body>
	<div class="container">
      <div class="card-body">
         <h4 class="mb-2">
         	New user
         </h4>
         <form method="post">
            {{ csrf_field() }}
             <div>
                
                
                
             </div>
            <div class="form-row">
               <div class="form-group col-sm-6">
                  <label for="myEmail" >Email</label>
                  <input type="email" name="email" class="form-control"
                     id="email_input" placeholder="Email">
                  <span class="text-danger" id="email_error"></span> 
               </div>
               <div class="form-group col-sm-6">
                  <label for="myPassword">Password</label>
                  <input type="password" name="password" class="form-control"
                     id="password_input" placeholder="Password">
                  <span class="text-danger " id="pass_error"></span>
               </div>
            </div>
            <div class="form-group  col-sm-6">
               <label for="inputAddress">Name</label>
               <input type="text"  name="name"class="form-control"
                  id="name_input" placeholder="Name">
               <span class="text-danger" id="name_error"></span>
            </div>
            <div class="form-group col-sm-6">
               <label>Gender</label>
                  <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="gender" name="gender">
                  <option  value="" selected>Choice my gender</option>
                  <option value="1">male</option>
                  <option value="2">female</option>
                  </select>
                  <span class="text-danger" id="gender_error"></span>
            </div>
            <div class="form-group col-sm-6">
               <label >Note</label>
               <textarea  rows="9" cols="70" placeholder="info" id="textnote" name="textnote"></textarea>
               
            </div>
           
            <button class="btn btn-primary float-right"  type="button" id="btn_save" >Save</button>
         </form>
		    </div>
          
	   
   </div>
   <script type="text/javascript" src="../public/js/jquery-3.6.0.js"></script>
   <script type="text/javascript" src ="../public/js/create-user.js"></script>
</body>
</html>