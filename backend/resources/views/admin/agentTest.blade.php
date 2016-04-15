<html>
<head>
</head>
<body>
    @foreach($agents as $key => $agent)
        <p>{{$agent->name}}</p>
    @endforeach
</body>
</html>