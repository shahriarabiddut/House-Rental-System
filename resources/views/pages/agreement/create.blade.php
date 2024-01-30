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
                            <h5 class="text-secondary">Property Reservation</h5>
                            <hr>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Property</label>
                                <div class="col-lg-9">
                                    <input type="text" readonly class="form-control" name="property" required value="{{ $data->title }}">
                                    <input type="hidden" readonly class="form-control" name="property_id" required value="{{ $data->id }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Advance Amount</label>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control" name="amount" required placeholder="Enter Advance Amount">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Security Amount</label>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control" name="security" required placeholder="Enter Security Amount">
                                </div>
                            </div>

                        </div>
                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Payment Method Details</label>
                                <div class="col-lg-9">
                                    <textarea class="form-control" name="paymentmethod" required placeholder="Enter Payment Method" id="" rows="6"></textarea>
                                </div>
                            </div>

                        </div><!-- ok -->
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">What Will You Provide or Facilities ?</label>
                                <div class="col-lg-9">
                                    <textarea class="form-control" name="facility" required rows="6">Electricity, water, gas, telephone, cable, and internet connection will becovered by the Landlord.The Tenant is responsible for using furniture and appliances with care anddue diligence. The tenant shall pay for any repair or replacement if theequipment was damaged during the term of this Agreement.</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Is Sublease Allowed ?</label>
                                <div class="col-lg-9">
                                    <textarea class="form-control" name="sublease" required rows="6">Under this Agreement, subleasing of property is not permitted. The Tenantagrees not to assign this Agreement or sublease the property under anycircumstances. In such a case, the Landlord shall terminate this Agreementwithout giving any other reason.</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">MAINTENANCE, PEACE/ORDER, AND OTHEROBLIGATIONS ?</label>
                                <div class="col-lg-9">
                                    <textarea class="form-control" name="term1" required id="" rows="6">The Tenant shall follow and implement the standard of cleanliness to theproperty.No modifications or changes (painting, construction, changes inarchitecture etc) in the property is not allowed.Pets are __________________ in the rental property.Smoking is __________________ in the rental property.The Tenant and the other occupants are not allowed to keep firearms,bows, and other weapons in the rental property.The Tenant and the other occupants agree not to use the property in away to disturb the peace in the surroundings or environment.The Tenant's personal property is not covered in the insurance purchasedby the Landlord against loss, theft, and negligence.</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">INDEMNIFICATION</label>
                                <div class="col-lg-9">
                                    <textarea class="form-control" name="term2" required id="" rows="6">The Tenant indemnifies the Landlord against any liabilities like accidents, loss ofproperty, injury, or death of any person. For tangible damages, security deposit isused at first and the remaining amount shall be paid by the Tenant upon firstrequest.</textarea>
                                </div>
                            </div>

                        </div><!-- ok -->
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">AMENDMENT</label>
                                <div class="col-lg-9">
                                    <textarea class="form-control" name="amendment" required id="" rows="3">This agreement shall only be changed or modified with the written consentof both the Landlord and the Tenant.</textarea>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">GOVERNING LAW</label>
                                <div class="col-lg-9">
                                    <textarea class="form-control" name="law" required id="" rows="3">Any disputes arising from this Agreement shall be resolved under the laws of the State of ______</textarea>
                                </div>
                            </div>

                        </div><!-- ok -->
                    </div>
                    <hr>
                    <input type="submit" value="Submit Agreement Condition" class="btn btn-info btn-block" >

                </div>
            </form>
        </div>
    </div>
</div>
<!--	Submit property   -->

@endsection

