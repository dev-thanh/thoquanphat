@extends('frontend.master')
@section('main')

   <?php if(!empty($dataSeo)){
      $content = json_decode($dataSeo->content);
   } ?>

    <main id="main" class="main-site main-page main-dang-ky-tu-van">

        @include('frontend.teamplate.banner')

        <div class="main-container">
            <div class="main-content">
                <article class="lth-posts">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="posts-box dang-ky-tu-van-box">
                                    <div class="title-box">
                                        <h3 class="title">Đăng ký tư vấn</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="posts-box dang-ky-tu-van-box">
                                    <div class="content-box">
                                        <form id="frm_contact" action="{{route('home.post-signupconsultation')}}">
                                            @csrf
                                            <div class="form-content">
                                                <div class="form-group">
                                                    <input type="text" name="name" placeholder="Họ và tên" class="form-control">
                                                    <span class="fr-error" id="error_name"></span>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="phone" placeholder="Số điện thoại" class="form-control">
                                                    <span class="fr-error" id="error_phone"></span>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="building_site" placeholder="Địa điểm xây dựng"
                                                        class="form-control">
                                                    <span class="fr-error" id="error_building_site"></span>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="advisory_content" placeholder="Bạn cần tư vấn về?"
                                                        class="form-control">
                                                    <span class="fr-error" id="error_advisory_content"></span>
                                                </div>
                                                <div class="form-group form-button">
                                                    <button class="btn btn--registration" aria-label="Submit">Gửi</button>
                                                    <input type="hidden" name="post_type" value="product||post">
                                                </div>
                                            </div>
                                        </form>
                                        <p class="form-last"><strong>Email hỗ trợ của quản trị viên:</strong> <a href="#"
                                            title="Email">{{@$content->email}}  </a></p>
                                    </div>
                                </div>
                            </div>
                            @if(!empty(@$content->background_right))
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="posts-box dang-ky-tu-van-box">
                                    <div class="content-box">
                                        <div class="banner-box">
                                            <div class="banner-image">
                                                <div class="image">
                                                    <img src="{{url('/')}}/{{@$content->background_right}}" alt="{{@$content->title}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </main>
@endsection