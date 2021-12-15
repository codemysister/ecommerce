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

                <form action="{{url('/user/update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="text" value="{{$user->name}}" name="name" class="form-control" id="exampleFormControlInput1" >
                      </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" value="{{$user->email}}" name="email" class="form-control" id="exampleFormControlInput1" >
                      </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Phone</label>
                        <input type="number" value="{{$user->phone}}" name="phone" class="form-control" id="exampleFormControlInput1" >
                      </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Image</label>
                        <input type="file" value="{{$user->profile_photo_path}}" name="profile_photo_path" class="form-control" id="exampleFormControlInput1" >
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