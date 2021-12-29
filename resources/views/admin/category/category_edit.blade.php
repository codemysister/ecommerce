@extends('admin.admin_master')
@section('admin')
<div class="container-full">
   

    <!-- Main content -->
    <section class="content">
      <div class="row">

        
        <div class="col">

          <div class="box">
             <div class="box-header with-border">
               <h3 class="box-title">Edit Categories</h3>
             </div>
             <!-- /.box-header -->
             <div class="box-body">
                 <div class="table-responsive">
                  <form method="POST" action="{{ route('category.update') }}" enctype="multipart/form-data">
                    @csrf
            
                    <input type="hidden" name="id" value="{{$category->id}}">
                    
                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Category English Name</label>
                    <input type="text" name="category_name_en" id="category_name_en" value="{{$category->category_name_en}}" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                    @error('category_name_en')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            
                    <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Category Indo Name</label>
                    <input type="text" name="category_name_id" id="category_name_id" value="{{$category->category_name_id}}" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                    @error('category_name_id')
                       <span class="text-danger">{{$message}}</span>
                     @enderror
                  </div>
            
                    <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Category Icon</label>
                    <input type="text" name="category_icon" value="{{$category->category_icon}}" id="category_icon" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                    @error('category_icon')
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