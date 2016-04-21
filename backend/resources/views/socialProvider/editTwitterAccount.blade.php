<!-- Edit Twitter Account modal -->
<div class="modal fade" id="editTwitterSettings" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Edit Twitter Account</h4>
            </div>
            <div class="modal-body">
                <div>
                    <div class="box-body">
                        <!-- form start -->
                        <form id="update-twitter-form" role="form" action="" method="POST">
                            {{ csrf_field() }}
                            {!! method_field('put') !!}
                            <div class="form-group">
                                <label for="TwitterConsumer">Application Consumer Key</label>
                                <input type="text" class="form-control" id="TwitterConsumer" placeholder="" name="consumer_key">
                            </div>
                            <div class="form-group">
                                <label for="TwitterSecret">Application Secret Key</label>
                                <input type="text" class="form-control" id="TwitterSecret" placeholder="" name="secret_key">
                            </div>
                            <div class="form-group">
                                <label for="TwitterToken"> Application Access Token</label>
                                <input type="text" class="form-control" id="TwitterToken" placeholder="" name="access_token">
                            </div>
                            <div class="form-group">
                                <label for="TwitterTokenSecret">Application Access Token Secret</label>
                                <input type="text" class="form-control" id="TwitterTokenSecret" placeholder="" name="access_token_secret">
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