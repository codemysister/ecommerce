@extends('admin.admin_master')
@section('admin')
<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Admin Change Password</h4>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
               <form method="post" action="{{route('update.change.password')}}" >
                @csrf
                 <div class="row">
                     <div class="col">
                    <div class="form-group">
                        <h5>Current Password <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="password" id="oldpassword" name="oldpassword" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                    </div>
                </div>
                 </div>

                 <div class="row">
                     <div class="col">
                    <div class="form-group">
                        <h5>New Password <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="password" id="password" name="password" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                    </div>
                </div>
                 </div>
                 
                 <div class="row">
                     <div class="col">
                    <div class="form-group">
                        <h5>Password Confirmation<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                    </div>
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
         </div>
       </div>
     </div>

   </section>
 
@endsection