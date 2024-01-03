@extends('base')
@section('title', ' Edit Profile | User')

@section('content')
 <!--	Banner   --->
 <div class="banner-full-row page-banner" style="background-image:url({{ asset('images/breadcromb.jpg') }});">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Edit Profile</b></h2>
            </div>
            <div class="col-md-6">
                <nav aria-label="breadcrumb" class="float-left float-md-right">
                    <ol class="breadcrumb bg-transparent m-0 p-0">
                        <li class="breadcrumb-item text-white"><a href="{{ route('root') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
 <!--	Banner   --->
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
                    <th>NID No <span class="text-danger">*</span></th>
                    <td><input required name="nid" type="number" class="form-control" placeholder="Enter NID number" value="{{ $user->nid }}"></td>
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