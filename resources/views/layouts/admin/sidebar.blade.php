  <!--- Sidemenu -->
  <div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu" id="side-menu">
        <li class="menu-title">Main</li>
        <li>
            <a href="index.html" class="waves-effect">
                <i class="mdi mdi-home"></i><span class="badge badge-primary float-right">3</span> <span> Dashboard </span>
            </a>
        </li>

        <li>
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-group"></i><span> User <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
            <ul class="submenu">
                <li><a href="{{ route('users.create') }}">Add</a></li>
                <li><a href="{{ route('users') }}">Staff</a></li>
                <li><a href="{{ route('users') }}/customer">Customer</a></li>

            </ul>
        </li>

        <li>
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-reproduction"></i><span> Role <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
            <ul class="submenu">
                <li><a href="{{ route('roles.create') }}">Create Role</a></li>
                <li><a href="{{ route('roles.index') }}">All Roles</a></li>
            </ul>
        </li>


        <li>
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-view-module"></i><span> Category <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
            <ul class="submenu">

                <li><a href="{{ route('admin-cat-index') }}">Main Categories</a></li>
                <li><a href="{{ route('admin-subcat-index') }}">Sub Categories</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-email"></i><span> Email <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
            <ul class="submenu">
                <li><a href="email-inbox.html">Inbox</a></li>
                <li><a href="email-read.html">Email Read</a></li>
                <li><a href="email-compose.html">Email Compose</a></li>
            </ul>
        </li>



        <li class="menu-title">Extras</li>

        <li>
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-page-layout-sidebar-left"></i><span> Layouts <span class="badge badge-warning float-right">NEW</span> </span></a>
            <ul class="submenu">
                <li><a href="layouts-dark-sidebar.html">Dark Sidebar</a></li>
                <li><a href="layouts-sidebar-user.html">Sidebar with User</a></li>
                <li><a href="layouts-collapsed.html">Collpased Sidenav</a></li>
                <li><a href="layouts-small.html">Small Sidebar</a></li>
                <li><a href="layouts-title2.html">Page Title 2</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-google-pages"></i><span> Pages <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
            <ul class="submenu">
                <li><a href="pages-login.html">Login</a></li>
                <li><a href="pages-register.html">Register</a></li>
                <li><a href="pages-recoverpw.html">Recover Password</a></li>
                <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                <li><a href="pages-timeline.html">Timeline</a></li>
                <li><a href="pages-invoice.html">Invoice</a></li>
                <li><a href="pages-directory.html">Directory</a></li>
                <li><a href="pages-blank.html">Blank Page</a></li>
                <li><a href="pages-404.html">Error 404</a></li>
                <li><a href="pages-500.html">Error 500</a></li>
            </ul>
        </li>
    </ul>

</div>
<!-- Sidebar -->
