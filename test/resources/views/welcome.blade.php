<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        
        <link rel="stylesheet" type="text/css" href="./public/css/bootstrap.css" >

        <!-- Fonts -->
        

        <!-- Styles --></style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body >
       <div class="container">
        
        <div class ="row">
            <div class ="col-12 center">
                <nav class="navbar navbar-expand-sm bg-dark ">
         <!-- Links -->
         <ul class="navbar-nav ">
            <li class="nav-item active">
               <a class="nav-link"  href="{{url('user/list')}}">show list</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#"></a>
            </li>
         </ul>
      </nav>
            <div>
               <a href="{{('./logout')}}" >logout</a>
            </div>
        
        <script type="text/javascript" src="./public/js/jquery-3.6.0.js"></script>
        
    </body>
</html>
