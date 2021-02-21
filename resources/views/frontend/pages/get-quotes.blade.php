@extends('frontend.master')
@section('main')

	<?php if(!empty($contentHome)){
		$content = json_decode($contentHome->content);
	} ?>

	<main id="main" class="
    main-site main-page main-bao-gia-quy-trinh
    ">

	    @include('frontend.teamplate.banner')

	    <div class="main-container">
	        <div class="main-content">
	            <article class="lth-posts lth-bao-gia-quy-trinh">
	                <div class="container">
	                    <div class="row">
	                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	                            <div class="posts-box dich-vu-box dich-vu-2-box">
	                                <div class="title-box">
	                                    <h3 class="title">@if(isset($cate)) {{@$cate->name}} @else Báo giá và quy trình @endif</h3>
	                                </div>
	                                <div class="content-box">
	                                    <div class="groups-box">
	                                    	@foreach($data as $item)
	                                        <div class="item">
	                                            <div class="post-box">
	                                                <div class="post-image">
	                                                    <div class="image">
	                                                        <a href="{{route('home.child-quotes',['slug'=>$item->slug])}}" title="Post">
	                                                        <img src="{{url('/')}}/{{$item->image}}" alt="{{$item->name}}">
	                                                        </a>
	                                                    </div>
	                                                </div>
	                                                <div class="post-content">
	                                                    <div class="content">
	                                                        <h4 class="post-name">
	                                                            <a href="{{route('home.child-quotes',['slug'=>$item->slug])}}" title="Lorem ipsum">{{$item->name}}</a>
	                                                        </h4>
	                                                    </div>
	                                                    <div class="post-excerpt">
	                                                        <p>
	                                                        	{!! $item->desc !!}
	                                                        </p>
	                                                    </div>
	                                                    <div class="post-button">
	                                                        <a href="{{route('home.child-quotes',['slug'=>$item->slug])}}" title="Chi tiết" class="btn">Chi tiết</a>
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