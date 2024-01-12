@extends('admin/layout')
@section('title', 'Propertys')

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
            <h3 class="m-0 font-weight-bold text-primary">Property Data
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>type</th>
                            <th>BHK</th>
                            <th>Status</th>
                            <th>Owner</th>
                            <th>Submitted</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>type</th>
                            <th>BHK</th>
                            <th>Status</th>
                            <th>Owner</th>
                            <th>Submitted</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if($data)
                        @foreach ($data as $key=> $d)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $d->title }}</td>
                            <td>{{ $d->type }}</td>
                            <td>{{ $d->bedroom }} BHK</td>
                            <td>{{ $d->status }}</td>
                            <td><a href="{{ route('admin.user.show',$d->owner->id) }}">{{ $d->owner->name }}</td>
                            <td>{{ $d->created_at }}</td>
                            
                            <td class="text-center">
                                <a href="{{ url('admin/property/'.$d->id) }}" class="btn btn-info btn-sm mb-1"><i class="fa fa-eye"></i></a> <br> 
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

