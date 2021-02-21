<header id="header">
    <div class="header__top">
        <div class="container">
            <div class="top__group">
                <div class="top__item">
                    <a href="tel:" class="top__text">
                    <span class="icon"> <i class="fas fa-phone"></i> </span>( + 84 ) 987
                    654 321
                    </a>
                    <a href="mailto:wensite123@gmail.com" class="top__text">
                    <span class="icon"> <i class="fal fa-envelope"></i> </span>wensite123@gmail.com
                    </a>
                </div>
                <form class="top__item form__search">
                    <input type="text" class="form-control form__input" placeholder="Tìm kiếm" />
                    <button class="btn btn__search">
                    <i class="fal fa-search"></i>
                    </button>
                </form>
                <a href="#" class="top__item link__instagram">
                <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="top__item link__facebook">
                <i class="fab fa-facebook-f"></i>
                </a>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="header__group">
            <div class="group__item">
                <h1 class="logo">
                    <a href="{{route('home.index')}}" class="logo__link">
                    <img src="{{$site_info->logo}}" alt="icon__log" />
                    </a>
                </h1>
            </div>
            <div class="group__item">
                <div class="menu__container">
                    <button class="btn btn__menu">
                    <i class="fas fa-bars"></i>
                    </button>
                    <div class="header__menu">
                        <button class="btn btn__back">
                        <i class="fas fa-arrow-left"></i>       
                        </button>
                        <ul class="menu">
                            @foreach($menuHeader as $k =>$item)
                                @if ($item->parent_id == null)
                                <li class="menu__item">
                                    <a href="{{url('/').$item->url}}" class="menu__item--link"> {{$item->title}} </a>
                                    @if (count($item->get_child_cate()))
                                    <ul>
                                        @foreach ($item->get_child_cate() as $value)
                                        <li>
                                            <a href="{{url('/').$value->url}}"> {{$value->title}} </a>
                                            @if (count($value->get_child_cate()))
                                            <ul>
                                                @foreach ($value->get_child_cate() as $val)
                                                <li>
                                                    <a href="{{url('/').$val->url}}"> {{$val->title}} </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                            @endif
                                        </li>
                                        @endforeach
                                        
                                    </ul>
                                    @endif
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="group__item">
                <a href="{{route('home.signup-consultation')}}" class="btn btn__res"> Đăng ký tư vấn </a>
            </div>
        </div>
    </div>
</header>