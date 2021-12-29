@extends('admin.admin_master')
@section('admin')
<div class="container-full">
   

    <!-- Main content -->
    <section class="content">
      <div class="row">
          
        <div class="col-8">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Brands</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example5" class="table table-bordered table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Brand_en</th>
                            <th>Brand_id</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($brands as $b)
                        <tr>
                            <td>{{$b->brand_name_en}}</td>
                            <td>{{$b->brand_name_id}}</td>
                            <td>
                                <img width="50px" height="50px" src="{{asset($b->brand_image)}}" alt="">
                            </td>
                            <td>
                                <a href="{{route('brand.edit', $b->id)}}" class="btn btn-primary">Edit</a>&nbsp;
                                <a href="{{route('brand.delete',$b->id )}}" class="btn btn-danger" id="delete">Delete</a>
                            </td>
                        
                        </tr>
                        @endforeach
                    </tbody>
                   
                </table>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->      
        </div>
        
        <div class="col-4">

          <div class="box">
             <div class="box-header with-border">
               <h3 class="box-title">Add Brands</h3>
             </div>
             <!-- /.box-header -->
             <div class="box-body">
                 <div class="table-responsive">
                  <form method="POST" action="{{ route('brand.store') }}" enctype="multipart/form-data">
                    @csrf
            
                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Brand English Name</label>
                    <input type="text" name="brand_name_en" id="brand_name_en" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                    @error('brand_name_en')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            
                    <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Brand Indo Name</label>
                    <input type="text" name="brand_name_id" id="brand_name_id" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
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
                
                  <button type="submit" class="btn btn-primary">Add</button>
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