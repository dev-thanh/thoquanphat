@extends('frontend.master')
@section('main')
	<?php if(!empty($dataSeo)){

        $content = json_decode($dataSeo->content);
        //dd($content);
    } ?>
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
                        <li class="breadcrumb-item"><a href="{{route('home.index')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{route('home.contact')}}">Liên hệ</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- end breadcrumd -->
        <section class="main_lienhe bg-section">
            <div class="container">
                <div class="title_style3">
                    <h1 class="h1_title"><span>Liên hệ với chúng tôi</span></h1>
                </div>
                <div class="content_page--lienhe">
                    <div class="box_content">
                        <div class="row">
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
                                <div class="left">
                                    <h2 class="h2_title">{{@$site_info->name_company}}</h2>
                                    <div class="content_lh">
                                        <ul class="ul-b">
                                        	@foreach (@$site_info->address->list as $item)
                                            <li><i class="fas fa-map-marker-alt"></i>
                                            	<span>{{ $item->title }}</span>
                                            </li>
                                            @endforeach
                                            <li><i class="fas fa-phone"></i> <span>{{@$site_info->phone}}</span></li>
                                            <li><i class="fas fa-envelope"></i><span>{{@$site_info->email}}</span></li>
                                        </ul>
                                    </div>
                                    <div class="hotline">
                                        <h3 class="h3-title">Hotline</h3>
                                        <img src="images/lien-he/img-lien-he.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
                                <div class="right">
                                    <div class="maps">
                                        {!!@$site_info->google_maps!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form_dagky">
                            <div class="form_lienhe">
                                <div class="title_box">
                                    <h2 class="h2_title">{{@$content->title}}</h2>
                                </div>
                                @if(!empty(@$content->desc))
                                <div class="des_box">
                                    {{@$content->desc}}
                                </div>
                                @endif
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