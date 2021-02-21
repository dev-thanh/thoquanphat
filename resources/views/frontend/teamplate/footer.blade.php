<footer id="footer">
    <div class="container">
        <div class="footer__group">
            <div class="footer__item">
                <div class="logo">
                    <a href="index.html" class="logo__link">
                        <img src="{{ url('/').$site_info->logo_footer }}" alt="icon__logo__footer.png" />
                    </a>
                </div>
                <div class="footer__title">Giới thiệu</div>
                <ul class="footer__body">
                    @if (count($policy) > 0)
                        @foreach ($policy as $item)
                        @if($item->type==1)
                        <li>
                            <a href="{{route('home.policy',['slug' => $item->slug])}}">
                                <span class="icon">
                                    <img src="{{url('/')}}/{{ @$item->image }}" alt="{{ @$item->name }}" />
                                </span>
                                <span class="footer__text"> {{ @$item->name }} </span>
                            </a>
                        </li>
                        @endif
                        @endforeach
                    @endif
                    
                </ul>
            </div>
            <div class="footer__item">
                <div class="footer__title">NHẬN TIN KHUYẾN MÃI</div>
                <form class="footer__form">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Nhập địa chỉ email</label>
                                <input type="text" class="form-control control__input" />
                                <!-- <p class="text__error">
                                    Thông báo lỗi
                                </p> -->
                            </div>
                        </div>
                    </div>
                    <button class="btn btn__save">Gửi</button>
                </form>
                <div class="form__contact">
                    <div class="footer__title">Liên hệ</div>
                    @if (count($policy) > 0)
                        @foreach ($policy as $item)
                            @if($item->type==2)

                            <div class="contact__group">
                                <h3 class="contact__group-title">{{$item->name}}</h3>
                                @foreach(json_decode(@$item->content)->ftct->content as $val)
                                <p class="text-addr">
                                    <span class="icon">
                                        <img src="{{url('/')}}/{{$val->image}}" alt="{{$val->title}}" />
                                    </span>
                                    {{$val->title}}
                                </p>
                                @endforeach
                            </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="footer__item">
                <div class="facebook">
                    <div class="fb-page" data-href="{!! @$site_info->link_page_facebook !!}" data-tabs="" data-width=""
                        data-height="100%" data-small-header="false" data-adapt-container-width="true"
                        data-hide-cover="false" data-show-facepile="true" data-lazy="true">
                        <blockquote cite="{!! @$site_info->link_page_facebook !!}" class="fb-xfbml-parse-ignore">
                            <a href="{!! @$site_info->link_page_facebook !!}">Facebook</a>
                        </blockquote>
                    </div>
                </div>
                <div class="youtube">
                    <div class="play">
                        
                        <div class="frame">
                            {!! @$site_info->iframe_video !!}

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</footer>
<button class="back-top">
    <i class="fas fa-arrow-up"></i>
</button>
<div id="tool__society">
    <div class="tool__item">
        @if (!empty(@$site_info->social))
            @foreach ($site_info->social as $item)
            <a href="{{ $item->link }}" class="tool__icon">
                <img src="{{ url('/').$item->icon }}" alt="{{ $item->name }}" />
            </a>
            @endforeach
        @endif
    </div>
</div>