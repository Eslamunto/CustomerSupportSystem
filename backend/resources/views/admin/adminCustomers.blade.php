@extends('layouts.master')

@section('title')
    Admin | Customers
@endsection



@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ Session::get('message') }}
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
                        <th>Email</th>
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
                        <td>{{ $customer->email }} </td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->twitterUsername }}</td>
                        <td>{{ $customer->facebookUsername }}</td>
                        <td>7</td>
                        <td>
                            <a href="" class="update-customer-button" data-update-route="{{ Route('updateCustomer', $customer->id) }}" data-toggle="modal" data-target="#editCustomer"> Edit </a> |
                            <a href="{{ Route('deleteCustomer', $customer->id) }}" data-method="delete" data-token="{{ csrf_token() }}" data-confirm="Are you sure you want to delete '{{ $customer->name }}' ?"> Delete </a>                        </td>
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
        $('.update-customer-button').on('click', function () {
            $('#update-customer-form').attr('action', $(this).data('update-route'));
        });

        $('[data-method]').click(function(e) {
            e.preventDefault();
            // If the user confirm the delete
            if (confirm($(this).data('confirm'))) {
                // Get the route URL
                var url = $(this).prop('href');
                // Get the token
                var token = $(this).data('token');
                //Get the method type
                var method = $(this).data('method');
                // Create a form element
                var $form = $('<form/>', {action: url, method: 'post'});
                // Add the DELETE hidden input method
                var $inputMethod = $('<input/>', {type: 'hidden', name: '_method', value: method});
                // Add the token hidden input
                var $inputToken = $('<input/>', {type: 'hidden', name: '_token', value: token});
                // Append the inputs to the form, hide the form, append the form to the <body>, SUBMIT !
                $form.append($inputMethod, $inputToken).hide().appendTo('body').submit();
            }
        });
        $(function () {
        $("#systemCustomers").DataTable();
        });
    </script> 
@endsection