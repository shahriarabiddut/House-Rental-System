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
		 


<!--	login   --->
<div class="col col-md-2 bg-gray"></div>
<div class="page-wrappers login-body col col-md-8 p-2 text-center bg-subtle">
  <div class="login-wrapper">
    <h5 class="mt-5 mb-4 text-secondary">My Profile</h5>
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
                            <div  class="table-striped font-14 pb-2">
                                <table class="w-100">
                                    <tbody>
                                        <tr>
                                            <td>Name </td>
                                            <td class="text-capitalize">{{ $user->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email </td>
                                            <td >{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Address </td>
                                            <td class="text-capitalize">
                                            @if ($user->address!='')
                                                {{ $user->address }}
                                            @else
                                                Please Update Address
                                            @endif </td>
                                        </tr>
                                        <tr>
                                            <td>Mobile </td>
                                            <td class="text-capitalize">{{ $user->mobile }}</td>
                                        </tr>
                                        <tr>
                                            <td>NID Number </td>
                                            <td class="text-capitalize">
                                                    @if ($user->nid!=null)
                                                        {{ $user->nid }}
                                                    @else
                                                        Please Update NID
                                                    @endif
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><a href="{{ route('user.profile.edit') }}"><button class="btn btn-block btn-primary">Edit Profile</button></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
  </div>
</div>

<div class="col col-md-2 bg-gray"></div>
<!--	login  -->
@section('scripts')
@endsection
@endsection