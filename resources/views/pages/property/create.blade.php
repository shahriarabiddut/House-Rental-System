@extends('base')
@section('title', 'Add Property')

@section('content')
<!--	Submit property   -->
<div class="full-row">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-secondary double-down-line text-center">Add Property</h2>
            </div>
        </div>
        <div class="row p-5 bg-white">
            <form method="post" action="{{ route('user.property.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="description">
                    <h5 class="text-secondary">Basic Information</h5>
                    <hr>

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Title</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="title" required placeholder="Enter Title">
                                </div>
                            </div><!-- ok -->
                            <hr>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Property Type</label>
                                <div class="col-lg-9">
                                    <select class="form-control" required name="ptype">
                                        <option value="">Select Type</option>
                                        <option value="apartment">Apartment</option>
                                        <option value="flat">Flat</option>
                                        <option value="building">Building</option>
                                        <option value="house">House</option>
                                        <option value="villa">Villa</option>
                                        <option value="office">Office</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Bathroom</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="bath" required placeholder="Enter Bathroom (only no 1 to 10)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Kitchen</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="kitc" required placeholder="Enter Kitchen (only no 1 to 10)">
                                </div>
                            </div>

                        </div>
                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Bedroom</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="bed" required placeholder="Enter Bedroom  (only no 1 to 10)">
                                </div>
                            </div><!-- ok -->
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Balcony</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="balc" required placeholder="Enter Balcony  (only no 1 to 10)">
                                </div>
                            </div>

                        </div><!-- ok -->
                    </div>
                    <h5 class="text-secondary">Price & Location</h5>
                    <hr>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Floor</label>
                                <div class="col-lg-9">
                                    <select class="form-control" required name="floor">
                                        <option value="">Select Floor</option>
                                        <option value="1st Floor">1st Floor</option>
                                        <option value="2nd Floor">2nd Floor</option>
                                        <option value="3rd Floor">3rd Floor</option>
                                        <option value="4th Floor">4th Floor</option>
                                        <option value="5th Floor">5th Floor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Price</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="price" required placeholder="Enter Price">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">City</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="city" required placeholder="Enter City">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">State</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="state" required placeholder="Enter State">
                                </div>
                            </div>
                        </div><!-- ok -->
                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Total Floor</label>
                                <div class="col-lg-9">
                                    <select class="form-control" required name="totalfl">
                                        <option value="">Select Floor</option>
                                        <option value="1 Floor">1 Floor</option>
                                        <option value="2 Floor">2 Floor</option>
                                        <option value="3 Floor">3 Floor</option>
                                        <option value="4 Floor">4 Floor</option>
                                        <option value="5 Floor">5 Floor</option>
                                        <option value="6 Floor">6 Floor</option>
                                        <option value="7 Floor">7 Floor</option>
                                        <option value="8 Floor">8 Floor</option>
                                        <option value="9 Floor">9 Floor</option>
                                        <option value="10 Floor">10 Floor</option>
                                        <option value="11 Floor">11 Floor</option>
                                        <option value="12 Floor">12 Floor</option>
                                        <option value="13 Floor">13 Floor</option>
                                        <option value="14 Floor">14 Floor</option>
                                        <option value="15 Floor">15 Floor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Area Size</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="asize" required placeholder="Enter Area Size (in sqrt)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Address</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="loc" required placeholder="Enter Address">
                                </div>
                            </div>

                        </div><!-- ok -->
                    </div>


                    <h5 class="text-secondary">Image & Status</h5>
                    <hr>
                    <div class="row">
                        <div class="col-xl-6">

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Image</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="aimage" type="file" required="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Image 2</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="aimage2" type="file" required="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Image 4</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="aimage4" type="file" required="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Status</label>
                                <div class="col-lg-9">
                                    <select class="form-control" required name="status">
                                        <option value="">Select Status</option>
                                        <option value="available">Available</option>
                                        <option value="rent">On Rent</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Image 1</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="aimage1" type="file" required="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">image 3</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="aimage3" type="file" required="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row"><!-- ok -->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label"><b>Is Featured?</b></label>
                                <div class="col-lg-9">
                                    <select class="form-control" required name="isFeatured">
                                        <option value="">Select...</option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>


                    <input type="submit" value="Submit Property" class="btn btn-info" style="margin-left:200px;">

                </div>
            </form>
        </div>
    </div>
</div>
<!--	Submit property   -->
@section('scripts')
@endsection
@endsection