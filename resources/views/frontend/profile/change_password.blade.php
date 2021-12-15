@extends('frontend.main_master')
@section('home')
    <div class="body-content">
        <div class="container">
        <div class="row">
            <div class="col-md-2">
                <img class="card-img-top" src="{{(!empty($user->profile_photo_path)) ? url('upload/user_profile/'.$user->profile_photo_path) : url('upload/no_image.jpg')}}" style="border-radius: 50%; margin: 40px 0 20px 0" width="100%" height="100%" alt="">
                <ul class="form-group form-group-flush">
                    <li class="text-center">
                        <a href="{{route('dashboard')}}" class="btn btn-primary btn-block">Home</a>
                    </li>
                    <li class="text-center">
                        <a href="{{url('/user/edit')}}" class="btn btn-primary btn-block">Profile Update</a>
                    </li>
                    <li class="text-center">
                        <a href="{{url('/user/change/password')}}" class="btn btn-primary btn-block">Change Password</a>
                    </li>
                    <li class="text-center">
                        <a href="{{url('/user/logout')}}" class="btn btn-danger btn-block">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-6">
                <h3>Update Profile</h3>

                <form action="{{url('/user/update/password')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Current Password</label>
                        <input type="password" id="oldpassword" name="oldpassword" class="form-control" id="exampleFormControlInput1" >
                        @error('oldpassword')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">New Password</label>
                        <input type="password" id="password"  name="password" class="form-control" id="exampleFormControlInput1" >
                        @error('password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password Confirmation</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" id="exampleFormControlInput1" >
                        @error('password_confirmation')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                      <br>
                    <div class="mb-5">
                        <button type="submit" class="btn btn-danger">Update</button>
                      </div>
                      <br>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection