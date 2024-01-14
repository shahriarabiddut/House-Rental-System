@extends('admin/layout')
@section('title', 'Booking Details')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Booking Details 
            <a href="{{ route('admin.booking.index') }}" class="float-right btn btn-success btn-sm"> <i class="fa fa-arrow-left"></i> View All </a> </h3>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
                <table class="table table-bordered" width="100%">   
                    <tr>
                    <th>Tenant Name </th>
                    <td><a href="{{ route('user.view',$data->tenant->id) }}">{{ $data->tenant->name }}</a></td>
                    </tr>
                    <tr>
                        <th>Tenant Email </th>
                        <td>{{ $data->tenant->email }}</td>
                        </tr>
                    <tr>
                        <th>Booking Status </th>
                        <td @if ($data->revokeDate == null)
                            class="bg-success text-white"> Active
                         @else
                             class="bg-warning text-white"> Checked Out on {{ $data->revokeDate }}
                         @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Payment Data </th>
                        <td>{{ $data->payment->amount }} Tk </td>
                    </tr>
                    <tr>
                        <th>Payment Data </th>
                        <td>{{ $data->payment->method }} ( {{ $data->payment->type }} purpose)</td>
                    </tr>
                    <tr>
                        <th>Check in Date </th>
                        <td>{{ $data->date }}</td>
                    </tr>
                    <tr>
                        <th>Property </th>
                        <td><a href="{{ route('property.show',$data->property->id) }}">{{ $data->property->title }}</a>
                            </td>
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

