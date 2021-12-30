@extends('admin.admin_master')
@section('admin')
<div class="container-full">
   

    <!-- Main content -->
    <section class="content">
      <div class="row">

        
        <div class="col">

          <div class="box">
             <div class="box-header with-border">
               <h3 class="box-title">Edit Sub-SubCategories</h3>
             </div>
             <!-- /.box-header -->
             <div class="box-body">
                 <div class="table-responsive">
                  <form method="POST" action="{{ route('subsubcategory.update') }}" enctype="multipart/form-data">
                    @csrf
            
                    <input type="hidden" name="subsubcategory_id" value="{{$subsubcategory->id}}">
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Category</label>
                        <div class="controls">
                            <select name="category_id" class="form-control" aria-invalid="false">
                                @foreach ($categories as $c)
                                <option value="{{$c->id}}" {{$c->id == $subsubcategory->category_id ? 'selected':''}}>{{$c->category_name_en}}</option>
                                @endforeach
                            
                            </select>
                        </div>
                        @error('category_id')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Sub Category</label>
                        <div class="controls">
                            <select name="subcategory_id" class="form-control" aria-invalid="false">
                                @foreach ($subcategories as $sc)
                                <option value="{{$sc->id}}" {{$sc->id == $subsubcategory->subcategory_id ? 'selected':''}}>{{$sc->subcategory_name_en}}</option>
                                @endforeach
                            
                            </select>
                        </div>
                        @error('subcategory_id')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
    
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Sub-SubCategory English Name</label>
                        <input type="text" name="subsubcategory_name_en" id="category_name_en" value="{{$subsubcategory->subsubcategory_name_en}}" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                        @error('subsubcategory_name_en')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                
                        <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Sub-SubCategory Indo Name</label>
                        <input type="text" name="subsubcategory_name_id" value="{{$subsubcategory->subsubcategory_name_id}}" id="category_name_id" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                        @error('subsubcategory_name_id')
                           <span class="text-danger">{{$message}}</span>
                         @enderror
                      </div>
                
                        
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