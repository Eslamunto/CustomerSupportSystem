@extends('layouts.master')

@section('title')
    Admin | Agents
@endsection

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">System Support Agents</h3>
            <div class="pull-right">
                <button type="button" class="btn bg-blue btn-sm" data-toggle="modal" data-target="#addAgent">
                    <i class="fa fa-plus"></i>  New Agent
                </button> 
            </div>
        </div>
        <div class="box-body">
            <table id="systemAgents" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Departement</th>
                        <th>Team</th>
                        <th>Opened Ticket</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Agent Name</td>
                        <td>customer@email.com</td>
                        <td>Name</td>
                        <td>Name</td>
                        <td>5</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editAgent">Edit</a> | <a href="#">Delete</a> 
                        </td>
                    </tr>
                    <tr>
                        <td>Agent Name</td>
                        <td>customer@email.com</td>
                        <td>Name</td>
                        <td>Name</td>
                        <td>2</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editAgent">Edit</a> | <a href="#">Delete</a> 
                        </td>
                    </tr>
                    <tr>
                        <td>Agent Name</td>
                        <td>customer@email.com</td>
                        <td>Name</td>
                        <td>Name</td>
                        <td>1</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editAgent">Edit</a> | <a href="#">Delete</a> 
                        </td>
                    </tr>
                    <tr>
                        <td>Agent Name</td>
                        <td>customer@email.com</td>
                        <td>Name</td>
                        <td>Name</td>
                        <td>3</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editAgent">Edit</a> | <a href="#">Delete</a> 
                        </td>
                    </tr>
                    <tr>
                        <td>Agent Name</td>
                        <td>customer@email.com</td>
                        <td>Name</td>
                        <td>Name</td>
                        <td>4</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editAgent">Edit</a> | <a href="#">Delete</a> 
                        </td>
                    </tr>
                    <tr>
                        <td>Agent Name</td>
                        <td>customer@email.com</td>
                        <td>Name</td>
                        <td>Name</td>
                        <td>4</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editAgent">Edit</a> | <a href="#">Delete</a> 
                        </td>
                    </tr>
                    <tr>
                        <td>Agent Name</td>
                        <td>customer@email.com</td>
                        <td>Name</td>
                        <td>Name</td>
                        <td>2</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editAgent">Edit</a> | <a href="#">Delete</a> 
                        </td>
                    </tr>
                    <tr>
                        <td>Agent Name</td>
                        <td>customer@email.com</td>
                        <td>Name</td>
                        <td>Name</td>
                        <td>4</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editAgent">Edit</a> | <a href="#">Delete</a> 
                        </td>
                    </tr>
                    <tr>
                        <td>Agent Name</td>
                        <td>customer@email.com</td>
                        <td>Name</td>
                        <td>Name</td>
                        <td>2</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editAgent">Edit</a> | <a href="#">Delete</a> 
                        </td>
                    </tr>
                    <tr>
                        <td>Agent Name</td>
                        <td>customer@email.com</td>
                        <td>Name</td>
                        <td>Name</td>
                        <td>5</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editAgent">Edit</a> | <a href="#">Delete</a> 
                        </td>
                    </tr>
                    <tr>
                        <td>Agent Name</td>
                        <td>customer@email.com</td>
                        <td>Name</td>
                        <td>Name</td>
                        <td>1</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editAgent">Edit</a> | <a href="#">Delete</a> 
                        </td>
                    </tr>
                    <tr>
                        <td>Agent Name</td>
                        <td>customer@email.com</td>
                        <td>Name</td>
                        <td>Name</td>
                        <td>1</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editAgent">Edit</a> | <a href="#">Delete</a> 
                        </td>
                    </tr>
                    <tr>
                        <td>Agent Name</td>
                        <td>customer@email.com</td>
                        <td>Name</td>
                        <td>Name</td>
                        <td>5</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editAgent">Edit</a> | <a href="#">Delete</a> 
                        </td>
                    </tr>
                    <tr>
                        <td>Agent Name</td>
                        <td>customer@email.com</td>
                        <td>Name</td>
                        <td>Name</td>
                        <td>3</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editAgent">Edit</a> | <a href="#">Delete</a> 
                        </td>
                    </tr>
                    <tr>
                        <td>Agent Name</td>
                        <td>customer@email.com</td>
                        <td>Name</td>
                        <td>Name</td>
                        <td>2</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editAgent">Edit</a> | <a href="#">Delete</a> 
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    @include('agent.addAgentModal')
    @include('agent.editAgentModal')

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
            $("#systemAgents").DataTable();
        });
    </script> 
@endsection