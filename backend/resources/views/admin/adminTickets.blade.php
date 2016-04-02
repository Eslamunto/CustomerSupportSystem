@extends('layouts.master')

@section('title')
    Admin | Tickets History
@endsection

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">System Tickets</h3>
            <button type="button" class="btn bg-blue btn-sm" data-toggle="modal" data-target="#addTicket">
                    <i class="fa fa-plus"></i>  New Ticket
            </button> 
        </div>
        <div class="box-body">
            <table id="systemTickets" class="table table-bordered table-striped">
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
                        <th>Action</th>
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
                        <td><a href="#" data-toggle="modal" data-target="#editTicket">Edit</a> | <a href="#">Delete</a></td>
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
                        <td><a href="#" data-toggle="modal" data-target="#editTicket">Edit</a> | <a href="#">Delete</a></td>
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
                        <td><a href="#" data-toggle="modal" data-target="#editTicket">Edit</a> | <a href="#">Delete</a></td>
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
                        <td><a href="#" data-toggle="modal" data-target="#editTicket">Edit</a> | <a href="#">Delete</a></td>
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
                        <td><a href="#" data-toggle="modal" data-target="#editTicket">Edit</a> | <a href="#">Delete</a></td>
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
                        <td><a href="#" data-toggle="modal" data-target="#editTicket">Edit</a> | <a href="#">Delete</a></td>
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
                        <td><a href="#" data-toggle="modal" data-target="#editTicket">Edit</a> | <a href="#">Delete</a></td>
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
                        <td><a href="#" data-toggle="modal" data-target="#editTicket">Edit</a> | <a href="#">Delete</a></td>
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
                        <td><a href="#" data-toggle="modal" data-target="#editTicket">Edit</a> | <a href="#">Delete</a></td>
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
                        <td><a href="#" data-toggle="modal" data-target="#editTicket">Edit</a> | <a href="#">Delete</a></td>
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
                        <td><a href="#" data-toggle="modal" data-target="#editTicket">Edit</a> | <a href="#">Delete</a></td>
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
                        <td><a href="#" data-toggle="modal" data-target="#editTicket">Edit</a> | <a href="#">Delete</a></td>
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
                        <td><a href="#" data-toggle="modal" data-target="#editTicket">Edit</a> | <a href="#">Delete</a></td>
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
                        <td><a href="#" data-toggle="modal" data-target="#editTicket">Edit</a> | <a href="#">Delete</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    @include('ticket.addTicketModal')
    @include('ticket.editTicketModal')
          
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
            $("#systemTickets").DataTable();
        });
    </script>  
@endsection