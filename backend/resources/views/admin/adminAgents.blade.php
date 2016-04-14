@extends('layouts.master')

@section('title')
    Admin | Agents
@endsection

@section('content')
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
                            <a href="#" data-toggle="modal" data-target="#adminEditAgent">Edit</a> | <a data-method='delete' data-token="{{ csrf_token() }}" href="{{route('deleteAgent', $agent->id)}}">Delete</a>
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
            $("a[data-method='delete']").click(function(){
                $.ajax({
                    url: this.getAttribute('href'),
                    type: 'post',
                    data: {_method: 'delete', _token :token}
                });
                return false;
            }); }
    </script>
@endsection