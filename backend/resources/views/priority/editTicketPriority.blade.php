<!-- Edit Ticket Priority modal -->
<div class="modal fade" id="editPriority" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Edit Ticket Priority</h4>
            </div>
            <div class="modal-body">
                <div>
                    <div class="box-body">
                        <!-- form start -->
                        <form id="update-priority-form" role="form" action="" method="POST">
                            {{ csrf_field() }}
                            {!! method_field('put') !!}
                            <div class="form-group">
                                <label for="TicketName">Ticket Priority Title</label>
                                <input type="text" class="form-control" id="priorityName" placeholder="Ticket Title" name="name">
                            </div>
                            <div class="form-group">
                            	<label>Ticket Priority Color</label>
                                <div id="cp4" class="input-group colorpicker-component">
                                    <input type="text" value="#00AABB" class="form-control" name="color"/>
                                    <span class="input-group-addon"><i></i></span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm bg-blue pull-right">
                                <i class="fa fa-edit"></i> Save Changes
                            </button>
                        </form>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
        </div>
    </div>
</div>