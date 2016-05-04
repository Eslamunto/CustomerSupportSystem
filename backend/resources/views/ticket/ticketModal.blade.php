<!-- Ticket Modal -->
<div class="modal fade" id="ticket-{{$ticket->id}}" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" class="fa fa-times"></span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    <b>{{"$ticket->title"}}</b>
                </h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body clearfix">
                <!-- Ticket Description -->
                <div class="assigned-agents">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <i class="fa fa-ticket"></i>
                            <h5 class="box-title"><strong>Description</strong></h5>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <p>
                                {{$ticket->description}}
                            </p>
                        </div><!-- /.box-body -->
                    </div>
                </div>
                <!-- Assigned Agents & Status & priority-->
                <div class="status-priorities clearfix">
                    <div class="agents">
                        <h5><b>Assigned Agents</b></h5>
                        <img src="dist/img/user7-128x128.jpg" class="img-circle" alt="User Image">
                        <img src="dist/img/user8-128x128.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div>
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>Status</th>
                                    <th><span class="label bg-blue">{{$ticket->statusName}}</span></th>
                                </tr>
                                <tr>
                                    <th>Priority</th>
                                    <th><span class="label bg-yellow">{{$ticket->priorityName}}</span></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Conversational Tweets -->
                <div class="conv-timeline">
                    <div class="scroll-timeline">
                        <ul class="timeline">
                            <!-- timeline time label -->
                            <li class="time-label">
                                <span class="bg-blue">
                                    24 Feb. 2016
                                </span>
                            </li>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <li>
                                <!-- timeline icon -->
                                <i class="fa fa-twitter bg-aqua"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i> 02:05</span>
                                    <h3 class="timeline-header"><a href="#">Customer</a> ...</h3>
                                    <div class="timeline-body">
                                        Customer's tweet complain
                                        ...
                                    </div>
                                </div>
                            </li>
                            <!-- END timeline item -->
                            <!-- timeline item -->
                            <li>
                                <!-- timeline icon -->
                                <i class="fa fa-twitter bg-blue"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i> 05:20</span>
                                    <h3 class="timeline-header"><a href="#">Support Team</a> ...</h3>
                                    <div class="timeline-body">
                                        Support Agent's reply
                                        ...
                                    </div>
                                </div>
                            </li>
                            <!-- END timeline item -->
                            <!-- timeline item -->
                            <li>
                                <!-- timeline icon -->
                                <i class="fa fa-twitter bg-aqua"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i> 10:00</span>
                                    <h3 class="timeline-header"><a href="#">Customer</a> ...</h3>
                                    <div class="timeline-body">
                                        Customer's reply
                                        ...
                                    </div>
                                </div>
                            </li>
                            <!-- END timeline item -->
                            <!-- timeline item -->
                            <li>
                                <!-- timeline icon -->
                                <i class="fa fa-twitter bg-blue"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i> 11:15</span>
                                    <h3 class="timeline-header"><a href="#">Support Team</a> ...</h3>
                                    <div class="timeline-body">
                                        Support agent's reply
                                        ...
                                    </div>
                                </div>
                            </li>
                            <!-- END timeline item -->
                            <li>
                                <i class="fa fa-clock-o bg-gray"></i>
                            </li>
                        </ul>
                    </div> 

                    <div class="tweet-reply">
                        <div class="input-group">
                            <input class="form-control" placeholder="Type message...">
                            <div class="input-group-btn">
                                <button class="btn bg-blue">reply</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tickets Action -->
                <div class="ticket-actions" id="ticket-{{$ticket->id}}-action">
                    <!-- Re-assign to Agent -->
                    <div class="panel box box-success">
                        <div class="box-header with-border">
                            <div class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseZero-{{$ticket->id}}" aria-expanded="true" class="">
                                    Re-assign Ticket
                                </a>
                            </div>
                        </div>
                        <div id="collapseZero-{{$ticket->id}}" class="panel-collapse collapse" aria-expanded="true">
                            <div class="box-body">
                               @if(Auth::user()->role == 0)
                                    <form role="form" action="{{Route('reAssignTicketAdmin', $ticket->id)}}"  method="POST">
                                @elseif (Auth::user()->role == 1)
                                    <form role="form" action="{{Route('reAssignTicketSupervisor', $ticket->id)}}"  method="POST">
                                @else
                                    <form role="form" action="{{Route('reAssignTicketAgent', $ticket->id)}}"  method="POST">
                                @endif
                                    {{csrf_field()}}
                                    <div class= "form-group">
                                         @foreach ($userTeam as $user)
                                             <div class="radio">
                                                <label>
                                                    <input type="radio" name="selectedMember" value="{{$user->id}}"> {{$user->name}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="submit" class="btn btn-xs btn-success btn-block">Re-assign</button>
                                </form> 
                            </div>
                        </div>
                    </div>

                    <!-- Invite Agent -->
                    <div class="panel box box-danger">
                        <div class="box-header with-border">
                            <div class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-{{$ticket->id}}" aria-expanded="true" class="">
                                    Invite Agents
                                </a>
                            </div>
                        </div>
                        <div id="collapseOne-{{$ticket->id}}" class="panel-collapse collapse" aria-expanded="true">
                            <div class="box-body">
                                @if(Auth::user()->role == 0)
                                    <form role="form" action="{{Route('inviteTicketAdmin', $ticket->id)}}"  method="POST">
                                @elseif (Auth::user()->role == 1)
                                    <form role="form" action="{{Route('inviteTicketSupervisor', $ticket->id)}}"  method="POST">
                                @else
                                    <form role="form" action="{{Route('inviteTicketAgent', $ticket->id)}}"  method="POST">
                                @endif
                                    {{csrf_field()}}
                                    <div class= "form-group">
                                         @foreach ($userTeam as $user)
                                             <div class="radio">
                                                <label>
                                                    <input type="radio" name="selectedMember" value="{{$user->id}}"> {{$user->name}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="submit" class="btn btn-xs btn-danger btn-block">Invite</button>
                                </form> 
                            </div>
                        </div>
                    </div>

                    <!-- Change Status -->
                    <div class="panel box box-primary" id="collapse-box-{{$ticket->id}}">
                        <div class="box-header with-border">
                            <div class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo-{{$ticket->id}}" aria-expanded="true" class="collapse-{{$ticket->id}}">
                                    Change Status
                                </a>
                            </div>
                        </div>
                        <div id="collapseTwo-{{$ticket->id}}" class="panel-collapse collapse" aria-expanded="true">
                            <div class="box-body"> 
                                @if(Auth::user()->role == 0)
                                    <form role="form" action="{{Route('setTicketStatusAdmin', $ticket->id)}}"  method="POST">
                                @elseif (Auth::user()->role == 1)
                                    <form role="form" action="{{Route('setTicketStatusSupervisor', $ticket->id)}}"  method="POST">
                                @else
                                    <form role="form" action="{{Route('setTicketStatusAgent', $ticket->id)}}"  method="POST">
                                @endif
                                    {{csrf_field()}}
                                    {!! method_field('put') !!}
                                    <div class= "form-group">
                                         @foreach ($ticketStatus as $status)
                                         <div class="radio">
                                            <label>
                                                <input type="radio" name="selectedStatus" value="{{$status->id}}"> {{$status->name}}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                    <button type="submit" class="btn btn-xs btn-primary btn-block">Change</button>
                                </form> 
                            </div>
                        </div>
                    </div>

                    <!-- Change Priority -->
                    <div class="panel box box-warning">
                        <div class="box-header with-border">
                            <div class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree-{{$ticket->id}}" aria-expanded="true" class="">
                                    Change Priority
                                </a>
                            </div>
                        </div>
                        <div id="collapseThree-{{$ticket->id}}" class="panel-collapse collapse" aria-expanded="true">
                            <div class="box-body">
                               @if(Auth::user()->role == 0)
                                    <form role="form" action="{{Route('setTicketPriorityAdmin', $ticket->id)}}"  method="POST">
                                @elseif (Auth::user()->role == 1)
                                    <form role="form" action="{{Route('setTicketPrioritySupervisor', $ticket->id)}}"  method="POST">
                                @else
                                    <form role="form" action="{{Route('setTicketPriorityAgent', $ticket->id)}}"  method="POST">
                                @endif
                                    {{csrf_field()}}
                                    {!! method_field('put') !!}
                                    <div class= "form-group">
                                         @foreach ($ticketPriority as $priority)
                                         <div class="radio">
                                            <label>
                                                <input type="radio" name="selectedPriority" value="{{$priority->id}}"> {{$priority->name}}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                    <button type="submit" class="btn btn-xs btn-warning btn-block">Change</button>
                                </form> 
                            </div>
                        </div>
                    </div>
                    @if(Auth::user()->role == 2)
                        <form method="POST" action="{{ Route('esclateTicketAgent', $ticket->id) }}">
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-block btn-xs bg-blue">
                                <i class="fa fa-level-up"> </i> &nbspEscalate 
                            </button>
                            <br>
                        </form>                    
                    @elseif (Auth::user()->role == 1)
                        <form method="POST" action="{{ Route('esclateTicketSupervisor', $ticket->id) }}">
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-block btn-xs bg-blue">
                                <i class="fa fa-level-up"> </i> &nbspEscalate 
                            </button>
                             <br>
                        </form>     
                    @endif

                    <button type="button" class="btn btn-block btn-xs btn-danger">
                        <i class="fa fa-trash"></i> &nbspDelete Ticket 
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>