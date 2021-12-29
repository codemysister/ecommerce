@extends('admin.admin_master')
@section('admin')

<div class="container-full">
   

    <!-- Main content -->
    <section class="content">
      <div class="row">
          
        <div class="col-8">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Sub Categories</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example5" class="table table-bordered table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Sub Category Eng</th>
                            <th>Sub Category Ind</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subcategory as $sc)
                        <tr>
                            <td>{{$sc['category']['category_name_en']}}</td>
                            <td>{{$sc->subcategory_name_en}}</td>
                            <td>{{$sc->subcategory_name_id}}</td>
                            <td>
                                <a href="{{route('subcategory.edit', $sc->id)}}" class="btn btn-primary">Edit</a>&nbsp;
                                <a href="{{route('subcategory.delete',$sc->id )}}" class="btn btn-danger" id="delete">Delete</a>
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
               <h3 class="box-title">Add Sub Category</h3>
             </div>
             <!-- /.box-header -->
             <div class="box-body">
                 <div class="table-responsive">
                  <form method="POST" action="{{ route('subcategory.store') }}">
                    @csrf
            
                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Category</label>
                    <div class="controls">
                        <select name="category_id" id="select" class="form-control" aria-invalid="false">
                            <option value="" selected=''>Select Category</option>
                           
                            @foreach ($categories as $c)
                                <option value="{{$c->id}}">{{$c->category_name_en}}</option>
                            @endforeach
                        
                        </select>
                    </div>
                    @error('category_id')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">SubCategory English Name</label>
                    <input type="text" name="subcategory_name_en" id="category_name_en" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                    @error('subcategory_name_en')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            
                    <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">SubCategory Indo Name</label>
                    <input type="text" name="subcategory_name_id" id="category_name_id" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                    @error('subcategory_name_id')
                       <span class="text-danger">{{$message}}</span>
                     @enderror
                  </div>
            
                    
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