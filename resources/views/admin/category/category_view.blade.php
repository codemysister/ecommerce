@extends('admin.admin_master')
@section('admin')
<div class="container-full">
   

    <!-- Main content -->
    <section class="content">
      <div class="row">
          
        <div class="col-8">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Categories</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example5" class="table table-bordered table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Category Icon</th>
                            <th>Category Eng</th>
                            <th>Category Ind</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $c)
                        <tr>
                            <td><i class="{{$c->category_icon}}"></i></td>
                            <td>{{$c->category_name_en}}</td>
                            <td>{{$c->category_name_id}}</td>
                            <td>
                                <a href="{{route('category.edit', $c->id)}}" class="btn btn-primary">Edit</a>&nbsp;
                                <a href="{{route('category.delete',$c->id )}}" class="btn btn-danger" id="delete">Delete</a>
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
               <h3 class="box-title">Add Category</h3>
             </div>
             <!-- /.box-header -->
             <div class="box-body">
                 <div class="table-responsive">
                  <form method="POST" action="{{ route('category.store') }}">
                    @csrf
            
                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Category English Name</label>
                    <input type="text" name="category_name_en" id="category_name_en" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                    @error('category_name_en')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            
                    <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Category Indo Name</label>
                    <input type="text" name="category_name_id" id="category_name_id" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                    @error('category_name_id')
                       <span class="text-danger">{{$message}}</span>
                     @enderror
                  </div>
            
                    <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Category Icon</label>
                    <input type="text" name="category_icon" id="category_icon" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                    @error('category_icon')
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