@extends('base')
@section('title', 'Add Agreement Request to Property Owner')
@section('content')


    <!--	Submit property   -->
<div class="full-row">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-secondary double-down-line text-center">Add Your Counter Conditions or Requests to Agreement of Property - {{ $data->property->title }}</h2>
            </div>
        </div>
        <div class="row p-5 bg-white">
            <form method="post" action="{{ route('user.agreementRequest.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="description">
                    <h5 class="text-secondary">Add Your Terms or Requests</h5>
                    <p><b> To Add New Line in Terms add &lt;/br&gt; at the end</b></p>
                    
                    <hr>

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Terms</label>
                                <div class="col-lg-9">
                                    <textarea name="terms" id="" rows="5"  class="form-control" ></textarea>
                                </div>
                            </div><!-- ok -->
                            <hr>
                            <h5 class="text-secondary">Property</h5>
                            <hr>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Property</label>
                                <div class="col-lg-9">
                                    <input type="text" readonly class="form-control" name="property" required value="{{ $data->property->title }}">
                                    <input type="hidden" readonly class="form-control" name="property_id" required value="{{ $data->property->id }}">
                                    <input type="hidden" readonly class="form-control" name="owner_id" required value="{{ $data->property->uid }}">
                                    <input type="hidden" readonly class="form-control" name="agreement_id" required value="{{ $data->id }}">
                                </div>
                            </div>

                        </div>
                        <div class="col-xl-6">

                        </div><!-- ok -->
                    </div>
                    <input type="submit" value="Submit Agreement Request for Approval" class="btn btn-info btn-block" >

                </div>
            </form>
        </div>
    </div>
</div>
<!--	Submit property   -->

@endsection

