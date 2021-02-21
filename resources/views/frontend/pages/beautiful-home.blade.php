@extends('frontend.master')
@section('main')

   <?php if(!empty($contentHome)){
      $content = json_decode($contentHome->content);
   } ?>

   	<main id="main" class=" ">
	    
	    @include('frontend.teamplate.banner')   

	    <section class="page-project">
	        <div class="container">
	            <div class="module module__page-project">
	                <div class="module__header">
	                    <h2 class="title">@if(isset($cate)) Mẫu nhà đẹp - {{@$cate->name}} @else Mẫu nhà đẹp @endif</h2>
	                </div>
	                <div class="module__content">
	                    <div class="project__group">
	                    	@foreach(@$data as $item)
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
	</main>

@endsection