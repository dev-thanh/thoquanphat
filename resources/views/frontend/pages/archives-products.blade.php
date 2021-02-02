@extends('frontend.master')
@section('main')

    <?php 

        if(!empty($dataSeo)){

            $content = json_decode($dataSeo->content);
            
        }

        $curent_page = request()->get('page') ? request()->get('page') : '1';

        $url = url()->current().'?';

    	if(request()->min !='' || request()->max){

            if(request()->max !=''){
                $min = request()->min;
                $max = request()->max;
                $search = request()->search;
                $url = $url.'&min='.$min.'&max='.$max;
            }
            
            if(request()->search !=''){
                $search = request()->search;
                $url = $url.'&search='.$search;
            }
            

        }else{
            $url = url()->current().'?';
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
        <section class="sanpham_banchay all_sp--page">
            <div class="container">
                <div class="title_section">
                    <h2 class="h2_title"><span>@if(request()->route()->getName() =='home.search') Kết quả tìm kiếm @else Tất cả sản phẩm @endif</span></h2>
                </div>
                <div class="content_section">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                            @include('frontend.teamplate.category-products')
                            <div class="sp_page--chinh">
                                <div class="sidebar_page--sp">
                                    @include('frontend.teamplate.box-filter')
                                    <!-- end box filter -->
                                    @if(count($products_new) > 0)
                                    <div class="box_sp--moi">
                                        <div class="title_box">
                                            <h2 class="h2_title">Sản phẩm mới cập nhật</h2>
                                        </div>
                                        <div class="sp_page--chinh">
                                            <div class="content_box">
                                                <div class="list_sp--moi">
                                                	@foreach($products_new as $item)
                                                    <div class="item_sp--moi">
                                                        <div class="img_sp img-cover">
                                                            <a href="{{route('home.single-product',['slug'=>$item->slug])}}"><img src="{{url('/').@$item->image}}" alt="{{$item->name}}"></a>
                                                        </div>
                                                        <div class="text_sp">
                                                            <h3 class="h3_title"><a href="{{route('home.single-product',['slug'=>$item->slug])}}">{{$item->name}}</a></h3>
                                                            <div class="price">
                                                                <div class="price_sel">
                                                                    <i class="fas fa-tag"></i>
                                                                    <span>{{ $item->price_sale !='' ? number_format($item->price_sale,0, '.', '.') : number_format($item->price,0, '.', '.') }} đ</span>
                                                                </div>
                                                            </div>
                                                            <div class="des_sp">
                                                                {!! $item->desc !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                            <div class="row">
                            	@foreach(@$data as $item)
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 cus__mb-4">
                                    @include('frontend.pages.product-item.product-item1')
                                </div>
                                @endforeach
                            </div>
                            <div class="row mt-5">
                                <div class="col-12">
                                    <div class="pagination">
                                        <nav aria-label="..." class="ml-auto">
                                            <ul class="pagination">
                                            <li class="page-item">
                                            	<a href="{{$url}}&page={{$curent_page-1}}" @if($curent_page==1) onclick="return false;" @endif">
	                                              	<span class="page-link">
	                                              		<i class="fas fa-angle-double-left"></i>
	                                              	</span>
	                                            </a>
                                            </li>

                                            @for($i = 0; $i < $data->lastpage(); $i++)
                                            <li class="page-item" data-page="{{$i+1}}">
                                            	<a class="page-link" href="{{$url}}&page={{$i+1}}" @if($curent_page == $i+1) onclick="return false;" @endif">{{$i+1}}</a>
                                            </li>
                                            @endfor

                                            <li class="page-item">
                                              	<a href="{{$url}}&page={{$curent_page+1}}" @if($curent_page==$data->lastpage()) onclick="return false;" @endif>
	                                              	<span class="page-link">
	                                              		<i class="fas fa-angle-double-right"></i>
	                                              	</span>
                                              	</a>
                                            </li>
                                        </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section san pham ban chay -->
        @if(count(@$products_new) > 0)
        <section class="news sp_nb">
            <div class="container">
                <div class="title_section">
                    <h2 class="h2_title">Sản phẩm nổi bật</h2>
                </div>
                <div class="content_section">
                    <div id="slider-news" class="owl-carousel owl-theme">
                    	@foreach(@$products_new as $item)
                        <div class="item">
                            <div class="item_news">
                                <div class="img_news img-cover">
                                    <a href="{{route('home.single-product',['slug'=>$item->slug])}}"><img src="{{url('/').@$item->image}}" alt=""></a>
                                </div>
                                <div class="text_news">
                                    <div class="date_time">
                                        <i class="fas fa-calendar-alt"></i>
                                        <span>20/11/2020</span>
                                    </div>
                                    <div class="text">
                                        <h3 class="h3_title"><a href="{{route('home.single-product',['slug'=>$item->slug])}}">{{@$item->name}}</a></h3>
                                        <div class="des_news">
                                        	{!! $item->desc !!}
                                        </div>
                                        <a href="{{route('home.single-product',['slug'=>$item->slug])}}" class="btn btn-default btn_xemthem">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        @endif
        <!-- end section news -->
    </main>
    <script>

        jQuery(document).ready(function($) {

            $('[data-page="{{$curent_page}}"]').addClass('active');

        });

    </script>
@endsection