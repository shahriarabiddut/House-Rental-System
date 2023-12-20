@extends('base')
@section('title', 'Searched Properties')

@section('content')
        <!--	Banner   --->
        <div class="banner-full-row page-banner" style="background-image:url({{ asset('images/breadcromb.jpg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Searched Properties</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="{{ route('root') }}">Home</a></li>
                                <li class="breadcrumb-item active">Searched Properties</li>
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
                            <div class="col-md-6">
                                <div class="featured-thumb hover-zoomer mb-4">
                                    <div class="overlay-black overflow-hidden position-relative"> <img src="{{ asset('storage/'.$d->pimage) }}" alt="pimage">
                                        
                                        @if($d->status=='available')
                                        <div class="sale bg-success text-white">
                                        Available for Rent
                                        @else
                                        <div class="sale bg-danger text-white">
                                            On Rent
                                        @endif
                                        </div>
                                        <div class="price text-primary text-capitalize">Tk.{{ $d->price}}<span class="text-white">{{ $d->bedroom}} BHK</span></div>
                                        
                                    </div>
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
                    @endforeach
                          <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center mt-4">
                                        <li class="page-item disabled"> <span class="page-link">Previous</span> </li>
                                        <li class="page-item active" aria-current="page"> <span class="page-link"> 1 <span class="sr-only">(current)</span> </span> </li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">...</li>
                                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                                        <li class="page-item"> <a class="page-link" href="#">Next</a> </li>
                                    </ul>
                                </nav>
                            </div>  
                        </div>
                    </div>
					
                    <div class="col-lg-4">
                        <div class="sidebar-widget mt-5">
                            <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4">Recently Added Property</h4>
                            <ul class="property_list_widget">
							
                                <li> <img src="" alt="pimage">
                                    <h6 class="text-secondary hover-text-success text-capitalize"><a href="">Title</a></h6>
                                    <span class="font-14"><i class="fas fa-map-marker-alt icon-success icon-small"></i> s</span>
                                    
                                </li>

                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
	<!--	Index property   -->
@section('scripts')
@endsection
@endsection