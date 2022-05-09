@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('sidebar')
        </div>

        <div class="col-md-5">
        <form action="" method="POST"  enctype="multipart/form-data">@csrf
            @include('backend.inc.message')


            <div class="card">
                <div class="card-header text-white" style="background-color: red">Update Profile</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">FullName</label>
                        <input type="text" class="form-control" name="name" value="{{ auth()->user()->Name }}">
                    </div>

                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control" name="address" value="{{ Auth::user()->address }}">
                    </div>

                    <div class="form-group">
                        <label for="">Profile picture</label>
                        <input type="file" class="form-control" name="image">

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-danger">Update profile</button>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-4">



            <form action="{{ route('password.update') }}" method="POST"> @csrf


            <div class="card">
                <div class="card-header text-white" style="background-color: red">Change Password</div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Current Password </label>
                        <input type="password" name="current_password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>New Password </label>
                        <input type="password" name="password" class="form-control">
                        @error('password')
                           <div>{{ $message }}</div>

                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Confirm Password </label>
                        <input type="password" name="password_confirmation" class="form-control">
                        @error('password_confirmation')
                           <div>{{ $message }}</div>

                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-danger" type="submit">Update Password</button>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
