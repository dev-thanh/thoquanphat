<style type="text/css" media="screen">
    #footer-site {
        background: url({{$site_info->background_footer}});
        background-size: 100% 100%;
    }
</style>
<footer id="footer-site">
    <div class="footer">
        <div class="container">
            <div class="menu_ft">
                @if (!empty($menuHeader))
                <ul class="ul-b d-flex flex-wrap">
                    @foreach ($menuFooter as $item)
                        @if ($item->parent_id == null)
                        <li><a href="{{url('/').$item->url}}">{{$item->title}}</a></li>
                        @endif
                    @endforeach
                </ul>
                @endif
            </div>
            <div class="main_ft">
                <div class="logo_ft">
                    <a href="{{route('home.index')}}"><img src="{{ url('/').@$site_info->logo_footer }}" alt="Logo"></a>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="left_ft">
                            <div class="box_ft">
                                <h2 class="h2_title--ft">{{ @$site_info->name_company }}</h2>
                                <div class="content_ft">
                                    <ul class="ul-b">
                                        @foreach (@$site_info->address->list as $item)
                                        <li>
                                            <i class="fas fa-map-marker-alt"></i>
                                            <span>
                                                {{ $item->title }}
                                            </span>
                                        </li>
                                        @endforeach
                                        <li>
                                            <i class="fas fa-phone"></i> <span>{{ @$site_info->phone }}</span>
                                        </li>
                                        <li>
                                            <i class="fas fa-envelope"></i><span>{{ @$site_info->email }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="right_ft d-flex">
                            <div class="box_ft">
                                <h2 class="h2_title--ft">Chính sách</h2>
                                <div class="content_ft">
                                    <ul class="ul-b list_chinhsach">
                                        @if (count($policy) > 0)

                                            @foreach ($policy as $item)
                                                <li><a href="{{route('home.policy',['slug' => $item->slug])}}" title="{{ @$item->name }}"><i class="fas fa-angle-right"></i>{{ @$item->name }}</a></li>
                                            @endforeach

                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="box_ft">
                                <h2 class="h2_title--ft">Hotline</h2>
                                <div class="content_ft">
                                    <div class="tuvan">
                                        @if(!empty(@$site_info->order_time))
                                        <div class="tu_van">
                                            <img src="{{url('/').'/uploads/icon-cmt.png'}}">
                                            <div class="text">
                                                <span>Tư vấn đặt hàng {{@$site_info->order_time}}</span>
                                                <span class="number_phone">{{ @$site_info->hotline }}</span>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="bct">
                                            <img src="{{url('/').@$site_info->logo_bct}}" alt="Logo BCT">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy_right">
        <div class="container">
            <div class="copyright d-flex">
                <div class="left">
                    © GCO GROUP 2019. All rights reserved
                </div>
                <div class="right">
                    <ul class="ul-b list_social">
                        @if (!empty(@$site_info->social))

                            @foreach ($site_info->social as $item)
                                <li>
                                    <a href="{{ $item->link }}" target="_blank" title="{{ $item->name }}">
                                        <img src="{{ url('/').$item->icon }}" alt="icon__facbook.png">
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>