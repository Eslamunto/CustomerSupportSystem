Claim Ticket Modal -->
<div class="modal fade" id="assignTicket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Assign Ticket</h4>
            </div>
            <div class="modal-body">
                    <div class="box box-primary" id>
                        <div class="box-header with-border">
                            <h3 class="box-title">Choose Assignee</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <form role="form" action=""  method="POST" id="assign-ticket-form">
                                {{csrf_field()}}
                                    <div class="form-group">
                                     @if(Auth::user()->role == 0)
                                        <label>Department - Agent</label>
                                        <select class="form-control" id="selectedAssignee" name="selectedAssignee">
                                        @foreach ($userTeam as $user)
                                            <option value="{{$user->id}}">{{$user->departmentName}} Department - {{$user->name}}</option>
                                        @endforeach
                                         </select>
                                    @else
                                        <label>Team Agents</label>
                                        <select class="form-control" id="selectedAssignee" name="selectedAssignee">
                                            @foreach ($userTeam as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                             @endforeach
                                         </select>
                                    @endif
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary bg-blue pull-right">Assign</button>
                                </div>
                            </form>  
                        </div>
                    </div><!-- /.box -->
            </div> <!-- /.modal-body -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal