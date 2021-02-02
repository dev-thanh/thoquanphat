@extends('frontend.master')
@section('main')

	<?php if(!empty($contentHome)){
		$content = json_decode($contentHome->content);
		//dd($content);
	} ?>
	<style type="text/css" media="screen">
		.slider_banner--home:after{
			background: url({{$site_info->background_slide}});
		    background-size: 100% 100%;
		}
		.y-kien-kh .left_ykkh{
			background: url({{@$content->customer_reviews->image}});
    		background-size: 100% 100%;
		}
	</style>
	<main id="main-site">
        <section class="slider_banner--home">
            <div class="container">
                <div id="slider-home" class="owl-carousel owl-theme">
                	@if(!empty($content->slider))
	                	@foreach($content->slider as $item)
	                    <div class="item">
	                        <div class="slide_banner">
	                            <div class="img_slider--main img-cover">
	                                <img alt="{{$item->name_h1}}" src="{{url('/').$item->image}}">
	                            </div>
	                            <div class="text_slider--main">
	                                <h2 class="h2-title" title="{{$item->name_h1}}">{{$item->name_h1}}</h2>
	                                <h3 class="h3-title" title="{{$item->name_h2}}">{{$item->name_h2}}</h3>
	                                <a href="#" class="btn">{{$item->button}}</a>
	                            </div>
	                        </div>
	                    </div>
	                    @endforeach
                    @endif
                </div>
            </div>
        </section>
        <!-- end section slider banner -->
        <section class="sanpham_banchay">
            <div class="container">
                <div class="title_section">
                    <h2 class="h2_title"><span>Sản phẩm bán chạy</span></h2>
                </div>
                <div class="content_section">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                            @include('frontend.teamplate.category-products')
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                            <div class="slide_sanpham">
                                <div id="slider-sanpham" class="owl-carousel owl-theme">
                                	@foreach($products_selling as $item)
                                    	@include('frontend.pages.product-item.product-item1')
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section san pham ban chay -->
        @if(!empty(@$content->difference))
        <section class="su-khac-biet">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 d-none d-md-block">
                        <div class="img_ads img-cover">
                            <a href="#"><img src="{{url('/').@$content->difference->image}}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                        <div class="title_section">
                            <h2 class="h2_title"><span>{{@$content->difference->title}}</span></h2>
                        </div>
                        <div class="content_su_kb">
                            <div class="des_section">
                                <i class="fas fa-quote-left"></i>
                                <div class="des">{{@$content->difference->desc}}</div>
                            </div>
                            <div class="content">
                                <div class="list_info d-flex flex-wrap">
                                	@if(!empty(@$content->difference->content))
	                                	@foreach(@$content->difference->content as $item)
	                                    <div class="item_info">
	                                        <div class="img_item--info img-cover">
	                                            <a href="{{@$item->link}}"><img src="{{url('/').@$item->image}}" alt="{{@$item->name_h1}}"></a>
	                                        </div>
	                                        <div class="text_item--info">
	                                            <h3 class="h3_title"><a href="{{@$item->link}}">{{@$item->name_h1}}</a></h3>
	                                            <a href="{{@$item->link}}" class="btn btn_loadmore">Xem thêm</a>
	                                        </div>
	                                    </div>
	                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
        <!-- end section su-kb -->
        <section class="sanpham-chinh">
            <div class="container">
                <div class="title_section">
                    <h2 class="h2_title"><span>Sản phẩm</span></h2>
                </div>
                <div class="content_section">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 d-none d-md-block">
                            <div class="img_ads2 img-cover">
                                <a href="#"><img src="{{url('/').@$content->product->image}}" alt="Sản phẩm"></a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                            <div class="row">
                            	@foreach($products as $item)
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6">
                                    @include('frontend.pages.product-item.product-item1')
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end sec san pham chinh -->
        @if(!empty(@$content->banner_main_image))
        <section class="bg-ngan">
            <div class="img_ngan img-cover">
                <img src="{{url('/').@$content->banner_main_image}}" alt="Banner main">
            </div>
        </section>
        @endif
        <!-- end section img ngan -->
        @if(!empty(@$content->customer_reviews))
        <section class="y-kien-kh">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="left_ykkh">
                            <div class="title_box">
                                <h2 class="h2_title">{{@$content->customer_reviews->title}}</h2>
                            </div>
                            @if(!empty(@$content->customer_reviews->content))
                            <div class="content_box">
                                <div id="slider-ykkh" class="owl-carousel owl-theme">
                                    @foreach(@$content->customer_reviews->content as $item)
                                    <div class="item">
                                        <div class="slide_ykkh">
                                            <div class="text_ykkh">
                                                <i class="fas fa-quote-left"></i>
                                                <h3 class="h3_title">{{@$item->content}}</h3>
                                            </div>
                                            <div class="avt_ykkh">
                                                <div class="avt">
                                                    <img src="{{url('/').@$item->image}}" alt="{{@$item->title}}">
                                                </div>
                                                <div class="info text-center">
                                                    <h4 class="h4_title">{{@$item->title}}</h4>
                                                    <div class="des">{{@$item->desc}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="right_ykkh">
                            <div class="title_box">
                                <h2 class="h2_title">đăng ký làm  đại lý</h2>
                            </div>
                            <div class="des_box">
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                            </div>
                            <div class="form_dky">
                                <form id="frm_contact" action="{{route('home.post-contact')}}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" placeholder="Họ và tên">
                                        <span class="fr-error" id="error_name"></span>
                                    </div>
                                    <div class="form-group d-flex">
                                        <div class="input_50">
                                            <input type="text" class="form-control" name="phone" placeholder="Số điện thoại">
                                            <span class="fr-error" id="error_phone"></span>
                                        </div>
                                        <div class="input_50">
                                            <input type="text" class="form-control" name="email" placeholder="Email">
                                            <span class="fr-error" id="error_email"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="textarea_">
                                            <textarea class="form-control" name="content" placeholder="Nội dung"></textarea>
                                            <span class="fr-error" id="error_content"></span>
                                        </div>
                                    </div>
                                    <input type="hidden" name="type" value="2">
                                    <div class="btn_submit">
                                        <button class="btn btn-default btn--registration">Gửi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
        <!-- end section y kien khach hang -->
        <section class="news">
            <div class="container">
                <div class="title_section">
                    <h2 class="h2_title">Tin tức</h2>
                </div>
                <div class="content_section">
                    <div id="slider-news" class="owl-carousel owl-theme">
                    	@foreach($blogs as $item)
                        <div class="item">
                            <div class="item_news">
                                <div class="img_news img-cover">
                                    <a href="{{route('home.news-single',['slug' => @$item->slug])}}"><img src="{{url('/').@$item->image}}" alt="{{$item->name}}"></a>
                                </div>
                                <div class="text_news">
                                    <div class="date_time">
                                        <i class="fas fa-calendar-alt"></i>
                                        <span>{{format_datetime($item->created_at,'d/m/y')}}</span>
                                    </div>
                                    <div class="text">
                                        <h3 class="h3_title"><a href="#">{{$item->name}}</a></h3>
                                        <div class="des_news">{{$item->desc}}</div>
                                        <a href="{{route('home.news-single',['slug' => @$item->slug])}}" class="btn btn-default btn_xemthem">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- end section news -->
    </main>

@endsection