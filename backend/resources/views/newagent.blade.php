
<html>
<head>
</head>
<body>
{{ Form::open(array('route' => 'createAgent')) }}

    @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif
    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password', Input::old('password'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('teamid', 'Team') }}
        {{ Form::select('teamid', array('0' => 'team1', '1' => 'team2', '2' => 'team3'), Input::old('teamid'), array('class' => 'form-control')) }}
    </div>

{{ Form::submit('Create the Nerd!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
{{ Form::open(array('url' => 'admin/delete/agent/9', 'class' => 'pull-right', 'method' => 'delete')) }}
{{ Form::hidden('_method', 'DELETE') }}
{{ Form::submit('Delete this Nerd', array('class' => 'btn btn-warning')) }}
{{ Form::close() }}
</body>
</html>