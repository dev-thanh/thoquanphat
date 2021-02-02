<div class="backdrop__body-backdrop___1rvky"></div>
<div class="mobile-main-menu">
    <div class="drawer-header">
        <form action="">
            <div class="wp-form-search">
                <input type="text" placeholder="Tìm kiếm" class="form-control">
                <button class="btn btn-default"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
    <div class="la-scroll-fix-infor-user menu-mobile">
        <div class="la-nav-menu-items">
            <ul class="la-nav-list-items ul-b">
                @foreach($menuMobile as $k =>$item)
                    @if ($item->parent_id == null)
                    <li class="ng-scope ng-has-child1">
                        <a href="{{url('/').$item->url}}">{{$item->title}} @if (count($item->get_child_cate())) <i class="fa fa-plus fa1" aria-hidden="true"></i> @endif</a>
                        @if (count($item->get_child_cate()))
                        <ul class="ul-has-child1 ul-b">
                            @foreach ($item->get_child_cate() as $value)
                            <li class="ng-scope ng-has-child2">
                                <a href="{{url('/').$value->url}}">{{$value->title}} @if (count($value->get_child_cate())) <i class="fa fa-plus fa2" aria-hidden="true"></i> @endif</a>
                                @if(count($value->get_child_cate()))
                                <ul class="ul-has-child2 ul-b">
                                    @foreach ($value->get_child_cate() as $val)
                                    <li class="ng-scope"> <a href="{{url('/').$val->url}}">{{$val->title}}</a> </li>
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