@extends('base')
@section('title', ' Property Maintenance Requests')

@section('content')
        <!--	Banner   --->
        <div class="banner-full-row page-banner" style="background-image:url({{ asset('images/breadcromb.jpg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>User Listed Property Maintenance Requests</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="{{ route('root') }}">Home</a></li>
                                <li class="breadcrumb-item active">User Listed Property Maintenance Requests</li>
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
							<h2 class="text-secondary double-down-line text-center">Property Maintenance Requests</h2>
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
                                <th class="text-white font-weight-bolder">Tenant</th>
                                <th class="text-white font-weight-bolder">Added Date</th>
								<th class="text-white font-weight-bolder">Status</th>
								<th class="text-white font-weight-bolder">Action</th>
                             </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $d)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $d->property->title }}</td>
                                <td>{{ $d->property->type }}</td>
                                <td>{{ $d->tenant->name }} </td>
                                <td>{{ $d->updated_at }}</td>
                                <td>
                                @switch($d->status)
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
                                        
                                @endswitch    
                                </td>
                                <td>
                                    @if (Auth::user()->type=='tenant' )
                                    <a href="{{ route('user.maintenance.show',$d->id) }}" class="btn btn-info btn-sm m-1"><i class="fa fa-eye"> View</i></a>
                                    @else
                                    <a href="{{ route('user.maintenance.show2',$d->id) }}" class="btn btn-info btn-sm m-1"><i class="fa fa-eye"> View</i></a>
                                    @endif
                                    @if (Auth::user()->type=='tenant' )
                                    <a onclick="return confirm('Are You Sure?')" href="{{ url('user/maintenance/'.$d->id.'/delete') }}" class="btn btn-danger btn-sm m-1"><i class="fa fa-trash">Delete</i></a></td>
                                    @else
                                    @if ($d->reply ==null)
                                    <a href="{{ route('user.maintenance.edit',$d->id) }}" class="btn btn-primary btn-sm m-1"><i class="fa fa-eye"> Reply</i></a>
                                    @else
                                    <a href="{{ route('user.maintenance.edit',$d->id) }}" class="btn btn-primary btn-sm m-1"><i class="fa fa-eye">Update Reply</i></a>
                                    @endif
                                    @endif
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