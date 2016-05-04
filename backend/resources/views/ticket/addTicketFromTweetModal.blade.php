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
                        <form role="form" id="createNewCustomerForm" method="post">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="CustomerName">Customer Name</label>
                                    <input type="text" class="form-control" name="name" id="CustomerName" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="CustomerEmail">Email address</label>
                                    <input type="email" class="form-control" name="email" id="CustomerEmail" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="CustomerMobile">Mobile</label>
                                    <input type="text" class="form-control" name="telephone" id="CustomerMobile" placeholder="Mobile Number">
                                </div>
                                <div class="form-group">
                                    <label for="CustomerTwitter">Twitter Username</label>
                                    <input type="text" class="form-control" name="username" id="CustomerTwitter" placeholder="Twitter Username">
                                </div>
                            </div><!-- /.box-body -->
                            <input type="submit" class="btn btn-block bg-blue" id="submitNewCustomer" value="Submit">
                            <a class="btn btn-block bg-blue" id="hideNewCustomer">Cancel</a>
                        </form>
                    </div><!-- /.box -->
                </div>

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">New Ticket</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->

                        <div class="box-body">
                            <div id="CurrentUser">
                                <div class="form-group">
                                    <label for="CustomerMobileTicket">Customer Account username</label>
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control" id="screenName" placeholder="Enter Twitter username">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary bg-blue btn-flat" id="UserCheck" type="button">Check    user
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <div id="UserData">
                                    <p><strong>Name: </strong> <a id="customerName"></a></p>
                                    <p><strong>Email: </strong> <a id="customerEmail"></a></p>
                                    <p><strong>Tel: </strong> <a id="customerMobile"></a></p>
                                </div>
                            </div>
                        <form role="form" id="newTicket" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="customerId">Customer ID</label>
                                <input class="form-control" id="customerId" name="customerId" type="text">
                            </div>
                            <div class="form-group">
                                <label for="tweetId">Tweet ID</label>
                                <input class="form-control" id="tweetId" name="tweetId" type="text" >
                            </div>
                            <div class="form-group">
                                <label for="ticketTitle">Ticket Title</label>
                                <input type="text" class="form-control" id="ticketTitle" name="title" placeholder="Ticket Title">
                            </div>
                            <div class="form-group">
                                <label for="tweetBody">Tweet Body</label>
                                <textarea id="tweetBody" class="form-control" name="tweetBody" ></textarea>
                            </div>
                            <div class="form-group">
                                <label for="ticketDescription">Ticket Description</label>
                                <textarea id="ticketDescription" name="description" class="form-control" ></textarea>
                            </div>
                            <div class="form-group">
                                <label>Priority</label>
                                <select class="form-control" id="priorities" name="priority">
                                    <option value="0">--</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="0">--</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Department</label>
                                <select class="form-control" id="departments" name="department">
                                    <option value="0">--</option>
                                </select>
                            </div>
                            <div class="form-group" id="agentsDiv">
                                <label>Agents</label>
                                <select class="form-control" id="agents" name="agent">
                                    <option value="0">--</option>
                                </select>
                            </div>

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