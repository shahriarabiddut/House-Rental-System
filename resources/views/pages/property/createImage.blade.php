@extends('base')
@section('title', 'Add Image To Property')

@section('content')
<!--	Submit property   -->
<div class="full-row">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-secondary double-down-line text-center">Add Image To Property</h2>
            </div>
        </div>
        <div class="row p-5 bg-white">
            <form method="post" action="{{ route('user.property.imageStore') }}" enctype="multipart/form-data">
                @csrf
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
                        <div class="col-xl-12">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Description</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="description" required placeholder="Enter Description">
                                </div>
                            </div><!-- ok -->
                            <hr>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Image</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="aimage" type="file" required>
                                </div>
                            </div><!-- ok -->
                            <hr>
                        </div>
                        <div class="col-xl-6">
                        <div class="col-xl-6">
                        </div>
                        <input type="hidden" name="property_id" value="{{ $property_id }}" >
                        <input type="submit" value="Add Image To Propety" class="btn btn-info" style="margin-left:200px;">
                    </div>
               </form>
        </div>
    </div>
</div>
<!--	Submit property   -->
@section('scripts')
@endsection
@endsection