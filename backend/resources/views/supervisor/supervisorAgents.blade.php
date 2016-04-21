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
                            <th>Open Tickets</th>
                            <th>Closed Tickets</th>
                            <th>Other Status Tickets</th>
                            <th>Other Status Tickets</th>
                            <th>Other Status Tickets</th>
                        </tr>
                        <tr>
                            <td>Mike Doe</td>
                            <td>mikeDoe@email.com</td>
                            <td class="text-center"><span class="label bg-aqua">7</span></td>
                            <td class="text-center"><span class="label bg-green">5</span></td>
                            <td class="text-center"><span class="label bg-red">10</span></td>
                            <td class="text-center"><span class="label bg-yellow">2</span></td>
                            <td class="text-center"><span class="label bg-blue">8</span></td>
                        </tr>
                        <tr>
                            <td>Alexander Pierce</td>
                            <td>alexanderPierce@email.com</td>
                            <td class="text-center"><span class="label bg-aqua">5</span></td>
                            <td class="text-center"><span class="label bg-green">10</span></td>
                            <td class="text-center"><span class="label bg-red">7</span></td>
                            <td class="text-center"><span class="label bg-yellow">3</span></td>
                            <td class="text-center"><span class="label bg-blue">13</span></td>
                        </tr>
                        <tr>
                            <td>Nadia Carmichael</td>
                            <td>nadiaCarmichael@email.com</td>
                            <td class="text-center"><span class="label bg-aqua">8</span></td>
                            <td class="text-center"><span class="label bg-green">16</span></td>
                            <td class="text-center"><span class="label bg-red">9</span></td>
                            <td class="text-center"><span class="label bg-yellow">2</span></td>
                            <td class="text-center"><span class="label bg-blue">5</span></td>
                        </tr>
                        <tr>
                            <td>Suzan Michael</td>
                            <td>suzanMichael@email.com</td>
                            <td class="text-center"><span class="label bg-aqua">7</span></td>
                            <td class="text-center"><span class="label bg-green">5</span></td>
                            <td class="text-center"><span class="label bg-red">10</span></td>
                            <td class="text-center"><span class="label bg-yellow">2</span></td>
                            <td class="text-center"><span class="label bg-blue">8</span></td>
                        </tr>
                        <tr>
                            <td>Alex Peterson</td>
                            <td>alexPeterson@email.com</td>
                            <td class="text-center"><span class="label bg-aqua">5</span></td>
                            <td class="text-center"><span class="label bg-green">10</span></td>
                            <td class="text-center"><span class="label bg-red">7</span></td>
                            <td class="text-center"><span class="label bg-yellow">3</span></td>
                            <td class="text-center"><span class="label bg-blue">13</span></td>
                        </tr>
                        <tr>
                            <td>Sarah Jonathan</td>
                            <td>sarahJonathan@email.com</td>
                            <td class="text-center"><span class="label bg-aqua">8</span></td>
                            <td class="text-center"><span class="label bg-green">16</span></td>
                            <td class="text-center"><span class="label bg-red">9</span></td>
                            <td class="text-center"><span class="label bg-yellow">2</span></td>
                            <td class="text-center"><span class="label bg-blue">5</span></td>
                        </tr> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection