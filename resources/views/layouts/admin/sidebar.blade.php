  <!--- Sidemenu -->
  <div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu" id="side-menu">
        <li class="menu-title">Main</li>
        <li>
            <a href="{{ route('home') }}" class="waves-effect">
                <i class="mdi mdi-home"></i><span class="badge badge-primary float-right">3</span> <span> Dashboard </span>
            </a>
        </li>

        <li>
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-settings-variant "></i><span> Users <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
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
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-cart "></i><span> Products <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
            <ul class="submenu">
                <li><a href="{{ route('admin-prod-creat') }}">Add New Product</a></li>
                <li><a href="{{ route('admin-prod-index') }}">All Products</a></li>
                <li><a href="{{ route('admin-prod-draft') }}"> Draft Products</a></li>
                <li><a href="{{ route('admin-prod-new') }}"> New Products</a></li>
                <li><a href="{{ route('admin-prod-available') }}"> Available Products</a></li>
                <li><a href="{{ route('admin-prod-unavailable') }}"> Unavailable Products</a></li>

            </ul>
        </li>

        <li>
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-gate-nor"></i><span> Billing <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
            <ul class="submenu">

                <li><a href="{{ route('admin-bill-create') }}">Add Billing</a></li>
                <li><a href="{{ route('admin-bill-index') }}"> All Billing</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-car-pickup "></i><span> Shipping <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
            <ul class="submenu">

                <li><a href="{{ route('admin-ship-create') }}">Add Shipping</a></li>
                <li><a href="{{ route('admin-ship-index') }}"> All Shipping</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-basket-fill "></i><span> Orders <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
            <ul class="submenu">

                <li><a href="{{ route('admin-order-create') }}">Add New Order</a></li>
                <li><a href="{{ route('admin-order-index') }}">All Order</a></li>
                <li><a href="{{ route('admin-order-new') }}"> New</a></li>
                <li><a href="{{ route('admin-order-shipped') }}">Shipped</a></li>
                <li><a href="{{ route('admin-order-delivered') }}">Delivered</a></li>
                <li><a href="{{ route('admin-order-returned') }}">Returned</a></li>
                <li><a href="{{ route('admin-order-cancelled') }}">Cancelled</a></li>
                {{-- <li><a href="{{ route('admin-order-track') }}">Tracking</a></li> --}}

            </ul>
        </li>

        <li>
            <a href="{{ route('admin-order-track') }}" class="waves-effect"><i class="mdi mdi-table-search"></i><span> Tracking </span></a>
        </li>

        <li>
            <a href="{{ route('admin-trans-index') }}" class="waves-effect"><i class="mdi  mdi-cash-multiple "></i><span> Transactions </span></a>
        </li>





        <li class="menu-title">Global Settings</li>

        <li>
            <a href="{{ route('admin-set-prod-index') }}" class="waves-effect"><i class="mdi mdi-cart-plus "></i><span>Product Settings  </span></a>

        </li>
        <li>
            <a href="{{ route('admin-set-gen-index') }}" class="waves-effect"><i class="mdi mdi-cogs "></i><span>General Settings  </span></a>

        </li>
        <li>
            <a href="{{ route('admin-set-gen-index') }}" class="waves-effect"><i class="mdi mdi-cogs "></i><span>Profile Settings  </span></a>

        </li>


    </ul>

</div>
<!-- Sidebar -->
