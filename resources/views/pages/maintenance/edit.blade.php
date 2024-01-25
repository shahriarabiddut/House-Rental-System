@extends('base')
@section('title', 'Reply Maintenance Request to Property')
@section('content')


    <!--	Submit property   -->
<div class="full-row">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-secondary double-down-line text-center">Reply Maintenance Request to Property - {{ $data->property->title }}</h2>
            </div>
        </div>
        <div class="row p-5 bg-white">
            <form method="post" action="{{ route('user.maintenance.update',$data->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="description">
                    <h5 class="text-secondary">Write your Reply</h5>
                    <p><b> To Add New Line in Terms add &lt;/br&gt; at the end</b></p>
                    
                    <hr>

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="form-group row">
                                <div class="col-lg-9">
                                    <textarea name="reply" id="" rows="5"  class="form-control" >{{ $data->reply }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-9">
                                    <select name="status" id="" class="form-control">
                                        <option>Select</option>
                                        <option value="2">Working</option>
                                        <option value="3">Completed</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <input type="hidden" name="aid" value="{{ $data->id }}">
                    <input type="submit" value="Submit Reply to Maintenace Request" class="btn btn-info btn-block" >

                </div>
            </form>
        </div>
    </div>
</div>
<!--	Submit property   -->

@endsection

