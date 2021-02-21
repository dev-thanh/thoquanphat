@extends('frontend.master')
@section('main')

	<?php if(!empty($dataSeo)){
		$content = json_decode($dataSeo->content);
		//dd($content);
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
	                            <div class="posts-box dich-vu-thiet-ke-box">
	                                <div class="title-box">
	                                    <h3 class="title">Dịch vụ - {{$cate->name}}</h3>
	                                </div>
	                                <div class="content-box">
	                                    <div class="groups-box">

	                                    	@foreach($cate_child as $item)
	                                        <div class="item">
	                                            <div class="post-box">
	                                                <div class="post-image">
	                                                    <div class="image">
	                                                        <a href="{{route('home.cate-services',['slug'=>$item->slug])}}" title="{{$item->name}}">
	                                                            <img src="{{url('/')}}/{{$item->image}}" alt="{{$item->name}}">
	                                                            <h4 class="post-name">{{$item->name}}</h4>
	                                                        </a>
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