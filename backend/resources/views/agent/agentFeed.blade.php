@extends('layouts.master')

@section('title')
    Agent | Tickets Feed
@endsection

@section('content')
    <div class="new-ticket clearfix">
        <button type="button" class="btn bg-blue pull-right" data-toggle="modal" data-target="#addTicket">
            <i class="fa fa-plus"></i>  Add Ticket
        </button>
    </div>
    <div class="feed">
        <!-- My Tickets -->
        <div class="my-tickets">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-ticket"></i> &nbspMy Tickets</h3>
                </div>
                <div class="box-body">
                    <div class="callout callout-default callout-ticket-bg clearfix">
                        <h5 class="pull-left"><a href="" data-toggle="modal" data-target="#ticket">#10 Ticket Title</a></h5>
                        <div class="pull-right">
                            <span class="label bg-yellow">Opened</span>
                            <span class="label bg-red">High</span>
                            <span class="label bg-aqua">3</span>
                        </div>
                    </div>
                    <div class="callout callout-default callout-ticket-bg clearfix">
                        <h5 class="pull-left"><a href="" data-toggle="modal" data-target="#ticket">#10 Ticket Title</a></h5>
                        <div class="pull-right">
                            <span class="label bg-yellow">Opened</span>
                            <span class="label bg-red">High</span>
                            <span class="label bg-aqua">3</span>
                        </div>
                    </div>
                    <div class="callout callout-default callout-ticket-bg clearfix">
                        <h5 class="pull-left"><a href="" data-toggle="modal" data-target="#ticket">#10 Ticket Title</a></h5>
                        <div class="pull-right">
                            <span class="label bg-yellow">Opened</span>
                            <span class="label bg-red">High</span>
                            <span class="label bg-aqua">3</span>
                        </div>
                    </div>
                    <div class="callout callout-default callout-ticket-bg clearfix">
                        <h5 class="pull-left"><a href="" data-toggle="modal" data-target="#ticket">#10 Ticket Title</a></h5>
                        <div class="pull-right">
                            <span class="label bg-yellow">Opened</span>
                            <span class="label bg-red">High</span>
                            <span class="label bg-aqua">3</span>
                        </div>
                    </div>
                    <div class="callout callout-default callout-ticket-bg clearfix">
                        <h5 class="pull-left"><a href="" data-toggle="modal" data-target="#ticket">#10 Ticket Title</a></h5>
                        <div class="pull-right">
                            <span class="label bg-yellow">Opened</span>
                            <span class="label bg-red">High</span>
                            <span class="label bg-aqua">3</span>
                        </div>
                    </div>
                    <div class="callout callout-default callout-ticket-bg clearfix">
                        <h5 class="pull-left"><a href="" data-toggle="modal" data-target="#ticket">#10 Ticket Title</a></h5>
                        <div class="pull-right">
                            <span class="label bg-yellow">Opened</span>
                            <span class="label bg-red">High</span>
                            <span class="label bg-aqua">3</span>
                        </div>
                    </div>
                    <div class="callout callout-default callout-ticket-bg clearfix">
                        <h5 class="pull-left"><a href="" data-toggle="modal" data-target="#ticket">#10 Ticket Title</a></h5>
                        <div class="pull-right">
                            <span class="label bg-yellow">Opened</span>
                            <span class="label bg-red">High</span>
                            <span class="label bg-aqua">3</span>
                        </div>
                    </div>
                    <div class="callout callout-default callout-ticket-bg clearfix">
                        <h5 class="pull-left"><a href="" data-toggle="modal" data-target="#ticket">#10 Ticket Title</a></h5>
                        <div class="pull-right">
                            <span class="label bg-yellow">Opened</span>
                            <span class="label bg-red">High</span>
                            <span class="label bg-aqua">3</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="supervisor-tickets">
        <!-- Unassigned Tickets -->
        <div class="unassigned-tickets">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-ticket"></i> &nbspUnassigned Tickets</h3>
                </div>
                <div class="box-body">
                    <div class="callout callout-default callout-ticket-bg clearfix">
                        <div class="col-md-6">
                            <h5 class="pull-left">#11 Ticket Title</h5>
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
                            <h5 class="pull-left">#11 Ticket Title</h5>
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
                            <h5 class="pull-left">#11 Ticket Title</h5>
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
                            <h5 class="pull-left">#11 Ticket Title</h5>
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
                </div>
            </div>
        </div>
    </div>
    
    @include('ticket.ticketModal')
    @include('ticket.addTicketModal')

@endsection