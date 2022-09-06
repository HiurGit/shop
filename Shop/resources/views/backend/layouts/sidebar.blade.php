<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            @if (Auth::check())

                @php
                    $user = Auth::user();
                @endphp
                <div class="pull-left image">
                    @if ( file_exists($user->avatar))
                    <img src="{{ asset($user->avatar) }}" class="img-circle" alt="" height="45px" width="45px">
                @else
                    <img src="{{ asset('public/upload/404.jpg') }}" class="img-circle" height="45px" width="45px" alt="">
                @endif
                </div>

                <div class="pull-left info">
                    <p>{{ $user->name }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            @endif
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                            class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa  fa-user-circle-o"></i>
                    <span>Quản lý USER</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('users.create') }}"><i class="fa fa-plus-square"></i>Tạo User</a></li>
                    <li><a href="{{ route('users.index') }}"><i class="fa fa-list"></i> Danh sách Users</a></li>


                </ul>
            </li>
            <li class=" treeview">
                <a href="#">
                    <i class="fa fa-file-photo-o"></i>
                    <span>Quản lý BANNER</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('banner.create') }}"><i class="fa fa-plus-square"></i> Tạo Banner</a></li>
                    <li><a href="{{ route('banner.index') }}"><i class="fa fa-list"></i> Danh sách Banner</a></li>


                </ul>
            </li>
            <li class=" treeview">
                <a href="#">
                    <i class="fa fa-bandcamp"></i>
                    <span>Quản lý PRODUCT</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('product.create') }}"><i class="fa fa-plus-square"></i> Tạo Product</a></li>
                    <li><a href="{{ route('product.index') }}"><i class="fa fa-list"></i> Danh sách Product</a></li>


                </ul>
            </li>
            <li class=" treeview">
                <a href="#">
                    <i class="fa fa-linode"></i>
                    <span>Quản lý CATEGORY</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('category.create') }}"><i class="fa fa-plus-square"></i> Tạo Category</a></li>
                    <li><a href="{{ route('category.index') }}"><i class="fa fa-list"></i> Danh sách Category</a></li>
                </ul>
            </li>
             <li class=" treeview">
                <a href="#">
                    <i class="fa fa-th-large"></i>
                    <span>Quản lý BRAND</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('brand.create') }}"><i class="fa fa-plus-square"></i> Tạo Brand</a></li>
                    <li><a href="{{ route('brand.index') }}"><i class="fa fa-list"></i> Danh sách Brand</a></li>
                </ul>
            </li>
            <li class=" treeview">
                <a href="#">
                    <i class="fa fa-compress "></i>
                    <span>Quản lý CONTACT</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('contact.create') }}"><i class="fa fa-plus-square"></i> Tạo Contact</a></li>
                    <li><a href="{{ route('contact.index') }}"><i class="fa fa-list"></i> Danh sách Contact</a></li>
                </ul>
            </li>
            <li class=" treeview">
                <a href="#">
                    <i class="fa fa-podcast"></i>
                    <span>Quản lý VENDOR</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('vendor.create') }}"><i class="fa fa-plus-square"></i> Tạo Vendor</a></li>
                    <li><a href="{{ route('vendor.index') }}"><i class="fa fa-list"></i> Danh sách Vendor</a></li>
                </ul>
            </li>
            <li class=" treeview">
                <a href="#">
                    <i class="fa fa-list-alt"></i>
                    <span>Quản lý ARTICLES</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('article.create') }}"><i class="fa fa-plus-square"></i> Tạo Article</a></li>
                    <li><a href="{{ route('article.index') }}"><i class="fa fa-list"></i> Danh sách Article</a></li>


                </ul>
            </li>
            <li class=" treeview">
                <a href="#">
                    <i class="fa fa-wrench"></i>
                    <span>Quản lý SETTING</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('setting.create') }}"><i class="fa fa-plus-square"></i> Tạo SETTING</a></li>
                    <li><a href="{{ route('setting.index') }}"><i class="fa fa-list"></i> Danh sách SETTING</a></li>
                </ul>
            </li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
