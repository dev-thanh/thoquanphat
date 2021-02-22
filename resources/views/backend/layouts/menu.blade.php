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

<li class="treeview {{ (Request::segment(2) === 'category' && request()->type =='category_services' ) || (Request::segment(2) === 'services') ? 'active' : null }}">
    <a href="#">
        <i class="fa fa-building" aria-hidden="true"></i> <span>Dịch vụ</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::segment(2) === 'services' ? 'active' : null }}">
            <a href="{{ route('services.index') }}"><i class="fa fa-circle-o"></i> Danh sách dịch vụ</a>
        </li>
        <li class="{{ Request::segment(2) === 'category' && request()->type =='category_services' ? 'active' : null }}">
            <a href="{{ route('category.index') }}?type=category_services"><i class="fa fa-circle-o"></i> Danh mục dịch vụ</a>
        </li>
    </ul>
</li>

<li class="treeview {{ (Request::segment(2) === 'category' && request()->type =='category_quotes' ) || (Request::segment(2) === 'quotes') ? 'active' : null }}">
    <a href="#">
        <i class="fa fa-building" aria-hidden="true"></i> <span>Báo giá và quy trình</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::segment(2) === 'quotes' ? 'active' : null }}">
            <a href="{{ route('quotes.index') }}"><i class="fa fa-circle-o"></i> Danh sách báo giá và quy trình</a>
        </li>
        <li class="{{ Request::segment(2) === 'category' && request()->type =='category_quotes' ? 'active' : null }}">
            <a href="{{ route('category.index') }}?type=category_quotes"><i class="fa fa-circle-o"></i> Danh mục báo giá và quy trình</a>
        </li>
    </ul>
</li>

<li class="treeview {{ (Request::segment(2) === 'category' && request()->type =='category_projects' ) || (Request::segment(2) === 'projects') ? 'active' : null }}">
    <a href="#">
        <i class="fa fa-building" aria-hidden="true"></i> <span>Dự án hoàn thành</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::segment(2) === 'projects' ? 'active' : null }}">
            <a href="{{ route('projects.index') }}"><i class="fa fa-circle-o"></i> Danh sách dự án hoàn thành</a>
        </li>
        <li class="{{ Request::segment(2) === 'category' && request()->type =='category_projects' ? 'active' : null }}">
            <a href="{{ route('category.index') }}?type=category_projects"><i class="fa fa-circle-o"></i> Danh mục dự án hoàn thành</a>
        </li>
    </ul>
</li>


<!-- <li class="{{ Request::segment(2) == 'agency' ? 'active' : null  }}">

    <a href="{{ route('agency.index') }}">

        <i class="fa fa-building" aria-hidden="true"></i> <span>Đại lý</span>

    </a>

</li> -->

<li class="treeview {{ (Request::segment(2) === 'category' && request()->type =='category_beautiful_house' ) || (Request::segment(2) === 'beautiful-house') ? 'active' : null }}">
    <a href="#">
        <i class="fa fa-building" aria-hidden="true"></i> <span>Mẫu nhà đẹp</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::segment(2) === 'beautiful-house' ? 'active' : null }}">
            <a href="{{ route('beautiful-house.index') }}"><i class="fa fa-circle-o"></i> Danh sách mẫu nhà đẹp</a>
        </li>
        <li class="{{ Request::segment(2) === 'category' && request()->type =='category_beautiful_house' ? 'active' : null }}">
            <a href="{{ route('category.index') }}?type=category_beautiful_house"><i class="fa fa-circle-o"></i> Danh mục mẫu nhà đẹp</a>
        </li>
    </ul>
</li>

<li class="treeview {{ (Request::segment(2) === 'category' && request()->type =='category_utilities' ) || (Request::segment(2) === 'utilities') ? 'active' : null }}">
    <a href="#">
        <i class="fa fa-building" aria-hidden="true"></i> <span>Tiện ích</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::segment(2) === 'utilities' ? 'active' : null }}">
            <a href="{{ route('utilities.index') }}"><i class="fa fa-circle-o"></i> Danh sách tiện ích</a>
        </li>
        <li class="{{ Request::segment(2) === 'category' && request()->type =='category_utilities' ? 'active' : null }}">
            <a href="{{ route('category.index') }}?type=category_utilities"><i class="fa fa-circle-o"></i> Danh mục tiện ích</a>
        </li>
    </ul>
</li>


<li class="{{ Request::segment(2) === 'posts' && request('type') == 'blog' ? 'active' : null }}">
    <a href="{{ route('posts.index', ['type'=>'blog']) }}"><i class="fa fa-building"></i>Tin tức</a>
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

<li class="{{ Request::segment(2) == 'advisory' ? 'active' : null  }}">
    <?php $number = \App\Models\Advisory::where('status', 0)->count() ?>
    <a href="{{ route('get.list.advisory') }}">
        <i class="fa fa-bell" aria-hidden="true"></i> <span>Đăng ký tư vấn ({{ $number }})
        </span>
    </a>
</li>

<?php $routeName = request()->route()->getName(); ?>
<li class="header">Cấu hình hệ thống</li>
<li class="treeview {{ Request::segment(2) === 'options' || Request::segment(2) === 'menu' || Request::segment(2) === 'policy' ? 'active' : null }}">
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
        <li class="{{ request()->get('type') == 'slider' ? 'active' : null }}">

            <a href="{{ route('image.index', ['type'=> 'slider']) }}"><i class="fa fa-circle-o"></i> Slider</a>

        </li>
        <li class="{{ $routeName =='policy.list' || $routeName =='policy.add' || $routeName =='policy.edit' ? 'active' : null }}">

            <a href="{{ route('policy.list') }}"><i class="fa fa-circle-o"></i>Khối giới thiệu(footer)</a>

        </li>

        <li class="{{ $routeName =='policy.list-ftct' || $routeName =='policy.add-ftct' || $routeName =='policy.edit-ftct' ? 'active' : null }}">

            <a href="{{ route('policy.list-ftct') }}"><i class="fa fa-circle-o"></i>Khối liên hệ(footer)</a>

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