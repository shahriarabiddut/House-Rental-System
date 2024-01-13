@extends('admin/layout')
@section('title', 'Agreements')

@section('content')


            <!-- Session Messages Starts -->
            @if(Session::has('success'))
            <div class="p-3 mb-2 bg-success text-white">
                <p>{{ session('success') }} </p>
            </div>
            @endif
            @if(Session::has('danger'))
            <div class="p-3 mb-2 bg-danger text-white">
                <p>{{ session('danger') }} </p>
            </div>
            @endif
            <!-- Session Messages Ends -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Agreements Data
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th >No.</th>
                            <th >Property</th>
                            <th >Type</th>
                            <th >Tenant</th>
                            <th >Added Date</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Property</th>
                            <th>Type</th>
                            <th>Tenant</th>
                            <th>Added Date</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if($data)
                        @foreach ($data as $key => $d)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $d->property->title }}</td>
                                <td>{{ $d->property->type }}</td>
                                <td>@if ($d->tenantid!='0')
                                    {{ $d->tenant->name }}
                                    @else
                                    N/A
                                @endif
                                    </td>
                                <td>{{ $d->updated_at }}</td>
                                <td><a href="{{ route('admin.agreement.show',$d->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"> View</i></a>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
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

