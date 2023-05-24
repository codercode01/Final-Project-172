@extends('Layout.Admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="padding-top:5%">
        <div class="card mx-5">
        <div class="card-header">
                    <h3>Register Visitor</h3>
                </div>
                <div class="card-body">
                        <form action="{{ url('/Save-visitor') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                            <label for="data">Visitor</label>
                            <input type="text" id="visitor" name="visitor" class="form-control">
                            </div>

                            <div class="mb-3">
                            <label for="data">Inmate</label>
                            <input type="text" id="inmate" name="inmate" class="form-control">
                            </div>

                            <div class="mb-3">
                            <label for="data">Contact</label>
                            <input type="text" id="contact" name="contact" class="form-control">
                            </div>
                            <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection