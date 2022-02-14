
@php
    $tags_en = App\Models\Product::groupBy('product_tags_en')->select('product_tags_en')->get();
    $tags_id = App\Models\Product::groupBy('product_tags_id')->select('product_tags_id')->get();
    
    
@endphp

<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">Product tags</h3>
    <div class="sidebar-widget-body outer-top-xs">
      <div class="tag-list"> 
        @if(Session::get('Language') == 'Indonesia')
        @foreach($tags_id as $tag)
            <a class="item" title="" href="{{url('product/tags/'. $tag->product_tags_id)}}">{{$tag->product_tags_id}}</a> 
        @endforeach
        
        @else 
        @foreach($tags_en as $tag)
            <a class="item" title="" href="{{url('product/tags/'. $tag->product_tags_en)}}">{{$tag->product_tags_en}}</a> 
        @endforeach
        
        @endif
           
          
      <!-- /.tag-list --> 
    </div>
    <!-- /.sidebar-widget-body --> 
  </div>
  <!-- /.sidebar-widget --> 
</div>