@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Admin Edit</h4>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
               <form method="post" action="{{route('admin.profile.update')}}" enctype="multipart/form-data">
                @csrf
                 <div class="row">
                   <div class="col-6">						
                       <div class="form-group">
                           <h5>Admin Username <span class="text-danger">*</span></h5>
                           <div class="controls">
                               <input type="text" name="name" value="{{$user->name}}" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                       </div>
                       
                   </div>
                   <div class="col-6">
                       <div class="form-group">
                           <h5>Admin Email <span class="text-danger">*</span></h5>
                           <div class="controls">
                               <input type="email" name="email" value="{{$user->email}}" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                       </div>
                   </div>
                       
                   </div>

                   <div class="row">
                       <div class="col-6">
                        <div class="form-group">
                            <h5>File Input Field <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input id="images" type="file" name="profile_photo_path" class="form-control" > <div class="help-block"></div></div>
                        </div>
                       </div>
                       <div class="col-6">
                        <img id="showImage" style="width: 100px; height: 100px" src="{{(!empty($user->profile_photo_path)) ? url('upload/profile/'.$user->profile_photo_path) : url('upload/no_image.jpg')}}" alt="">
                       </div>
                   </div>
                   
                    <div class="row">
                        <div class="col-6">
                            
                            <div class="text-xs-right">
                                <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                            </div>
                        </div>
                    </div>
               </form>

           </div>
           <!-- /.col -->
         </div>
         <!-- /.row -->
       </div>
       <!-- /.box-body -->
     </div>
     <!-- /.box -->

   </section>

   <script type="text/javascript">
       $(document).ready(function(){
        $('#images').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
       });
   </script>
@endsection