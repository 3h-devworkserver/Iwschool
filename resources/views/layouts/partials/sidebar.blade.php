<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif


        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class=""><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            <li class="treeview">
                <a href="javascript:;"><i class='fa fa-file-text-o'></i> <span>{{ trans('Posts') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/post') }}"><i class='fa fa-angle-right'></i>{{ trans('All Posts') }}</a></li>
                    <li><a href="{{ url('post/create') }}"><i class='fa fa-angle-right'></i>{{ trans('Add Post') }}</a></li>
                    <!-- <li><a href="{{ url('post/add/category') }}"><i class='fa fa-angle-right'></i>{{ trans('Add Category') }}</a></li> -->
                </ul>
            </li>
           <li class="treeview"><a href="{{ url('#') }}"><i class='fa fa-files-o'></i> <span>{{ trans('Pages') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('page/list') }}"><i class='fa fa-angle-right'></i>{{ trans('All Pages') }}</a></li>
                    <li><a href="{{ url('page/new') }}"><i class='fa fa-angle-right'></i>{{ trans('Add Page') }}</a></li>
                </ul>
            </li>
            <li class="treeview"><a href="{{ url('#') }}"><i class='fa fa-support'></i> <span>{{ trans('Static Block') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('static/block/list') }}"><i class='fa fa-angle-right'></i>{{ trans('All Static Block') }}</a></li>
                    <li><a href="{{ url('static/block/new') }}"><i class='fa fa-angle-right'></i>{{ trans('Add Static Block') }}</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="javascript:;"><i class='fa fa-image'></i> <span>{{ trans('Slider') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/slider') }}"><i class='fa fa-angle-right'></i>{{ trans('All Slider') }}</a></li>
                    <li><a href="{{ url('slides/create') }}"><i class='fa fa-angle-right'></i>{{ trans('Create Slider') }}</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="javascript:;"><i class='fa fa-user'></i> <span>{{ trans('User Management') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/user/list') }}"><i class='fa fa-angle-right'></i>{{ trans('All User') }}</a></li>
                    <li><a href="{{ url('admin/user/create') }}"><i class='fa fa-angle-right'></i>{{ trans('Add User') }}</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="javascript:;"><i class='fa fa-files-o'></i> <span>{{ trans('Notice Management') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/notice') }}"><i class='fa fa-angle-right'></i>{{ trans('All Notices') }}</a></li>
                    <li><a href="{{ url('admin/notice/create') }}"><i class='fa fa-angle-right'></i>{{ trans('Add Notice') }}</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="javascript:;"><i class='fa fa-image'></i> <span>{{ trans('Gallery Management') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/gallery') }}"><i class='fa fa-angle-right'></i>{{ trans('All Galleries') }}</a></li>
                    <li><a href="{{ url('admin/gallery/create') }}"><i class='fa fa-angle-right'></i>{{ trans('Add Gallery') }}</a></li>
                </ul>
            </li>
            <li class=""><a href="{{ url('admin/menus') }}"><i class='fa fa-link'></i> <span>{{ trans('Menu') }}</span></a></li>
            <li class="treeview">
                <a href="javascript:;"><i class='fa fa-cogs'></i> <span>{{ trans('Settings') }}</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('setting/generals') }}"><i class='fa fa-angle-right'></i>{{ trans('General') }}</a></li>
                    <li><a href="{{ url('setting/seo') }}"><i class='fa fa-angle-right'></i>{{ trans('SEO') }}</a></li>
                    <li><a href="{{ url('setting/social') }}"><i class='fa fa-angle-right'></i>{{ trans('Social Links') }}</a></li>
                    <li><a href="{{ url('setting/email/notify') }}"><i class='fa fa-angle-right'></i>{{ trans('Admin Email Notify') }}</a></li>
                    <li><a href="{{ url('setting/news-events/notify') }}"><i class='fa fa-angle-right'></i>{{ trans('Admin News/Events Email') }}</a></li>
                </ul>
            </li>
          </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
