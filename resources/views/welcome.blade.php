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
                    <form method="post" action="#">
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
                                    <select class="form-control" name="stype">
                                        <option value="">Select Budget</option>
                <option value="0">5,000 - 10,000</option>
                <option value="1">10,000 - 20,000</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-2">
                                <div class="form-group">
                                    <select class="form-control" name="stype">
                                        <option value="">Select Size</option>
                <option value="0">2,400 sft</option>
                <option value="1">3,200 sft</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="city" placeholder="Enter City" required>
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
@section('scripts')
@endsection
@endsection