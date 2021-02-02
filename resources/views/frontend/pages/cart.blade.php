@extends('frontend.master')
@section('main')
	<?php //dd(Cart::content()); ?>
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
                        <li class="breadcrumb-item"><a href="{{route('home.cart')}}">Giỏ hàng</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- end breadcrumd -->
        <section class="main_giohang bg-section">
            <div class="container">
                <div class="title_style3">
                    <h1 class="h1_title"><span>Thông tin đơn hàng</span></h1>
                </div>
                <div class="content_page--giohang">
                    <div class="box_content">
                    	@if (Cart::count())
                        <div class="table-responsive">
                            <table cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>STT</td>
                                    <td>Sản phẩm</td>
                                    <td>Giá</td>
                                    <td>Số lượng</td>
                                    <td>Tổng tiền</td>
                                    <td>Xóa</td>
                                </tr>
                                <?php $k=1; ?>
                                @foreach (Cart::content() as $item)
                                <tr>
                                    <td class="stt">{{@$k}}</td>
                                    <td class="sp">
                                        <div class="d-flex">
                                            <div class="img-sp">
                                                <a href="#"><img src="{{url('/').@$item->options->image}}" alt=""></a>
                                            </div>
                                            <div class="text-sp">
                                                <h3 class="h3-title"><a href="#">{{$item->name}}</a></h3>
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="price">{{ number_format($item->price, 0, '.', '.') }}đ</td>
                                    <td class="soluong">
                                    	<input type="hidden" name="get_id_product" data-url="{{route('home.update.cart')}}" value="{{$item->rowId}}">
                                        <div class="wp-input-soluong">
                                            <button class="btn_num num_1 button button_qty icon-minus icon-minus-pre" type="button"><i class="fa fa-minus"></i>
                                            </button>
                                            <input type="number" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" name="product_qty" value="{{$item->qty}}">
                                            <button class="btn_num num_2 button button_qty icon-minus icon-minus-next" type="button"><i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="price "><span class="price cartitem-price">{{number_format($item->price*$item->qty, 0, '.', '.')}}đ</span></td>
                                    <td class="trash"><a href="{{route('home.remove.cart')}}" class="delete delete-cart"><i class="fas fa-trash-alt"></i></a></td>
                                </tr>
                                <?php $k++; ?>
                                @endforeach
                            </table>
                        </div>
                        <div class="tong-tien">
                            <div class="int">Tổng: <span class="total-cart">{{number_format(Cart::total(), 0, '.', '.')}} đ</span></div>
                        </div>
                        @else
                        	<div class="contn">

								<div class="row">

									<div class="col-sm-12">

										<div class="alert alert-success" role="alert">

										  	Chưa có sản phẩm trong giỏ hàng.

										</div>

									</div>

									<div class="col-md-7 col-sm-7">

										<ul class="list-inline">

											<li class="list-inline-item">

												<div class="back-prd">

													<a title="Tiếp tục mua hàng" href="{{ url('/') }}"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>

												</div>

											</li>

										</ul>

									</div>

								</div>

							</div>
                        @endif
                    </div>
                    <!-- end box content -->
                    <div class="box_info--thanhtoan">
                        <div class="row">
	                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        		<form action="{{ route('home.check-out.post') }}" method="POST" id="formsreviews">
	                                <div class="left">
	                                    <div class="title_box">
	                                        <h2 class="h2-title">Thông tin khách hàng</h2>
	                                    </div>
	                                    <div class="content_box">
	                                        
                                        	@csrf

                                            <div class="form">
                                                <div class="wp_input">
                                                    <div class="label">Họ và tên</div>
                                                    <div class="input">
                                                        <input type="text" name="name" class="form-control">
                                                        <span class="fr-error name_error"></span>
                                                    </div>
                                                </div>
                                                <div class="wp_input">
                                                    <div class="label">Số điện thoại</div>
                                                    <div class="input">
                                                        <input type="text" name="phone" class="form-control">
                                                        <span class="fr-error phone_error"></span>
                                                    </div>
                                                </div>
                                                <div class="wp_input">
                                                    <div class="label">Email</div>
                                                    <div class="input">
                                                        <input type="text" name="email" class="form-control">
                                                        <span class="fr-error email_error"></span>
                                                    </div>
                                                </div>
                                                <div class="wp_input">
                                                    <div class="label">Địa chỉ</div>
                                                    <div class="input">
                                                        <input type="text" name="address" class="form-control">
                                                        <span class="fr-error address_error"></span>
                                                    </div>
                                                </div>
                                                <div class="wp_buttton">
                                                    <div class="back_index"><a href="#">
                                                            << Tiếp tục mua hàng</a> </div> <button class="btn btn-default btn-check-out">Đặt hàng</button>
                                                    </div>
                                                </div>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
	                                <div class="right">
	                                    <div class="title_box">
	                                        <h2 class="h2-title">Hình thức thanh toán</h2>
	                                    </div>
	                                    <div class="content_box">
                                            <div class="form d-flex align-items-center flex-wrap justify-content-between">
                                                <div class="form-check" data-radio="1">
                                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                                    <label class="form-check-label" for="exampleRadios1">Thanh toán khi nhận hàng</label>
                                                </div>
                                                <div class="form-check" data-radio="2">
                                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2" checked>
                                                    <label class="form-check-label" for="exampleRadios2">Chuyển khoản ngân hàng</label>
                                                </div>
                                            </div>
                                            <div class="box_info--nganhang active">
                                                <nav>
                                                    @if(count($banks) > 0)
                                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                        @foreach(@$banks as $k => $item)
                                                        <a class="nav-item nav-link @if($k==0) active @endif" id="bank__tab--{{$k+1}}" data-toggle="tab" href="#bank__{{$k+1}}" role="tab" aria-controls="bank" aria-selected="true">
                                                            <img class="active" src="{{url('/').@$item->image}}" alt="{{@$item->name_bak}}">
                                                        </a>
                                                        @endforeach
                                                    </div>
                                                    @endif
                                                </nav>
                                                <div class="tab-content" id="nav-tabContent">
                                                    @foreach(@$banks as $k => $item)
                                                    <div class="tab-pane fade show @if($k==0) active @endif" id="bank__{{$k+1}}" role="tabpanel" aria-labelledby="bank__tab--{{$k+1}}">
                                                        <div class="text">
                                                            <h3 class="h3_title">Thông tin tài khoản</h3>
                                                            <p>Chủ tài khoản: {{@$item->name_account}}</p>
                                                            <p>Số tài khoản: {{@$item->bank_number}}</p>
                                                            <p>Chi nhánh: {{@$item->address}}</p>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
	                                </div>
	                        	</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section main story -->
    </main>



    <script>
        $(document).ready(function() {
            $('html, body').animate({scrollTop:500}, 400);
			$('.box_info--thanhtoan .form-check').click(function(){
				var dataRadio = $(this).attr('data-radio');
				if(dataRadio==1){
					$('.box_info--nganhang').removeClass('active');
				}
				else{
					$('.box_info--nganhang').addClass('active');
				}
			});

			$('.btn-check-out').click(function(e){
				e.preventDefault();

				$('.fr-error').html('');

				$('.loadingcover').show();

			    var Url =$('#formsreviews').attr('action');

			    var data = $("#formsreviews").serialize();

			    $.ajax({

			        type: 'POST',

			        url: Url,

			        dataType: "json",

			        data: data,

			        success: function(data) {

		                $('.loadingcover').hide();

		                if(data.success){

		                    toastr["success"](data.success, "");

		                    $('.box_content').html(data.html_response);

		                    $('#formsreviews')[0].reset();

		                }

		                if(data.error.name){

		                    $('.name_error').html(data.error.name);

		                }

		                if(data.error.email){

		                    $('.email_error').html(data.error.email);

		                }

		                if(data.error.phone){

		                    $('.phone_error').html(data.error.phone);

		                }

		                if(data.error.address){

		                    $('.address_error').html(data.error.phone);

		                }

		                if(data.error.note){

		                    $('.note_error').html(data.error.note);

		                }

                        if(data.status==3){
                            toastr["error"](data.error, "Thông báo");
                        }

		            },
		            error: function (jqXHR, exception) {
		                $('.loadingcover').hide();
		            }

			    });
			});
		});
	</script>



@endsection