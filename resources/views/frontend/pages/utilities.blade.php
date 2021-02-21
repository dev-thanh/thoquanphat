@extends('frontend.master')
@section('main')

   <?php if(!empty($contentHome)){
      $content = json_decode($contentHome->content);
   } ?>
   	<main id="main" class="main-site main-page main-tien-ich">
	    
	    @include('frontend.teamplate.banner')

	    <div class="main-container">
	        <div class="main-content">
	            <article class="lth-posts">
	                <div class="container">
	                    <div class="row">
	                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	                            <div class="posts-box">
	                                <div class="title-box">
	                                    <h3 class="title">@if(isset($cate)) Tiện ích - {{@$cate->name}} @else Tiện ích @endif</h3>
	                                </div>
	                                <div class="content-box">
	                                    <div class="groups-box">
	                                    	@foreach(@$data as $item)
	                                        <div class="item">
	                                            <div class="post-box">
	                                                <div class="post-image">
	                                                    <div class="image">
	                                                        <a href="{{route('home.utilities-detail',['slug'=>$item->slug])}}" title="Post">
	                                                        <img src="{{url('/')}}/{{@$item->image}}" alt="{{@$item->name}}">
	                                                        </a>
	                                                    </div>
	                                                </div>
	                                                <div class="post-content">
	                                                    <div class="content">
	                                                        <h4 class="post-name">
	                                                            <a href="{{route('home.utilities-detail',['slug'=>$item->slug])}}" title="{{@$item->name}}">{{@$item->name}}</a>
	                                                        </h4>
	                                                        <div class="post-excerpt">
	                                                            {!! @$item->desc !!}
	                                                        </div>
	                                                    </div>
	                                                    <div class="content-2">
	                                                        <div class="post-create">
	                                                            <i class="fal fa-clock icon"></i>
	                                                            <span>{{format_datetime($item->created_at,'d/ m/ y')}}</span>
	                                                        </div>
	                                                        <div class="post-button">
	                                                            <a href="{{route('home.utilities-detail',['slug'=>$item->slug])}}" title="Chi tiết" class="btn">Chi tiết</a>
	                                                        </div>
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