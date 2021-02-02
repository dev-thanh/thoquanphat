@extends('frontend.master')
@section('main')
	<?php if(!empty($dataSeo)){

        $content = json_decode($dataSeo->content);
        //dd($content);
    } ?>

    <main id="main-site">
        <section class="banner_page bg-banner">
            <div class="container">
                <div class="banner_img img-cover">
                    <img src="{{url('/').@$dataSeo->banner}}" alt="{{@$dataSeo->name_page}}">
                </div>
            </div>
        </section>
        <!-- end section banner page -->
        <div class="bread">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home.index')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{route('home.agency')}}">Đại lý</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- end breadcrumd -->
        <section class="main_daily bg-section">
            <div class="container">
                <div class="title_style3">
                    <h1 class="h1_title"><span>Danh sách các đại lý</span></h1>
                </div>
                <div class="content_page--daily">
                    <div class="box_content">
                        <div class="list_box--daily">
                            <div class="box_daily">
                                <h2 class="h2_title">Khu vực miền bắc</h2>
                                <div class="daily d-flex">
                                    @foreach($agency_mb as $item)
                                    <div class="box">
                                        <ul class="ul-b">
                                            <li>- Tên đại lý: {{$item->name}}</li>
                                            <li>- Địa chỉ: {{$item->address}}</li>
                                            <li>- Số điện thoại: {{$item->phone}}</li>
                                            <li>- Fax: {{$item->fax}}</li>
                                        </ul>
                                    </div>
                                    @endforeach
                                </div>
                                @if($agency_mb->lastPage() > 1)
                                <div class="xem_them text-right">
                                    <a href="#" class="btn_xemthem">Xem thêm >></a>
                                </div>
                                @endif
                            </div>
                            <!-- end item -->
                            <div class="box_daily">
                                <h2 class="h2_title">Khu vực miền trung</h2>
                                <div class="daily d-flex">
                                    @foreach($agency_mt as $item)
                                    <div class="box">
                                        <ul class="ul-b">
                                            <li>- Tên đại lý: {{$item->name}}</li>
                                            <li>- Địa chỉ: {{$item->address}}</li>
                                            <li>- Số điện thoại: {{$item->phone}}</li>
                                            <li>- Fax: {{$item->fax}}</li>
                                        </ul>
                                    </div>
                                    @endforeach
                                </div>
                                @if($agency_mt->lastPage() > 1)
                                <div class="xem_them text-right">
                                    <a href="#" class="btn_xemthem">Xem thêm >></a>
                                </div>
                                @endif
                            </div>
                            <!-- end item -->
                            <div class="box_daily">
                                <h2 class="h2_title">Khu vực miền nam</h2>
                                <div class="daily d-flex">
                                    @foreach($agency_mn as $item)
                                    <div class="box">
                                        <ul class="ul-b">
                                            <li>- Tên đại lý: {{$item->name}}</li>
                                            <li>- Địa chỉ: {{$item->address}}</li>
                                            <li>- Số điện thoại: {{$item->phone}}</li>
                                            <li>- Fax: {{$item->fax}}</li>
                                        </ul>
                                    </div>
                                    @endforeach
                                </div>
                                @if($agency_mn->lastPage() > 1)
                                <div class="xem_them text-right">
                                    <a href="#" class="btn_xemthem">Xem thêm >></a>
                                </div>
                                @endif
                            </div>
                            <!-- end item -->

                        </div>
                    </div>
                    <!-- end box content -->
                </div>
            </div>
        </section>
        <!-- end section main story -->
    </main>

@endsection