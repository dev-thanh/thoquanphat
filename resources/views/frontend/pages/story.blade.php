@extends('frontend.master')
@section('main')
	<?php 
		if(!empty($dataSeo)){

			$content = json_decode($dataSeo->content);
			// dd($content);

		} 
	?>
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
                        <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('home.story')}}">Story</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- end breadcrumd -->
        <section class="main_story">
            <div class="container">
                <div class="title_style2">
                    <h1 class="h1_title"><span>Story</span></h1>
                </div>
                <div class="content_page--story">
                    <div class="box_content box_about">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="left img-cover">
                                    <img src="{{url('/').@$content->about->image}}" alt="{{@$content->about->title}}">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="right">
                                    <h2 class="h2_title"><span>{{@$content->about->title}}</span></h2>
                                    <div class="des">
                                        {{$content->about->content}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end box content -->
                    @if(!empty(@$content->our_value))
                    <div class="box_content box_giatri">
                        <h2 class="h2_title"><span>{{@$content->our_value->title}}</span></h2>
                        <div class="content">
                            <div class="row">
                            	@foreach(@$content->our_value->value as $item)
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <div class="item_giatri bg1" style="background: url({{@$item->image}})">
                                        <h3 class="h3_title">{{@$item->title}}</h3>
                                        <div class="des">
                                            {!! @$item->desc !!}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                               
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- end box content -->
                    @if(!empty(@$content->vision_mission->value))
                    <div class="box_content box_tamnhin box_sumenh">
                        <?php $k=1; ?>
                    	@foreach(@$content->vision_mission->value as $item)
                        <div class="@if($k%2==0) sumenh @else tamnhin @endif d-flex">
                            <div class="left img-cover">
                                <img src="{{url('/').@$item->image}}" alt="{{@$item->title}}">
                            </div>
                            <div class="right">
                                <h3 class="h3_title"><span>{{@$item->title}}</span></h3>
                                <div class="des">
                                    {!! @$item->content !!}
                                </div>
                            </div>
                        </div>
                        <?php $k++; ?>
                        @endforeach
                    </div>
                    @endif
                    <!-- end box content -->
                </div>
            </div>
        </section>
        <!-- end section main story -->
    </main>
@endsection