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
		 <!-- Session Messages Starts -->
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
         <!-- Session Messages Ends -->
		<!--	Index property   -->
        <div class="full-row bg-gray">
            <div class="container">
                    <div class="row mb-5">
						<div class="col-lg-12">
							<h2 class="text-secondary double-down-line text-center">User Listed Property</h2>
							
                        </div>
					</div>
					<table class="items-list col-lg-12 table-hover" style="border-collapse:inherit;">
                        <thead>
                             <tr  class="bg-dark">
                                <th class="text-white font-weight-bolder">No.</th>
                                <th class="text-white font-weight-bolder">Title</th>
                                <th class="text-white font-weight-bolder">Type</th>
                                <th class="text-white font-weight-bolder">Added Date</th>
								<th class="text-white font-weight-bolder">Status</th>
                                <th class="text-white font-weight-bolder">Featured</th>
								<th class="text-white font-weight-bolder">Action</th>
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
                                <td>{{ $d->featured }}</td>
                                <td>Action Button</td>
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