<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="resources\css\app.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <title>Crud</title>
    <link rel="icon" href="/images/forms.png">
  </head>
  
  <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color:black;">
    <div class="container-fluid">
        <a class="navbar-brand text-light mr-auto" href="{{url('/home')}}">Crud Application</a>
        <div>
            <ul class="navbar-nav">

                @if(Session::has('LoggedUser'))
                <li class="nav-item">
                  <a class="nav-link text-light" href="{{ route('home') }}">Profile: <strong class="text-warning">{{$daata->name}}</strong></a>
              </li>
                <li class="nav-item">
                  <a class="nav-link text-light" href="{{ route('signout') }}">Logout</a>
              </li>
                @else
                <li class="nav-item">
                  <a class="nav-link text-light" href="{{ route('login') }}">Login</a>
              </li>
                <li class="nav-item">
                  <a class="nav-link text-light" href="{{ route('register-user') }}">Register</a>
              </li>
                @endif
              

            </ul>
        </div>
    </div>
</nav>

