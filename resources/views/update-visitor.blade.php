@extends('Layout.Admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="padding-top:10%">
        <div class="card mx-5">
        <div class="card-header">
                    <h3>Update Visitor Info</h3>
                </div>
                <div class="card-body">
                        <form action="{{ url('/Save-visitor-update/'.$update_visitor->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                            <label for="data">Visitor</label>
                            <input type="text" id="visitor" name="visitor" class="form-control" value="{{$update_visitor->visitor}}">
                            </div>

                            <div class="mb-3">
                            <label for="data">Inmate</label>
                            <input type="text" id="inmate" name="inmate" class="form-control" value="{{$update_visitor->inmate}}">
                            </div>

                            <div class="mb-3">
                            <label for="data">Contact</label>
                            <input type="text" id="contact" name="contact" class="form-control" value="{{$update_visitor->contact}}">
                            </div>
                            <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection