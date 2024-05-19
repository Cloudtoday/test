<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
@if(isset($allInfo))
    <div class="table-responsiv">
        <table class="table table-hover table-border">
            <tr>
                <th>Name</th>
                <th>age</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            @foreach($allInfo->all() as $all)
            <tr>
                <td>{{$all->name}}</td>
                <td>{{$all->age}}</td>
                <td><a href="mailto:{{$all->email}}">{{$all->email}}</a></td>
                <td><a href="tel:{{$all->phone}}">{{$all->phone}}</a></td>
                <td><img src="{{$all->image}}" height="100px" width="100px"></td>
                <td>
                    <a href="{{url('/edit')}}{{$all->user_id}}">Edit</a>||         
                    <a href="{{url('/delete')}}{{$all->user_id}}">Delete</a>
                    <a href="{{url('/logout')}}">logout</a>
            </td>
            </tr>
            @endforeach
        </table> 
    </div>
    @endif
</body>
</html>