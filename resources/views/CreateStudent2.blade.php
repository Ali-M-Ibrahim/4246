<!DOCTYPE html>
<html>
<head>
    <title>Create Student</title>
    <link href="{{asset('css/form.css')}}" rel="stylesheet">
</head>
<body>
<div>
<form action="{{route('student.store')}}" method="post">
@csrf
    <label for="fname">First Name</label>
    <input value="{{old('fname')}}" type="text" id="fname" name="fname" placeholder="Your name..." >
    @error('fname')
        <p>{{$message}}</p>
    @enderror

    <label for="lname">Last Name</label>
    <input value="{{old('lname')}}" type="text" id="lname" name="lname" placeholder="Your last name..." >
    @error('lname')
    <p>{{$message}}</p>
    @enderror

    <label for="telephone">Telephone</label>
    <input value="{{old('telephone')}}" type="text" id="telephone" name="telephone" placeholder="Your telephone..." >
    @error('telephone')
    <p>{{$message}}</p>
    @enderror

    <input type="submit" value="Submit">

    <a href="{{route('student-list')}}">Back to list</a>

</form>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</body>
</html>

