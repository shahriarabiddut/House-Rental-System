@extends('admin/layout')
@section('title', ' Edit | Profile')

@section('content')
<!-- Page Heading -->

    <div class="container py-5">
    <h1 class="border border-secondary rounded h3 mb-2 text-gray-800 p-2 bg-white"> Editing Profile </h1>

    <div class="table-responsive">
        <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tbody>
                <tr>
                    <th>Full Name <span class="text-danger">*</span></th>
                    <td><input required name="name" type="text" class="form-control" value="{{ $user->name }}"></td>
                </tr><tr>
                    <th>Email <span class="text-danger">*</span></th>
                    <td><input required name="email" type="email" class="form-control" value="{{ $user->email }}"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <input name="userid" type="hidden" value="{{ $user->id }}">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
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