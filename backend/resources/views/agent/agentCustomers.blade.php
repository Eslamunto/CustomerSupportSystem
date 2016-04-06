@extends('layouts.master')

@section('title')
    Agent | Customers
@endsection

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title"><b>System Customers</b></h3>
            <div class="pull-right">
                <button type="button" class="btn bg-blue btn-sm" data-toggle="modal" data-target="#addCustomer">
                    <i class="fa fa-plus"></i>  New Customer
                </button>
            </div>
        </div>
        <div class="box-body">
            <?php $customers = \App\Customer::all() ?>

            <table id="systemCustomers" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Twitter Account</th>
                    <th>Facebook Account</th>
                    <th>Complains</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }} </td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->twitterUsername }}</td>
                        <td>{{ $customer->facebookUsername }}</td>
                        <td>7</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#editCustomer">Edit</a> | <a href="#">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('customer.addCustomerModal')
    @include('customer.editCustomerModal')

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
            $("#systemCustomers").DataTable();
        });
    </script>
@endsection