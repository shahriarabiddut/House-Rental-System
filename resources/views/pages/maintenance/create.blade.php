@extends('base')
@section('title', 'Add Maintenance Request to Property')
@section('content')


    <!--	Submit property   -->
<div class="full-row">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-secondary double-down-line text-center">Add Maintenance Request to Property - {{ $data->property->title }}</h2>
            </div>
        </div>
        <div class="row p-5 bg-white">
            <form method="post" action="{{ route('user.maintenance.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="description">
                    <h5 class="text-secondary">Write your request</h5>
                    <p><b> To Add New Line in Terms add &lt;/br&gt; at the end</b></p>
                    
                    <hr>

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="form-group row">
                                <div class="col-lg-9">
                                    <textarea name="task" id="" rows="5"  class="form-control" ></textarea>
                                </div>
                            </div><!-- ok -->
                            <hr>
                        </div>
                    </div>
                    <input type="hidden" name="aid" value="{{ $data->id }}">
                    <input type="submit" value="Submit Maintenace Request" class="btn btn-info btn-block" >

                </div>
            </form>
        </div>
    </div>
</div>
<!--	Submit property   -->

@endsection

