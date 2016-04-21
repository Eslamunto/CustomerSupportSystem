@extends('layouts.master')

@section('title')
    Supervisor | Team Agents
@endsection

@section('content')
    <div class="support-team-stat">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-optin-monster"></i> &nbspSupport Team</h3>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>Support Agent</th>
                            <th>Email</th>
                            @foreach ($tickets_statuses as $ticket_status)
                                <th class="text-center">{{ $ticket_status->name }}</th>
                            @endforeach
                        </tr>
                        @foreach ($agents as $agent)
                            <tr>
                                <td>{{ $agent->name }}</td>
                                <td>{{ $agent->email }}</td>
                                @foreach ($tickets_statuses as $ticket_status)
                                    {{-- <td>{{ App\UserTicket::where('userId', $agent->id)->count() }}</td> --}}
                                    <?php $ticket_status_number = \DB::table('user_tickets')->join('ticket', 'user_tickets.ticketId', '=', 'ticket.id')->where('user_tickets.userId', $agent->id)->where('ticket.statusId', $ticket_status->id)->count(); ?>
                                    <td class="text-center">
                                        <span class="label" style="background-color:{{ $ticket_status->color }};">
                                            {{ $ticket_status_number }}
                                        </span>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection