@extends('admin/layout')
@section('title', 'Payment Details')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Payment Details 
            <a href="{{ route('admin.payment.index') }}" class="float-right btn btn-success btn-sm"> <i class="fa fa-arrow-left"></i> View All </a> </h3>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
                <table class="table table-bordered" width="100%">   
                    <tr>
                    <th>Tenant Name </th>
                    <td>{{ $data->tenant->name }}</td>
                    </tr>
                    <tr>
                        <th>Tenant Email </th>
                        <td>{{ $data->tenant->email }}</td>
                        </tr>
                    <tr>
                        <th>Payment Status </th>
                        <td>
                            @switch($data->agreement->amountStatus)
                                @case(1)
                                    Payment Made Owner Need to Accept
                                    @break
                                @case(2)
                                    Accepted
                                    @break
                                @default
                                    Requested
                            @endswitch</td>
                    </tr>
                    <tr>
                        <th>Payment Amount </th>
                        <td>{{ $data->amount }}</td>
                    </tr>
                    <tr>
                        <th>Payment Method </th>
                        <td>{{ $data->method }}</td>
                    </tr>
                    <tr>
                        <th>Payment Type </th>
                        <td>{{ $data->type }}</td>
                    </tr>
                    <tr>
                        <th>Date </th>
                        <td>{{ $data->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Property </th>
                        <td>{{ $data->property->title }}</td>
                    </tr>
                    <tr>
                        <th>Owner </th>
                        <td>{{ $data->property->owner->name }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    @section('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    @endsection
@endsection

