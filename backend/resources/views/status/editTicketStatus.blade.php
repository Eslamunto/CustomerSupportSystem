<!-- Edit Ticket Status modal -->
<div class="modal fade" id="editStatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Edit Ticket Status</h4>
            </div>
            <div class="modal-body">
                <div>
                    <div class="box-body">
                        <!-- form start -->
                        <form id="update-status-form" role="form" action="" method="POST">
                            {{ csrf_field() }}
                            {!! method_field('put') !!}
                            <div class="form-group">
                                <label for="TicketName">Ticket Title</label>
                                <input type="text" class="form-control" id="TicketName" placeholder="Ticket Title" name="name">
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