@extends('admin/layout')
@section('title', 'Support Tickets')

@section('content')


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Support Tickets</h1>
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
            <h6 class="m-0 font-weight-bold text-primary">Support Tickets Data
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Student</th>
                            <th>Subject</th>
                            <th>Category</th>
                            <th>RepliedBy</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Student</th>
                            <th>Subject</th>
                            <th>Category</th>
                            <th>RepliedBy</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if($data)
                        @foreach ($data as $key => $d)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $d->student->name }} - {{ $d->student->rollno }}</td>
                            <td>{{ $d->subject }}</td>
                            <td>{{ $d->category }}</td>
                            <td>
                                @if ($d->repliedby)
                                {{ $d->staff->name }}
                                @else
                                No Reply
                                @endif

                            </td>
                            <td>{{ $d->created_at }} </td>
                            
                                @switch($d->status)
                                    @case('2')
                                    <td class="bg-warning text-white">On Process</td>
                                        @break
                                    @case('1')
                                    <td class="bg-success text-white"> Solved</td>
                                        @break
                                    @default
                                    <td>  No Reply</td>
                                @endswitch
                            
                            
                            <td class="text-center">
                                <a href="{{ url('admin/support/'.$d->id) }}" class="btn btn-warning btn-sm mb-1"><i class="fa fa-eye"> View</i></a> <br>
                                
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

