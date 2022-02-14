@extends('admin.admin_master')
@section('admin')
<div class="container-full">
   

    <!-- Main content -->
    <section class="content">
      <div class="row">
          
        <div class="col">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Products</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example5" class="table table-bordered table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product Name Eng</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Discount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $c)
                        <tr>
                            <td><img src="{{asset($c->product_thumbnail)}}" alt="" style="width:60px; height:50px"></td>
                            <td>{{$c->product_name_en}}</td>
                            <td>${{$c->selling_price}}</td>
                            <td>{{$c->product_qty}} pcs</td>
                            <td>
                              @if ($c->discount_price == NULL)
                                <span class="badge badge-pill badge-danger">No discount</span>
                              @else
                                @php
                                  $amount =  $c->selling_price - $c->discount_price;
                                  $discount = ( $amount / $c->selling_price) * 100;
                                @endphp
                                 <span class="badge badge-pill badge-danger">{{round($discount)}}%</span>
                              @endif
                            </td>
                            <td>
                                  @if($c->status == 1)
                                      <span class="badge badge-pill badge-success">Active</span>
                                  @else
                                    <span class="badge badge-pill badge-danger">InActive</span>
                                  @endif
                            </td>
                            <td>
                                <a href="{{route('product.edit', $c->id)}}" class="btn btn-warning" title="Detail"><i class="fa fa-eye"></i></a>&nbsp;
                                <a href="{{route('product.edit', $c->id)}}" class="btn btn-primary" title="Edit"><i class="fa fa-pencil"></i></a>&nbsp;
                                <a href="{{route('product.delete',$c->id )}}" class="btn btn-danger" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
                                @if ($c->status == 1)
                                <a href="{{route('product.inactive',$c->id )}}" class="btn btn-secondary"  title="InActive"><i class="fa fa-arrow-down"></i></a>
                                @else
                                <a href="{{route('product.active',$c->id )}}" class="btn btn-success"  title="Active"><i class="fa fa-arrow-up"></i></a>
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
        
        
      <!-- /.row -->
    </section>
    <!-- /.content -->
  
  </div>
@endsection