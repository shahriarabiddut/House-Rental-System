@extends('layout')
@section('title', ' Edit Profile | User Dashboard')

@section('content')
<!-- Page Heading -->

    <div class="container py-5">
    <h1 class="border border-secondary rounded h3 mb-2 text-gray-800 p-2 bg-white"> Editing Profile </h1>

    <div class="table-responsive">
        <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tbody>
                <tr>
                    <th>Full Name <span class="text-danger">*</span></th>
                    <td><input required name="name" type="text" class="form-control" value="{{ $user->name }}"></td>
                </tr><tr>
                    <th>Mobile No <span class="text-danger">*</span></th>
                    <td><input required name="mobile" type="text" class="form-control" value="{{ $user->mobile }}"></td>
                </tr><tr>
                    <th>Photo</th>
                    <td><input name="photo" type="file">
                        <input name="prev_photo" type="hidden" value="{{ $user->photo }}">
                        <img width="100" src="{{$user->photo ? asset('storage/'.$user->photo) : ''}}" >
                    </td>
                </tr><tr>
                    <th>Address</th>
                    <td><textarea name="address" class="form-control">{{ $user->address }}</textarea></td>
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