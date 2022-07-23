<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('public/backend')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-file-photo-o"></i>
            <span>BANNER</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('banner.create') }}"><i class="fa fa-plus-square"></i> Tạo Banner</a></li>
            <li><a href="{{ route('banner.index') }}"><i class="fa fa-chevron-circle-right"></i> Danh sách Banner</a></li>


          </ul>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-th-large"></i>
            <span>CATEGORY</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('category.create') }}"><i class="fa fa-plus-square"></i> Tạo Category</a></li>
            <li><a href="{{ route('category.index') }}"><i class="fa fa-chevron-circle-right"></i> Danh sách Category</a></li>
          </ul>
        </li>
        <li class="active treeview">
            <a href="#">
              <i class="fa fa-list-alt"></i>
              <span>ARTICLES</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('article.create') }}"><i class="fa fa-plus-square"></i> Tạo Article</a></li>
              <li><a href="{{ route('article.index') }}"><i class="fa fa-chevron-circle-right"></i> Danh sách Article</a></li>


            </ul>
          </li>
          <li class="active treeview">
            <a href="#">
              <i class="fa fa-wrench"></i>
              <span>SETTING</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('setting.create') }}"><i class="fa fa-plus-square"></i> Tạo SETTING</a></li>
              <li><a href="{{ route('setting.index') }}"><i class="fa fa-chevron-circle-right"></i> Danh sách SETTING</a></li>
            </ul>
          </li>


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
