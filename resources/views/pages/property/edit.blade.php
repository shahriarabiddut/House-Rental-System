@extends('base')
@section('title', 'Edit Property')

@section('content')
<!--	Submit property   -->
<div class="full-row">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-secondary double-down-line text-center">Edit Property</h2>
            </div>
        </div>
        <div class="row p-5 bg-white">
            <form method="post" action="{{ route('user.property.update',$data->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="description">
                    <h5 class="text-secondary">Basic Information</h5>
                    <hr>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Title</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="title" required value="{{ $data->title }}">
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
                                        <option @if ($data->type=='apartment') selected @endif value="apartment">Apartment</option>
                                        <option @if ($data->type=='flat') selected @endif value="flat">Flat</option>
                                        <option @if ($data->type=='building') selected @endif value="building">Building</option>
                                        <option @if ($data->type=='house') selected @endif value="house">House</option>
                                        <option @if ($data->type=='villa') selected @endif value="villa">Villa</option>
                                        <option @if ($data->type=='office') selected @endif value="office">Office</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Bathroom</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="bath" required value="{{ $data->bathroom }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Kitchen</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="kitc" required value="{{ $data->kitchen }}">
                                </div>
                            </div>

                        </div>
                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Bedroom</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="bed" required value="{{ $data->bedroom }}">
                                </div>
                            </div><!-- ok -->
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Balcony</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="balc" required value="{{ $data->balcony }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Drawing Room</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="hall" required value="{{ $data->hall }}">
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
                                        <option @if ($data->floor=='1st Floor') selected @endif value="1st Floor">1st Floor</option>
                                        <option @if ($data->floor=='2nd Floor') selected @endif value="2nd Floor">2nd Floor</option>
                                        <option @if ($data->floor=='3rd Floor') selected @endif value="3rd Floor">3rd Floor</option>
                                        <option @if ($data->floor=='4th Floor') selected @endif value="4th Floor">4th Floor</option>
                                        <option @if ($data->floor=='5th Floor') selected @endif value="5th Floor">5th Floor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Price</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="price" required value="{{ $data->price }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">City</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="city" required value="{{ $data->city }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Division</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="state" required value="{{ $data->state }}">
                                </div>
                            </div>
                        </div><!-- ok -->
                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Total Floor</label>
                                <div class="col-lg-9">
                                    <select class="form-control" required name="totalfl">
                                        <option value="">Select Floor</option>
                                        <option @if ($data->totalfloor=='1 Floor') selected @endif value="1 Floor">1 Floor</option>
                                        <option @if ($data->totalfloor=='2 Floor') selected @endif value="2 Floor">2 Floor</option>
                                        <option @if ($data->totalfloor=='3 Floor') selected @endif value="3 Floor">3 Floor</option>
                                        <option @if ($data->totalfloor=='4 Floor') selected @endif value="4 Floor">4 Floor</option>
                                        <option @if($data->totalfloor=='5 Floor') selected @endif value="5 Floor">5 Floor</option>
                                        <option @if($data->totalfloor=='6 Floor') selected @endif value="6 Floor">6 Floor</option>
                                        <option @if($data->totalfloor=='7 Floor') selected @endif value="7 Floor">7 Floor</option>
                                        <option @if($data->totalfloor=='8 Floor') selected @endif value="8 Floor">8 Floor</option>
                                        <option @if($data->totalfloor=='9 Floor') selected @endif value="9 Floor">9 Floor</option>
                                        <option @if($data->totalfloor=='10 Floor') selected @endif value="10 Floor">10 Floor</option>
                                        <option @if($data->totalfloor=='11 Floor') selected @endif value="11 Floor">11 Floor</option>
                                        <option @if($data->totalfloor=='12 Floor') selected @endif value="12 Floor">12 Floor</option>
                                        <option @if($data->totalfloor=='13 Floor') selected @endif value="13 Floor">13 Floor</option>
                                        <option @if($data->totalfloor=='14 Floor') selected @endif value="14 Floor">14 Floor</option>
                                        <option @if($data->totalfloor=='15 Floor') selected @endif value="15 Floor">15 Floor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Area Size</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="asize" required value="{{ $data->size }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Address</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="loc" required value="{{ $data->location }}">
                                </div>
                            </div>

                        </div><!-- ok -->
                    </div>


                    <h5 class="text-secondary">Status</h5>
                    <hr>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Status</label>
                                <div class="col-lg-9">
                                    <select class="form-control" required name="status">
                                        <option value="">Select Status</option>
                                        <option @if ($data->status=='available') selected @endif value="available">Available</option>
                                        <option @if ($data->status=='rent') selected @endif value="rent">On Rent</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="old_status" value="{{ $data->status }}">
                    <input type="submit" value="Update Property" class="btn btn-info" style="margin-left:200px;">

                </div>
            </form>
        </div>
    </div>
</div>
<!--	Submit property   -->
@section('scripts')
@endsection
@endsection