<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>

<h2>HTML Table</h2>
<a href="{{route('student-create')}}">+ Student</a>
<table>
    <tr>
        <th>First name</th>
        <th>Last name</th>
        <th>Telephone</th>
        <th>Actions</th>
    </tr>

    @foreach($data as $student)
        <tr>
            <td>{{$student->fname}}</td>
            <td>{{$student->lname}}</td>
            <td>{{$student->telephone}}</td>
            <td>
                <a href="{{route('student-view',['id'=>$student->id])}}">View</a>
                <a href="{{route('student-edit',['id'=>$student->id])}}">Edit</a>
                <a href="{{route('student-destroy',['id'=>$student->id])}}">Delete</a>
                <form action="{{route('student-delete',['id'=>$student->id])}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="delete" />
                </form>
            </td>
        </tr>

    @endforeach

</table>


</body>
</html>

