@extends('layouts.master')

@section('title')
    Admin | Settings
@endsection

@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ Session::get('message') }}
        </div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4> Error Creating new Department</h4>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
                    <tr>
                        <td>{{ $value->name }}</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editDepartment-{{ $value->id }}">Edit</a> | {!! Form::open(array('url' => 'admin/department/' . $value->id, 'class' => 'department-delete-form')) !!}
                            {{--<input type="hidden" formmethod="DELETE">--}}
                            {!! Form::hidden('_method', 'DELETE') !!}

                            {!! Form::submit('Delete', array('class' => 'department-delete-button')) !!}
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

                                                    {!! Form::model($departments, array('route' => array('admin.department.update',  $value->id  ), 'method' => 'PUT')) !!}

                                                        <div class="form-group">
                                                            <label for="name">Name</label>
                                                            <input type="text" name="name" id="name">
                                                        </div>


                                                        <button type="submit" class="btn btn-default">
                                                            <i class="fa fa-plus"></i> Edit Department
                                                        </button>
                                                    {!! Form::close() !!}

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


    </div>

@endsection
