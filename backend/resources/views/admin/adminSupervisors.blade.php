@extends('layouts.master')

@section('title')
    Admin | Supervisors
@endsection

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title"><b>System Support Supervisors</b></h3>
            <div class="pull-right">
                <button type="button" class="btn bg-blue btn-sm" data-toggle="modal" data-target="#addSupervisor">
                    <i class="fa fa-plus"></i>  New Supervisor
                </button> 
            </div>
        </div>
        <div class="box-body">
            <table id="systemSupervisors" class="table table-bordered table-striped">
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
                @foreach($supervisors as $key => $supervisor)
                    <tr>
                        <td>{{$supervisor->name}}</td>
                        <td>{{$supervisor->email}}</td>
                        <td>{{$supervisor->teamid}}</td>
                        <td>{{$supervisor->teamid}}</td>
                        <td></td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editSupervisors">Edit</a> | <a data-method='delete' href="{{route('deleteSupervisor', $supervisor->id)}}">Delete</a>


                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    @include('supervisor.addSupervisorModal')
    @include('supervisor.editSupervisorModal')

@endsection

@section('scripts')

    {{ HTML::script('plugins/datatables/jquery.dataTables.min.js') }}
    {{ HTML::script('plugins/datatables/dataTables.bootstrap.min.js') }}
    <!-- SlimScroll -->
    {{ HTML::script('plugins/slimScroll/jquery.slimscroll.min.js') }}
    <!-- FastClick -->
    {{ HTML::script('plugins/fastclick/fastclick.min.js') }}
    <!-- page script -->
    <script>
        $(function () {
            $("#systemSupervisors").DataTable();
        });
    </script>
    <script>
        window.onload = function () {
            $("a[data-method='delete']").click(function(){
                $.ajax({
                    url: this.getAttribute('href'),
                    type: 'DELETE'
                });
                return false;
            }); }
    </script>
@endsection