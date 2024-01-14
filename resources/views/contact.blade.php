@extends('base')
@section('title', 'Contact')

@section('content')
<div class="full-row">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-5 bg-secondary">
                <div class="contact-info">
                    <h3 class="mb-4 mt-4 text-white">Contacts</h3>
                    
                    <ul>
                        <li class="d-flex mb-4"> <i class="fas fa-map-marker-alt text-white mr-2 font-13 mt-1"></i>
                            <div class="contact-address">
                                <h5 class="text-white">Address</h5>
                                <span class="text-white">Jashore</span>
                                </div>
                        </li>
                        <li class="d-flex mb-4"> <i class="fas fa-phone-alt text-white mr-2 font-13 mt-1"></i>
                            <div class="contact-address">
                                <h5 class="text-white">Call Us</h5>
                                <span class="d-table text-white">+88 @isset($SiteOption) {{ $SiteOption[5]->value }} @endisset </span>
                            </div>
                        </li>
                        <li class="d-flex mb-4"> <i class="fas fa-envelope text-white mr-2 font-13 mt-1"></i>
                            <div class="contact-address">
                                <h5 class="text-white">Email Adderss</h5>
                                <span class="d-table text-white">@isset($SiteOption) {{ $SiteOption[4]->value }} @endisset</span>
                                </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-md-12 col-lg-7">
                <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="text-secondary double-down-line text-center mb-5">Get In Touch</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form class="w-100" action="#" method="post">
                            <div class="row">
                                <div class="row mb-4">
                                    <div class="form-group col-lg-6">
                                        <input type="text"  name="name" class="form-control" placeholder="Your Name*">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="text"  name="email" class="form-control" placeholder="Email Address*">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="text"  name="phone" class="form-control" placeholder="Phone" maxlength="10">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <input type="text" name="subject"  class="form-control" placeholder="Subject">
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" rows="5" placeholder="Type Comments..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" value="send message" name="send" class="btn btn-success">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('scripts')
@endsection
@endsection