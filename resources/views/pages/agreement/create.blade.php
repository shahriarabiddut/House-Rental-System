@extends('base')
@section('title', 'Add Agreement to Property')
@section('content')


    <!--	Submit property   -->
<div class="full-row">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-secondary double-down-line text-center">Add Agreement to Property - {{ $data->title }}</h2>
            </div>
        </div>
        <div class="row p-5 bg-white">
            <form method="post" action="{{ route('user.agreement.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="description">
                    <h5 class="text-secondary">Add Terms</h5>
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
                        </div>
                        <div class="col-xl-6">
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Advance Amount</label>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control" name="amount" required placeholder="Enter Advance Amount">
                                </div>
                            </div>

                        </div>
                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Property</label>
                                <div class="col-lg-9">
                                    <input type="text" readonly class="form-control" name="property" required value="{{ $data->title }}">
                                    <input type="hidden" readonly class="form-control" name="property_id" required value="{{ $data->id }}">
                                </div>
                            </div><!-- ok -->

                        </div><!-- ok -->
                    </div>
                    <hr>
                    <input type="submit" value="Submit Property" class="btn btn-info" style="margin-left:200px;">

                </div>
            </form>
        </div>
    </div>
</div>
<!--	Submit property   -->

@endsection

