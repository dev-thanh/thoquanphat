@extends('frontend.master')
@section('main')

	<?php if(!empty($contentHome)){
		$content = json_decode($contentHome->content);
	} ?>

	<main id="main-site">
        <section class="banner_page bg-banner">
            <div class="container">
                <div class="banner_img img-cover">
                    <img src="{{@$contentHome->banner}}" alt="{{@$contentHome->name_page}}">
                </div>
            </div>
        </section>
        <!-- end section banner page -->
        <div class="bread">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Library</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- end breadcrumd -->
        <section class="main_faq bg-section">
            <div class="container">
                <div class="title_style3">
                    <h1 class="h1_title"><span>Các câu hỏi thường gặp</span></h1>
                </div>
                <div class="content_page--faq">
                    <div class="box_content">
                        <div class="accordion" id="accordionExample">
                        	@foreach($content as $k => $item)
                            <div class="card">
                                <div class="card-header" id="faq_{{$k+1}}">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseOne_{{$k+1}}" aria-expanded="false" aria-controls="collapseOne">
                                          {{$item->question}}
                                        </button>
                                    </h2> 
                                </div>
                                <div id="collapseOne_{{$k+1}}" class="collapse" aria-labelledby="faq_{{$k+1}}">
                                    <div class="card-body">
                                    	{{$item->asw}}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                        <!-- end faq -->
                        <div class="form_dagky">
                            <div class="form_lienhe">
                                <div class="title_box">
                                    <h2 class="h2_title">Liên hệ với chúng tôi</h2>
                                </div>
                                <div class="des_box">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                </div>
                                <div class="form_dky">
                                    <form id="frm_contact" action="{{route('home.post-contact')}}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" placeholder="Họ và tên">
                                            <span class="fr-error" id="error_name"></span>
                                        </div>
                                        <div class="form-group d-flex">
                                            <div class="input_50">
                                                <input type="text" class="form-control" name="phone" placeholder="Số điện thoại">
                                                <span class="fr-error" id="error_phone"></span>
                                            </div>
                                            <div class="input_50">
                                                <input type="text" class="form-control" name="email" placeholder="Email">
                                                <span class="fr-error" id="error_email"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="textarea_">
                                                <textarea class="form-control" name="content" placeholder="Nội dung"></textarea>
                                                <span class="fr-error" id="error_content"></span>
                                            </div>
                                        </div>
                                        <input type="hidden" name="type" value="1">
                                        <div class="btn_submit">
                                            <button class="btn btn-default btn--registration">Gửi</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end box content -->
                </div>
            </div>
        </section>
        <!-- end section main story -->
    </main>

@endsection