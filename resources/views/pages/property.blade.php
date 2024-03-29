@extends('base')
@section('title', 'Properties')

@section('content')
        <!--	Banner   --->
        <div class="banner-full-row page-banner" style="background-image:url({{ asset('images/breadcromb.jpg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>User Listed Property</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="{{ route('root') }}">Home</a></li>
                                <li class="breadcrumb-item active">User Listed Property</li>
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
		<!--	Index property   -->
        <div class="full-row">
            <div class="container">
                <div class="row">
				
					<div class="col-lg-8">
                        <div class="row">
					@foreach ($data as $d)
                    @if($d->status=='available')
                    @if($d->agreement)
                            <div class="col-md-6">
                                <div class="featured-thumb hover-zoomer mb-4">
                                <a href="{{ route('property.show',$d->id) }}">
                                    <div class="overlay-black overflow-hidden position-relative"> <img src="{{ asset('storage/'.$d->pimage) }}" alt="pimage">
                                        
                                        {{-- @if($d->status=='available')
                                        <div class="sale bg-success text-white">
                                        Available for Rent
                                        </div>
                                        @else
                                        <div class="sale bg-danger text-white">
                                            On Rent
                                        </div>
                                        @endif --}}
                                        
                                        <div class="price text-primary text-capitalize">Tk.{{ $d->price}}<span class="text-white">{{ $d->bedroom}} BHK</span></div>
                                        
                                    </div>
                                </a>
                                    <div class="featured-thumb-data shadow-one">
                                        <div class="p-4">
                                            <h5 class="text-secondary hover-text-success mb-2 text-capitalize"><a href="{{ route('property.show',$d->id) }}">{{ $d->title}}</a></h5>
                                            <span class="location text-capitalize"><i class="fas fa-map-marker-alt text-success"></i> {{ $d->location}}</span> </div>
                                        <div class="px-4 pb-4 d-inline-block w-100">
                                            <div class="float-left text-capitalize"><i class="fas fa-user text-success mr-1"></i>By :{{ $d->owner->name }}</div>
                                            <div class="float-right"><i class="far fa-calendar-alt text-success mr-1"></i> {{ $d->created_at}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endif
                    @endforeach
                          <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center mt-4">
                                        {{ $data->links('vendor.pagination.bootstrap-4') }}
                                    </ul>
                                </nav>
                            </div>  
                        </div>
                    </div>
					
                    <div class="col-lg-4">
                        <div class="sidebar-widget mt-5">
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
	<!--	Index property   -->
@section('scripts')
@endsection
@endsection