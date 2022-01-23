@extends('admin.admin_master');
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">
    <!-- Content Header (Page header) -->
  

    <!-- Main content -->
    <section class="content">

     <!-- Basic Forms -->
      <div class="box">
        <div class="box-header with-border">
          <h4 class="box-title">Add Product</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col">
                <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
                @csrf
                   <div class="row">
                       <div class="col-md-4">
                        <div class="form-group">
                            <h5>Brands <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="brand_id" id="select"  class="form-control" required="">
                                    <option value="">Select Brands</option>
                                    @foreach($brands as $b)
                                    <option value="{{$b->id}}">{{$b->brand_name_en}}</option>
                                    @endforeach
                                </select>

                            <div class="help-block">
                            </div></div>
                            @error('brand_id')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                       </div>
                       <div class="col-md-4">
                        <div class="form-group">
                            <h5>Categories <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="category_id" id="select"  class="form-control" required="">
                                    <option value="">Select Categories</option>
                                    @foreach($categories as $c)
                                    <option value="{{$c->id}}">{{$c->category_name_en}}</option>
                                    @endforeach
                                </select>
                            <div class="help-block"></div></div>
                            @error('category_id')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                       </div>
                       <div class="col-md-4">
                        <div class="form-group">
                            <h5>Sub Categories <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="subcategory_id" id="select"  class="form-control" required="">
                                    <option value="">Select Sub Categories</option>
                                    @foreach($subcategories as $sc)
                                    <option value="{{$sc->id}}">{{$sc->subcategory_name_en}}</option>
                                    @endforeach
                                </select>
                                </select>
                            <div class="help-block"></div></div>
                            @error('subcategory_id')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                       </div>
                     
                   </div>



                   <div class="row">
                    <div class="col-md-4">
                     <div class="form-group">
                         <h5>Sub-subcategory <span class="text-danger">*</span></h5>
                         <div class="controls">
                             <select name="subsubcategory_id" id="select"  class="form-control" required="">
                                 <option value="">Select Sub-subcategory</option>
                                 @foreach($subsubcategories as $ssc)
                                 <option value="{{$ssc->id}}">{{$ssc->subsubcategory_name_en}}</option>
                                 @endforeach
                             </select>
                         <div class="help-block"></div></div>
                         @error('subsubcategory_id')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                     </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <h5>Product Name En <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="product_name_en" class="form-control" required="" ></div></div>
                            @error('product_name_en')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Name Id <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_name_id" class="form-control" required=""></div></div>
                                @error('product_name_id')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    


                    <div class="row">
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Code<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_code" class="form-control" required=""></div></div>
                                @error('product_code')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5>Product Quantity <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="product_qty" class="form-control" required=""></div></div>
                                @error('product_qty')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Tags En <span class="text-danger">*</span></h5>
                                   <input type="text" name="product_tags_en" value="Lorem,Ipsum,Amet" required="" data-role="tagsinput"  style="display: none;"> </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Tags Id <span class="text-danger">*</span></h5>
                                       <input type="text" name="product_tags_id" value="Lorem,Ipsum,Amet" required="" data-role="tagsinput"  style="display: none;"> </div>
                                    </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Size En <span class="text-danger">*</span></h5>
                                       <input type="text" name="product_size_en" value="Small,Medium,Large" required="" data-role="tagsinput"  style="display: none;"> </div>
                                    </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Size Id <span class="text-danger">*</span></h5>
                                       <input type="text" name="product_size_id" value="S,M,L" data-role="tagsinput" required=""  style="display: none;"> </div>
                                    </div>
                             
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Color En <span class="text-danger">*</span></h5>
                                       <input type="text" name="product_color_en" value="Red,Yellow,Green" required="" data-role="tagsinput"  style="display: none;"> </div>
                                    </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Color Id <span class="text-danger">*</span></h5>
                                       <input type="text" name="product_color_id" value="Red,Yellow,Green" required="" data-role="tagsinput"  style="display: none;"> </div>
                                    </div>
                                
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Selling Price<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="selling_price" class="form-control" required="" ></div></div>
                                            @error('selling_price')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                             
                            </div>


                            <div class="row">
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Discount Price<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="discount_price" class="form-control" required="" ></div></div>
                                            @error('discount_price')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Main Thumbnail <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="product_thumbnail" class="form-control" required="" onchange="mainThamUrl(this)"> <div class="help-block"></div></div>
                                            <img src="" alt="" id="mainThmb">
                                    </div>
                                </div>
                                
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Multiple Image <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="multi_imgs[]" multiple="" class="form-control" required="" id="multiImg"> <div class="help-block"></div></div>
                                            <div class="row" id="preview_img"></div>
                                        </div>
                                            
                                        </div>

                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Short Desc En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="short_descp_en" id="textarea" class="form-control" required=""  placeholder="Textarea text"></textarea>
                                        <div class="help-block"></div></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Short Desc Id <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="short_descp_id" id="textarea" class="form-control" required=""  placeholder="Textarea text"></textarea>
                                        <div class="help-block"></div></div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Long Description En <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="long_descp_en" id="editor1" class="form-control" required=""  placeholder="Textarea text"></textarea>
                                        <div class="help-block"></div></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Long Description Id <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="long_descp_id" id="editor2" class="form-control" require="" placeholder="Textarea text"></textarea>
                                        <div class="help-block"></div></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                
                                  <div class="form-group">
                                      <div class="controls">
                                          <input type="checkbox" id="checkbox_1" name="hot_deals"  value="1">
                                          <label for="checkbox_1">Hot Deals</label>
                                      <div class="help-block"></div></div>								
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                   
                                      <div class="controls">
                                        <input type="checkbox" id="checkbox_2" name="special_offer"  value="1">
                                        <label for="checkbox_2">Special Offer</label>
                                    <div class="help-block"></div></div>	
                                  </div>
                            
                                </div>
                            </div> 

                            <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                     
                                      <div class="controls">
                                          <input type="checkbox" id="checkbox_3" name="featured"  value="1">
                                          <label for="checkbox_3">Featured</label>
                                      <div class="help-block"></div></div>								
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                     
                                      <div class="controls">
                                        <input type="checkbox" id="checkbox_4" name="special_deals"  value="1">
                                        <label for="checkbox_4">Special deals</label>
                                    <div class="help-block"></div></div>	
                                  </div>
                            
                                </div>
                            </div> 

                            <button class="btn btn-primary" type="submit" style="border-radius: 50px">Add Product</button>
                           
                        </div>
                      
                  
                </div>
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
    <!-- /.content -->
  </div>


  <script>
      //Add text editor
    $(function () {
    "use strict";

    // Replace the <textarea id="editor1"> with a CKEditor
	// instance, using default configuration.
	CKEDITOR.replace('editor1')
	//bootstrap WYSIHTML5 - text editor
	$('.textarea').wysihtml5();		
	CKEDITOR.replace('editor2')
	//bootstrap WYSIHTML5 - text editor
	$('.textarea').wysihtml5();		
	
    
  });

  $(document).ready(function(){
        $('select[name="category_id"]').on('change', function(){
            var cat_id = $(this).val();
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


      $(document).ready(function(){
        $('select[name="subcategory_id"]').on('change', function(){
            var subcat_id = $(this).val();

            if(subcat_id){
                $.ajax({
                    url: "{{url('category/subsubcategory/ajax')}}/"+subcat_id,
                    method : 'GET',
                    dataType : 'json',
                    success:function(data){
                        $('select[name="subsubcategory_id"]').html(' ');
                        var d = $('select[name="subsubcategory_id"]').empty();
                        console.log(data)
                        $.each(data, function(key, value){
                            d.append('<option value="'+value.id+'">'+value.subsubcategory_name_en+'</option>');
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

  <script>
      function mainThamUrl(input){
            // console.log(input.files)
            // console.log(input.files[0])

            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#mainThmb').attr('src', e.target.result).width(80).height(80);   
                };
                reader.readAsDataURL(input.files[0]);
            }
      }
  </script>

<script>
 
    $(document).ready(function(){
     $('#multiImg').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            var data = $(this)[0].files; //this file data

             
            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                    .height(80); //create image element 
                        $('#preview_img').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });
             
        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
     });
    });
     
    </script>
@endsection