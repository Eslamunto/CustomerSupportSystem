@extends('layouts.master')

@section('title')
    Admin | Departments
@endsection

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title"><b>System Departments</b></h3>
            <div class="pull-right">
                <button type="button" class="btn bg-blue btn-sm" data-toggle="modal" data-target="#addDepartment">
                    <i class="fa fa-plus"></i>  New Department
                </button> 
            </div>
        </div>

        <div class="box-body">
            <table id="systemDepartments" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Teams</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Department Name</td>
                        <td>5</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editSupervisor">Edit</a> | <a href="#">Delete</a> 
                        </td>
                    </tr>
                    <tr>
                        <td>Department Name</td>
                        <td>2</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editSupervisor">Edit</a> | <a href="#">Delete</a> 
                        </td>
                    </tr>
                    <tr>
                        <td>Department Name</td>
                        <td>1</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editSupervisor">Edit</a> | <a href="#">Delete</a> 
                        </td>
                    </tr>
                    <tr>
                        <td>Department Name</td>
                        <td>3</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editSupervisor">Edit</a> | <a href="#">Delete</a> 
                        </td>
                    </tr>
                    <tr>
                        <td>Department Name</td>
                        <td>4</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editSupervisor">Edit</a> | <a href="#">Delete</a> 
                        </td>
                    </tr>
                    <tr>
                        <td>Department Name</td>
                        <td>4</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editSupervisor">Edit</a> | <a href="#">Delete</a> 
                        </td>
                    </tr>
                    <tr>
                        <td>Department Name</td>
                        <td>2</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editSupervisor">Edit</a> | <a href="#">Delete</a> 
                        </td>
                    </tr>
                    <tr>
                        <td>Department Name</td>
                        <td>4</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editSupervisor">Edit</a> | <a href="#">Delete</a> 
                        </td>
                    </tr>
                    <tr>
                        <td>Department Name</td>
                        <td>2</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editSupervisor">Edit</a> | <a href="#">Delete</a> 
                        </td>
                    </tr>
                    <tr>
                        <td>Department Name</td>
                        <td>5</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editSupervisor">Edit</a> | <a href="#">Delete</a> 
                        </td>
                    </tr>
                    <tr>
                        <td>Department Name</td>
                        <td>1</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editSupervisor">Edit</a> | <a href="#">Delete</a> 
                        </td>
                    </tr>
                    <tr>
                        <td>Department Name</td>
                        <td>1</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editSupervisor">Edit</a> | <a href="#">Delete</a> 
                        </td>
                    </tr>
                    <tr>
                        <td>Department Name</td>
                        <td>5</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editSupervisor">Edit</a> | <a href="#">Delete</a> 
                        </td>
                    </tr>
                    <tr>
                        <td>Department Name</td>
                        <td>3</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editSupervisor">Edit</a> | <a href="#">Delete</a> 
                        </td>
                    </tr>
                    <tr>
                        <td>Department Name</td>
                        <td>2</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editSupervisor">Edit</a> | <a href="#">Delete</a> 
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    @include('department.addDepartmentModal')
    @include('department.editDepartmentModal')

@endsection

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
            $("#systemDepartments").DataTable();
        });
    </script> 
@endsection