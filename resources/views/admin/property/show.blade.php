@extends('admin/layout')
@section('title', 'Property Details')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Property Details of {{ $data->title }} 
            <a href="{{ url('admin/property') }}" class="float-right btn btn-success btn-sm"> <i class="fa fa-arrow-left"></i> View All </a> </h3>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
                <table class="table table-bordered" width="100%">
                        
                        <tr>
                        <th>Property </th>
                             <td>{{ $data->title }}</td>
                         </tr><tr>
                            <th>Type </th>
                                    <td>{{ $data->type }}</td>
                            </tr><tr>
                       <th>BHK </th>
                            <td>{{ $data->bedroom }} BHK</td>
                        </tr><tr>
                        <th>Address </th>
                                <td>{{ $data->location }}</td>
                        </tr><tr>
                        <tr>
                        <th>Floor </th>
                                <td>{{ $data->floor }}</td>
                        </tr><tr>
                            <th>Total Floor </th>
                            <td>{{ $data->totalfloor }}</td>
                        </tr>
                        <tr>
                            <th>City </th>
                            <td>{{ $data->city }}</td>
                        </tr>  
                        <tr>
                            <th>Division </th>
                            <td>{{ $data->state }}</td>
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

