<h1>Edit {{ $department->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{--{{ HTML::ul($errors->all()) }}--}}



{!! Form::model($department, array('route' => array('department.update', $department->id), 'method' => 'PUT')) !!}

<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name">
</div>


<button type="submit" class="btn btn-default">
    <i class="fa fa-plus"></i> Edit Task
</button>
{!! Form::close() !!}
