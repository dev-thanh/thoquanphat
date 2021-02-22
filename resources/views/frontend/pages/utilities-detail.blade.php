@extends('frontend.master')
@section('main')

	<?php if(!empty($contentHome)){
		$content = json_decode($contentHome->content);
	} ?>

	<main id="main" class=" ">
	    
	    @include('frontend.teamplate.banner')

	    <section class="page-detail">
	        <div class="container">
	            <div class="module module__page-detail">
	                <div class="module__header">
	                    <h2 class="title">{{@$data->name}}</h2>
	                </div>
	                <div class="module__content">
	                    <div class="detail__content">
	                        {!! @$data->content !!}
	                    </div>
	                    <div class="detail__group">
	                    	@if(!empty($data->more_image))
		                    	@foreach(json_decode($data->more_image) as $item)
			                        <div class="detail__item">
			                            <img class="frame--image" src="{{url('/').$item}}" alt="{{@$data->name}}">
			                        </div>
		                        @endforeach
	                        @endif
	                    </div>
	                    <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width=""
	                        data-layout="standard" data-action="like" data-size="small" data-share="true"></div>
	                </div>
	            </div>
	        </div>
	    </section>
	    <div class="container">
	        <div
	            class="fb-comments"
	            data-href="{{ url()->current() }}"
	            data-width="100%"
	            data-numposts="5"
	            ></div>
	    </div>
	    @if(count($utilities_same_category) > 0)
	    <section class="relate-to">
	        <div class="container">
	            <div class="module module__relate-to">
	                <div class="module module__header">
	                    <h2 class="title">
	                        <img src="{{ url('/').@$site_info->icon_bvlq }}" alt="icon" />
	                        Bài viết liên quan
	                    </h2>
	                </div>
	                <div class="module__content">
	                    <div class="relate__group">
	                    	@foreach($utilities_same_category as $item)
	                        <div class="relate__item" title="Lorem ipsum">
	                            <div class="relate__box">
	                                <div class="avata">
	                                    <a href="#" class="frame">
	                                    <img class="frame--image" src="{{url('/')}}/{{@$item->image}}" alt="{{@$item->name}}" />
	                                    </a>
	                                </div>
	                                <div class="relate__content">
	                                    <div class="relate__header">
	                                        <h3 class="title__text">{{@$item->name}}</h3>
	                                        <p class="relate__time">
	                                            <span class="time__icon">
	                                            <i class="fal fa-clock"></i>
	                                            </span>
	                                            {{format_datetime($item->created_at,'d/ m/ y')}}
	                                        </p>
	                                    </div>
	                                    <p class="desc">
	                                        {!! @$item->desc !!}
	                                    </p>
	                                    <div class="text-center">
	                                        <a href="{{route('home.services-detail',['slug'=>$item->slug])}}" class="btn btn__link"> Chi tiết </a>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                        @endforeach
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section>
	    @endif
	</main>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=1620283888101801&autoLogAppEvents=1"></script>
@endsection