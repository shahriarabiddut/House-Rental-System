@extends('admin/layout')
@section('title', 'Email Details')
@section('content')


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"> Email Details </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Email Details of {{ $data->title }} 
            <a href="{{ url('admin/email') }}" class="float-right btn btn-success btn-sm"> <i class="fa fa-arrow-left"></i> View All </a> </h6>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
                <table class="table table-bordered" width="100%">
                        
                        <tr>
                        <th>Email </th>
                             <td>{{ $data->email }}</td>
                         </tr><tr>
                       <th>Name </th>
                            <td>{{ $data->name }}</td>
                        </tr><tr>
                        <th>Subject </th>
                                <td>{{ $data->subject }}</td>
                        </tr><tr>
                        <th>Objective </th>
                                <td>{{ $data->objective }}</td>
                        </tr><tr>
                        <tr>
                        <th>Message </th>
                                <td>{{ $data->message }}</td>
                        </tr><tr>
                        <th>Sent Date </th>
                                <td>{{ $data->created_at }}</td>
                            </tr>
                            
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

