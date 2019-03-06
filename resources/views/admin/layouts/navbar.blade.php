<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{aurl()}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>B</b>lood</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Blood</b>Bank</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        @include('admin.layouts.menu')
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <image class="image responsive img-circle" src="#" alt="Photo Profile"
                    style="width:60px;height:60px">
            </div>
            <div class="pull-left info">
                <p>User Name</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
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

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{aurl('governorate')}}"><i class="fa fa-address-book"></i><span>Governorates</span></a></li>
            <li class="active"><a href="{{aurl('citie')}}"><i class="fa fa-user-secret"></i> <span>Cities</span></a></li>
            <li class="active"><a href="{{aurl('category')}}"><i class="fa fa-user"></i> <span>Categories</span></a></li>
            <li class="active"><a href="{{aurl('client')}}"><i class="fa fa-copyright"></i> <span>Client</span></a></li>
            <li class="active"><a href="{{aurl('post')}}"><i class="fa fa-copyright"></i> <span>Postes</span></a></li>
            <li class="active"><a href="{{aurl('contact')}}"><i class="fa fa-copyright"></i> <span>Contacts</span></a></li>
            <li class="active"><a href="{{aurl('order')}}"><i class="fa fa-copyright"></i> <span>Order</span></a></li>
            <li class="active"><a href="{{aurl('setting')}}"><i class="fa fa-copyright"></i> <span>Settings</span></a></li>
            <li class="treeview">

                <ul class="treeview-menu">
                    <li><a href="#">Cours1</a></li>
                    <li><a href="#">Cours2</a></li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
