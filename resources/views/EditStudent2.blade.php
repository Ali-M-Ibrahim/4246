<!DOCTYPE html>
<html>
<head>
    <title>Create Student</title>
    <link href="{{asset('css/form.css')}}" rel="stylesheet">
</head>
<body>
<div>
<form action="{{route('student.update',['student'=>$data->id])}}" method="post">
    @csrf
    @method('put')
    <label for="fname">First Name</label>
    <input type="text" value="{{$data->fname}}" id="fname" name="fname" placeholder="Your name...">

    <label for="lname">Last Name</label>
    <input type="text" value="{{$data->lname}}" id="lname" name="lname" placeholder="Your last name...">

    <label for="telephone">Telephone</label>
    <input type="text"  value="{{$data->telephone}}"  id="telephone" name="telephone" placeholder="Your telephone...">

    <input type="submit" value="Submit">

    <a href="{{route('student-list')}}">Back to list</a>

</form>
</div>
</body>
</html>

