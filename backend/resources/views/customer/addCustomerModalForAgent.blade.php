<!-- add customer modal -->
<div class="modal fade" id="addCustomer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Add Customer</h4>
            </div>
            <div class="modal-body">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Customer Information</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <!-- form start -->
                        <form action="{{ Route('createCustomer') }}" method="POST" class="form-horizontal">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label for="CustomerName">Customer Name</label>
                                <input type="text" class="form-control" id="customerName" name="customerName" placeholder="Customer Name">
                            </div>
                            <div class="form-group">
                                <label for="customerPhone">Phone Number</label>
                                <input type="text" class="form-control" id="customerPhone" name="customerPhone" placeholder="01x-xxx-xxx-xx">
                            </div>
                            <button type="submit" class="btn btn-primary bg-blue pull-right">
                                <i class="fa fa-plus"></i> Add Customer
                            </button>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </div>
</div>