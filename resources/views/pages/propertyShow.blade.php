@extends('base')
@section('title', 'Properties')

@section('content')
        <!--	Banner   --->
        <div class="banner-full-row page-banner" style="background-image:url({{ asset('images/breadcromb.jpg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Property - {{ $data->title }}</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="{{ route('root') }}">Home</a></li>
                                <li class="breadcrumb-item active">Property - {{ $data->title }}</li>
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
                        <div class="row">
                            <div class="col-md-12">
                                <div id="single-property" style="width:1200px; height:700px; margin:30px auto 50px;"> 
                                    <!-- Slide 1-->
                                    <div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="{{ asset('storage/'.$data->pimage) }}" class="ls-bg" alt="" /> </div>
                                    
                                    <!-- Slide n-->
                                    @foreach ($data->propertyImage as $propertyImage)
                                    <div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="{{ asset('storage/'.$propertyImage->path) }}" class="ls-bg" alt="" /> </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                @if($data->status=='available')
                                <div class="bg-success d-table px-3 py-2 rounded text-white text-capitalize">
                                        Available for Rent
                                    </div>
                                    @else
                                <div class="bg-warning d-table px-3 py-2 rounded text-white text-capitalize">
                                        On Rent
                                    </div>
                                    @endif
                                <h5 class="mt-2 text-secondary text-capitalize">{{ $data->title }}</h5>
                                <span class="mb-sm-20 d-block text-capitalize"><i class="fas fa-map-marker-alt text-success font-12"></i>{{ $data->location }}</span>
							</div>
                            <div class="col-md-6">
                                <div class="text-success text-left h5 my-2 text-md-right">Tk. {{ $data->price }}</div>
                                <div class="text-left text-md-right">Price</div>
                            </div>
                        </div>
                        <div class="property-details">
                            <div class="bg-gray property-quantity px-4 pt-4 w-100">
                                <ul>
                                    <li><span class="text-secondary">{{ $data->bedroom }}</span> Bedroom</li>
                                    <li><span class="text-secondary">{{ $data->bathroom }}</span> Bathroom</li>
                                    <li><span class="text-secondary">{{ $data->balcony }}</span> Balcony</li>
                                    <li><span class="text-secondary">{{ $data->hall }}</span> Drwaing room</li>
                                    <li><span class="text-secondary">{{ $data->kitchen }}</span> Kitchen</li>
                                </ul>
                            </div>
                            
                            <h5 class="mt-5 mb-4 text-secondary">Property Summary</h5>
                            <div  class="table-striped font-14 pb-2">
                                <table class="w-100"> 
                                    <tbody>
                                        <tr>
                                            <td>BHK :</td>
                                            <td class="text-capitalize">{{ $data->bedroom }}</td>
                                            <td>Property Type :</td>
                                            <td class="text-capitalize">{{ $data->type }}</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Floor :</td>
                                            <td class="text-capitalize">{{ $data->floor }}</td>
                                            <td>Total Floor :</td>
                                            <td class="text-capitalize">{{ $data->totalfloor }}</td>
                                        </tr>
                                        <tr>
                                            <td>City :</td>
                                            <td class="text-capitalize">{{ $data->city }}</td>
                                            <td>Division :</td>
                                            <td class="text-capitalize">{{ $data->state }}</td>
                                        </tr>
                                        <tr>
                                            <td>Property Size :</td>
                                            <td class="text-capitalize">{{ $data->size }} sqft.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h5 class="mt-5 mb-4 text-secondary">Property Images 
                                @auth
                                @if (Auth::user()->type == 'owner' && Auth::user()->id == $data->uid)
                                <a href="{{ route('user.property.imageAdd',$data->id) }}">
                                <button class="btn btn-success float-right mx-1 rounded"> + Add Image</button></a>
                                @endif
                                @endauth
                            </h5>
                            
                            @if (count($data->propertyImage) == 0)
                            No images Found
                            @else
                            @foreach ($data->propertyImage as $propertyImage)
                                <div class="accordion" id="accordionExample">
                                    <button class="bg-gray hover-bg-success hover-text-white text-ordinary py-3 px-4 mb-1 w-100 text-left rounded position-relative" type="button" data-toggle="collapse" data-target="{{ '#collapse'.$propertyImage->id }}" aria-expanded="true" aria-controls="{{ 'collapse'.$propertyImage->id }}"> {{ $propertyImage->title }} </button>
                                    <div id="{{ 'collapse'.$propertyImage->id }}" class="collapse show p-4" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <span>{{ $propertyImage->description }}</span>
                                        <img src="{{ asset('storage/'.$propertyImage->path) }}" alt="Not Available"> </div>
                                    
                                </div>
                            @endforeach
                            @endif
                            
                        </div>
                    </div>
					
                    <div class="col-lg-4">
                        <div class="sidebar-widget mt-5">
                        @auth
                            @if (Auth::user()->type == 'owner' && Auth::user()->id == $data->uid)
                            <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4"> Agreement</h4>
                                @if($data->agreement)
                                <a href="{{ route('user.agreement.show',$data->agreement->id) }}">
                                    <div class="bg-info d-block px-3 py-2 rounded text-center text-white text-capitalize">
                                        View Agreement Conditions
                                    </div></a>
                                    <br>
                                    @if ($data->agreement->tenantid==null)
                                    <p>Property ID = {{ $data->id }}</p>
                                        @else
                                        <p>Tenant - {{ $data->agreement->tenant->name }}</p>
                                    @endif
                                @else
                                    <a href="{{ route('user.agreement.create1',$data->id) }}">
                                        <div class="bg-info d-block px-3 py-2 rounded text-center text-white text-capitalize">
                                            Add Agreement Conditions
                                        </div></a>
                                @endif
                            @else
                                
                            @endif
                            @endauth
                        </div>
                        <div class="sidebar-widget mt-5">
                        @auth
                        @if (Auth::user()->type == 'tenant' && $data->status == 'available')
                            @if($data->status=='available')
                                <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4">Available for Rent</h4>
                                <a href="{{ route('root').'/chatify/'.$data->owner->id }}">
                                    <div class="bg-success d-block px-3 py-2 rounded text-center text-white text-capitalize">
                                        Contact For Rent
                                    </div></a>
                                    <hr>
                                    @if($data->agreement!=null)
                                    <a href="{{ route('user.agreement.showt',$data->agreement->id) }}">
                                        <div class="bg-info d-block px-3 py-2 rounded text-center text-white text-capitalize">
                                            View Agreement Conditions
                                        </div></a>
                                        <br>
                                        @endif
                            @else
                                <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4">Not Available for Rent</h4>
                                <div class="bg-warning d-block px-3 py-2 rounded text-center text-white text-capitalize">
                                    On Rent
                                </div>
                            @endif
                        
                        @endif
                        @else
                        @if($data->status=='available')
                                <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4">Available for Rent</h4>
                                <a href="{{ route('root').'/chatify/'.$data->owner->id }}">
                                    <div class="bg-success d-block px-3 py-2 rounded text-center text-white text-capitalize">
                                        Contact For Rent
                                    </div></a>
                                    <hr>
                                    @else
                                <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4">Not Available for Rent</h4>
                                <div class="bg-warning d-block px-3 py-2 rounded text-center text-white text-capitalize">
                                    On Rent
                                </div>
                            @endif
                        @endauth
                    </div>
                        <div class="sidebar-widget mt-5">
                            <h5 class="mt-5 mb-4 text-secondary double-down-line-left position-relative">Contact Agent</h5>
                            <div class="agent-contact pt-60">
                                <div class="row">
                                    <div class="col-sm-8 col-lg-9">
                                        <div class="agent-data text-ordinary mt-sm-20">
                                            <a href="{{ route('user.view',$data->owner->id) }}">
                                            <h6 class="text-success text-capitalize">{{ $data->owner->name }}</h6></a>
                                            <ul class="mb-3">
                                                <img src="{{$data->owner->photo ? asset('storage/'.$data->owner->photo) : url('images/user.png')}}" alt="User Photo" class="rounded-circle img-fluid" style="width: 150px;"> 
                                                <li>{{ $data->owner->mobile }}</li>
                                                <li>{{ $data->owner->email }}</li>
                                            </ul>
                                        
                                        </div>
                                    </div>
                                     
                                </div>
                            </div>
                        </div>
                        @auth
                            @if (Auth::user()->type == 'owner')
                            <a href="{{ route('user.profile.edit') }}">
                                <div class="bg-primary d-block px-3 py-2 rounded text-center text-white text-capitalize">
                                    Edit Details
                                </div></a>
                            @endif
                        @endauth
                        
                    </div>
                </div>
            </div>
        </div>
	<!--	Index property   -->
@section('scripts')
@endsection
@endsection