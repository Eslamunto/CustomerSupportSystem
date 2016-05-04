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
                                    <td class="text-center">
                                        <span class="label" style="background-color:{{ $ticket_status->color }};">
                                            {{ $agents_tickets_with_Statuses[$agent->id][$ticket_status->id] }}
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