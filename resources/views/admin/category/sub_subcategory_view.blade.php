@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                            <th>Sub-SubCategory Eng</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sub_subcategory as $sc)
                        <tr>
                            <td>{{$sc['category']['category_name_en']}}</td>
                            <td>{{$sc['subcategory']['subcategory_name_en']}}</td>
                            <td>{{$sc->subsubcategory_name_en}}</td>
                            <td>
                                <a href="{{route('subsubcategory.edit', $sc->id)}}" class="btn btn-primary">Edit</a>&nbsp;
                                <a href="{{route('subsubcategory.delete',$sc->id )}}" class="btn btn-danger" id="delete">Delete</a>
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
               <h3 class="box-title">Add Sub-SubCategory</h3>
             </div>
             <!-- /.box-header -->
             <div class="box-body">
                 <div class="table-responsive">
                  <form method="POST" action="{{ route('subsubcategory.store') }}">
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
                    <label class="info-title" for="exampleInputEmail1">Sub Category</label>
                    <div class="controls">
                        <select name="subcategory_id" id="select" class="form-control" aria-invalid="false">
                            <option value="" selected=''>Select Sub Category</option>
                        
                        </select>
                    </div>
                    @error('subcategory_id')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Sub-SubCategory English Name</label>
                    <input type="text" name="subsubcategory_name_en" id="subsubcategory_name_en" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                    @error('subsubcategory_name_en')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            
                    <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Sub-SubCategory Indo Name</label>
                    <input type="text" name="subsubcategory_name_id" id="subsubcategory_name_id" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                    @error('subsubcategory_name_id')
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


  <script>
      $(document).ready(function(){
        $('select[name="category_id"]').on('change', function(){
            var cat_id = $(this).val();
            console.log(cat_id);

            if(cat_id){
                $.ajax({
                    url: "{{url('category/subcategory/ajax')}}/"+cat_id,
                    method : 'GET',
                    dataType : 'json',
                    success:function(data){
                        var d = $('select[name="subcategory_id"]').empty();

                        $.each(data, function(key, value){
                            d.append('<option value="'+value.id+'">'+value.subcategory_name_en+'</option>');
                        });
                    },
                }
                )
            }else{
                alert('Gagal');
            }
        });
      });
  </script>
@endsection