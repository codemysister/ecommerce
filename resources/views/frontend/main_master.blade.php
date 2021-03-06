<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="csrf_token" content="{{csrf_token()}}">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title>@yield('title')</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{asset('frontend/assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/blue.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/owl.transitions.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/rateit.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap-select.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{asset('frontend/assets/css/font-awesome.css')}}">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('frontend.body.header')

<!-- ============================================== HEADER : END ============================================== -->
@yield('home')
<!-- /#top-banner-and-menu --> 

<!-- ============================================================= FOOTER ============================================================= -->
@include('frontend.body.footer')
<!-- ============================================================= FOOTER : END============================================================= --> 

<!-- For demo purposes ??? can be removed on production --> 

<!-- For demo purposes ??? can be removed on production : End --> 

<!-- JavaScripts placed at the end of the document so the pages load faster --> 

<script src="{{asset('frontend/assets/js/jquery-1.11.1.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap-hover-dropdown.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/echo.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/jquery.easing-1.3.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap-slider.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/jquery.rateit.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('frontend/assets/js/lightbox.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap-select.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/wow.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/scripts.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  @if(Session::get('message'))
    var type = "{{Session::get('alert-type', 'info')}}";
    console.log(type)
    console.log(type);
    switch(type){
      case 'info':
            toastr.info("{{Session::get('message')}}");
            break;
      case 'success':
            toastr.success( "{{Session::get('message')}}" );
            console.log('y');
            break;
      case 'warning':
            toastr.warning("{{Session::get('message')}}");
            break;
      case 'error':
            toastr.error("{{Session::get('message')}}");
            break;
    }
  @endif
</script>


{{-- Modal --}}
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pname">Product Name</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="row">
                  <div class="col-sm-4">
                        <div class="card" style="width: 18rem;">
                              <img src="..." class="card-img-top" id="pimage" alt="..." style="height: 200px; width: 200px">
                             
                        </div>
                  </div>
                  <div class="col-sm-4">
                        <ul class="list-group">
                              <li class="list-group-item">Product Price : <strong id="price" class="text-danger">$<span id="pprice"></span></strong>  <del id="oldprice">$</del></li>
                              <li class="list-group-item">Product Code : <strong id="code"></strong></li>
                              <li class="list-group-item">Category : <strong id="category"></strong></li>
                              <li class="list-group-item">Brand : <strong id="brand"></strong></li>
                              <li class="list-group-item">Stock : <strong id="stock"><span id="available" class="badge badge-pill badge-success" style="background-color:green; color:white"><span id="stockout" class="badge badge-pill badge-danger" style="background-color:red; color:white"></span></strong></li>
                            </ul>
                  </div>
                  <div class="col-sm-4">
                        <div class="form-group" id="colorForm">
                              <label for="exampleFormControlSelect1">Choose Color</label>
                              <select class="form-control" id="color">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                              </select>
                            </div>
                        <div class="form-group" id="sizeForm">
                              <label for="exampleFormControlSelect1">Choose Size</label>
                              <select class="form-control" id="size">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                              </select>
                            </div>
                        <div class="form-group">
                              <label for="exampleFormControlSelect1">Quantity</label>
                              <input type="number" name="qty" id="qty" class="form-control">
                            </div>
                            <input type="hidden" id="product_id">
                            <button class="btn btn-primary cart-btn" onclick="addToCart()" type="button">Add to cart</button>
                  </div>
            </div>
            
      </div>

    </div>
  </div>
</div>
{{-- End Modal --}}



<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN' : $("meta[name='csrf_token']").attr('content')
    }
  })
</script>
</body>
</html>