@extends('layouts.master')

@section('title')
    Admin | Agents
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
            <h3 class="box-title"><b>System Support Agents</b></h3>
            <div class="pull-right">
                <button type="button" class="btn bg-blue btn-sm" data-toggle="modal" data-target="#addAgent">
                    <i class="fa fa-plus"> New Agent</i>
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
                @foreach($agents as $key => $agent)
                    <tr>
                        <td>{{$agent->name}}</td>
                        <td>{{$agent->email}}</td>
                        <td>{{$agent->email}}</td>
                        <td>{{$agent->email}}</td>
                        {{--<td>{{Team::find($agent->teamid)->name}}</td>--}}
                        {{--<td>{{$agent->team()}}</td>--}}
                        <td>5</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#adminEditAgent">Edit</a> | <a data-method='delete' data-token="{{ csrf_token() }}" href="{{route('deleteAgent', $agent->id)}} "  data-confirm="Are you sure you want to delete '{{ $agent->name }}' ?">Delete</a>
                        </td>
                    </tr>
                @endforeach

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
@endsection