@extends('admin.admin_master')
@section('admin')
<div class="container-full">
   

    <!-- Main content -->
    <section class="content">
      <div class="row">

        
        <div class="col">

          <div class="box">
             <div class="box-header with-border">
               <h3 class="box-title">Edit Brand</h3>
             </div>
             <!-- /.box-header -->
             <div class="box-body">
                 <div class="table-responsive">
                  <form method="POST" action="{{ route('brand.update', $brand->id) }}" enctype="multipart/form-data">
                    @csrf
            
                    <input type="hidden" name="id" value="{{$brand->id}}">
                    <input type="hidden" name="oldimage" value="{{$brand->brand_image}}">
                    
                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Brand English Name</label>
                    <input type="text" name="brand_name_en" id="brand_name_en" value="{{$brand->brand_name_en}}" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                    @error('brand_name_en')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            
                    <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Brand Indo Name</label>
                    <input type="text" name="brand_name_id" id="brand_name_id" value="{{$brand->brand_name_id}}" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                    @error('brand_name_id')
                       <span class="text-danger">{{$message}}</span>
                     @enderror
                  </div>
            
                    <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Brand Image</label>
                    <input type="file" name="brand_image" id="brand_image" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                    @error('brand_image')
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