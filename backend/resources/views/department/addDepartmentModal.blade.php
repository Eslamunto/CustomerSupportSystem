{{--<!-- Edit customer modal -->--}}
{{--<div class="modal fade" id="addDepartment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
    {{--<div class="modal-dialog">--}}
        {{--<div class="modal-content">--}}
            {{--<div class="modal-header bg-blue">--}}
                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                    {{--<span aria-hidden="true">&times;</span>--}}
                {{--</button>--}}
                {{--<h4 class="modal-title">Add Department</h4>--}}
            {{--</div>--}}
            {{--<div class="modal-body">--}}
                {{--<div class="box box-primary">--}}
                    {{--<div class="box-header with-border">--}}
                        {{--<h3 class="box-title">Department Information</h3>--}}
                    {{--</div><!-- /.box-header -->--}}
                    {{--<div class="box-body">--}}


                        {{--<form action="{{ url('admin/department') }}" method="POST" class="form-horizontal">--}}
                            {{--{!! csrf_field() !!}--}}
                            {{--<div class="form-group add-department-modal-reset" style="margin-right: 0; margin-left: 0;">--}}
                                {{--<label for="name">Name</label>--}}
                                {{--<input type="text" name="name" id="name">--}}

                            {{--</div>--}}

                            {{--<button type="submit" class="btn btn-default">--}}
                                {{--<i class="fa fa-plus"></i> Add Department--}}
                            {{--</button>--}}

                        {{--</form>--}}

                    {{--</div><!-- /.box-body -->--}}
                {{--</div><!-- /.box -->--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

<!-- Add Ticket Status modal -->
<div class="modal fade" id="addDepartment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Add New Department</h4>
            </div>
            <div class="modal-body">
                <div>
                    <div class="box-body">
                        <!-- form start -->
                        <form id="update-status-form" role="form" action="{{ url('admin/department') }}" method="POST">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label for="name">Department Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Department Name" name="name">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm bg-blue pull-right">
                                <i class="fa fa-plus"></i> Add Department
                            </button>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </div>
</div>