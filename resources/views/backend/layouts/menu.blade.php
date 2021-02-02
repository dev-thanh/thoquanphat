<li class="header">TRANG QUẢN TRỊ</li>

<li class="{{ Request::segment(2) == 'home' ? 'active' : null  }}">
    <a href="{{ route('backend.home') }}">
        <i class="fa fa-home"></i> <span>Trang chủ</span>
    </a>
</li>
<li class="{{ Request::segment(2) == 'users' ? 'active' : null  }}">
    <a href="{{ route('users.index') }}">
        <i class="fa fa-user"></i> <span>Tài khoản</span>
    </a>
</li>

<li class="treeview {{ (Request::segment(2) === 'category' || Request::segment(2) === 'products') && request()->type !='gift' ? 'active' : null }}">
    <a href="#">
        <i class="fa fa-building" aria-hidden="true"></i> <span>Sản phẩm</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::segment(2) === 'products' && request()->type !='gift' ? 'active' : null }}">
            <a href="{{ route('products.index') }}?type=product"><i class="fa fa-circle-o"></i> Danh sách sản phẩm</a>
        </li>
        <li class="{{ Request::segment(2) === 'category' && request()->type !='gift' ? 'active' : null }}">
            <a href="{{ route('category.index') }}?type=product_category"><i class="fa fa-circle-o"></i> Danh mục sản phẩm</a>
        </li>
    </ul>
</li>

<li class="treeview {{ (Request::segment(2) === 'category' && request()->type =='gift') || (Request::segment(2) === 'products' && request()->type =='gift') ? 'active' : null }}">
    <a href="#">
        <i class="fa fa-building" aria-hidden="true"></i> <span>Gift</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::segment(2) === 'products' && request()->type =='gift' ? 'active' : null }}">
            <a href="{{ route('products.index') }}?type=gift"><i class="fa fa-circle-o"></i> Danh sách sản phẩm gift</a>
        </li>
        <li class="{{ Request::segment(2) === 'category' && request()->type =='gift' ? 'active' : null }}">
            <a href="{{ route('category.index') }}?type=gift"><i class="fa fa-circle-o"></i> Danh mục sản phẩm gift</a>
        </li>
    </ul>
</li>

<li class="{{ Request::segment(2) == 'orders' ? 'active' : null  }}">

    <a href="{{ route('order.index') }}">

        <i class="fa fa-line-chart" aria-hidden="true"></i> <span>Đơn hàng</span>

    </a>

</li>

<li class="{{ Request::segment(2) == 'agency' ? 'active' : null  }}">

    <a href="{{ route('agency.index') }}">

        <i class="fa fa-building" aria-hidden="true"></i> <span>Đại lý</span>

    </a>

</li>

<li class="{{ Request::segment(2) == 'banks' ? 'active' : null  }}">

    <a href="{{ route('banks.index') }}">

        <i class="fa fa-building" aria-hidden="true"></i> <span>Tài khoản ngân hàng</span>

    </a>

</li>


<li class="{{ Request::segment(2) === 'posts' && request('type') == 'blog' ? 'active' : null }}">
    <a href="{{ route('posts.index', ['type'=>'blog']) }}"><i class="fa fa-building"></i>Blog</a>
</li>

<li class="{{ Request::segment(2) == 'pages' ? 'active' : null  }}">
    <a href="{{ route('pages.list') }}">
        <i class="fa fa-paper-plane" aria-hidden="true"></i> <span>Cài đặt trang</span>
    </a>
</li>

<li class="{{ Request::segment(2) == 'contact' ? 'active' : null  }}">
    <?php $number = \App\Models\Contact::where('status', 0)->count() ?>
    <a href="{{ route('get.list.contact') }}">
        <i class="fa fa-bell" aria-hidden="true"></i> <span>Liên hệ ({{ $number }})
        </span>
    </a>
</li>


<li class="header">Cấu hình hệ thống</li>
<li class="treeview {{ Request::segment(2) === 'options' || Request::segment(2) === 'menu' ? 'active' : null }}">
    <a href="#">
        <i class="fa fa-cog" aria-hidden="true"></i> <span>Cấu hình</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">

         <li class="{{ Request::segment(3) === 'general' ? 'active' : null }}">
            <a href="{{ route('backend.options.general') }}"><i class="fa fa-circle-o"></i> Cấu hình chung</a>
        </li>

        <li class="{{ Request::segment(2) === 'menu' ? 'active' : null }}">
            <a href="{{ route('setting.menu') }}"><i class="fa fa-circle-o"></i> Menu</a>
        </li>

        <li class="{{ Request::segment(2) === 'policy' ? 'active' : null }}">

            <a href="{{ route('policy.list') }}"><i class="fa fa-circle-o"></i>Chính sách hướng dẫn</a>

        </li>
        
    </ul>
</li>
<div style="display: none;">
	<li class="header">Cấu hình hệ thống</li>
	<li class="treeview {{ Request::segment(2) == 'options' ? 'active' : null  }}">
		<a href="#">
			<i class="fa fa-folder"></i> <span>Setting (Developer)</span>
			<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
			</span>
		</a>
		<ul class="treeview-menu">
			<li class="{{ Request::segment(3) == 'developer-config' ? 'active' : null  }}">
				<a href="{{ route('backend.options.developer-config') }}"><i class="fa fa-circle-o"></i> Developer - Config</a>
			</li>
		</ul>
	</li>
</div>