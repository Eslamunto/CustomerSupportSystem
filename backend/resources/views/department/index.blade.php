{{--<!-- app/views/nerds/index.blade.php -->--}}

{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
    {{--<title>Look! I'm CRUDding</title>--}}
    {{--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="container">--}}

    {{--<h1>All the Departments</h1>--}}


    {{--<!-- will be used to show any messages -->--}}
    {{--@if (Session::has('message'))--}}
    {{--<div class="alert alert-info">{{ Session::get('message') }}</div>--}}
    {{--@endif--}}

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
    {{--@foreach($departments as $key => $value)--}}
        {{--<ul>--}}
            {{--<li>{{ $value->id }}</li>--}}
            {{--<li>{{ $value->name }}</li>--}}

            {{--{!! Form::open(array('url' => 'department/' . $value->id)) !!}--}}
            {{--//<input type="hidden" formmethod="DELETE">--}}
            {{--{!! Form::hidden('_method', 'DELETE') !!}--}}

            {{--{!! Form::submit('Delete Me!', array('class' => 'btn btn-warning')) !!}--}}
            {{--{!! Form::close() !!}--}}


            {{--<td>{{ $value->nerd_level }}</td>--}}

            {{--<!-- we will also add show, edit, and delete buttons -->--}}
            {{--<td>--}}

            {{--<!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->--}}
            {{--<!-- we will add this later since its a little more complicated than the other two buttons -->--}}

            {{--<!-- show the nerd (uses the show method found at GET /nerds/{id} -->--}}
            {{--<a class="btn btn-small btn-success" href="{{ URL::to('nerds/' . $value->id) }}">Show this Nerd</a>--}}

            {{--<!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->--}}
            {{--<a class="btn btn-small btn-info" href="{{ URL::to('nerds/' . $value->id . '/edit') }}">Edit this Nerd</a>--}}

            {{--</td>--}}
        {{--</ul>--}}
    {{--@endforeach--}}
    {{--</tbody>--}}
    {{--</table>--}}

{{--</div>--}}
{{--</body>--}}
{{--</html>--}}





@extends('layouts.master')

@section('title')
    Admin | Settings
@endsection

@section('content')
    <div class="settings">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><b>Departments</b></h3>
                <div class="pull-right">
                    <button type="button" class="btn bg-blue btn-sm" data-toggle="modal" data-target="#addDepartment">
                        <i class="fa fa-plus"></i>  New Department
                    </button>
                </div>
            </div>
            <div class="box-body">
                <table id="systemCustomers" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($departments as $key => $value)
                            <li>{{ $value->id }}</li>





                    <tr>
                        <td>{{ $value->name }}</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editDepartment-{{ $value->id }}">Edit</a> | {!! Form::open(array('url' => 'department/' . $value->id)) !!}
                            {{--<input type="hidden" formmethod="DELETE">--}}
                            {!! Form::hidden('_method', 'DELETE') !!}

                            {!! Form::submit('Delete', array('class' => 'btn')) !!}
                            {!! Form::close() !!}

                            <!-- Edit customer modal -->
                            <div class="modal fade" id="editDepartment-{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-blue">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title">Edit Department</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="box box-primary">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Department Information</h3>
                                                </div><!-- /.box-header -->
                                                <div class="box-body">

                                                    {!! Form::model($departments, array('route' => array('department.update',  $value->id  ), 'method' => 'PUT')) !!}

                                                        <div class="form-group">
                                                            <label for="name">Name</label>
                                                            <input type="text" name="name" id="name">
                                                        </div>


                                                        <button type="submit" class="btn btn-default">
                                                            <i class="fa fa-plus"></i> Edit Task
                                                        </button>
                                                    {!! Form::close() !!}



                                                    {{--<!-- form start -->--}}
                                                    {{--<form role="form">--}}
                                                        {{--<div class="form-group">--}}
                                                            {{--<label for="CustomerName">Department Name</label>--}}
                                                            {{--<input type="text" class="form-control" id="name" placeholder="Customer Name">--}}
                                                        {{--</div>--}}
                                                        {{--<button type="submit" class="btn btn-primary bg-blue pull-right">--}}
                                                            {{--<i class="fa fa-edit"></i> Save Changes--}}
                                                        {{--</button>--}}
                                                    {{--</form>--}}
                                                </div><!-- /.box-body -->
                                            </div><!-- /.box -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>


                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>

        @include('department.addDepartmentModal')
        {{--@include('department.editDepartmentModal')--}}


        @section('scripts')
            <!-- DataTables -->
            {{ HTML::script('plugins/datatables/jquery.dataTables.min.js') }}
            {{ HTML::script('plugins/datatables/dataTables.bootstrap.min.js') }}
            <!-- SlimScroll -->
            {{ HTML::script('plugins/slimScroll/jquery.slimscroll.min.js') }}
            <!-- FastClick -->
            {{ HTML::script('plugins/fastclick/fastclick.min.js') }}
            <!-- page script -->
            <script>
                $(function () {
                    $("#systemCustomers").DataTable();
                });
            </script>
        @endsection

        <h1>All the Departments</h1>




            </ul>




            <!-- Ticket Priority -->
            {{--<div class="box box-solid">--}}
            {{--<div class="box-header with-border">--}}
            {{--<h4 class="box-title">Priority</h4>--}}
            {{--</div>--}}
            {{--<div class="box-body">--}}
            {{--<!-- the events -->--}}
            {{--<div id="external-events">--}}
            {{--<div class="external-event bg-green ui-draggable ui-draggable-handle" style="position: relative;">--}}
            {{--One--}}
            {{--</div>--}}
            {{--<div class="external-event bg-yellow ui-draggable ui-draggable-handle" style="position: relative;">--}}
            {{--Two--}}
            {{--</div>--}}
            {{--<div class="external-event bg-aqua ui-draggable ui-draggable-handle" style="position: relative;">--}}
            {{--Three--}}
            {{--</div>--}}
            {{--<div class="external-event bg-light-blue ui-draggable ui-draggable-handle" style="position: relative;">--}}
            {{--Four--}}
            {{--</div>--}}
            {{--<div class="external-event bg-red ui-draggable ui-draggable-handle" style="position: relative;">--}}
            {{--Paid--}}
            {{--</div>--}}
            {{--<div class="input-group">--}}
            {{--<input id="new-event" type="text" class="form-control" placeholder="Create New Priority">--}}
            {{--<div class="input-group-btn">--}}
            {{--<button id="add-new-event" type="button" class="btn bg-blue btn-flat">Add</button>--}}
            {{--</div><!-- /btn-group -->--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div><!-- /.box-body -->--}}
            {{--</div><!-- /. box -->--}}
    </div>

@endsection