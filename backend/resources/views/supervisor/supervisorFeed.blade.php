@extends('layouts.master')

@section('title')
    Supervisor | Feed
@endsection

@section('content')
    <div class="clearfix">
        <div class="feed">
            <!-- Tweets Feed -->
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-feed"></i> &nbspTweets Feed</h3>
                </div>
                <div class="box-body">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title text-primary">Customer Name <small>@username</small></h3>
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
                            <h3 class="box-title text-primary">Customer Name <small>@username</small></h3>
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
                            <h3 class="box-title text-primary">Customer Name <small>@username</small></h3>
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
                            <h3 class="box-title text-primary">Customer Name <small>@username</small></h3>
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
                            <h3 class="box-title text-primary">Customer Name <small>@username</small></h3>
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
                            <div class="callout callout-default callout-ticket-bg clearfix">
                                <h5 class="pull-left">
                                    <a href="" data-toggle="modal" data-target="#ticket">#7 Ticket Title</a>
                                </h5>
                                <div class="pull-right">
                                    <span class="label bg-yellow">Opened</span>
                                    <span class="label bg-red">High</span>
                                    <span class="label bg-aqua">3</span>
                                </div>
                            </div>
                            <div class="callout callout-default callout-ticket-bg clearfix">
                                <h5 class="pull-left">
                                    <a href="" data-toggle="modal" data-target="#ticket">#11 Ticket Title</a>
                                </h5>
                                <div class="pull-right">
                                    <span class="label bg-yellow">Opened</span>
                                    <span class="label bg-red">High</span>
                                    <span class="label bg-aqua">3</span>
                                </div>
                            </div>
                            <div class="callout callout-default callout-ticket-bg clearfix">
                                <h5 class="pull-left">
                                    <a href="" data-toggle="modal" data-target="#ticket">#20 Ticket Title</a>
                                </h5>
                                <div class="pull-right">
                                    <span class="label bg-yellow">Opened</span>
                                    <span class="label bg-red">High</span>
                                    <span class="label bg-aqua">3</span>
                                </div>
                            </div>
                            <div class="callout callout-default callout-ticket-bg clearfix">
                                <h5 class="pull-left">
                                    <a href="" data-toggle="modal" data-target="#ticket">#10 Ticket Title</a>
                                </h5>
                                <div class="pull-right">
                                    <span class="label bg-yellow">Opened</span>
                                    <span class="label bg-red">High</span>
                                    <span class="label bg-aqua">3</span>
                                </div>
                            </div>
                            <div class="callout callout-default callout-ticket-bg clearfix">
                                <h5 class="pull-left">
                                    <a href="" data-toggle="modal" data-target="#ticket">#2 Ticket Title</a>
                                </h5>
                                <div class="pull-right">
                                    <span class="label bg-yellow">Opened</span>
                                    <span class="label bg-red">High</span>
                                    <span class="label bg-aqua">3</span>
                                </div>
                            </div>
                        </div><!-- /.tab-pane -->
                        <!-- Team Tickets -->
                        <div class="tab-pane" id="tab_2-2">
                            <div class="callout callout-default callout-ticket-bg clearfix">
                                <h5 class="pull-left">
                                    <a href="" data-toggle="modal" data-target="#ticket">#7 Ticket Title</a>
                                </h5>
                                <div class="pull-right">
                                    <span class="label bg-yellow">Opened</span>
                                    <span class="label bg-red">High</span>
                                    <span class="label bg-aqua">3</span>
                                </div>
                            </div>
                            <div class="callout callout-default callout-ticket-bg clearfix">
                                <h5 class="pull-left">
                                    <a href="" data-toggle="modal" data-target="#ticket">#11 Ticket Title</a>
                                </h5>
                                <div class="pull-right">
                                    <span class="label bg-yellow">Opened</span>
                                    <span class="label bg-red">High</span>
                                    <span class="label bg-aqua">3</span>
                                </div>
                            </div>
                            <div class="callout callout-default callout-ticket-bg clearfix">
                                <h5 class="pull-left">
                                    <a href="" data-toggle="modal" data-target="#ticket">#20 Ticket Title</a>
                                </h5>
                                <div class="pull-right">
                                    <span class="label bg-yellow">Opened</span>
                                    <span class="label bg-red">High</span>
                                    <span class="label bg-aqua">3</span>
                                </div>
                            </div>
                            <div class="callout callout-default callout-ticket-bg clearfix">
                                <h5 class="pull-left">
                                    <a href="" data-toggle="modal" data-target="#ticket">#10 Ticket Title</a>
                                </h5>
                                <div class="pull-right">
                                    <span class="label bg-yellow">Opened</span>
                                    <span class="label bg-red">High</span>
                                    <span class="label bg-aqua">3</span>
                                </div>
                            </div>
                            <div class="callout callout-default callout-ticket-bg clearfix">
                                <h5 class="pull-left">
                                    <a href="" data-toggle="modal" data-target="#ticket">#2 Ticket Title</a>
                                </h5>
                                <div class="pull-right">
                                    <span class="label bg-yellow">Opened</span>
                                    <span class="label bg-red">High</span>
                                    <span class="label bg-aqua">3</span>
                                </div>
                            </div>
                        </div><!-- /.tab-pane -->
                        <!-- Unassigned Tickets -->
                        <div class="tab-pane" id="tab_3-2">
                            <div class="callout callout-default callout-ticket-bg clearfix">
                                <div class="col-md-6">
                                    <h5 class="pull-left">#7 Ticket Title</h5>
                                </div>
                                <div class="col-md-3">
                                    <span class="label bg-red">High</span>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-danger btn-sm pull-right">
                                        <i class="fa fa-medkit"></i> Claim
                                    </button>
                                </div>
                            </div>
                            <div class="callout callout-default callout-ticket-bg clearfix">
                                <div class="col-md-6">
                                    <h5 class="pull-left">#11 Ticket Title</h5>
                                </div>
                                <div class="col-md-3">
                                    <span class="label bg-yellow">Medium</span>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-danger btn-sm pull-right">
                                        <i class="fa fa-medkit"></i> Claim
                                    </button>
                                </div>
                            </div>
                            <div class="callout callout-default callout-ticket-bg clearfix">
                                <div class="col-md-6">
                                    <h5 class="pull-left">#20 Ticket Title</h5>
                                </div>
                                <div class="col-md-3">
                                    <span class="label bg-yellow">Medium</span>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-danger btn-sm pull-right">
                                        <i class="fa fa-medkit"></i> Claim
                                    </button>
                                </div>
                            </div>
                            <div class="callout callout-default callout-ticket-bg clearfix">
                                <div class="col-md-6">
                                    <h5 class="pull-left">#10 Ticket Title</h5>
                                </div>
                                <div class="col-md-3">
                                    <span class="label bg-green">Low</span>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-danger btn-sm pull-right">
                                        <i class="fa fa-medkit"></i> Claim
                                    </button>
                                </div>
                            </div>
                            <div class="callout callout-default callout-ticket-bg clearfix">
                                <div class="col-md-6">
                                    <h5 class="pull-left">#2 Ticket Title</h5>
                                </div>
                                <div class="col-md-3">
                                    <span class="label bg-green">Low</span>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-danger btn-sm pull-right">
                                        <i class="fa fa-medkit"></i> Claim
                                    </button>
                                </div>
                            </div>
                        </div><!-- /.tab-pane -->
                    </div><!-- /.tab-content -->
                </div>
            </div>
            <!-- Support Team -->
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-optin-monster"></i> &nbspSupport Team</h3>
                </div>
                <div class="box-body">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th>Support Agent</th>
                                <th>All Tickets</th>
                                <th>Opened Tickets</th>
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

    @include('ticket.ticketModal')
    @include('ticket.addTicketModal')

@endsection
