@extends('layouts.admin_layout')
@section('content')
@include('layouts.topbar')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Company Details</h5>
            <hr>
            <form action="" class="btn-submit" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name">
                        </div>
                    </div>
                    
                </div>

                <div class="form-group">
                    <button class="btn btn-success">Submit</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection