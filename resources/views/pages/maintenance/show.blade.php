@extends('base')
@section('title', 'Agreement')

@section('content')
        <!--	Banner   --->
        <div class="banner-full-row page-banner" style="background-image:url({{ asset('images/breadcromb.jpg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Property - Maintenance Request {{ $data->property->title }}</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="{{ route('root') }}">Home</a></li>
                                <li class="breadcrumb-item active">Maintenance Request - Property {{ $data->property->title }} </li>
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
                            
                            <h5 class="mt-2 mb-4 text-secondary">Maintenance Request Details </h5>
                            <div  class="table-striped font-14 pb-2">
                                <table class="w-100"> 
                                    <tbody>
                                        <tr>
                                            <td>Request</td>
                                            <td>{{ $data->task }}
                                        </td>
                                        </tr>
                                        <tr>
                                            <td>Property :</td>
                                            <td class="text-capitalize"><a href="{{ route('property.show',$data->property->id) }}">{{ $data->property->title }}</a></td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Reply</td>
                                            <td class="text-capitalize">
                                            @if ($data->reply==null)
                                                No Reply
                                                @else
                                                {{ $data->reply }}
                                            @endif    
                                            @if (Auth::user()->type=='owner' && Auth::user()->id==$data->owner_id)
                                            @if ($data->reply ==null)
                                            <a href="{{ route('user.maintenance.edit',$data->id) }}" class="btn btn-primary btn-sm m-1"><i class="fa fa-eye"> Reply</i></a>
                                            @else
                                            <a href="{{ route('user.maintenance.edit',$data->id) }}" class="btn btn-primary btn-sm m-1"><i class="fa fa-eye">Update Reply</i></a>
                                            @endif
                                            @endif
                                            </td>
                                            
                                        </tr>
                                        
                                        <tr>
                                            <td>Status</td>
                                            <td class="text-capitalize">
                                                @switch($data->status)
                                                @case(0)
                                                    Not Read
                                                    @break
                                                @case(1)
                                                    Read
                                                    @break
                                                @case(2)
                                                    Working
                                                    @break
                                                @case(3)
                                                    Completed
                                                    @break
                                                @default
                                                    N/A
                                            @endswitch    
                                            </td>
                                            
                                        </tr>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                    </div>
					
                    <div class="col-lg-4">
                        
                        <div class="sidebar-widget mt-5">
                            
                        </div>
                            
                        
                    </div>
                </div>
            </div>
        </div>
	<!--	Index property   -->
@section('scripts')
@endsection
@endsection