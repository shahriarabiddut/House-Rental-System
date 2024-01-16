@extends('base')
@section('title', 'Home')

@section('content')
<!--	Banner Start   -->
<div class="overlay-black w-100 slider-banner1 position-relative" style="background-image: url({{ asset('images/bg.jpeg')}}); background-size: cover; background-position: center center; background-repeat: no-repeat;">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-lg-12">
                
                <div class="text-white">
                    <h1 class="mb-4"><span class="text-success">Let us</span><br>
                    Guide you Home</h1>
                    <form action="{{ route('property.search') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-lg-2">
                                <div class="form-group">
                                    <select class="form-control" name="type">
                                        <option value="">Select Type</option>
                <option value="apartment">Apartment</option>
                <option value="flat">Flat</option>
                <option value="building">Building</option>
                <option value="house">House</option>
                <option value="villa">Villa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-2">
                                <div class="form-group">
                                    <select class="form-control" name="price">
                                        <option value="">Select Budget</option>
                <option value="10000">Around 10,000</option>
                <option value="20000">Around 20,000</option>
                <option value="30000">Around 30,000</option>
                <option value="40000">Around 40,000</option>
                <option value="50000">Around 50,000</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-2">
                                <div class="form-group">
                                    <select class="form-control" name="bhk">
                                        <option value="">Select Size</option>
                <option value="1">1 BHK</option>
                <option value="2">2 BHK</option>
                <option value="3">3 BHK</option>
                <option value="4">4 BHK</option>
                <option value="5">5 BHK</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="city" placeholder="Enter City" >
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-2">
                                <div class="form-group">
                                    <button type="submit" name="filter" class="btn btn-success w-100">Search Property</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        <!--	Banner End  -->
        <!--	Recent Properties  -->
        <div class="full-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-secondary double-down-line text-center mb-4">Recent Property</h2>
                    </div>
                    <div class="col-md-12">
                        <div class="tab-content mt-4" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home">
                                <div class="row">
                                    @foreach ($data as $key => $property)
                                    @if ($property->status=='available') 
                                                
                                    <div class="col-md-6 col-lg-4">
                                        <div class="featured-thumb hover-zoomer mb-4">
                                            <a href="{{ route('property.show',$property->id) }}">
                                            <div class="overlay-black overflow-hidden position-relative"> <img src="{{ asset('storage/'.$property->pimage) }}" alt="pimage">
                                                @php
                                                $date = Carbon\Carbon::now()->setTimezone('GMT+6')->format('Y-m-d');
                                                $date1 = strtotime($date);
                                                $date2 = strtotime($property->created_at);
 
                                                $diff = abs($date1-$date2) ;
                                                $years =floor($diff /(365*60*60*24));
                                                $months =floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                                                $days =floor(($diff - $years * 365*60*60*24 - $months * 30*60*60*24) / (60*60*24));
                                                @endphp
                                                @if ($days<8)
                                                <div class="featured bg-success text-white">New</div>
                                                @endif
                                                {{-- <div class="sale bg-success text-white text-capitalize">
                                                @if ($property->status=='available') Available for Rent
                                                @else
                                                    On Rent
                                                @endif</div> --}}
                                                <div class="price text-primary"><b> {{ $property->price }} tk </b><span class="text-white">{{ $property->bedroom }} BHK </span></div>
                                            </div>
                                        </a>
                                            <div class="featured-thumb-data shadow-one">
                                                <div class="p-3">
                                                    <h5 class="text-secondary hover-text-success mb-2 text-capitalize"><a href="{{ route('property.show',$property->id) }}">{{ $property->title }}</a></h5>
                                                    <span class="location text-capitalize"><i class="fas fa-map-marker-alt text-success"></i> {{ $property->location }}</span> </div>
                                                <div class="bg-gray quantity px-4 pt-4">
                                                    <ul>
                                                        <li><span>{{ $property->hall }}</span> Drawing Room</li>
                                                        <li><span>{{ $property->bedroom }}</span> Beds</li>
                                                        <li><span>{{ $property->bathroom }}</span> Baths</li>
                                                        <li><span>{{ $property->kitchen }}</span> Kitchen</li>
                                                        <li><span>{{ $property->balcony }}</span> Balcony</li>
                                                        
                                                    </ul>
                                                </div>
                                                <div class="p-4 d-inline-block w-100">
                                                    <div class="float-left text-capitalize"><i class="fas fa-user text-success mr-1"></i>By : {{ $property->owner->name }}</div>
                                                    <div class="float-right"><i class="far fa-calendar-alt text-success mr-1"></i> {{ $property->date }}</div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                            
                            
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!--	Recent Properties  -->
@section('scripts')
@endsection
@endsection