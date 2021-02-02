<?php $search = request()->search !='' ? request()->search : ''; ?>
<header id="header-site">
    <div class="header_top">
        <div class="container">
            <div class="menu_top">
                <div class="container">
                    <div class="nav-left overlay">
                        <nav class="navbar navbar-expand-md">
                            @if(count($menuHeader) > 4)
                                <ul class="navbar-nav navbar_left">
                                    @foreach($menuHeader as $k => $item)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/').$item->url}}"><span>{{$item->title}}</span></a>
                                    </li>
                                    @if($k==3)
                                        </ul>
                                        <ul class="navbar-nav ml-auto navbar_right">
                                    @endif
                                    @endforeach
                                </ul>
                            @else
                                <ul class="navbar-nav navbar_left">
                                    @foreach($menuHeader as $k => $item)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/').$item->url}}"><span>{{$item->title}}</span></a>
                                    </li>
                                    @endforeach
                                </ul>
                            @endif
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header_main">
        <div id="sticky-wrapper" class="sticky-wrapper">
            <div class="main-menu-bar sticky-header-enable">
                <div class="container">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="wp-icon-menu-bar d-none">
                            <div id="trigger-mobile">
                                <span class="bar"></span>
                                <span class="bar"></span>
                                <span class="bar"></span>
                            </div>
                        </div>
                        <div class="navbar_brand">
                            <a class="navbar-brand" href="{{route('home.index')}}"><img src="{{url('/').@$site_info->logo}}" alt="Logo"></a>
                        </div>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                @foreach($menuProducts as $k =>$item)
                                    @if ($item->parent_id == null)
                                    <li class="nav-item dropdown">
                                        <a class="nav-link @if (count($item->get_child_cate())) dropdown-toggle @endif" href="{{url('/').$item->url}}" data-toggle="dropdown"><span>{{$item->title}}</span></a>
                                        @if (count($item->get_child_cate()))
                                        <div class="dropdown-menu">
                                            <ul class="navbar-nav flex-column">
                                                @foreach ($item->get_child_cate() as $value)
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link @if (count($value->get_child_cate())) dropdown-toggle @endif" href="{{url('/').$value->url}}" data-toggle="dropdown"><span>{{$value->title}}</span></a>
                                                    @if (count($value->get_child_cate()))
                                                    <div class="dropdown-menu">
                                                        <ul class="navbar-nav flex-column">
                                                            @foreach ($value->get_child_cate() as $val)
                                                            <li class="nav-item">
                                                                <a class="dropdown-item" href="{{url('/').$val->url}}"><span>{{$val->title}}</span></a>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    @endif
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                    </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="search_shop_cart d-flex align-items-center">
                            <div class="search">
                                <form class="form-inline my-2 my-lg-0" action="{{route('home.search')}}" method="GET">
                                    <input class="form-control" type="search" name="search" value="{{@$search}}" placeholder="Search" aria-label="Search">
                                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                            <a href="{{route('home.cart')}}" title="Giỏ hàng">
                                <div class="shop_cart">
                                    <i class="fas fa-shopping-basket"></i>
                                    <div class="text_cart">
                                        
                                            <span class="cart_int">{{ Cart::count() }}</span>
                                        
                                    </div>
                                </div>
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" class="min_price_active" value="{{request()->min !='' ? request()->min : ''}}">
    <input type="hidden" class="max_price_active" value="{{request()->max !='' ? request()->max : '4000000'}}">
</header>