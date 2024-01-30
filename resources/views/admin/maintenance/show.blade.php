@extends('admin/layout')
@section('title', 'Maintenance Request Details')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Maintenance Request Details 
            <a href="{{ url('admin/property') }}" class="float-right btn btn-success btn-sm"> <i class="fa fa-arrow-left"></i> View All </a> </h3>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
                <table class="table table-bordered" width="100%">
                        
                        <tr>
                        <th>Property </th>
                             <td><a href="{{ route('property.show',$data->property->id) }}">{{ $data->property->title }}</a></td>
                         </tr>
                        <tr>
                            <th>Owner </th>
                            <td>{{ $data->owner->name }}</td>
                        </tr>  
                        <tr>
                            <th>Tenant </th>
                            <td>{{ $data->tenant->name }}</td>
                        </tr>  
                        <tr>
                            <th>Request Task </th>
                            <td>{{ $data->task }}</td>
                        </tr>  
                        <tr>
                            <th>Request Reply </th>
                            <td>{{ $data->reply }}</td>
                        </tr> 
                        <tr>
                            <th>Request Status </th>
                            <td>@switch($data->status)
                                @case(0)
                                    Not Read
                                    @break
                                @case(1)
                                    Read
                                    @break
                                @case(2)
                                    Working
                                    @break
                                @case(3)
                                    Completed
                                    @break
                                @default
                                    
                            @endswitch </td>
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

