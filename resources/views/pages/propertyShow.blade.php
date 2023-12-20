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

		<!--	Index property   -->
        <div class="full-row">
            <div class="container">
                <div class="row"> 
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
                    <div class="col-lg-8">

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
                                        
                                    </tbody>
                                </table>
                            </div>
                            <h5 class="mt-5 mb-4 text-secondary">Property Images 
                                @auth
                                <a href="{{ route('user.property.imageAdd',$data->id) }}">
                                <button class="btn btn-success float-right mx-1 rounded"> + Add Image</button></a>
                                @endauth
                            </h5>
                            @foreach ($data->propertyImage as $propertyImage)
                                <div class="accordion" id="accordionExample">
                                    <button class="bg-gray hover-bg-success hover-text-white text-ordinary py-3 px-4 mb-1 w-100 text-left rounded position-relative" type="button" data-toggle="collapse" data-target="{{ '#collapse'.$propertyImage->id }}" aria-expanded="true" aria-controls="{{ 'collapse'.$propertyImage->id }}"> {{ $propertyImage->title }} </button>
                                    <div id="{{ 'collapse'.$propertyImage->id }}" class="collapse show p-4" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <span>{{ $propertyImage->description }}</span>
                                        <img src="{{ asset('storage/'.$propertyImage->path) }}" alt="Not Available"> </div>
                                    
                                </div>
                            @endforeach
                            <h5 class="mt-5 mb-4 text-secondary double-down-line-left position-relative">Contact Agent</h5>
                            <div class="agent-contact pt-60">
                                <div class="row">
                                    <div class="col-sm-8 col-lg-9">
                                        <div class="agent-data text-ordinary mt-sm-20">
                                            <h6 class="text-success text-capitalize">{{ $data->owner->name }}</h6>
                                            <ul class="mb-3">
                                                <li>{{ $data->owner->mobile }}</li>
                                                <li>{{ $data->owner->email }}</li>
                                            </ul>
                                            
                                            <div class="mt-3 text-secondary hover-text-success">
                                                <ul>
                                                    <li class="float-left mr-3"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li class="float-left mr-3"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                    <li class="float-left mr-3"><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                                    <li class="float-left mr-3"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                                    <li class="float-left mr-3"><a href="#"><i class="fas fa-rss"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                     
                                </div>
                            </div>
                        </div>
                    </div>
					
                    <div class="col-lg-4">
                        <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4 mt-5">Featured Property</h4>
                        <ul class="property_list_widget">
							
                            <li> <img src="{{ asset('storage/'.$data->pimage) }}" alt="pimage">
                                <h6 class="text-secondary hover-text-success text-capitalize"><a href="property">property</a></h6>
                                <span class="font-14"><i class="fas fa-map-marker-alt icon-success icon-small"></i> loc</span>
                                
                            </li>

                        </ul>

                        <div class="sidebar-widget mt-5">
                            <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4">Recently Added Property</h4>
                            <ul class="property_list_widget">
							
                                <li> <img src="image" alt="pimage">
                                    <h6 class="text-secondary hover-text-success text-capitalize"><a href="#">image</a></h6>
                                    <span class="font-14"><i class="fas fa-map-marker-alt icon-success icon-small"></i> </span>
                                    
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