@extends('admin/layout')
@section('title', 'Edit Settings')
@section('content')


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Editing Settings</h1>
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
        <div class="card-body">
            @foreach ($datas as $data)
            @if ($data->id==1)
            <h2 class="bg-info text-white pl-2">Site Data</h2>
            @endif
            @if ($data->id==5)
            <h2 class="bg-info text-white pl-2">Contacts Data</h2>
            @endif
            <div class="table-responsive">
                <form method="POST" action="{{ url('admin/settings/update/'.$data->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tbody>
                        
                        <tr>
                            <th width="40%">
                                @switch($data->name)
                                    @case($data->name=='title')
                                        Website Title
                                        @break
                                    @case($data->name=='logo')
                                        Website Logo and Icon
                                    @break
                                    @case($data->name=='systemname')
                                        Dashboard Header Title
                                    @break
                                    @case($data->name=='bgimage')
                                        Login Background
                                    @break
                                    @case($data->name=='contactemail')
                                        Email
                                    @break
                                    @case($data->name=='contactphone')
                                        Phone
                                    @break
                                    @case($data->name=='address')
                                        Address
                                    @break
                                    @default
                                        {{ $data->name }}
                                @endswitch
                                
                            </th>
                            <td width="40%"><input required name="value" type="text" class="form-control" value="{{ $data->value }}"></td>
                            <td width="20%"><button type="submit" class="btn btn-primary">Update</button></td>
                        </tr>
                        </tbody>
                    </table>
                </form>
                </div>
            @endforeach
            
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

