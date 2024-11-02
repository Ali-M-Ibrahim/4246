<!DOCTYPE html>
<html>

<head>
    <title>TEST</title>
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
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

@yield('header')

@yield('content')


@yield('footer')

<script src="js/app.js"></script>
</body>
</html>

