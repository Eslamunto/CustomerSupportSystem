@extends('layouts.master')

@section('title')
    Admin | Feed
@endsection

@section('content')
@if(Session::has('message'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ Session::get('message') }}
        </div>
@elseif(Session::has('error') )
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ Session::get('error') }}
        </div>
@endif
    @if($errors->any())
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4> Please Fix The Following Error(s)</h4>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="clearfix">
        <div class="admin-feed">
            <!-- Tweets Feed -->
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-feed"></i> &nbspTweets Feed</h3>
                </div>
                <div class="box-body">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title text-primary">Customer Name
                                <small>username</small>
                            </h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addTicket">
                                    <i class="fa fa-plus"></i>  New Ticket
                                </button>                 
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            Tweet Body
                            .....
                        </div><!-- /.box-body -->
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title text-primary">Customer Name
                                <small>username</small>
                            </h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addTicket">
                                    <i class="fa fa-plus"></i>  New Ticket
                                </button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            Tweet Body
                            .....
                        </div><!-- /.box-body -->
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title text-primary">Customer Name
                                <small>username</small>
                            </h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addTicket">
                                    <i class="fa fa-plus"></i>  New Ticket
                                </button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            Tweet Body
                            .....
                        </div><!-- /.box-body -->
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title text-primary">Customer Name
                                <small>username</small>
                            </h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addTicket">
                                    <i class="fa fa-plus"></i>  New Ticket
                                </button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            Tweet Body
                            .....
                        </div><!-- /.box-body -->
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title text-primary">Customer Name
                                <small>username</small>
                            </h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addTicket">
                                    <i class="fa fa-plus"></i>  New Ticket
                                </button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            Tweet Body
                            .....
                        </div><!-- /.box-body -->
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title text-primary">Customer Name
                                <small>username</small>
                            </h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addTicket">
                                    <i class="fa fa-plus"></i>  New Ticket
                                </button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            Tweet Body
                            .....
                        </div><!-- /.box-body -->
                    </div>
                </div>
            </div>
            <!-- Tickets Feed -->
        </div>

        <!-- Support Team -->
        <div class="support-team">
            <div class="tickets">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs pull-right">
                        <li class="active"><a href="#tab_1-1" data-toggle="tab">My Tickets</a></li>
                        <li><a href="#tab_2-2" data-toggle="tab">Team Tickets</a></li>
                        <li><a href="#tab_3-2" data-toggle="tab">Unassigned Tickets</a></li>
                        <li class="pull-left header"><i class="fa fa-ticket"></i> Tickets</li>
                    </ul>
                    <div class="tab-content">
                        <!-- My Tickets -->
                        <div class="tab-pane active" id="tab_1-1">
                            @foreach ($userAssignedTickets as $ticket)
                                <div class="callout callout-default callout-ticket-bg clearfix">
                                    <h5 class="pull-left"><a href="" data-toggle="modal" data-target="#ticket-{{$ticket->id}}">{{ $ticket->title }} </a></h5>
                                    @include('ticket.ticketModal', ['ticket' => $ticket])
                                    <div class="pull-right">
                                        <span class="label bg-blue">{{$ticket->statusName}}</span>
                                        <span class="label bg-yellow">{{$ticket->priorityName}}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div><!-- /.tab-pane -->

                        <!-- Team Tickets -->
                        <div class="tab-pane" id="tab_2-2">
                            <div class="callout callout-default callout-ticket-bg clearfix">
                                <h5 class="pull-left"><a href="" data-toggle="modal">#7 Ticket Title</a></h5>
                               <div class="pull-right">
                                    <span class="label bg-blue">Opened</span>
                                    <span class="label bg-yellow">High</span>
                                </div>
                            </div>
                        </div><!-- /.tab-pane -->
<!-- ==================================================================================================================== -->
                        <div class="tab-pane" id="tab_3-2">
                                @foreach ($unassignedTickets as $ticket)
                                    <div class="callout callout-default callout-ticket-bg clearfix">
                                        <h5 class="pull-left"><a href="" data-toggle="modal" data-target="#ticket-{{$ticket->id}}">{{ $ticket->title }} </a></h5>
                                        @include('ticket.ticketModal', ['ticket' => $ticket])
                                        <!-- <div  >
                                            <span class="label bg-yellow">{{$ticket->statusName}}</span>
                                            <span class="label bg-red">{{$ticket->priorityName}}</span>
                                        </div> -->
                                        <form method="POST" action="{{ Route('claimTicketAdmin', $ticket->id) }}">
                                            {!! csrf_field() !!}
                                            <div class="pull-right">
                                                <button type="submit" class="btn btn-danger btn-sm pull-right"><i class="fa fa-medkit"></i> Claim </button>
                                            </div>
                                        </form>
                                        <div class="pull-right">
                                            <button type="button" class="assign-ticket-button btn btn-success btn-sm pull-right" data-assign-route="{{ Route('assignTicket', $ticket->id) }}" data-toggle="modal" data-target="#assignTicket"><i class="fa fa-medkit"></i> Assign </button>
                                        </div>
                                    </div>
                                @endforeach
                        </div><!-- /.tab-pane -->
<!-- ==================================================================================================================== -->
                    </div><!-- /.tab-content -->
                </div>
            </div>

            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-feed"></i> &nbspSupport Team</h3>
                </div>
                <div class="panel box box-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"
                               aria-expanded="true" class="">
                                Marketing Department
                            </a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in" aria-expanded="true" style="">
                        <div class="box-body">
                            <div class="box-body">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th>Support Agent</th>
                                        <th>All Tickets</th>
                                        <th>Open Tickets</th>
                                        <th>Closed Tickets</th>
                                    </tr>
                                    <tr>
                                        <td>Mike Doe</td>
                                        <td class="text-center"><span class="label bg-aqua">20</span></td>
                                        <td class="text-center"><span class="label bg-green">7</span></td>
                                        <td class="text-center"><span class="label bg-red">13</span></td>
                                    </tr>
                                    <tr>
                                        <td>Alexander Pierce</td>
                                        <td class="text-center"><span class="label bg-aqua">10</span></td>
                                        <td class="text-center"><span class="label bg-green">3</span></td>
                                        <td class="text-center"><span class="label bg-red">7</span></td>
                                    </tr>
                                    <tr>
                                        <td>Nadia Carmichael</td>
                                        <td class="text-center"><span class="label bg-aqua">15</span></td>
                                        <td class="text-center"><span class="label bg-green">6</span></td>
                                        <td class="text-center"><span class="label bg-red">9</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel box box-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="collapsed" aria-expanded="false">
                                Financial Department
                            </a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                        <div class="box-body">
                            <div class="box-body">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th>Support Agent</th>
                                        <th>All Tickets</th>
                                        <th>Open Tickets</th>
                                        <th>Closed Tickets</th>
                                    </tr>
                                    <tr>
                                        <td>Mike Doe</td>
                                        <td class="text-center"><span class="label bg-aqua">20</span></td>
                                        <td class="text-center"><span class="label bg-green">7</span></td>
                                        <td class="text-center"><span class="label bg-red">13</span></td>
                                    </tr>
                                    <tr>
                                        <td>Alexander Pierce</td>
                                        <td class="text-center"><span class="label bg-aqua">10</span></td>
                                        <td class="text-center"><span class="label bg-green">3</span></td>
                                        <td class="text-center"><span class="label bg-red">7</span></td>
                                    </tr>
                                    <tr>
                                        <td>Nadia Carmichael</td>
                                        <td class="text-center"><span class="label bg-aqua">15</span></td>
                                        <td class="text-center"><span class="label bg-green">6</span></td>
                                        <td class="text-center"><span class="label bg-red">9</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel box box-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="collapsed" aria-expanded="false">
                                Technical Department
                            </a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse" aria-expanded="false"
                         style="height: 0px;">
                        <div class="box-body">
                            <div class="box-body">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th>Support Agent</th>
                                        <th>All Tickets</th>
                                        <th>Open Tickets</th>
                                        <th>Closed Tickets</th>
                                    </tr>
                                    <tr>
                                        <td>Mike Doe</td>
                                        <td class="text-center"><span class="label bg-aqua">20</span></td>
                                        <td class="text-center"><span class="label bg-green">7</span></td>
                                        <td class="text-center"><span class="label bg-red">13</span></td>
                                    </tr>
                                    <tr>
                                        <td>Alexander Pierce</td>
                                        <td class="text-center"><span class="label bg-aqua">10</span></td>
                                        <td class="text-center"><span class="label bg-green">3</span></td>
                                        <td class="text-center"><span class="label bg-red">7</span></td>
                                    </tr>
                                    <tr>
                                        <td>Nadia Carmichael</td>
                                        <td class="text-center"><span class="label bg-aqua">15</span></td>
                                        <td class="text-center"><span class="label bg-green">6</span></td>
                                        <td class="text-center"><span class="label bg-red">9</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('ticket.assignTicketModal')
    @include('ticket.addTicketModal')

@endsection

@section('scripts')
<!-- DataTables -->
{{ HTML::script('plugins/datatables/jquery.dataTables.min.js') }}
{{ HTML::script('plugins/datatables/dataTables.bootstrap.min.js') }}
<!-- SlimScroll -->
{{ HTML::script('plugins/slimScroll/jquery.slimscroll.min.js') }}
<!-- FastClick -->
{{ HTML::script('plugins/fastclick/fastclick.min.js') }}
<!-- page script -->
<script>
    $('.assign-ticket-button').on('click', function () {
        $('#assign-ticket-form').attr('action', $(this).data('assign-route'));
    });
</script>
@endsection