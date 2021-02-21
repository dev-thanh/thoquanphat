<?php $curent_page = request()->get('page') ? request()->get('page') : '1'; ?>
@extends('frontend.master')
@section('main')
	
	<main id="main-site">
		@if(!empty(@$dataSeo->banner))
        <section class="banner_page bg-banner">
            <div class="container">
                <div class="banner_img img-cover">
                    <img src="{{url('/').@$dataSeo->banner}}" alt="{{@$dataSeo->name_page}}">
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
                        <li class="breadcrumb-item"><a href="{{route('home.news')}}">Blogs</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- end breadcrumd -->
        <section class="main_blog bg-section">
            <div class="container">
                <div class="title_style2">
                    <h1 class="h1_title"><span>Blog</span></h1>
                </div>
                <div class="content_page--blog">
                    <div class="box_content">
                        <div class="row">
                            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                                <div class="box_blog--top">
                                    <div class="img_item--blog">
                                        <a href="{{route('home.news-single',['slug' => @$data[0]->slug])}}"><img src="{{url('/').@$data[0]->image}}" alt="{{@$data[0]->name}}"></a>
                                    </div>
                                    <div class="text_item--blog">
                                        <div class="tags"><a href="{{route('home.news-single',['slug' => @$data[0]->slug])}}"><span>Tin mới</span></a></div>
                                        <h2 class="h2_title"><a href="{{route('home.news-single',['slug' => @$data[0]->slug])}}">{{@$data[0]->name}}</a></h2>
                                        <div class="des">
                                            {{@$data[0]->desc}}
                                        </div>
                                        <a href="{{route('home.news-single',['slug' => @$data[0]->slug])}}" class="btn_xemngay">Xem ngay <i class="fas fa-long-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                                <!-- end box blog top -->
                                <div class="box_list_item--blog">
                                	@foreach(@$data as $k => $item)
                                    <div class="item_blog">
                                        <div class="img_item--blog">
                                            <a href="{{route('home.news-single',['slug' => @$item->slug])}}"><img src="{{url('/').@$item->image}}" alt="{{@$item->name}}"></a>
                                        </div>
                                        <div class="text_item--blog">
                                            <h2 class="h2_title"><a href="{{route('home.news-single',['slug' => @$item->slug])}}">{{@$item->name}}</a></h2>
                                            <div class="date_time">
                                                <i class="fas fa-calendar-alt"></i>
                                                <span>Ngày {{format_datetime($item->created_at,'d/m/y')}}</span>
                                            </div>
                                            <div class="des">
                                                {{@$item->desc}}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="pagination">
                                    <nav aria-label="..." class="">
                                        <ul class="pagination">
                                            <li class="page-item">
                                            	<a href="{{route('home.news')}}?page={{$curent_page-1}}" @if($curent_page==1) onclick="return false;" @endif">
	                                              	<span class="page-link">
	                                              		<i class="fas fa-angle-double-left"></i>
	                                              	</span>
	                                            </a>
                                            </li>

                                            @for($i = 0; $i < $data->lastpage(); $i++)
                                            <li class="page-item" data-page="{{$i+1}}">
                                            	<a class="page-link" href="{{route('home.news')}}?page={{$i+1}}" @if($curent_page == $i+1) onclick="return false;" @endif">{{$i+1}}</a>
                                            </li>
                                            @endfor

                                            <li class="page-item">
                                              	<a href="{{route('home.news')}}?page={{$curent_page+1}}" @if($curent_page==$data->lastpage()) onclick="return false;" @endif>
	                                              	<span class="page-link">
	                                              		<i class="fas fa-angle-double-right"></i>
	                                              	</span>
                                              	</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- end pagination -->
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
                                                <h3 class="h3-title"><a href="{{route('home.news-single',['slug' => @$item->slug])}}">{{@$item->name}}</a></h3>
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

    <script>

        jQuery(document).ready(function($) {

            $('[data-page="{{$curent_page}}"]').addClass('active');

        });

    </script>

@endsection