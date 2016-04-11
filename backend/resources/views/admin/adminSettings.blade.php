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
            <h4> Error Creating new Ticket status </h4>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="settings">
        <div class="col-md-12">
            <!-- Twitter -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">Twitter Account</h4>
                </div>
                <div class="box-body">
                    <!-- the events -->
                    <div id="external-events">
                        <div class="input-group">
                            <input id="new-event" type="text" class="form-control" placeholder="Update Twitter Token">
                            <div class="input-group-btn">
                                <button id="add-new-event" type="button" class="btn bg-blue btn-flat">Update</button>
                            </div><!-- /btn-group -->
                        </div>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /. box -->
        </div>

        <div class="clearfix">
            <div class="col-md-6">
                <!-- Theme -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Change Application Theme</h3>
                    </div>
                    <div class="box-body">
                        <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                            <ul class="fc-color-picker" id="color-chooser">
                                <li><a class="text-aqua" href="#"><i class="fa fa-square"></i></a></li>
                                <li><a class="text-blue" href="#"><i class="fa fa-square"></i></a></li>
                                <li><a class="text-light-blue" href="#"><i class="fa fa-square"></i></a></li>
                                <li><a class="text-teal" href="#"><i class="fa fa-square"></i></a></li>
                                <li><a class="text-yellow" href="#"><i class="fa fa-square"></i></a></li>
                                <li><a class="text-orange" href="#"><i class="fa fa-square"></i></a></li>
                                <li><a class="text-green" href="#"><i class="fa fa-square"></i></a></li>
                                <li><a class="text-lime" href="#"><i class="fa fa-square"></i></a></li>
                                <li><a class="text-red" href="#"><i class="fa fa-square"></i></a></li>
                                <li><a class="text-purple" href="#"><i class="fa fa-square"></i></a></li>
                                <li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i></a></li>
                                <li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
                                <li><a class="text-navy" href="#"><i class="fa fa-square"></i></a></li>
                            </ul>
                        </div><!-- /btn-group -->
                        <div class="input-group">
                            <div class="input-group-btn">
                                <button id="add-new-event" type="button" class="btn bg-blue btn-flat">Change</button>
                            </div><!-- /btn-group -->
                        </div><!-- /input-group -->
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Logo -->
                <div class="box box-primary" style="height: 138px;">
                    <div class="box-header with-border">
                        <h4 class="box-title"><b>Change Website Logo</b></h4>
                    </div>
                    <div class="box-body">
                        <!-- the events -->
                        <br>
                        <div id="external-events">
                            <div class="input-group">
                                <input id="new-event" type="text" class="form-control" placeholder="Update Website Logo">
                                <div class="input-group-btn">
                                    <button id="add-new-event" type="button" class="btn bg-blue btn-flat">Update</button>
                                </div><!-- /btn-group -->
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /. box -->
            </div>
        </div>
        
        <!-- Ticket Status -->
        <?php $statuses = \App\Status::all() ?>
        <div class="clearfix">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title">Ticket Status</h4>
                    </div>
                    <div class="box-body">
                        <!-- the events -->
                        <div id="external-events">
                            <table class="table table-striped">
                                <thead>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php $count = 1 ?>
                                    @foreach ($statuses as $status)
                                        <tr>
                                            <td> {{ $count }} </td>
                                            <td> {{ $status->name }} </td>
                                            <td>
                                                <div class="clearfix">
                                                    <div class="col-md-1">
                                                        <button class="btn btn-xs bg-blue update-status-button" data-update-link="{{ Route('updateStatus', $status->id) }}" data-toggle="modal" data-target="#editStatus"><i class="fa fa-edit"></i>
                                                        </button>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <form action="{{ Route('deleteStatus', $status->id) }}" method="POST">
                                                            {!! csrf_field() !!}
                                                            {!! method_field('delete') !!}
                                                            <div class="input-group">
                                                                <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash"></i></button> 
                                                            </div>  
                                                        </form>
                                                    </div>
                                                    <div class="col-md-6"></div> 
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $count++ ?>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                            <form action="{{ Route('newStatus') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="input-group">
                                    <input id="new-event" type="text" class="form-control" placeholder="Create New Status" name="name">
                                    <div class="input-group-btn">
                                        <button id="add-new-event" type="submit" class="btn bg-blue btn-flat">Add</button>
                                    </div><!-- /btn-group -->
                                </div>
                                <br>
                            </form>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /. box -->
            </div>

            <!-- Ticket Priority -->
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title">Priority</h4>
                    </div>
                    <div class="box-body">
                        <!-- the events -->
                        <div id="external-events">
                            <div class="external-event bg-green ui-draggable ui-draggable-handle" style="position: relative;">
                                One
                            </div>
                            <div class="external-event bg-yellow ui-draggable ui-draggable-handle" style="position: relative;">
                                Two
                            </div>
                            <div class="external-event bg-aqua ui-draggable ui-draggable-handle" style="position: relative;">
                                Three
                            </div>
                            <div class="external-event bg-light-blue ui-draggable ui-draggable-handle" style="position: relative;">
                                Four
                            </div>
                            <div class="external-event bg-red ui-draggable ui-draggable-handle" style="position: relative;">
                                Paid
                            </div>
                            <div class="input-group">
                                <input id="new-event" type="text" class="form-control" placeholder="Create New Priority">
                                <div class="input-group-btn">
                                    <button id="add-new-event" type="button" class="btn bg-blue btn-flat">Add</button>
                                </div><!-- /btn-group -->
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /. box -->
            </div>
        </div>
    </div>
    
    @include('status.editTicketStatus')

@endsection

@section('scripts')
    <script type="text/javascript">
        $('.update-status-button').on('click', function () {
            $('#update-status-form').attr('action', $(this).data('update-link'));
        });
    </script>
@endsection
