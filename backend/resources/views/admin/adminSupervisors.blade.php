@extends('layouts.master')

@section('title')
    Admin | Supervisors
@endsection

@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ Session::get('message') }}
        </div>
    @endif
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title"><b>System Support Supervisors</b></h3>
            <div class="pull-right">
                <button type="button" class="btn bg-blue btn-sm" data-toggle="modal" data-target="#addSupervisor">
                    <i class="fa fa-plus"> New Supervisor</i>
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
                @foreach($supervisors as $key => $supervisors)
                    <tr>
                        <td>{{$supervisors->name}}</td>
                        <td>{{$supervisors->email}}</td>
                        <td>{{App\Department::find(App\Team::find($supervisors->teamId)->departmentId)->name}}</td>
                        <td>{{App\Team::find($supervisors->teamId)->name}}</td>
                        <td>{{count(App\UserTicket::where('userId','=',$supervisors->id)->get())}}</td>
                        <script>
                            var supervisorId = 0 ;
                            function setSupervisorId(id){
                                agentId = id;
                                route = '../show/supervisor/' + id;

                                $.getJSON(route, function(supervisor){
                                    $('#editName').val(supervisor.name);
                                    $('#editEmail').val(supervisor.email);
                                });
                                $('#editForm').attr("action", "../edit/supervisor/"+agentId);
                            }
                        </script>
                        <td>
                            <a href="#" onclick="setSupervisorId({{$supervisors->id}})" data-toggle="modal" data-target="#adminEditSupervisor">Edit</a> | <a data-method='delete' data-token="{{ csrf_token() }}" href="{{route('deleteSupervisor', $supervisors->id)}} "  data-confirm="Are you sure you want to delete '{{ $supervisors->name }}' ?">Delete</a>
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
            $("#systemSupervisors").DataTable();
        });
    </script>
    <script>
        window.onload = function () {
            $('[data-method]').click(function(e) {
                e.preventDefault();
                // If the user confirm the delete
                if (confirm($(this).data('confirm'))) {
                    // Get the route URL
                    var url = $(this).prop('href');
                    // Get the token
                    var token = $(this).data('token');
                    //Get the method type
                    var method = $(this).data('method');
                    // Create a form element
                    var $form = $('<form/>', {action: url, method: 'post'});
                    // Add the DELETE hidden input method
                    var $inputMethod = $('<input/>', {type: 'hidden', name: '_method', value: method});
                    // Add the token hidden input
                    var $inputToken = $('<input/>', {type: 'hidden', name: '_token', value: token});
                    // Append the inputs to the form, hide the form, append the form to the <body>, SUBMIT !
                    $form.append($inputMethod, $inputToken).hide().appendTo('body').submit();
                }
            });

            $('#teams').hide();
            $('#editTeams').hide();
            $('#editDepartments').change(function () {
                $('#teamsOptionsEdit').empty();
                var id = $('#editDepartments').val();
                var route = '../../admin/department/' + id + '/teams';
                $.getJSON(route, function (json) {
                    $.each(json, function(i, field){
                        $('#teamsOptionsEdit').append("<option value='"+ field.id +"'>" + field.name + "</option>");
                    });
                    $('#editTeams').show();
                });

            });
            $('#departments').change(function () {
                $('#teamsOptions').empty();
                var id = $('#departments').val();
                var route = '../../admin/department/' + id + '/teams';
                $.getJSON(route, function (json) {
                    $.each(json, function(i, field){
                        $('#teamsOptions').append("<option value='"+ field.id +"'>" + field.name + "</option>");
                    });
                    $('#teams').show();
                });

            });

        }
    </script>
