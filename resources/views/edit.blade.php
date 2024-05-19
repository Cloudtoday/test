<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        @if(isset($editInfo))
    <form method="post" action="{{url('/update')}}" enctype="multipart/form-data" >
        @csrf 
        <header class="modal-header"><h4>Edit</h4></header>
        <input type="hidden" name="hid" value="{{$editInfo->user_id}}">
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" value="{{$editInfo->name}}">
        </div>
        <div class="form-group">
            <label>Age:</label>
            <input type="text" name="age" class="form-control" value="{{$editInfo->age}}">
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="{{$editInfo->email}}">
        </div>
        <div class="form-group">
            <label>Phone:</label>
            <input type="number" name="phone" class="form-control" value="{{$editInfo->phone}}">
        </div>
        <div class="form-group">
            <label>Image:</label>
            <input type="file" name="image" class="form-control"><img src="{{$editInfo->image}}" height="100px" width="100px">
        </div>
        <div class="form-group">
            <button class="btn btn-md btn-primary">submit</button>
        </div>
        </form>
    @endif
   </body>
</html>