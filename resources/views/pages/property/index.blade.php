@extends('base')
@section('title', 'My Property')

@section('content')
        <!--	Banner   --->
        <div class="banner-full-row page-banner" style="background-image:url({{ asset('images/breadcromb.jpg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>User Listed Property</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="{{ route('root') }}">Home</a></li>
                                <li class="breadcrumb-item active">User Listed Property</li>
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
							<h2 class="text-secondary double-down-line text-center">User Listed Property</h2>
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
                    @foreach ($data as $key => $d)
                    @if ($d->agreement==null)
                    <div class="row bg-danger text-white p-2 m-2">
                        Add Agreement Conditions to get published on property page
                    </div>
                    @break
                    @endif
                    @endforeach
					<table class="items-list col-lg-12 table-hover" style="border-collapse:inherit;">
                        <thead>
                             <tr  class="bg-dark">
                                <th class="text-white font-weight-bolder">No.</th>
                                <th class="text-white font-weight-bolder">Title</th>
                                <th class="text-white font-weight-bolder">Type</th>
                                <th class="text-white font-weight-bolder">Added Date</th>
								<th class="text-white font-weight-bolder">Status</th>
								<th class="text-white font-weight-bolder">Action</th>
								<th class="text-white font-weight-bolder">Agreement</th>
                             </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $d)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $d->title }}</td>
                                <td>{{ $d->type }}</td>
                                <td>{{ $d->created_at }}</td>
                                <td>{{ $d->status }}</td>
                                <td><a href="{{ route('property.show',$d->id) }}" class="btn btn-info btn-sm m-1"><i class="fa fa-eye"> View</i></a>
                                    <a href="{{ route('user.property.edit',$d->id) }}" class="btn btn-primary btn-sm m-1"><i class="fa fa-edit">Edit</i></a>
                                    <a onclick="return confirm('Are You Sure?')" href="{{ url('user/property/'.$d->id.'/delete') }}" class="btn btn-danger btn-sm m-1"><i class="fa fa-trash">Delete</i></a>
                                </td>
                                <td>@if ($d->agreement)
                                    Agreement Available
                                    @else
                                    <a href="{{ route('user.agreement.create1',$d->id) }}">
                                        <div class="bg-info d-block px-3 py-2 rounded text-center text-white text-capitalize">
                                            Add Agreement Conditions
                                        </div></a>
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