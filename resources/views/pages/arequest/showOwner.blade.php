@extends('base')
@section('title', 'Agreement Request')

@section('content')
        <!--	Banner   --->
        <div class="banner-full-row page-banner" style="background-image:url({{ asset('images/breadcromb.jpg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Agreement Request - Property {{ $data->property->title }}</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="{{ route('root') }}">Home</a></li>
                                <li class="breadcrumb-item active">Agreement Request - Property {{ $data->property->title }} </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
         <!--	Banner   --->

		<!--	Index property   -->
        <div class="full-row">
            <div class="container">
                <div class="row"> 
                    <div class="col-lg-8">

                        <div class="row mb-4">
                            
                        </div>
                        <div class="property-details">
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
                            
                            <h5 class="mt-2 mb-4 text-secondary">Agreement Request Details </h5>
                            <div  class="table-striped font-14 pb-2">
                                <p>
                                    {{ $data->terms }} 
                                </p>
                            </div>
                            
                        </div> 
                    </div>
					
                    <div class="col-lg-4">
                        
                        <div class="sidebar-widget mt-5">
                            <a href="{{ route('property.show',$data->property->id) }}">
                                <div class="bg-info d-block my-1 px-3 py-2 rounded text-center text-white text-capitalize">
                                    View Property
                                </div></a>
                                @auth
                                @if (Auth::user()->type!='tenant' || Auth::user()->id == $data->property->uid)
                                <hr>
                                @if ($data->status==0)
                                <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4">Action</h4>
                                <a href="{{ route('user.aRequest.accept',$data->id) }}">
                                    <div class="bg-success d-block my-1 px-3 py-2 rounded text-center text-white text-capitalize">
                                        Approve Agreement Request
                                    </div></a>
                                    <hr>
                                <a href="{{ route('user.aRequest.reject',$data->id) }}">
                                    <div class="bg-danger d-block my-1 px-3 py-2 rounded text-center text-white text-capitalize">
                                        Reject Agreement Request
                                </div></a>
                                @endif
                                @endauth
                            </div>
                            @endif
                        
                    </div>
                </div>
            </div>
        </div>
	<!--	Index property   -->
@section('scripts')
@endsection
@endsection