@extends('frontend.main_master')
@section('home')
    <div class="body-content">
        <div class="container">
        <div class="row">
        
            <div class="col-md-2">
                
                <img class="" src="{{(!empty($user->profile_photo_path)) ? url('upload/user_profile/'.$user->profile_photo_path) : url('upload/no_image.jpg')}}" style="border-radius: 50%; margin: 40px 0 20px 0" width="100%" height="100%" alt="">
                <br>
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
                <h3><span class="text-danger">Hi...</span><b>{{Auth::user()->name}}</b> Welcome To My Market</h3>
            </div>
        </div>
    </div>
    </div>
@endsection