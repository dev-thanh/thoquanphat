@extends('frontend.master')
@section('main')
	<main id="main-site">
		@if(!empty(@$site_info->side_bar->news->banner_2))
        <section class="banner_page bg-banner">
            <div class="container">
                <div class="banner_img img-cover">
                    <img src="{{url('/').@$site_info->side_bar->news->banner_2}}" alt="{{@$site_info->side_bar->news->title_2}}">
                </div>
            </div>
        </section>
        @endif
        <!-- end section banner page -->
        <div class="bread">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Library</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- end breadcrumd -->
        <section class="main_blog--detail bg-section">
            <div class="container">
                <div class="content_page--blog">
                    <div class="box_content">
                        <div class="row">
                            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                                <div class="content_blog--detail">
                                    <h1 class="h1_title">{{@$data->name}}</h1>
                                    <div class="date_time">
                                        <i class="fas fa-calendar-alt"></i>
                                        <span>Ngày {{format_datetime($data->created_at,'d/m/y')}}</span>
                                    </div>
                                    <div class="box-content">
                                        {!! @$data->content !!}
                                    </div>
                                    <div class="wp_cmt--facebook">
                                        <div class="art-comments">
											<div class="fb-comments" data-href="{{ url()->current() }}" data-numposts="5" data-width="100%"></div>

											
										</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                <div class="sidebar_blog">
                                    <h2 class="h2_title"><span>Xem nhiều nhất</span></h2>
                                    <div class="list_item--blog-sb">
                                    	@foreach($post_view as $item)
                                        <div class="item_blog--sb">
                                            <div class="img_blog">
                                                <a href="{{route('home.news-single',['slug' => @$item->slug])}}"><img src="{{url('/').@$item->image}}" alt="{{@$item->name}}"></a>
                                            </div>
                                            <div class="text_blog">
                                                <h3 class="h3-title"><a href="{{route('home.news-single',['slug' => @$item->slug])}}">{{$item->name}}</a></h3>
                                            </div>
                                        </div>
                                       	@endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end box content -->
                </div>
            </div>
        </section>
        <!-- end section main story -->
    </main>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=1620283888101801&autoLogAppEvents=1"></script>
@endsection