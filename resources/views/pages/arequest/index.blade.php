@extends('base')
@section('title', ' Property Agreement Requests')

@section('content')
        <!--	Banner   --->
        <div class="banner-full-row page-banner" style="background-image:url({{ asset('images/breadcromb.jpg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>User Listed Property Agreement Requests</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="{{ route('root') }}">Home</a></li>
                                <li class="breadcrumb-item active">User Listed Property Agreement Requests</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
         <!--	Banner   --->
		
		<!--	Index property   -->
        <div class="full-row bg-gray">
            <div class="container">
                    <div class="row mb-3">
						<div class="col-lg-12">
							<h2 class="text-secondary double-down-line text-center">Property Agreement Requests</h2>
                        </div>
                         <!-- Session Messages Starts -->
                        @if(Session::has('success'))
                        <div class="p-3 d-block mb-2 bg-success text-white">
                            <p>{{ session('success') }} </p>
                        </div>
                        @endif
                        @if(Session::has('danger'))
                        <div class="p-3 d-block mb-2 bg-danger text-white">
                            <p>{{ session('danger') }} </p>
                        </div>
                        @endif
                        <!-- Session Messages Ends -->
					</div>
					<table class="items-list col-lg-12 table-hover" style="border-collapse:inherit;">
                        <thead>
                             <tr  class="bg-dark">
                                <th class="text-white font-weight-bolder">No.</th>
                                <th class="text-white font-weight-bolder">Property</th>
                                <th class="text-white font-weight-bolder">Type</th>
                                <th class="text-white font-weight-bolder">Submission Date</th>
                                <th class="text-white font-weight-bolder">Update Date</th>
								<th class="text-white font-weight-bolder">Action</th>
                             </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $d)
                            <tr> 
                                <td>{{ $key+1 }}  </td>
                                <td><a href="{{ route('property.show',$d->property->id) }}">{{ $d->property->title }}</a></td>
                                <td>{{ $d->property->type }}</td>
                                <td>{{ $d->created_at }}</td>
                                <td>
                                @if ($d->updated_at==$d->created_at)
                                    N/A
                                    @else
                                    @if ($d->status==2)
                                    <span class="bg-danger text-white p-1">Rejected on {{ $d->updated_at }} </span>
                                    @elseif ($d->status==1)
                                    <span class="bg-success text-white p-1">Accepted on {{ $d->updated_at }} </span>
                                    @else
                                    <span class="bg-dark text-muted p-1">seen</span> 
                                    @endif 
                                @endif 
                                </td>
                                <td>
                                    <a href="{{ route('user.agreementRequest.show',$d->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"> View Agreement Request </i></a>
                                    
                                    @if($d->status==1)
                                    <a href="{{ route('user.agreement.signAgreement2',$d->agreement_id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"> Sign Agreement </i></a>
                                    @else
                                    <a href="{{ route('user.agreement.request.delete',$d->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-eye"> Delete </i></a>
                                    @endif
                                    
                                </td>
                            </tr>
                            @endforeach
                           
							<!-- FOR MORE PROJECTS visit: codeastro.com -->
                        </tbody>
                    </table>            
            </div>
        </div>
	<!--	Index property   -->
@section('scripts')
@endsection
@endsection