@extends('frontend.master')
@section('main')
	<?php if(!empty($dataSeo)){

        $content = json_decode($dataSeo->content);
        //dd($content);
    } ?>

    <main id="main-site">
    	@if(!empty(@$site_info->side_bar->product->banner))
        <section class="banner_page bg-banner">
            <div class="container">
                <div class="banner_img img-cover">
                    <img src="{{@$site_info->side_bar->product->banner}}" alt="">
                </div>
            </div>
        </section>
        @endif
        <!-- end section banner page -->
        <div class="bread">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home.index')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{route('home.product')}}">Sản phẩm</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- end breadcrumd -->
        <section class="chi-tiet-sp">
            <div class="ctsp_top">
                <div class="container">
                    <div class="row">
                    	
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="left">
                                <div id="slider-ctsp" class="owl-carousel owl-theme">
                                	@if(!empty($data->more_image))
                                	@foreach(json_decode($data->more_image) as $k => $item)
                                    <div class="item" data-hash="img-{{$k+1}}">
                                        <div class="img_ctsp">
                                            <img src="{{url('/').$item}}" alt="{{@$data->name}}">
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                                <div class="slide-click d-flex">
                                	@if(!empty($data->more_image))
                                	@foreach(json_decode($data->more_image) as $k => $item)
                                    <div class="item_click">
                                        <a href="#img-{{$k+1}}"><img src="{{url('/').$item}}" alt="{{@$data->name}}"></a>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        	<form action="{{ route('home.post-add-cart') }}" method="POST">
                        		@csrf
	                            <div class="right content_ctsp">
	                                <h1 class="h1_title">{{@$data->name}}</h1>
	                                <div class="price">Giá: {{$data->price_sale !='' ? $data->price_sale : $data->price}}đ</div>
	                                <div class="table_b">
	                                    <table cellpadding="0" cellspacing="0">
	                                        <tr>
	                                            <td>Mã sản phẩm</td>
	                                            <td>{{$data->code}}</td>
	                                        </tr>
                                            @if(@$data->xuat_xu !='')
	                                        <tr>
	                                            <td>Xuất xứ</td>
	                                            <td>{{@$data->xuat_xu}}</td>
	                                        </tr>
                                            @endif
                                            @if(@$data->tinh_trang !='')
	                                        <tr>
	                                            <td>Tình trạng</td>
	                                            <td>{{@$data->tinh_trang==1 ? 'Còn hàng' : 'Hết hàng' }}</td>
	                                        </tr>
                                            @endif
	                                    </table>
	                                </div>
	                                <div class="des_ctsp">
	                                    <h4 class="h4_title">Mô Tả ngắn: </h4>
	                                    <div class="des">
	                                    	{!! @$data->desc !!}
	                                    </div>
	                                </div>
	                                <div class="btn_phone_cart">
	                                    <div class="btn_phone">
	                                        <button type="button">
	                                            <img src="{{url('/').'/public/frontend/images/icon-phone.png'}}" alt="Hot line}">
	                                            <span>{{@$site_info->hotline}}</span>
	                                        </button>
	                                    </div>
	                                    <div class="btn_addcart">
	                                        <button type="submit">
	                                            <span>Thêm vào giỏ hàng</span>
	                                        </button>
	                                    </div>
	                                </div>
	                            </div>
	                            <input type="hidden" name="id_product" value="{{ $data->id }}">
	                            <input type="hidden" id="id_price" name="price" value="{{ @$data->price_sale !='' ? @$data->price_sale : @$data->price }}">
                        	</form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end ctsp top -->
            <div class="ctsp_mota">
                <div class="container">
                    <div class="title_des--ctsp">
                        <h2 class="h2_title"><span>Mô tả chi tiết</span></h2>
                    </div>
                    <div class="main_des--ctsp">
                        {!! @$data->content !!}
                    </div>
                </div>
            </div>
        </section>
        <!-- end sec chi tiet san pham -->
        @if(count($product_hot) > 0)
        <section class="news sp_nb">
            <div class="container">
                <div class="title_section">
                    <h2 class="h2_title">Sản phẩm nổi bật</h2>
                </div>
                <div class="content_section">
                    <div id="slider-news" class="owl-carousel owl-theme">
                    	@foreach($product_hot as $item)
                        <div class="item">
                            <div class="item_news">
                                <div class="img_news img-cover">
                                    <a href="{{route('home.single-product',['slug' => $item->slug])}}"><img src="{{url('/').$item->image}}" alt="{{$item->name}}"></a>
                                </div>
                                <div class="text_news">
                                    <div class="date_time">
                                        <i class="fas fa-calendar-alt"></i>
                                        <span>{{format_datetime($item->created_at,'d/m/y')}}</span>
                                    </div>
                                    <div class="text">
                                        <h3 class="h3_title"><a href="#">{{$item->name}}</a></h3>
                                        <div class="des_news">
                                        	{!! $item->desc !!}
                                        </div>
                                        <a href="{{route('home.single-product',['slug' => $item->slug])}}" class="btn btn-default btn_xemthem">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        @endif
        <!-- end section news -->
    </main>

@endsection