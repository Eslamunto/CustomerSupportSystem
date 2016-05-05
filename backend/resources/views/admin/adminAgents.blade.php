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
    @if($errors->has())
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title"><b>System Support Agents</b></h3>
            <div class="pull-right">
                <button type="button" class="btn bg-blue btn-sm" data-toggle="modal" data-target="#addAgent">
                    <i class="fa fa-plus"></i> New Agent
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
                        <td>{{App\Department::find(App\Team::find($agent->teamId)->departmentId)->name}}</td>
                        <td>{{App\Team::find($agent->teamId)->name}}</td>
                        <td>{{count(App\UserTicket::where('userId','=',$agent->id)->get())}}</td>
                        <script>

                        </script>
                        <td>
                            <a href="#" onclick="setAgentId({{$agent->id}})" data-toggle="modal" data-target="#adminEditAgent">Edit</a> | <a data-method='delete' data-token="{{ csrf_token() }}" href="{{route('deleteAgent', $agent->id)}} "  data-confirm="Are you sure you want to delete '{{ $agent->name }}' ?">Delete</a>
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
        var department = "{{url('admin/department/')}}";
        var edit = "{{url('/admin/edit/agent/')}}";
        var show = "{{url('admin/show/agent')}}";
    </script>
    {{ HTML::script('dist/js/adminAgents.js') }}
@endsection