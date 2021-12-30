<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

	
    <link rel="icon" href="{{asset('/images/favicon.ico')}}">

    <title>Sunny Admin - Dashboard</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{asset('backend/css/vendors_css.css')}}">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<!-- Style-->  
	<link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('backend/css/skin_color.css')}}">
   {{-- Toastr --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
     
  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">

  @include('admin.body.header')
  
  <!-- Left side column. contains the logo and sidebar -->
 @include('admin.body.slider')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	@yield('admin')
  </div>

  <!-- /.content-wrapper -->
  @include('admin.body.footer')

 
 
  
</div>
<!-- ./wrapper -->
  	
	 
	<!-- Vendor JS -->
	<script src="{{asset('backend/js/vendors.min.js')}}"></script>
    <script src="{{asset('/assets/icons/feather-icons/feather.min.js')}}"></script>	
	<script src="{{asset('/assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}}"></script>
	<script src="{{asset('/assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}"></script>
	<script src="{{asset('/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>
  <script src="{{asset('assets/vendor_components/datatable/datatables.min.js')}}"></script>
{{-- <script src="{{asset('backend/js/pages/data-table.js')}}"></script> --}}
	<!-- Sunny Admin App -->
	<script src="{{asset('backend/js/template.js')}}"></script>
	<script src="{{asset('backend/js/pages/dashboard.js')}}"></script>
	
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 <script>
   $(function(){
    $(document).on('click', '#delete', function(e){
    e.preventDefault();

    var link = $(this).attr('href');

    Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href=link
      Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
      )
    }
  })
  });

   
   });
 </script>

<script>

  


  @if(Session::get('message'))
    var type = "{{Session::get('alert-type')}}";
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

	
</body>
</html>
