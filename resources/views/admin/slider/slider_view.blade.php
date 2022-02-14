@extends('admin.admin_master')
@section('admin')
<div class="container-full">
   

    <!-- Main content -->
    <section class="content">
      <div class="row">
          
        <div class="col-8">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Slider</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example5" class="table table-bordered table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Slider Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($slider as $item)
                        <tr>
                            <td><img src="{{asset($item->slider_img)}}" alt="" style="width: 70px; height:40px"></td>
                            <td>
                                @if($item->title == NULL)
                                     <span class="badge badge-pill badge-danger">No title</span>
                                @else
                                     {{$item->title}}
                                @endif
                            </td>
                            <td>{{$item->description}}</td>
                            <td>
                                @if($item->status == 1)
                                     <span class="badge badge-pill badge-success">Active</span>
                                @else
                                     <span class="badge badge-pill badge-danger">InActive</span>
                                @endif
                            </td>
                            <td width="30%">
                                <a href="{{route('slider.edit', $item->id)}}" class="btn btn-primary" alt="Edit"><i class="fa fa-pencil"></i></a>&nbsp;
                                <a href="{{route('slider.delete',$item->id )}}" class="btn btn-danger" id="delete" alt="Delete"><i class="fa fa-trash"></i></a>
                                @if ($item->status == 1)
                                <a href="{{route('slider.inactive',$item->id )}}" class="btn btn-secondary"  title="InActive"><i class="fa fa-arrow-down"></i></a>
                                @else
                                <a href="{{route('slider.active',$item->id )}}" class="btn btn-success"  title="Active"><i class="fa fa-arrow-up"></i></a>
                                @endif
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
               <h3 class="box-title">Add Slider</h3>
             </div>
             <!-- /.box-header -->
             <div class="box-body">
                 <div class="table-responsive">
                  <form method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">
                    @csrf
            
                <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Title</label>
                    <input type="text" name="title" id="slider" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                  
                </div>
            
                    <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Description</label>
                    <input type="text" name="description" id="description" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                   
                  </div>
            
                    <div class="form-group">
                    <label class="info-title" for="exampleInputEmail1">Slider Image</label>
                    <input type="file" name="slider_img" id="slider_img" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                    @error('slider_img')
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