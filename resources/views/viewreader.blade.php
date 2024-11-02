<!DOCTYPE html>
<html>

<body>
<h1>Reader data</h1>
<p>The id is: {{$data->id}}</p>
<p>The name is: {{$data->name}}</p>
<p>The balance is: {{$data->balance}}</p>
<p>is it editor?: @if($data->is_editor) Yes @else No @endif    </p>
</body>
</html>

