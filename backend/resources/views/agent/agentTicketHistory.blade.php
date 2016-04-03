@extends('layouts.master')

@section('title')
    Agent | Tickets History
@endsection

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title"><b>Agent Tickets History</b></h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table id="agentTicketsHistory" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Ticket Title</th>
                        <th>Customer Name</th>
                        <th>Customer Email</th>
                        <th>Status</th>
                        <th>Priority</th>
                        <th>Created On</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Ticket Title</td>
                        <td>Foo Bar</td>
                        <td>foo_bar@email.com</td>
                        <td><span class="label bg-black">Closed</span></td>
                        <td><span class="label bg-red">High</span></td>
                        <td> 01/03/2016 10:00:00</td>
                    </tr>
                    <tr>
                        <td>Ticket Title</td>
                        <td>Foo Bar</td>
                        <td>foo_bar@email.com</td>
                        <td><span class="label bg-black">Closed</span></td>
                        <td><span class="label bg-red">High</span></td>
                        <td> 01/03/2016 10:00:00</td>
                    </tr>
                    <tr>
                        <td>Ticket Title</td>
                        <td>Foo Bar</td>
                        <td>foo_bar@email.com</td>
                        <td><span class="label bg-black">Closed</span></td>
                        <td><span class="label bg-red">High</span></td>
                        <td> 01/03/2016 10:00:00</td>
                    </tr>
                    <tr>
                        <td>Ticket Title</td>
                        <td>Foo Bar</td>
                        <td>foo_bar@email.com</td>
                        <td><span class="label bg-black">Closed</span></td>
                        <td><span class="label bg-red">High</span></td>
                        <td> 01/03/2016 10:00:00</td>
                    </tr>
                    <tr>
                        <td>Ticket Title</td>
                        <td>Lorem Ipsum</td>
                        <td>lorem_ipsum@email.com</td>
                        <td><span class="label bg-aqua">Opened</span></td>
                        <td><span class="label bg-red">High</span></td>
                        <td> 01/03/2016 10:00:00</td>
                    </tr>
                    <tr>
                        <td>Ticket Title</td>
                        <td>Lorem Ipsum</td>
                        <td>lorem_ipsum@email.com</td>
                        <td><span class="label bg-aqua">Opened</span></td>
                        <td><span class="label bg-red">High</span></td>
                        <td> 01/03/2016 10:00:00</td>
                    </tr>

                    <tr>
                        <td>Ticket Title</td>
                        <td>Lorem Ipsum</td>
                        <td>lorem_ipsum@email.com</td>
                        <td><span class="label bg-aqua">Opened</span></td>
                        <td><span class="label bg-yellow">Medium</span></td>
                        <td> 01/03/2016 10:00:00</td>
                    </tr>
                    <tr>
                        <td>Ticket Title</td>
                        <td>Lorem Ipsum</td>
                        <td>lorem_ipsum@email.com</td>
                        <td><span class="label bg-aqua">Opened</span></td>
                        <td><span class="label bg-yellow">Medium</span></td>
                        <td> 01/03/2016 10:00:00</td>
                    </tr>
                    <tr>
                        <td>Ticket Title</td>
                        <td>Lorem Ipsum</td>
                        <td>lorem_ipsum@email.com</td>
                        <td><span class="label bg-purple">Pending</span></td>
                        <td><span class="label bg-yellow">Medium</span></td>
                        <td> 01/03/2016 10:00:00</td>
                    </tr>
                    <tr>
                        <td>Ticket Title</td>
                        <td>Lorem Ipsum</td>
                        <td>lorem_ipsum@email.com</td>
                        <td><span class="label bg-purple">Pending</span></td>
                        <td><span class="label bg-yellow">Medium</span></td>
                        <td> 01/03/2016 10:00:00</td>
                    </tr>
                    <tr>
                        <td>Ticket Title</td>
                        <td>Lorem Ipsum</td>
                        <td>lorem_ipsum@email.com</td>
                        <td><span class="label bg-purple">Pending</span></td>
                        <td><span class="label bg-yellow">Medium</span></td>
                        <td> 01/03/2016 10:00:00</td>
                    </tr>
                    <tr>
                        <td>Ticket Title</td>
                        <td>Lorem Ipsum</td>
                        <td>lorem_ipsum@email.com</td>
                        <td><span class="label bg-purple">Pending</span></td>
                        <td><span class="label bg-green">Low</span></td>
                        <td> 01/03/2016 10:00:00</td>
                    </tr>
                    <tr>
                        <td>Ticket Title</td>
                        <td>Lorem Ipsum</td>
                        <td>lorem_ipsum@email.com</td>
                        <td><span class="label bg-purple">Pending</span></td>
                        <td><span class="label bg-green">Low</span></td>
                        <td> 01/03/2016 10:00:00</td>
                    </tr>
                    <tr>
                        <td>Ticket Title</td>
                        <td>Lorem Ipsum</td>
                        <td>lorem_ipsum@email.com</td>
                        <td><span class="label bg-aqua">Opened</span></td>
                        <td><span class="label bg-green">Low</span></td>
                        <td> 01/03/2016 10:00:00</td>
                    </tr>
                    <tr>
                        <td>Ticket Title</td>
                        <td>Lorem Ipsum</td>
                        <td>lorem_ipsum@email.com</td>
                        <td><span class="label bg-aqua">Opened</span></td>
                        <td><span class="label bg-green">Low</span></td>
                        <td> 01/03/2016 10:00:00</td>
                    </tr>
                    <tr>
                        <td>Ticket Title</td>
                        <td>Lorem Ipsum</td>
                        <td>lorem_ipsum@email.com</td>
                        <td><span class="label bg-aqua">Opened</span></td>
                        <td><span class="label bg-green">Low</span></td>
                        <td> 01/03/2016 10:00:00</td>
                    </tr>
                    <tr>
                        <td>Ticket Title</td>
                        <td>Lorem Ipsum</td>
                        <td>lorem_ipsum@email.com</td>
                        <td><span class="label bg-black">Closed</span></td>
                        <td><span class="label bg-green">Low</span></td>
                        <td> 01/03/2016 10:00:00</td>
                    </tr>
                    <tr>
                        <td>Ticket Title</td>
                        <td>Lorem Ipsum</td>
                        <td>lorem_ipsum@email.com</td>
                        <td><span class="label bg-black">Closed</span></td>
                        <td><span class="label bg-red">High</span></td>
                        <td> 01/03/2016 10:00:00</td>
                    </tr>
                    <tr>
                        <td>Ticket Title</td>
                        <td>Lorem Ipsum</td>
                        <td>lorem_ipsum@email.com</td>
                        <td><span class="label bg-black">Closed</span></td>
                        <td><span class="label bg-red">High</span></td>
                        <td> 01/03/2016 10:00:00</td>
                    </tr>
                    <tr>
                        <td>Ticket Title</td>
                        <td>Lorem Ipsum</td>
                        <td>lorem_ipsum@email.com</td>
                        <td><span class="label bg-purple">Pending</span></td>
                        <td><span class="label bg-red">High</span></td>
                        <td> 01/03/2016 10:00:00</td>
                    </tr>
                    <tr>
                        <td>Ticket Title</td>
                        <td>Lorem Ipsum</td>
                        <td>lorem_ipsum@email.com</td>
                        <td><span class="label bg-purple">Pending</span></td>
                        <td><span class="label bg-red">High</span></td>
                        <td> 01/03/2016 10:00:00</td>
                    </tr>
                    <tr>
                        <td>Ticket Title</td>
                        <td>Dummy Ipsum</td>
                        <td>lorem_ipsum@email.com</td>
                        <td><span class="label bg-purple">Pending</span></td>
                        <td><span class="label bg-red">High</span></td>
                        <td> 01/03/2016 10:00:00</td>
                    </tr>
                </tbody>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->

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
            $("#agentTicketsHistory").DataTable();
        });
    </script>  
@endsection