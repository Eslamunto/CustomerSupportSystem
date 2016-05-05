<!-- Edit customer modal -->
<div class="modal fade" id="editCustomer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Edit Customer</h4>
            </div>
            <div class="modal-body">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Customer Information</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <!-- form start -->
                        <form role="form" action=""  method="POST" id="update-customer-form">
                            {{csrf_field()}}
                            {!! method_field('put') !!}
                            <div class="form-group">
                                <label for="CustomerName">Customer Name</label>
                                <input type="text" class="form-control" id="customerName" name="customerName" placeholder="Customer Name">
                            </div>
                             <div class="form-group">
                                <label for="CustomerName">Customer Email</label>
                                <input type="text" class="form-control" id="customerEmail" name="customerEmail" placeholder="Customer Email">
                            </div>
                            <div class="form-group">
                                <label for="customerPhone">Phone Number</label>
                                <input type="text" class="form-control" id="customerPhone" name="customerPhone" placeholder="01x-xxx-xxx-xx">
                            </div>
                            <div class="form-group">
                                <label for="CustomerTwitter">Twitter Account</label>
                                <input type="text" class="form-control" id="twitterUsername" name="twitterUsername" placeholder="@username">
                            </div>
                            <div class="form-group">
                                <label for="CustomerFacebook">Facebook Account</label>
                                <input type="text" class="form-control" id="facebookUsername" name="facebookUsername" placeholder="Username or Email">
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