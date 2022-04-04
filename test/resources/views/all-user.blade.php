<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>all user</title>
	<link rel="stylesheet" type="text/css" href="../public/css/bootstrap.css" >
   <link rel="stylesheet" type="text/css" href="../public/css/datetimepicker.css" >
    <link rel="stylesheet" type="text/css" href="../public/css/text.css" >
   <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-datepicker.min.css" >
   <link rel="stylesheet" type="text/css" href="../public/plugin/font-awesome-4.7.0/css/font-awesome.css" >
</head>
<body>
	<div class="container">
		
		<div class ="row">
			<div class ="col-12 center">
				<nav class="navbar navbar-expand-sm bg-dark ">
         <!-- Links -->
         <ul class="navbar-nav ">
            <li class="nav-item active">
               <a class="nav-link" style="right:10px ;" href="{{url('/welcome')}}">Trang chủ</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Css</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Bootstrap</a>
            </li>
         </ul>
      </nav>
			</div>
			
         <div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="container">
      <div class="card-body">
         <h4 class="mb-2">
            New user
         </h4>
         <form method="post">
            {{ csrf_field() }}
             
            <div class="form-row">
               <div class="form-group  col-sm-6">
               
             
               
            </div>
               <div class="form-group col-sm-6">
                  <label for="myEmail" >Email</label>
                  <input type="email" name="email" class="form-control"
                     id="email_input" placeholder="Email">
                  <span class="text-danger" id="email_error"></span> 
               </div>
               
            </div><div class="form-group  col-sm-6">
               <label for="inputAddress">Password</label>
               <input type="password"  name="password"class="form-control"
                  id="password_input" placeholder="Password">
               <span class="text-danger" id="pass_error"></span>
            </div>
            <div class="form-group  col-sm-6">
               <label for="inputAddress">Name</label>
               <input type="text"  name="name"class="form-control"
                  id="name_input" placeholder="Name">
               <span class="text-danger" id="name_error"></span>
            </div>
            <div class="form-group  col-sm-6">
               <label for="inputAddress">Role</label>
               <div class="col-12">
               <select style="font-size: 20px;width: 100%; " name="" id="role_input">
                  @foreach($role as $key=>$value)
               <option value="{{$value->role}}">{{$value->namerole}}</option>
                  @endforeach
               </select>
            </div>
               <span class="text-danger" id="role_error"></span>
            </div>
            <label for="date" class="col-1 col-form-label">Birthday</label>
             <div class="form-group  col-sm-6">
         <div class="input-group date" id="datepicker">
        <input type="text" class="form-control" id="datepicker"/>
        <span class="input-group-append">
          <span class="input-group-text bg-light d-block">
            <i class="fa fa-calendar"></i>
          </span>
        </span>
      </div>
    </div>
            <div class="form-group col-sm-6">
               <label>Gender</label>
                  <select style="font-size: 20px;width: 100%; " id="gender" name="gender">
                  
                  <option value="1">male</option>
                  <option value="2">female</option>
                  </select>
                  <span class="text-danger" id="gender_error"></span>
            </div>
            <div class="form-group col-sm-6">
               <label >Note</label>
               <textarea  rows="6" cols="25" placeholder="info" id="textnote" name="textnote"></textarea>
               
            </div>
         </form>
      </div>
      </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
         <button class="btn btn-primary float-right"   type="button" id="btn_save1" >Save</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
   </div>

      <!--End Modal New -->

   <div class="modal fade" id="editModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="container">
      <div class="card-body">
         <h4 class="mb-2">
            Edit user
         </h4>
         <form method="post">
            {{ csrf_field() }}
             
            <div class="form-row">
               <div class="form-group  col-sm-6">
               
               <input style="display:none; "type="text"  name="id"class="form-control"
                  id="id_edit" >
               
            </div>
               <div class="form-group col-sm-7">
                  <label for="myEmail" >Email</label>
                  <input type="email" name="email" class="form-control"
                     id="email_edit" placeholder="Email">
                  <span class="text-danger" id="email_error2"></span> 
               </div>
               
            
            <div class="form-group  col-sm-6">
               <label for="inputAddress">Name</label>
               <input type="text"  name="name"class="form-control"
                  id="name_edit" placeholder="Name">
               <span class="text-danger" id="name_error2"></span>
            </div>

            <label for="date" class="col-1 col-form-label">Birthday</label>
             <div class="form-group  col-sm-6">
               <div class="input-group date" id="datepicker_edit">
               <input type="text" class="form-control" id="datepicker_edit"/>
             <span class="input-group-append">
               <span class="input-group-text bg-light d-block">
             <i class="fa fa-calendar"></i>
               </span>
               </span>
               </div>
            </div>
            <div class="form-group  col-sm-6">
               <label for="inputAddress">Role</label>
               <div class="col-12">
               <select style="font-size: 20px;width: 100%; " name="" id="role_edit">
                  @foreach($role as $key=>$value)

               <option value="{{$value->role}}">{{$value->namerole}}</option>
                  @endforeach
               </select>
            </div>
               <span class="text-danger" id="role_error"></span>
            </div>

            <div class="form-group col-sm-6">
               <label>Gender</label>
                  <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="gender_edit" name="gender">
                  
                  <option value="1">male</option>
                  <option value="2">female</option>
                  </select>
                  <span class="text-danger" id="gender_error2"></span>
            </div>
            <div class="form-group col-sm-6">
               <label >Note</label>
               <textarea  rows="6" cols="50" placeholder="info" id="textnote_edit" name="textnote"></textarea>
               
            </div>
            </div>
         </form>
      </div>
      </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
         <button class="btn btn-primary float-right"   type="button" id="btn_update" >Save</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
   </div>

<!--End Modal Edit -->
   <div class="modal fade" id="deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="container">
      <div class="card-body">
         <input style="display:none; "type="text"  name="id"class="form-control"
                  id="id_remove" >
         <h1>Delete Account</h1>
          <p>Are you sure you want to delete your account?</p>
      </div>
       </div>
    </div>
      <!-- Modal footer -->
      <div class="modal-footer">
         <button class="btn btn-primary float-right"  type="button" id="btn_remove" >Delete</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
   </div>
   </div>
   </div>

<!--End Modal Delete -->
<div class="modal fade" id="changeModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="container">
      <div class="card-body">
         <h4 class="mb-2">
            Change password user
         </h4>
         <form method="post">
            {{ csrf_field() }}
             <span class="text-danger" id="error"></span>
            <div class="form-row">
               
            <input style="display:none; "type="text"  name="id"class="form-control"
                  id="id_change" >
            <div class="form-group  col-sm-6">
               <label for="inputAddress"> Old Password</label>
               <input type="password"  name="password" class="form-control"
                  id="old_password" placeholder="Old Password">
               <span class="text-danger" id="oldpass_error"></span>
            </div>
            <div class="form-group  col-sm-6">
               <label for="inputAddress"> New Password</label>
               <input type="password"  name="newpassword"class="form-control"
                  id="new_password" placeholder="New Password">
               <span class="text-danger" id="newpass_error"></span>
            </div>
            <div class="form-group  col-sm-6">
               <label for="inputAddress">Confirm Password</label>
               <input type="password"  name="confirmpassword"class="form-control"
                  id="confirm_password" placeholder="Confirm Password">
               <span class="text-danger" id="cfpass_error"></span>
            </div>
            
            
            </div>
         </form>
      </div>
      </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
         <button class="btn btn-primary float-right"   type="button" id="btn_change" >Change</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
   </div>  
   <!--End Modal Change Password -->    
         
			<div class= "col-12">
            <div >
               <a href="{{url('user/new')}}">
            <button class="btn btn-primary float-right" type="button" style=" float: right;">
               New</button></a>
         
            <button type="button" class="btn btn-primary float-right "  style=" float: right;" 
            data-bs-toggle="modal" data-bs-target="#myModal">
            Add</button>
            <a href="{{url('user/export')}}">
            <button class="btn btn-primary float-right" id="exportcsv"type="button" style=" float: right;">
               Down file csv</button></a>
            </div>
  

				<h4>Hien thi thong tin user</h4>
         <div class="table-responsive-sm">
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th><input type="checkbox" name="active" class="choose"  id="select-all" ></th>
                     <th>no </th>
                     <th>email</th>
                     <th>username</th>
                     <th>birthday</th>
                     <th>gender</th>
                     <th>note</th>
                     <th>active</th>
                     <th>role</th>
                     <th>action</th>
                     
                     
                  </tr>
               </thead>
               <tbody>
                  @foreach($data as $key=>$detail)
                 
                  <tr >
                     <td><input type="checkbox" name="check" class="choose" value="{{$detail->id_user}}"></td>
                     <td >{{ $data->firstitem()+ $key }} </td>
                     <td>{{$detail->email}}</td>
                     <td>{{$detail->name}}</td>
                     <td>{{date('d-m-Y', strtotime($detail->birthday))}}</td>
                     <td>
                        @if($detail->gender == 1)
                        <?php echo "male"; ?>
                        @else
                        <?php echo "female"; ?>
                        @endif

                     </td>
                     <td class="com-text">{{$detail->note}}</td>
                     <td>
                        @if($detail->active == 1)
                        <input type="checkbox" name="active" class="change-1" value="{{$detail->id_user}}" checked >
                         @else
                         <input type="checkbox" name="active" class="change-0" value="{{$detail->id_user}}"  >
                        @endif
                     </td>
                     <td> 
                       {{$detail->namerole}}
                     </td>
                     <td >
                        <div class="col-sm-12 ">
                     <button type="button" class="btn btn-primary remove-btn"  value="{{$detail->id_user}}" data-bs-toggle="modal" data-bs-target="#deleteModal">Remove</button>

                     <a href="{{url('user/edit/'.$detail->id)}}"><button class="btn btn-primary float-right" type="button"  >Edit</button></a>
                     
                     <button type="button" class="btn btn-primary update-btn"  value="{{$detail->id_user}}" data-bs-toggle="modal" data-bs-target="#editModal">Update</button>
                     <button type="button" class="btn btn-primary change-btn"  value="{{$detail->id_user}}" data-bs-toggle="modal" data-bs-target="#changeModal">Change</button>
                  </div>   
                     </td>
                     
                     
                  </tr>
                  @endforeach
               </tbody>
            </table>
           {{$data->render()}}
         </div>

         </div>
         
      
			
		</div>
	
	</div>
<script type="text/javascript" src="../public/js/jquery-3.6.0.js"></script>
<script type="text/javascript" src ="../public/js/remove-user.js"></script>
<script type="text/javascript" src ="../public/js/create-user.js"></script>
<script type="text/javascript" src ="../public/js/update-user.js"></script>
<script type="text/javascript" src ="../public/js/modal-update.js"></script>
<script type="text/javascript" src ="../public/js/change-password.js"></script>
<script type="text/javascript" src ="../public/js/change-active.js"></script>
<script type="text/javascript" src ="../public/js/check-export.js"></script>
<script type="text/javascript" src ="../public/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript" src ="../public/plugin/bootstrap-5.1.3/dist/js/bootstrap.js"></script>

</body>
</html>
