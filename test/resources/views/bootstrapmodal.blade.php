<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../public/plugin/bootstrap-5.1.3/dist/css/bootstrap.css" >
	
	<title>bootstrap modal</title>
</head>
<body>
	
	<div class="container mt-3"> 
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal">
    Open modal
  </button>
</div>

<!-- The Modal -->
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
         <h1>Delete Account</h1>
          <p>Are you sure you want to delete your account?</p>
      </div>


      <!-- Modal footer -->
      <div class="modal-footer">
      	<button class="btn btn-primary float-right"  type="button" id="btn_delete" >Save</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
	<script type="text/javascript" src="../public/js/jquery-3.6.0.js"></script>
	<script type="text/javascript" src ="../public/plugin/bootstrap-5.1.3/dist/js/bootstrap.js"></script>
</body>
</html>