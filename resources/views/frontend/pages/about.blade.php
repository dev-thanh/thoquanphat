@extends('frontend.master')
@section('main')
	
	<?php 
		if(!empty($dataSeo)){
		$content = json_decode($dataSeo->content);
		//dd($content);
	} ?>

	<main id="main" class="
    ">
	    @include('frontend.teamplate.banner')
	    <section class="page-introduce">
	        <div class="container">
	            <div class="module module__page-introduce">
	                <div class="module__header">
	                    <h2 class="title">
	                        {{$content->introduce->title}}
	                    </h2>
	                    <p class="info">
	                        {{$content->introduce->title_2}}
	                    </p>
	                </div>
	                <div class="module__content">
	                    <div class="introduce">
	                        {!! $content->introduce->content !!}
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section>
	</main>

@endsection