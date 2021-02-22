@extends('frontend.master')
@section('main')

   <?php if(!empty($contentHome)){
      $content = json_decode($contentHome->content);
   } ?>

   	<main id="main" class="main-site main-page main-tien-ich">
	    
	    @include('frontend.teamplate.banner')  
	    <section class="page-project" style="padding: 2rem 0">
	        <div class="container">
	            <div class="module module__page-project"> 
	    			<div class="module__header">
	                    <h2 class="title">Kết quả tìm kiếm</h2>
	                </div>
	            </div>
	        </div>
	    </section>
	    @if(count(@$services) > 0)
	    <div class="main-container">
	        <div class="main-content">
	            <article class="lth-posts">
	                <div class="container">
	                    <div class="row">
	                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	                            <div class="posts-box dich-vu-box dich-vu-2-box">
	                                <div class="module__header">
					                    <h3 class="name-search">Dịch vụ</h3>
					                </div>
	                                <div class="content-box">
	                                    <div class="groups-box">

	                                    	@foreach($services as $item)
	                                        <div class="item">
	                                            <div class="post-box">
	                                                <div class="post-image">
	                                                    <div class="image">
	                                                        <a href="{{route('home.services-detail',['slug'=>$item->slug])}}" title="{{$item->name}}">
	                                                        <img src="{{url('/')}}/{{$item->image}}" alt="{{$item->name}}">
	                                                        </a>
	                                                    </div>
	                                                </div>
	                                                <div class="post-content">
	                                                    <div class="content">
	                                                        <h4 class="post-name">
	                                                            <a href="{{route('home.services-detail',['slug'=>$item->slug])}}" title="{{$item->name}}">{{$item->name}}</a>
	                                                        </h4>
	                                                    </div>
	                                                    <div class="post-excerpt">
	                                                        <p>
	                                                        	{!!$item->desc!!}
	                                                        </p>
	                                                    </div>
	                                                    <div class="post-button">
	                                                        <a href="{{route('home.services-detail',['slug'=>$item->slug])}}" title="Chi tiết" class="btn">Chi tiết</a>
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
	    @endif
	    @if(count(@$projects) > 0)
	    <section class="page-project" style="padding: 3rem 0">
	        <div class="container">
	            <div class="module module__page-project">
	                <div class="module__header">
	                    <h3 class="name-search">Dự án</h3>
	                </div>
	                <div class="module__content">
	                    <div class="project__group">
	                    	@foreach(@$projects as $item)
	                        <div class="project__item">
	                            <div class="project" title="Lorem ipsum">
	                                <div class="frame">
	                                    <img class="frame--image" src="{{url('/')}}/{{@$item->image}}" alt="{{@$item->name}}" />
	                                </div>
	                                <h3 class="project__text">{{@$item->name}}</h3>
	                                <div class="project__hover">
	                                    <div class="project__hover-wap">
	                                        <h3>{{@$item->name}}</h3>
	                                        
	                                        {!! @$item->desc !!}
	                                       
	                                        <a href="{{route('home.project-detail',['slug'=>$item->slug])}}" class="btn btn__view"> Xem thêm </a>
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
	    @if(count(@$beautiful_house) > 0)
	    <section class="page-project" style="padding: 2rem 0">
	        <div class="container">
	            <div class="module module__page-project">
	                <div class="module__header">
	                    <h3 class="name-search">Mẫu nhà đẹp</h3>
	                </div>
	                <div class="module__content">
	                    <div class="project__group">
	                    	@foreach(@$beautiful_house as $item)
	                        <div class="project__item">
	                            <div class="project" title="Lorem ipsum">
	                                <div class="frame">
	                                    <img class="frame--image" src="{{url('/')}}/{{@$item->image}}" alt="{{@$item->name}}" />
	                                </div>
	                                <h3 class="project__text">{{@$item->name}}</h3>
	                                <div class="project__hover">
	                                    <div class="project__hover-wap">
	                                        <h3>{{@$item->name}}</h3>
	                                        
	                                        {!! @$item->desc !!}
	                                       
	                                        <a href="{{route('home.beautiful-home-detail',['slug'=>$item->slug])}}" class="btn btn__view"> Xem thêm </a>
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

	    @if(count(@$utilities) > 0)
	    <div class="main-container">
	    <div class="main-content">
	            <article class="lth-posts">
	                <div class="container">
	                    <div class="row">
	                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	                            <div class="posts-box">
	                                <div class="module__header">
					                    <h3 class="name-search">Tiện ích</h3>
					                </div>
	                                <div class="content-box">
	                                    <div class="groups-box">
	                                    	@foreach(@$utilities as $item)
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
	    @endif
	</div>
	</main>

@endsection