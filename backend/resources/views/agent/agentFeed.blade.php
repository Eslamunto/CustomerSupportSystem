@extends('layouts.master')

@section('title')
    Agent | Tickets Feed
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
<!-- ==================================================================================================================== -->

                <div class="box-body">
                    @foreach ($userAssignedTickets as $ticket)
                        <div class="callout callout-default callout-ticket-bg clearfix">
                            <h5 class="pull-left"><a class="set-ticket-status" data-toggle="modal" data-target="#ticket-{{$ticket->id}}">{{ $ticket->title }} </a></h5>
                            @include('ticket.ticketModal', ['ticket' => $ticket])
                            <div class="pull-right">
                                <span class="label" style="background-color:{{ $ticket->statusColor }}">{{$ticket->statusName}}</span>
                                <span class="label" style="background-color:{{ $ticket->priorityColor }}">{{$ticket->priorityName}}</span>
                            </div>
                        </div>
                    @endforeach
<!-- ==================================================================================================================== -->

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
                    @foreach ($unassignedTickets as $ticket)
                        <div class="callout callout-default callout-ticket-bg clearfix" style="background-color: #FFEDED">
                            <h5 class="pull-left"><a href="" data-toggle="modal" data-target="#ticket">{{ $ticket->title }} </a></h5>
                            <form method="POST" action="{{ Route('claimTicketAgent', $ticket->id) }}">
                                {!! csrf_field() !!}
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-danger btn-sm pull-right"><i class="fa fa-medkit"></i> Claim </button>
                                </div>
                            </form>
                        </div>
                     @endforeach
                </div>
            </div>
        </div>
    </div>
    
    @include('ticket.addTicketModal')

@endsection
@section('scripts')
<!-- DataTables -->
{{ HTML::script('plugins/datatables/jquery.dataTables.min.js') }}
{{ HTML::script('plugins/datatables/dataTables.bootstrap.min.js') }}
<!-- page script -->
<script>
    // $('.set-ticket-status').on('click', function () {
    //     $('#set-status-from').attr('action', $(this).data('status-route'));
    // });
</script>
@endsection