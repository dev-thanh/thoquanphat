<div class="danhmuc_sp">
    <div class="title_box">
        <h3 class="h3_title">Danh mục sản phẩm</h3>
    </div>
    <div class="list_content--box">
        <ul class="ul-b">
            
            @foreach($menuCategory as $k => $item)
            @if($item->parent_id == 0)
            <li><a href="{{route('home.category-product',['slug'=>$item->slug])}}"><i class="fas fa-leaf"></i><span>{{$item->name}}</span></a>
                @if($item->get_child_cate())
                <span class="accordion1"></span>
                <div class="panel" style="">
                  <div class="sau-panel">
                      <ul class="ul-b">
                        @foreach($item->get_child_cate() as $value)
                          <li><a href="{{route('home.category-product',['slug'=>$value->slug])}}">{{$value->name}}</a></li>
                        @endforeach
                      </ul>
                  </div>
                </div>
                @endif
            </li>
            @endif
            @endforeach
            
        </ul>
    </div>
</div>