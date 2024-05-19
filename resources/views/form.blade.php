<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <form method="post" action="{{url('/submit')}}" enctype="multipart/form-data" >
        @csrf 
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
                @endforeach
            </ul>
        </div>
        @endif
        <header class="modal-header"><h4>Form</h4></header>
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>Age:</label>
            <input type="text" name="age" class="form-control">
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label>Password:</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label>Phone:</label>
            <input type="number" name="phone" class="form-control">
        </div>
        <div class="form-group">
            <label>Image:</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <button class="btn btn-md btn-primary">submit</button>
        </div>
    </form>
    <!-- @if(isset($userInfo))
    <div class="table-responsiv">
        <table class="table table-hover table-border">
            <tr>
                <th>Name</th>
                <th>age</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Image</th>
            </tr>
            <tr>
                <td>{{$userInfo['name']}}</td>
                <td>{{$userInfo['age']}}</td>
                <td><a href="mailto:{{$userInfo['email']}}">{{$userInfo['email']}}</a></td>
                <td><a href="tel:{{$userInfo['phone']}}">{{$userInfo['phone']}}</a></td>
                <td><img src="{{$userInfo['image']}}" height="100px" width="100px"></td>
            </tr>
        </table> 
    </div>
    @endif -->
</div>
</body>
</html>



