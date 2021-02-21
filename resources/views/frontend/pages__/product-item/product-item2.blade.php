<div class="item">
    <div class="item_sanpham">
        <div class="img_sp img-cover">
            <a href="{{route('home.single-product-gift',['slug'=>$item->slug])}}"><img src="{{url('/').$item->image}}"></a>
            @if (!empty($item->percent_sale))
            <div class="ing_sel">-{{ $item->percent_sale }}%</div>
            @endif
        </div>
        <div class="text_sp">
            <h3 class="h3_title"><a href="{{route('home.single-product-gift',['slug'=>$item->slug])}}">{{$item->name}}</a></h3>
            @if (!is_null($item->price_sale))

                <div class="price">
                    <div class="price_sel">
                        <i class="fas fa-tag"></i>
                        <span>{{ number_format($item->price,0, '.', '.') }} đ</span>
                    </div>
                    <div class="price_int">
                        {{ number_format($item->price_sale,0, '.', '.') }} đ
                    </div>
                </div>

                <!-- <span>{{ number_format($item->sale_price,0, '.', '.') }}đ</span>

                <del>{{ number_format($item->regular_price,0, '.', '.') }}đ</del> -->

            @else

                @if ($item->price != 0)
                    <div class="price_sel">
                    </div>
                    <div class="price">
                        <div class="price_int price_int-right">
                            {{ number_format($item->price,0, '.', '.') }} đ
                        </div>
                    </div>

                @else

                    <div class="price">
                        <div class="price_sel">
                            <i class="fas fa-tag"></i>
                            <span>Liên hệ</span>
                        </div>
                    </div>

                @endif

            @endif
            
            <div class="des_sp">
                {!! $item->desc !!}
            </div>
            <a href="{{route('home.get-add-cart',['id'=>$item->id,'price'=>$item->price_sale !='' ? $item->price_sale : $item->price])}}">
                
            <div class="btn btn_addcart">
                <i class="fas fa-shopping-cart"></i>
                <span>Thêm vào giỏ hàng</span>
            </div>
            </a>
        </div>
    </div>
</div>