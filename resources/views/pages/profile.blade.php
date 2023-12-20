@extends('base')
@section('title', 'My Profile')

@section('content')
        <!--	Banner   --->
        <div class="banner-full-row page-banner" style="background-image:url({{ asset('images/breadcromb.jpg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Profile</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="{{ route('root') }}">Home</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
         <!--	Banner   --->
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
<!--	My Profile    -->
<div class="full-row">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

    <h5 class="mt-5 mb-4 text-secondary">Profile</h5>
                            <div  class="table-striped font-14 pb-2">
                                <table class="w-100">
                                    <tbody>
                                        <tr>
                                            <td>Name </td>
                                            <td class="text-capitalize">{{ $user->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email </td>
                                            <td class="text-capitalize">{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Address </td>
                                            <td class="text-capitalize">{{ $user->address }}</td>
                                        </tr>
                                        <tr>
                                            <td>Mobile </td>
                                            <td class="text-capitalize">{{ $user->mobile }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

  </div>
  <div class="col-lg-4">
  </div>
</div></div></div>
<!--	My Profile    -->
@section('scripts')
@endsection
@endsection