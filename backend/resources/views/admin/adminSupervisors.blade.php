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
            <h3 class="box-title"><b>System Support Supervisors</b></h3>
            <div class="pull-right">
                <button type="button" class="btn bg-blue btn-sm" data-toggle="modal" data-target="#addSupervisor">
                    <i class="fa fa-plus"></i> New Supervisor
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
        var department = "{{url('admin/department/')}}";
        var edit = "{{url('/admin/edit/supervisor/')}}";
        var show = "{{url('admin/show/supervisor')}}";
    </script>
    {{ HTML::script('dist/js/adminSupervisors.js') }}
@endsection