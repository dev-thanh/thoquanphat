@extends('frontend.master')
@section('main')

	<?php if(!empty($contentHome)){
		$content = json_decode($contentHome->content);
		//dd($content);
	} ?>

	<main id="main" class=" ">
	    @include('frontend.teamplate.banner')
	    <section class="home-introduce">
	        <div class="container">
	            <div class="module module__home-introduce">
	                <div class="module__header">
	                    <h2 class="title">về chúng tôi</h2>
	                </div>
	                <div class="module module__content">
	                    <div class="introduce">
	                        <div class="introduce__item">
	                            <div class="play">
	                                <div class="introduce__thumbnail">
	                                    <button type="button" class="btn btn__play">
	                                    <i class="fas fa-play"></i>
	                                    </button>
	                                    <img src="https://img.youtube.com/vi/{{getYoutubeEmbedUrl($content->aboutus->link)}}/maxresdefault.jpg" alt="thumbnail__video.jpg" />
	                                </div>
	                                <iframe class="frame--iframe" width="100%" height="100%"
	                                    src="{{'https://www.youtube.com/embed/'. getYoutubeEmbedUrl($content->aboutus->link)}}?autoplay=1&mute=1" frameborder="0"
	                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
	                                    allowfullscreen></iframe>
	                            </div>
	                        </div>
	                        <div class="introduce__item">
	                            <div class="introduce__container">
	                                <h3 class="introduce__title">{{$content->aboutus->title}}</h3>
	                                <div class="introduce__content">
	                                    {{$content->aboutus->desc}}
	                                </div>
	                                <a href="page-introduce.html" class="btn btn__view"> TÌM HIỂU THÊM </a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section>
	    <section class="home-service">
	        <div class="container">
	            <div class="module module__home-service">
	                <div class="module__header">
	                    <h2 class="title">DỊCH VỤ</h2>
	                </div>
	                <div class="module__content">
	                    <div class="service">
	                        <div class="slide__service">
	                        	@foreach($services as $item)
	                            <div class="service__item">
	                                <div class="service__box">
	                                    <a href="page-detail.html" class="project" title="Tư vấn thiết kế">
	                                        <div class="frame">
	                                            <img class="frame--image" src="{{url('/')}}/{{$item->image}}" alt="{{$item->name}}" />
	                                        </div>
	                                        <h3 class="project__text">{{$item->name}}</h3>
	                                    </a>
	                                </div>
	                            </div>
	                            @endforeach
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section>
	    <section class="home-why">
	        <div class="container">
	            <div class="module module__home-why">
	                <div class="module__header">
	                    <h2 class="title">{{$content->reason->title}}</h2>
	                </div>
	                <div class="module__content">
	                    <div class="why">
	                        <div class="why__group">
	                            <div class="why__item">
	                                <div class="tab-container">
	                                    <div class="tab-control">
	                                        <!-- <span class="control__show">THIẾT KẾ CHUYÊN NGHIỆP</span> -->
	                                        <ul class="control-list">
	                                        	<?php $n=0;$rs_first = ''; ?>
	                                        	@foreach($content->reason->content as $item)
	                                        	<?php if($n==0){$rs_first = $item;} ?>
	                                            <li class="control-list__item @if($n==0) active @endif" tab-show="#tab-{{$n+1}}">
	                                                <div class="why__icon">
	                                                    <img src="{{url('')}}/{{$item->image}}" alt="icon__1.png" />
	                                                </div>
	                                                <span class="why__text"> {{$item->title}} </span>
	                                            </li>
	                                            <?php $n++; ?>
	                                            @endforeach
	                                        </ul>
	                                    </div>
	                                    <div class="why__container">
	                                        <div class="why__header">
	                                            <div class="why__header--item why__logo">
	                                                <img src="{{url('/')}}/{{$content->reason->logo}}" alt="{{url('/')}}/{{$content->reason->title}}" />
	                                            </div>
	                                            <span class="why__header--item control__title">{{$rs_first->title}}</span>
	                                        </div>
	                                        <div class="tab-content">
	                                        	<?php $i=0; ?>
	                                        	@foreach($content->reason->content as $item)
	                                            <div class="tab-item @if($i==0) active @endif" id="tab-{{$i+1}}">
	                                                {{$item->content}}
	                                            </div>
	                                            <?php $i++; ?>
	                                            @endforeach
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="why__item">
	                                <img src="{{url('/')}}/{{$content->reason->image}}" alt="{{url('/')}}/{{$content->reason->title}}" />
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section>
	    <section class="home-project">
	        <div class="container">
	            <div class="module module__home-project">
	                <div class="module__header">
	                    <h2 class="title">Dự án tiêu biểu</h2>
	                </div>
	                <div class="module__content">
	                    <div class="tab-control">
	                        <span class="control__show">
	                        {{$cate_projects[0]->name}}</span>
	                        <ul class="project__control control-list">
	                        	@foreach($cate_projects as $l => $item)
	                            <li class="project__item control-list__item @if($l==0) active @endif" title="{{$item->name}}" tab-show="#project-{{$l+1}}">
	                                {{$item->name}}
	                            </li>
	                            @endforeach
	                        </ul>
	                    </div>
	                    <div class="tab-content">

	                    	@foreach($cate_projects as $l => $item)
	                        <div class="tab-item @if($l==0) active @endif" id="project-{{$l+1}}">
	                            <div class="project__group">
	                            	@foreach($item->Projects as $val)
	                                <div class="project__item">
	                                    <div class="project" title="Lorem ipsum">
	                                        <div class="frame">
	                                            <img class="frame--image" src="{{url('/')}}/{{$val->image}}" alt="{{$val->title}}" />
	                                        </div>
	                                        <h3 class="project__text">{{$val->name}}</h3>
	                                        <div class="project__hover">
	                                            <h3>{{$val->name}}</h3>
	                                            <p>
	                                                {!! $val->desc  !!}
	                                            </p>
	                                            <a href="page-detail.html" class="btn btn__view"> Xem thêm </a>
	                                        </div>
	                                    </div>
	                                </div>
	                                @endforeach
	                            </div>
	                            <a href="page-project.html" class="btn btn__link"> Xem thêm </a>
	                        </div>
	                        @endforeach
	                        
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section>
	    <section class="home-customers">
	        <div class="container">
	            <div class="module module__home-customers">
	                <div class="module__header">
	                    <h2 class="title">{{$content->customer_reviews->title}}</h2>
	                </div>
	                <div class="module__content">
	                    <div class="customers__slide">
	                    	@foreach($content->customer_reviews->content as $item)
	                        <div class="customers__item">
	                            <div class="customers">
	                                <div class="customers__avata">
	                                    <img class="customers__image" src="{{url('/')}}/{{$item->image}}" alt="{{$item->title}}" />
	                                </div>
	                                <div class="customers__content">
	                                    <h3 class="customers__title">{{$item->title}}</h3>
	                                    <p class="customers__desc">
	                                        {{$item->content}}
	                                    </p>
	                                </div>
	                            </div>
	                        </div>
	                        @endforeach
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section>
	    <section class="home-new">
	        <div class="container">
	            <div class="module module__home-new">
	                <div class="module__header">
	                    <h2 class="title">TIN TỨC</h2>
	                </div>
	                <div class="module__content">
	                    <div class="new__slide">
	                    	@foreach($blogs as $item)
	                        <div class="new__item">
	                            <div class="new__box">
	                                <a href="page-detail.html" class="new__avata d-block"
	                                    title="{{$item->name}}">
	                                    <div class="frame">
	                                        <img class="frame--image" src="{{url('/')}}/{{$item->image}}" alt="{{$item->name}}" />
	                                    </div>
	                                </a>
	                                <div class="new__content">
	                                    <h3 class="new__title">
	                                        <a href="page-detail.html" class="new__link">
	                                        {{$item->name}}
	                                        </a>
	                                    </h3>
	                                    <div class="new__time">
	                                        <span class="new__icon">
	                                        <i class="fal fa-clock"></i>
	                                        </span>
	                                        {{format_datetime($item->created_at,'d/m/y')}}
	                                    </div>
	                                    <p class="new__desc">
	                                        {{$item->desc}}
	                                    </p>
	                                </div>
	                            </div>
	                        </div>
	                        @endforeach
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section>
	    <section class="home-video">
	        <div class="container">
	            <div class="module module__home-video">
	                <div class="module__header">
	                    <h2 class="title">Video</h2>
	                </div>
	                <div class="module__content">
	                    <div class="video__group">
	                    	
	                    	@foreach($content->video as $item)
	                        <div class="video__item">
	                            <div class="play">
	                                <div class="introduce__thumbnail">
	                                    <button type="button" class="btn btn__play">
	                                    <i class="fas fa-play"></i>
	                                    </button>
	                                    <img src="https://img.youtube.com/vi/{{getYoutubeEmbedUrl($item->link)}}/maxresdefault.jpg" alt="thumbnail__video--1.jpg" />
	                                </div>
	                                <div class="frame">
	                                    <iframe class="frame--iframe" width="100%" height="100%"
	                                        src="{{'https://www.youtube.com/embed/'. getYoutubeEmbedUrl($item->link)}}?autoplay=1&mute=1" frameborder="0"
	                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
	                                        allowfullscreen></iframe>
	                                </div>
	                            </div>
	                            <p class="video__title">
	                                {{$item->desc}}
	                            </p>
	                        </div>
	                        @endforeach
	                        
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section>
	</main>

@endsection