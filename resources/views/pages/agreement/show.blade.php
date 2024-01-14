@extends('base')
@section('title', 'Agreement')

@section('content')
        <!--	Banner   --->
        <div class="banner-full-row page-banner" style="background-image:url({{ asset('images/breadcromb.jpg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Agreement - Property {{ $data->property->title }}</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="{{ route('root') }}">Home</a></li>
                                <li class="breadcrumb-item active">Agreement - Property {{ $data->property->title }} </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
         <!--	Banner   --->

		<!--	Index property   -->
        <div class="full-row">
            <div class="container">
                <div class="row"> 
                    <div class="col-lg-8">

                        <div class="row mb-4">
                            
                        </div>
                        <div class="property-details">
                            @if(Session::has('success'))
                         <div class="p-3 mb-2 bg-success text-white">
                             <p>{{ session('success') }} </p>
                         </div>
                         @endif
                            @if(Session::has('danger'))
                         <div class="p-3 mb-2 bg-danger text-white">
                             <p>{{ session('danger') }} </p>
                         </div>
                         @endif
                            <h5 class="mt-3 mb-1 text-secondary">Agreement Terms</h5>
                            <div  class="table-striped font-14 pb-2">
                                <p>
                                    {!! $data->terms !!}
                                </p>
                                
                            </div>
                            <h5 class="mt-2 mb-4 text-secondary">Agreement Details </h5>
                            <div  class="table-striped font-14 pb-2">
                                <table class="w-100"> 
                                    <tbody>
                                        <tr>
                                            <td>Amount :</td>
                                            <td class="text-capitalize">{{ $data->amount }}</td>
                                            <td>Amount Status :</td>
                                            <td class="text-capitalize">
                                            @if ($data->amountStatus=='0')
                                                N/A
                                            @elseif ($data->amountStatus=='1')
                                            Processing
                                            @else
                                                Paid
                                            @endif
                                        </td>
                                        </tr>
                                        <tr>
                                            <td>Property :</td>
                                            <td class="text-capitalize"><a href="{{ route('property.show',$data->property->id) }}">{{ $data->property->title }}</a></td>
                                            <td>Tenant :</td>
                                            <td class="text-capitalize">
                                            @if ($data->tenantid=='0')
                                                N/A
                                                @else
                                                <a href="{{ route('user.view',$data->tenant->id) }}">{{ $data->tenant->name }}</a>
                                            @endif</td>
                                        </tr>
                                        <tr> 
                                            <td>Check In Date :</td>
                                            <td class="text-capitalize">
                                            @if ($data->dateofSigning==null)
                                                N/A
                                                @else
                                                {{ $data->dateofSigning  }}
                                            @endif
                                            </td>
                                            <td>Check Out Date :</td>
                                            <td class="text-capitalize">
                                            @if ($data->dateCheckOut==null)
                                                N/A
                                                @else
                                                {{ $data->dateCheckOut }}
                                            @endif
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                            @if ($data->amountStatus==2)
                                <div class="p-3 my-2 mb-2 bg-success text-white text-center">
                                    <p>Contract Made </p>
                                </div>
                            @endif
                            @auth
                            @if (Auth::user()->id==$data->tenantid)
                            <div class="p-3 my-2 mb-2 text-center">
                                <a href="{{ route('user.agreement.revoke',$data->id) }}">
                                    <div class="bg-danger d-block my-1 px-3 py-2 rounded text-center text-white text-capitalize">
                                        Revoke Agreement
                                </div></a>
                            </div>
                            @endif
                            @endauth
                            @auth('admin')
                            <div class="p-3 my-2 mb-2 text-center">
                                <a href="{{ route('admin.agreement.revoke',$data->id) }}">
                                    <div class="bg-danger d-block my-1 px-3 py-2 rounded text-center text-white text-capitalize">
                                        Revoke Agreement
                                </div></a>
                            </div>
                            @endauth
                            
                        </div>
                        {{-- Payment User --}}
                        @auth
                        @if (Auth::user()->id=$data->tenantid || Auth::user()->id=$data->user_id)
                        @if ($data->payment !=null)
                        <h5 class="mt-3 mb-1 text-secondary">Payments</h5>
                            @foreach ($data->payment as $key => $item) 
                            @if ($item->tenant_id == $data->tenantid)
                            <div  class="table-striped font-14 pb-2">
                                <p>{{ $key+1 }} . {{ $item->method }} </p>
                                <p>{{ $item->date }} </p>
                                
                            </div>
                            @endif
                            @endforeach
                            @endif
                        @endif
                        @endauth
                        {{-- Payment User --}}
                        {{-- Payment Admin --}}
                        @auth('admin')
                            @if ($data->payment !=null)
                            @foreach ($data->payment as $item) 
                            @if ($item->tenant_id == $data->tenantid)
                            <h5 class="mt-3 mb-1 text-secondary">Payment Details</h5>
                            <div  class="table-striped font-14 pb-2">
                                <p>{{ $item->method }} </p>
                                <p>{{ $item->date }} </p>
                                
                            </div>
                            @endif
                            @endforeach
                            @endif
                        @endauth
                        {{-- Payment Admin --}}
                    </div>
					
                    <div class="col-lg-4">
                        
                        <div class="sidebar-widget mt-5">
                            @if($data->property->status=='available')
                                <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4">Available for Rent</h4>
                            @else
                                <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4">Not Available for Rent</h4>
                            @endif
                            <a href="{{ route('property.show',$data->property->id) }}">
                                <div class="bg-info d-block my-1 px-3 py-2 rounded text-center text-white text-capitalize">
                                    View Property
                                </div></a>
                                @auth
                                @if (Auth::user()->type!='tenant')
                                @if ($data->amountStatus!=2)
                                <hr>
                                <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4">Action</h4>
                                @if ($data->tenantid!=0)
                                <a href="{{ route('user.agreement.accept',$data->id) }}">
                                    <div class="bg-success d-block my-1 px-3 py-2 rounded text-center text-white text-capitalize">
                                        Accept Agreement
                                    </div></a>
                                @endif
                                @if ($data->tenantid !='0')
                                <a href="{{ route('user.agreement.reject',$data->id) }}">
                                    <div class="bg-danger d-block my-1 px-3 py-2 rounded text-center text-white text-capitalize">
                                        Reject Agreement
                                </div></a>
                                @endif
                                @if ($data->amountStatus!=1 && $data->tenantid =='0')
                                <a href="{{ route('user.agreement.delete',$data->id) }}">
                                    <div class="bg-danger d-block my-1 px-3 py-2 rounded text-center text-white text-capitalize">
                                        Delete Agreement
                                </div></a>
                                @endif
                                @endif
                                @endauth
                            </div>
                            @endif
                        <hr>
                        <div class="sidebar-widget mt-5 mb-5">
                            <h5 class="mt-5 mb-4 text-secondary double-down-line-left position-relative">Contact Tenant</h5>
                            @if ($data->tenantid==null)
                                                N/A
                                                @else
                                            
                            <div class="agent-contact pt-60">
                                <div class="row">
                                    <div class="col-sm-8 col-lg-9">
                                        <div class="agent-data text-ordinary mt-sm-20">
                                            <h6 class="text-success text-capitalize">{{ $data->tenant->name }}</h6>
                                            <ul class="mb-3">
                                                <li>{{ $data->tenant->mobile }}</li>
                                                <li>{{ $data->tenant->email }}</li>
                                            </ul>
                                        
                                        </div>
                                    </div>
                                     
                                </div>
                            </div>
                            @endif
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
	<!--	Index property   -->
@section('scripts')
@endsection
@endsection