<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        @if(session('message'))
        {{session('message')}}
        @endif
    <form method="post" action="{{url('/login_user')}}">
        @csrf 
        <header class="modal-header"><h4>Sign Up</h4></header>
        <div class="form-group">
            <label>User Name:</label>
            <input type="text" name="uname" class="form-control" placeholder="Enter Email || phone">
        </div>
        <div class="form-group">
            <label>Password:</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <button class="btn btn-md btn-primary">Login</button>
        </div>
        <div><a href="{{url('/form')}}">New Register</a></div>
    </form>
</body>
</html>