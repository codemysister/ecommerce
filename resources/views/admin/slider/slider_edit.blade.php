@extends('admin.admin_master')
@section('admin')
<div class="container-full">
   

    <!-- Main content -->
    <section class="content">
      <div class="row">

        
        <div class="col">

          <div class="box">
             <div class="box-header with-border">
               <h3 class="box-title">Edit Slider</h3>
             </div>
             <!-- /.box-header -->
             <div class="box-body">
                 <div class="table-responsive">
                  <form method="POST" action="{{ route('slider.update') }}" enctype="multipart/form-data">
                    @csrf
            
                    <input type="hidden" name="id" value="{{$slider->id}}">
                    <input type="hidden" name="oldimage" value="{{$slider->slider_img}}">
                    
                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Slider Title</label>
                    <input type="text" name="title" id="title" value="{{$slider->title}}" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                    @error('title')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            
                    <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Slider Description</label>
                    <input type="text" name="description" id="description" value="{{$slider->description}}" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                    @error('description')
                       <span class="text-danger">{{$message}}</span>
                     @enderror
                  </div>
            
                    <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Slider Image</label>
                    <input type="file" name="slider_img" id="slider_img" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                    @error('slider_img')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                
                  <button type="submit" class="btn btn-primary">Update</button>
              </form>		
                 </div>
             </div>
             <!-- /.box-body -->
           </div>
           <!-- /.box -->      
         </div>


        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  
  </div>
@endsection