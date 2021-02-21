@extends('frontend.master')
@section('main')

   <?php if(!empty($contentHome)){
      $content = json_decode($contentHome->content);
   } ?>

   <main id="main" class="main-site main-page main-lien-he">
    
    @include('frontend.teamplate.banner')  

    <div class="main-container">
        <div class="main-content">
            <article class="lth-googlemap">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="googlemap-box">
                                <div class="title-box">
                                    <h3 class="title">Liên hệ</h3>
                                </div>
                                <div class="content-box">
                                    <div class="map-box">
                                        {!! @$site_info->google_maps !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            <article class="lth-posts lth-lien-he">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="posts-box address-box">
                                <div class="title-box">
                                    <h3 class="title">Thông tin liên hệ</h3>
                                </div>
                                <div class="content-box">
                                    <ul>
                                    	@if (count($policy) > 0)
				                        	@foreach ($policy as $item)
				                            	@if($item->type==2)
		                                        <li>
		                                            <label>{{$item->name}}</label>
		                                            @foreach(json_decode(@$item->content)->ftct->content as $val)
		                                            <p>
		                                                <img src="{{url('/')}}/{{$val->image}}" alt="{{$val->title}}">
		                                                <span>{{$val->title}}</span>
		                                            </p>
		                                            @endforeach
		                                        </li>
                                        		@endif
					                        @endforeach
					                    @endif
                                        <!-- <li>
                                            <label>Chi nhánh 1</label>
                                            <p>
                                                <img src="images/icon-01.png" alt="Icon">
                                                <span>Thị xã Đồng Xoài - Tỉnh Bình Phước</span>
                                            </p>
                                        </li>
                                        <li>
                                            <label>Chi nhánh 2</label>
                                            <p>
                                                <img src="images/icon-01.png" alt="Icon">
                                                <span>48/1/9 Đường Gò Dưa - Quận Thủ Đức - TP. Hồ Chí Minh</span>
                                            </p>
                                        </li>
                                        <li>
                                            <i class="fal fa-envelope icon"></i>
                                            <span>thoquangphat.inco@gmail.com</span>
                                        </li>
                                        <li>
                                            <i class="fas fa-phone cusfas"></i>
                                            <span>0919 931 479</span>
                                            <i class="fal fa-fax icon"></i>
                                            <span>02367 304468</span>
                                        </li>
                                        <li>
                                            <p>
                                                <img src="images/icon-01.png" alt="Icon">
                                                <span>Showroom cây xanh: 200 - 204 Lê Ấm - Hòa Xuân - Đà Nẵng</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                <img src="images/icon-01.png" alt="Icon">
                                                <span>Xưởng sản xuất cơ khí: 530 Nguyễn Phước Nguyên - Thanh Khê - Đà
                                                Nẵng</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                <img src="images/icon-01.png" alt="Icon">
                                                <span>Xưởng sản xuất nội thất: Hòa Phong - Hòa vang - Đà Nẵng</span>
                                            </p>
                                        </li> -->
                                    </ul>
                                    <div class="socials-box">
                                        <div class="like-facebox" style="height: 29px; overflow: hidden;">
                                            <iframe
                                                src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&width=72&layout=button&action=like&size=large&share=false&height=65&appId"
                                                width="72" height="65" style="border:none;overflow:hidden" scrolling="no"
                                                frameborder="0" allowfullscreen="true"
                                                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                                                title="Like"></iframe>
                                        </div>
                                        <ul>
                                        	@if (!empty(@$site_info->social))
            								@foreach ($site_info->social as $item)
                                            <li>
                                                <a href="{{ $item->link }}" title="Social">
                                                <img src="{{ url('/').$item->icon }}" alt="{{ $item->name }}">
                                                </a>
                                            </li>
                                            @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="posts-box dang-ky-tu-van-box lien-he-box">
                                <div class="content-box">
                                    <form>
                                        <div class="form-content">
                                            <div class="form-group">
                                                <label>Họ và tên (bắt buộc)</label>
                                                <input type="text" name="" placeholder="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Số điện thoại (bắt buộc)</label>
                                                <input type="text" name="" placeholder="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Giới tính</label>
                                                <select class="form-control">
                                                    <option>Nam</option>
                                                    <option>Nữ</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="" placeholder="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Năm sinh</label>
                                                <input type="text" name="" placeholder="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Thông tin công trình</label>
                                                <input type="text" name="" placeholder="Thông tin công trình"
                                                    class="form-control">
                                            </div>
                                            <div class="groups-box mt-5">
                                                <div class="form-group form-group-1">
                                                    <div class="item">
                                                        <p>Gói dịch vụ</p>
                                                        <label for="radio_1">
                                                        <input type="radio" name="goi-dich-vu" id="radio_1">
                                                        <span></span>
                                                        Trọn gói
                                                        </label>
                                                        <label for="radio_2">
                                                        <input type="radio" name="goi-dich-vu" id="radio_2">
                                                        <span></span>
                                                        Kiến trúc
                                                        </label>
                                                        <label for="radio_3">
                                                        <input type="radio" name="goi-dich-vu" id="radio_3">
                                                        <span></span>
                                                        Nội thất
                                                        </label>
                                                    </div>
                                                    <div class="item mt-4">
                                                        <p>Hạng mục</p>
                                                        <label for="radio_4">
                                                        <input type="radio" name="hang-muc" id="radio_4">
                                                        <span></span>
                                                        Biệt thự/nhà phố
                                                        </label>
                                                        <label for="radio_5">
                                                        <input type="radio" name="hang-muc" id="radio_5">
                                                        <span></span>
                                                        Căn hộ, Penthouse
                                                        </label>
                                                        <label for="radio_6">
                                                        <input type="radio" name="hang-muc" id="radio_6">
                                                        <span></span>
                                                        Khách sạn, Resort
                                                        </label>
                                                        <label for="radio_7">
                                                        <input type="radio" name="hang-muc" id="radio_7">
                                                        <span></span>
                                                        Bar, Coffee, Nhà hàng
                                                        </label>
                                                        <label for="radio_7">
                                                        <input type="radio" name="hang-muc" id="radio_8">
                                                        <span></span>
                                                        Văn phòng, Showroom, Shop
                                                        </label>
                                                        <label for="radio_9">
                                                        <input type="radio" name="hang-muc" id="radio_9">
                                                        <span></span>
                                                        Nhà cao tầng, dự án
                                                        </label>
                                                    </div>
                                                    <div class="item mt-4">
                                                        <p>Phong cách thiết kế.</p>
                                                        <label for="radio_10">
                                                        <input type="radio" name="phong-cach" id="radio_10">
                                                        <span></span>
                                                        Contemporary (Đương đại)
                                                        </label>
                                                        <label for="radio_11">
                                                        <input type="radio" name="phong-cach" id="radio_11">
                                                        <span></span>
                                                        Neoclassic (Bán cổ điển)
                                                        </label>
                                                        <label for="radio_12">
                                                        <input type="radio" name="phong-cach" id="radio_12">
                                                        <span></span>
                                                        Scandinavian (Bắc âu)
                                                        </label>
                                                        <label for="radio_13">
                                                        <input type="radio" name="phong-cach" id="radio_13">
                                                        <span></span>
                                                        Classic (Cổ điển)
                                                        </label>
                                                        <label for="radio_14">
                                                        <input type="radio" name="phong-cach" id="radio_14">
                                                        <span></span>
                                                        Industrial (Công nghiệp)
                                                        </label>
                                                        <label for="radio_15">
                                                        <input type="radio" name="phong-cach" id="radio_15">
                                                        <span></span>
                                                        Phong cách khác
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group form-group-2">
                                                    <div class="item">
                                                        <label>Hạng mục khác</label>
                                                        <input type="text" name="" placeholder="" class="form-control">
                                                    </div>
                                                    <div class="item">
                                                        <label>Diện tích đất</label>
                                                        <input type="text" name="" placeholder="" class="form-control">
                                                    </div>
                                                    <div class="item">
                                                        <label>Diện tích xây dựng</label>
                                                        <input type="text" name="" placeholder="" class="form-control">
                                                    </div>
                                                    <div class="item">
                                                        <label>Số tầng</label>
                                                        <input type="text" name="" placeholder="" class="form-control">
                                                    </div>
                                                    <div class="item">
                                                        <label>Hạng mục đầu tư bao nhiêu?</label>
                                                        <input type="text" name="" placeholder="" class="form-control">
                                                    </div>
                                                    <div class="item">
                                                        <label>Dự kiến ngày khởi công</label>
                                                        <input type="date" name="" placeholder="" class="form-control">
                                                    </div>
                                                    <div class="item">
                                                        <label>Dự kiến ngày hoàn thành</label>
                                                        <input type="date" name="" placeholder="" class="form-control">
                                                    </div>
                                                    <div class="item">
                                                        <label>Bạn thích màu gì?</label>
                                                        <input type="text" name="" placeholder="" class="form-control">
                                                    </div>
                                                    <div class="item">
                                                        <label>Bạn không thích màu gì?</label>
                                                        <input type="text" name="" placeholder="" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="title mb-3">Lựa chọn chi tiết</label>
                                                <p>Phần dưới quý vị vui lòng copy & paste link của sản phẩm vào các mục
                                                    tương ứng bên dưới
                                                </p>
                                            </div>
                                            <div class="form-group">
                                                <label>Lát sàn</label>
                                                <input type="text" name="" placeholder="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Ván sàn</label>
                                                <input type="text" name="" placeholder="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Đá tự nhiên</label>
                                                <input type="text" name="" placeholder="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Ốp tường</label>
                                                <input type="text" name="" placeholder="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Ốp trần</label>
                                                <input type="text" name="" placeholder="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Vách ngăn</label>
                                                <input type="text" name="" placeholder="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Thiết bị vệ sinh</label>
                                                <input type="text" name="" placeholder="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Cửa</label>
                                                <input type="text" name="" placeholder="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Thiết bị điện</label>
                                                <input type="text" name="" placeholder="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Đèn chiếu sáng</label>
                                                <input type="text" name="" placeholder="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Sơn và chống thấm</label>
                                                <input type="text" name="" placeholder="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Nội thất</label>
                                                <input type="text" name="" placeholder="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Vui lòng chọn văn phòng tư vấn</label>
                                                <select class="form-control">
                                                    <option>536 - Nguyễn Phước Nguyên An Khê - Thanh Khê - Đà Nẵng</option>
                                                    <option>Thị xã Đồng Xoài - Tỉnh Bình Phước</option>
                                                    <option>48/1/9 Đường Gò Dưa - Quận Thủ Đức - TP. Hồ Chí Minh</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <p class="form-last"><strong>Email hỗ trợ của quản trị viên:</strong> <a
                                                    href="#" title="Email"> hoquangphat.inco@gmail.com</a></p>
                                            </div>
                                            <div class="form-group form-button">
                                                <button class="btn" aria-label="Submit">Gửi thông tin</button>
                                                <input type="hidden" name="post_type" value="product||post">
                                            </div>
                                        </div>
                                    </form>
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