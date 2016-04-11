<!-- Ticket Modal -->
<div class="modal fade" id="ticket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" class="fa fa-times"></span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    <b>[#1] Ticket Title</b>
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
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
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
                                    <th><span class="label bg-yellow">Opened</span></th>
                                </tr>
                                <tr>
                                    <th>Priority</th>
                                    <th><span class="label bg-red">High</span></th>
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
                <div class="ticket-actions">
                    <!-- Re-assign to Agent -->
                    <div class="panel box box-success">
                        <div class="box-header with-border">
                            <div class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseZero" aria-expanded="true" class="">
                                    Re-assign Ticket
                                </a>
                            </div>
                        </div>
                        <div id="collapseZero" class="panel-collapse collapse" aria-expanded="true">
                            <div class="box-body">
                                <form role="form">
                                    <div class= "form-group">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="one"> Team Agent 1
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="two"> Team Agent 2
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios3" value="three"> Team Agent 3
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios4" value="four"> Team Agent 4
                                            </label>
                                        </div>
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
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" class="">
                                    Invite Agents
                                </a>
                            </div>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse" aria-expanded="true">
                            <div class="box-body">
                                <form role="form">
                                    <div class= "form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Team Agent 1
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Team Agent 2
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Team Agent 3
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Team Agent 4
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-xs btn-danger btn-block">Invite</button>
                                </form> 
                            </div>
                        </div>
                    </div>

                    <!-- Change Status -->
                    <div class="panel box box-primary">
                        <div class="box-header with-border">
                            <div class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" class="">
                                    Change Status
                                </a>
                            </div>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="true">
                            <div class="box-body">
                                <form role="form">
                                    <div class= "form-group">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="one"> Status one
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="two"> Status two
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios3" value="three"> Status three
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios4" value="four"> Status four
                                            </label>
                                        </div>
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
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" class="">
                                    Change Priority
                                </a>
                            </div>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" aria-expanded="true">
                            <div class="box-body">
                                <form role="form">
                                    <div class= "form-group">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="low"> Low
                                            </label>
                                      </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="medium"> Medium
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios3" value="high"> High
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-xs btn-warning btn-block">Change</button>
                                </form> 
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-block btn-xs bg-blue">
                        <i class="fa fa-level-up"> </i> &nbspEscalate 
                    </button>
                    <button type="button" class="btn btn-block btn-xs btn-danger">
                        <i class="fa fa-trash"></i> &nbspDelete Ticket 
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>