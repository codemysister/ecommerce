@extends('admin.admin_master')
@section('admin')
<div class="container-full">

    
    <section class="content">
        <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" >
              <h3 class="widget-user-username">Admin : {{$user->name}} </h3>
              <h6 class="widget-user-desc">Email : {{$user->email}}</h6>
              <a href="{{route('admin.profile.edit')}}" class="btn btn-success float-right">Editt</a>
            </div>
            <div class="widget-user-image">
              <img class="rounded-circle" src="{{(!empty($user->profile_photo_path)) ? url('upload/profile/'.$user->profile_photo_path) : url('upload/no_image.jpg')}}" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">12K</h5>
                    <span class="description-text">FOLLOWERS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 br-1 bl-1">
                  <div class="description-block">
                    <h5 class="description-header">550</h5>
                    <span class="description-text">FOLLOWERS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">158</h5>
                    <span class="description-text">TWEETS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
    </section>

</div>
@endsection