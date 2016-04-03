<!-- Claim Ticket Modal -->
<div class="modal fade" id="addTicket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Add Ticket</h4>
            </div>
            <div class="modal-body">
                <div id="AddNewCustomer">
                    <div class="box box-primary" id>
                        <div class="box-header with-border">
                            <h3 class="box-title">New Customer</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form role="form">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="CustomerName">Customer Name</label>
                                    <input type="text" class="form-control" id="CustomerName" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="CustomerEmail">Email address</label>
                                    <input type="email" class="form-control" id="CustomerEmail" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="CustomerMobile">Mobile</label>
                                    <input type="text" class="form-control" id="CustomerMobile" placeholder="Mobile Number">
                                </div>
                                <div class="form-group">
                                    <label for="CustomerTwitter">Twitter Username</label>
                                    <input type="text" class="form-control" id="CustomerTwitter" placeholder="Twitter Username">
                                </div>
                            </div><!-- /.box-body -->
                            <a class="btn btn-block bg-blue" id="hideNewCustomer"><i class="fa fa-angle-double-up"></i></a>
                        </form>
                    </div><!-- /.box -->
                </div>

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">New Ticket</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">
                            <div id="CurrentUser">
                                <div class="form-group">
                                    <label for="CustomerMobileTicket">Customer Account username</label>
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control" id="CustomerAccountTicket" placeholder="Enter Twitter username">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary bg-blue btn-flat" id="UserCheck" type="button">Check    user
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <div id="UserData">
                                    <p><strong>Name: </strong> Foo Bar</p>
                                    <p><strong>Email: </strong> foo@bar.com</p>
                                    <p><strong>Tel: </strong> 01245678909</p>
                                </div>
                                <div class="form-group">
                                    <a class="btn btn-block bg-blue" id="showNewCustomer"><i class="fa fa-plus"></i> New Customer</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ticketTitle">Ticket Title</label>
                                <input type="text" class="form-control" id="ticketTitle" placeholder="Ticket Title">
                            </div>
                            <div class="form-group">
                                <label for="ticketDescription">Ticket Description</label>
                                <textarea id="ticketDescription" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Priority</label>
                                <select class="form-control">
                                    <option>High</option>
                                    <option>Medium</option>
                                    <option>Low</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Agents</label>
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