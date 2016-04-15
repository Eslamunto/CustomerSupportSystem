<!-- app/views/nerds/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <h1>All the Departments</h1>


    <!-- will be used to show any messages -->
    @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    {{--<table class="table table-striped table-bordered">--}}
    {{--<thead>--}}
    {{--<tr>--}}
    {{--<td>ID</td>--}}
    {{--<td>Name</td>--}}
    {{--<td>Email</td>--}}
    {{--<td>Nerd Level</td>--}}
    {{--<td>Actions</td>--}}
    {{--</tr>--}}
    {{--</thead>--}}
    {{--<tbody>--}}
    @foreach($departments as $key => $value)
        <ul>
            <li>{{ $value->id }}</li>
            <li>{{ $value->name }}</li>

            {!! Form::open(array('url' => 'admin/department/' . $value->id)) !!}
            {{--//<input type="hidden" formmethod="DELETE">--}}
            {!! Form::hidden('_method', 'DELETE') !!}

            {!! Form::submit('Delete Me!', array('class' => 'btn btn-warning')) !!}
            {!! Form::close() !!}


            {{--<td>{{ $value->nerd_level }}</td>--}}

            <!-- we will also add show, edit, and delete buttons -->
            {{--<td>--}}

            <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
            <!-- we will add this later since its a little more complicated than the other two buttons -->

            <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
            {{--<a class="btn btn-small btn-success" href="{{ URL::to('nerds/' . $value->id) }}">Show this Nerd</a>--}}

            {{--<!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->--}}
            {{--<a class="btn btn-small btn-info" href="{{ URL::to('nerds/' . $value->id . '/edit') }}">Edit this Nerd</a>--}}

            {{--</td>--}}
        </ul>
    @endforeach
    {{--</tbody>--}}
    {{--</table>--}}

</div>
</body>
</html>