@extends('frontend.master')
@section('main')

	<?php if(!empty($contentHome)){
		$content = json_decode($contentHome->content);
	} ?>

	<main id="main" class="
    main-site main-page main-dich-vu
    ">

	    @include('frontend.teamplate.banner')

	    <div class="main-container">
	        <div class="main-content">
	            <article class="lth-posts">
	                <div class="container">
	                    <div class="row">
	                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	                            <div class="posts-box dich-vu-box">
	                                <div class="title-box">
	                                    <h3 class="title">{{$dataSeo->meta_title}}</h3>
	                                    <div class="description">
	                                        {!! $dataSeo->meta_description !!}
	                                    </div>
	                                </div>
	                                <div class="content-box">
	                                    <div class="groups-box">
	                                    	@foreach($cate_parent as $item)
	                                        <div class="item">
	                                            <div class="post-box">
	                                                <div class="post-image">
	                                                    <div class="image">
	                                                        <a href="{{route('home.cate-services',['slug'=>$item->slug])}}" title="Post">
	                                                        <img src="{{url('/')}}/{{$item->image}}" alt="{{$item->name}}">
	                                                        </a>
	                                                    </div>
	                                                </div>
	                                                <div class="post-content">
	                                                    <h4 class="post-name">
	                                                        <a href="{{route('home.cate-services',['slug'=>$item->slug])}}" title="{{$item->name}}"> {{$item->name}} </a>
	                                                    </h4>
	                                                    <div class="post-excerpt">
	                                                        <p>
	                                                        	{{$item->content}}
	                                                        </p>
	                                                    </div>
	                                                    <div class="post-button">
	                                                        <a href="{{route('home.cate-services',['slug'=>$item->slug])}}" title="Xem thêm" class="btn">Xem thêm</a>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                        </div>
	                                        @endforeach
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </article>
	        </div>
	    </div>
	</main>

@endsection