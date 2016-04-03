@extends('layouts.master')

@section('title')
    Admin | Settings
@endsection

@section('content')
    <div class="settings">
        <!-- Theme -->
        <div class="box box-solid">
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
        <!-- Twitter -->
        <div class="box box-solid">
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
        <!-- Logo -->
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4 class="box-title">Change Website Logo</h4>
            </div>
            <div class="box-body">
                <!-- the events -->
                <div id="external-events">
                    <div class="input-group">
                        <input id="new-event" type="text" class="form-control" placeholder="Update Website Logo">
                        <div class="input-group-btn">
                            <button id="add-new-event" type="button" class="btn btn-primary btn-flat">Update</button>
                        </div><!-- /btn-group -->
                    </div>
                </div>
            </div><!-- /.box-body -->
        </div><!-- /. box -->

        <!-- Ticket Status -->
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4 class="box-title">Status</h4>
            </div>
            <div class="box-body">
                <!-- the events -->
                <div id="external-events">
                    <div class="external-event bg-green ui-draggable ui-draggable-handle" style="position: relative;">
                        Open
                    </div>
                    <div class="external-event bg-yellow ui-draggable ui-draggable-handle" style="position: relative;">
                        In Progress
                    </div>
                    <div class="external-event bg-aqua ui-draggable ui-draggable-handle" style="position: relative;">
                        Done
                    </div>
                    <div class="external-event bg-light-blue ui-draggable ui-draggable-handle" style="position: relative;">
                        Tamatem
                    </div>
                    <div class="external-event bg-red ui-draggable ui-draggable-handle" style="position: relative;">
                        Batee5
                    </div>
                    <div class="input-group">
                        <input id="new-event" type="text" class="form-control" placeholder="Create New Status">
                        <div class="input-group-btn">
                            <button id="add-new-event" type="button" class="btn bg-blue btn-flat">Add</button>
                        </div><!-- /btn-group -->
                    </div>
                </div>
            </div><!-- /.box-body -->
        </div><!-- /. box -->
        <!-- Ticket Priority -->
        <div class="box box-solid">
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

@endsection