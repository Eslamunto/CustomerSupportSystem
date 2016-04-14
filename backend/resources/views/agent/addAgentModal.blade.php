<!-- Claim Ticket Modal -->
<div class="modal fade" id="addAgent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Add Agent</h4>
            </div>
            <div class="modal-body">
                <div id="AddNewAgent">
                    <div class="box box-primary" id>
                        <div class="box-header with-border">
                            <h3 class="box-title">New Agent</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form role="form">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="CustomerName">Agent Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="CustomerEmail">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="CustomerEmail">PAssword</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                                </div>

                            <div class="form-group">
                                <label>Department</label>
                                <select class="form-control" name="department">
                                     @foreach($departments as $key=> $department)
                                         <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Team</label>
                                <select class="form-control">
                                    <option>Agent 1</option>
                                    <option>Agent 2</option>
                                    <option>Agent 3</option>
                                </select>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary bg-blue pull-right">Submit</button>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div> <!-- /.modal-body -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    </div>