@extends('layouts.master')

@section('title')
    Supervisor | Tickets History
@endsection

@section('content')
    <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Team Tickets History</h3>
        </div>
        <div class="box-body">
            <table id="supervisorTicketsHistory" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Ticket Title</th>
                        <th>Assigned To</th>
                        <th>Assignee Role</th>
                        <th>Status</th>
                        <th>Priority</th>
                        <th>Customer Name</th>
                        <th>Customer E-mail</th>
                        <th>Created On</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Ticket Tittle</td>
                        <td>Assignee Name</td>
                        <td>Agent</td>
                        <td><span class="label bg-aqua">Opened</span></td>
                        <td><span class="label bg-red">High</span></td>
                        <td>Name</td>
                        <td>customer@email.com</td>
                        <td>dd/mm/yyyy 00:00:00</td>
                    </tr>
                    <tr>
                        <td>Ticket Tittle</td>
                        <td>Assignee Name</td>
                        <td>Agent</td>
                        <td><span class="label bg-aqua">Opened</span></td>
                        <td><span class="label bg-red">High</span></td>
                        <td>Name</td>
                        <td>customer@email.com</td>
                        <td>dd/mm/yyyy 00:00:00</td>
                    </tr>
                    <tr>
                        <td>Ticket Tittle</td>
                        <td>Assignee Name</td>
                        <td>Agent</td>
                        <td><span class="label bg-black">Closed</span></td>
                        <td><span class="label bg-red">High</span></td>
                        <td>Name</td>
                        <td>customer@email.com</td>
                        <td>dd/mm/yyyy 00:00:00</td>
                    </tr>
                    <tr>
                        <td>Ticket Tittle</td>
                        <td>Assignee Name</td>
                        <td>Supervisor</td>
                        <td><span class="label bg-black">Closed</span></td>
                        <td><span class="label bg-red">High</span></td>
                        <td>Name</td>
                        <td>customer@email.com</td>
                        <td>dd/mm/yyyy 00:00:00</td>
                    </tr>
                    <tr>
                        <td>Ticket Tittle</td>
                        <td>Assignee Name</td>
                        <td>Supervisor</td>
                        <td><span class="label bg-aqua">Opened</span></td>
                        <td><span class="label bg-red">High</span></td>
                        <td>Name</td>
                        <td>customer@email.com</td>
                        <td>dd/mm/yyyy 00:00:00</td>
                    </tr>
                    <tr>
                        <td>Ticket Tittle</td>
                        <td>Assignee Name</td>
                        <td>Supervisor</td>
                        <td><span class="label bg-aqua">Opened</span></td>
                        <td><span class="label bg-yellow">Medium</span></td>
                        <td>Name</td>
                        <td>customer@email.com</td>
                        <td>dd/mm/yyyy 00:00:00</td>
                    </tr>
                    <tr>
                        <td>Ticket Tittle</td>
                        <td>Assignee Name</td>
                        <td>Agent</td>
                        <td><span class="label bg-purple">Pending</span></td>
                        <td><span class="label bg-yellow">Medium</span></td>
                        <td>Name</td>
                        <td>customer@email.com</td>
                        <td>dd/mm/yyyy 00:00:00</td>
                    </tr>
                    <tr>
                        <td>Ticket Tittle</td>
                        <td>Assignee Name</td>
                        <td>Supervisor</td>
                        <td><span class="label bg-aqua">Opened</span></td>
                        <td><span class="label bg-yellow">Medium</span></td>
                        <td>Name</td>
                        <td>customer@email.com</td>
                        <td>dd/mm/yyyy 00:00:00</td>
                    </tr>
                    <tr>
                        <td>Ticket Tittle</td>
                        <td>Assignee Name</td>
                        <td>Agent</td>
                        <td><span class="label bg-aqua">Opened</span></td>
                        <td><span class="label bg-yellow">Medium</span></td>
                        <td>Name</td>
                        <td>customer@email.com</td>
                        <td>dd/mm/yyyy 00:00:00</td>
                    </tr>
                    <tr>
                        <td>Ticket Tittle</td>
                        <td>Assignee Name</td>
                        <td>Agent</td>
                        <td><span class="label bg-purple">Pending</span></td>
                        <td><span class="label bg-green">Low</span></td>
                        <td>Name</td>
                        <td>customer@email.com</td>
                        <td>dd/mm/yyyy 00:00:00</td>
                    </tr>
                    <tr>
                        <td>Ticket Tittle</td>
                        <td>Assignee Name</td>
                        <td>Agent</td>
                        <td><span class="label bg-black">Closed</span></td>
                        <td><span class="label bg-green">Low</span></td>
                        <td>Name</td>
                        <td>customer@email.com</td>
                        <td>dd/mm/yyyy 00:00:00</td>
                    </tr>
                    <tr>
                        <td>Ticket Tittle</td>
                        <td>Assignee Name</td>
                        <td>Agent</td>
                        <td><span class="label bg-aqua">Opened</span></td>
                        <td><span class="label bg-green">Low</span></td>
                        <td>Name</td>
                        <td>customer@email.com</td>
                        <td>dd/mm/yyyy 00:00:00</td>
                    </tr>
                    <tr>
                        <td>Ticket Tittle</td>
                        <td>Assignee Name</td>
                        <td>Agent</td>
                        <td><span class="label bg-purple">Pending</span></td>
                        <td><span class="label bg-green">Low</span></td>
                        <td>Name</td>
                        <td>customer@email.com</td>
                        <td>dd/mm/yyyy 00:00:00</td>
                    </tr>
                    <tr>
                        <td>Ticket Tittle</td>
                        <td>Assignee Name</td>
                        <td>Agent</td>
                        <td><span class="label bg-purple">Pending</span></td>
                        <td><span class="label bg-green">Low</span></td>
                        <td>Name</td>
                        <td>customer@email.com</td>
                        <td>dd/mm/yyyy 00:00:00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

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
        $(function () {
            $("#supervisorTicketsHistory").DataTable();
        });
    </script>  
@endsection