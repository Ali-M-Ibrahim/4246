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

<h2>Student Information are:</h2>
<p>The first name is: {{$data->fname}}</p>
<p>The last name is: {{$data->lname}}</p>
<p>The telephone is: {{$data->telephone}}</p>

</body>
</html>

