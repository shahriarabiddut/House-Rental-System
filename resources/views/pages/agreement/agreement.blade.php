@extends('base')
@section('title', 'Sign Agreement to Property')
@section('content')


    <!--	Submit property   -->
<div class="full-row">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-secondary double-down-line text-center">Sign Agreement to Property - {{ $data->title }}</h2>
            </div>
        </div>
        <div class="row p-5 bg-white">
            <form method="post" action="{{ route('user.agreement.storeAgreement') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="description">
                    <h5 class="text-secondary">Agreements</h5>
                    <p>{!! $data2->terms !!}</p>
                    
                    <hr>

                    <div class="row">
                        
                        <div class="col-xl-6">
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Advance Amount</label>
                                <div class="col-lg-9">
                                    <input type="number" readonly class="form-control" name="amount" value="{{ $data2->amount }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Security Amount</label>
                                <div class="col-lg-9">
                                    <input type="number" readonly class="form-control" name="security" value="{{ $data2->security }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Property</label>
                                <div class="col-lg-9">
                                    <input type="text" readonly class="form-control" name="property" required value="{{ $data->title }}">
                                    <input type="hidden" readonly class="form-control" name="property_id" required value="{{ $data->id }}">
                                    <input type="hidden" readonly class="form-control" name="type" required value="advance">
                                </div>
                            </div>
                        </div><!-- ok -->
                        
                        <div class="col-xl-6">
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Agreement Date</label>
                                <div class="col-lg-9">
                                    <input type="text" id="todayDate" readonly class="form-control" name="dateofSigning" value="{{ now()->format('Y-m-d') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Probable Check In Date</label>
                                <div class="col-lg-9">
                                    <input type="date" required class="form-control" name="dateCheckIn">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Probable Check Out Date</label>
                                <div class="col-lg-9">
                                    <input type="date" required class="form-control" name="dateCheckOut">
                                </div>
                            </div>

                        </div><!-- ok -->
                        
                        <div class="col-xl-12">
                            <hr>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Payment Method </label>
                                <div class="col-lg-9">
                                    <p>{{ $data2->paymentmethod }} </p>
                                    <input type="text" class="form-control" name="method" required placeholder="Enter Payment Proof">
                                </div>
                            </div><!-- ok -->
                            <hr>
                        </div>
                    </div>
                    
                    <input type="submit" value="Submit Agreement" class="btn btn-info" style="margin-left:200px;">

                </div>
            </form>
        </div>
    </div>
</div>
<!--	Submit property   -->

@endsection

