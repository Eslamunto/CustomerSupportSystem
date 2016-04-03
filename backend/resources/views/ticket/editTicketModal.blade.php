<!-- Edit Ticket Modal -->
<div class="modal fade" id="editTicket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                  <h4 class="modal-title">Edit Ticket</h4>
            </div>
            <div class="modal-body">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ticket Information</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <!-- form start -->
                        <form role="form">
                            <div class="form-group">
                                <label for="TicketTitle">Ticket Title</label>
                                <input type="text" class="form-control" id="TicketTitle" placeholder="Ticket Title">
                            </div>
                            <div class="form-group">
                                <label for="TicketDescription">Ticket Description</label>
                                <textarea class="form-control" id="TicketDescription" placeholder="Ticket Description">
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control">
                                    <option>Status 1</option>
                                    <option>Status 2</option>
                                    <option>Status 3</option>
                                    <option>Status 4</option>
                                    <option>Status 5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Priority</label>
                                <select class="form-control">
                                    <option>Priority 1</option>
                                    <option>Priority 2</option>
                                    <option>Priority 3</option>
                                    <option>Priority 4</option>
                                    <option>Priority 5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Assign to</label>
                                <select class="form-control">
                                    <option>Employee 1</option>
                                    <option>Employee 2</option>
                                    <option>Employee 3</option>
                                    <option>Employee 4</option>
                                    <option>Employee 5</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary bg-blue pull-right">
                                <i class="fa fa-edit"></i> Save Changes
                            </button>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </div>
</div>