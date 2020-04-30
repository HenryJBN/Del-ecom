<header class="section-header">

    <section class="border-bottom py-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-4">
                    <a href="{{ route('index') }}" class="navbar-brand">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <form action="{{ route('search') }}" class="search">
                        <div class="input-group w-100">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- search-wrap .end// -->
                </div>
                <!-- col.// -->
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="widgets-wrap float-md-right">
                        <div class="widget-header mr-3">
                            <a href="{{ route('cart') }}" class="icon icon-sm rounded-circle border">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                            <span class="badge badge-pill badge-danger notify">0</span>
                        </div>
                        <div class="widget-header icontext">
                            <a href="#" class="icon icon-sm rounded-circle border">
                                <i class="fa fa-user"></i>
                            </a>
                            <div class="text">
                                <span class="text-muted">Welcome!</span>
                                <div>
                                    <a href="{{ route('login') }}">Sign in</a> |
                                    <a href="{{ route('register') }}"> Register</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- widgets-wrap.// -->
                </div>
                <!-- col.// -->
            </div>
            <!-- row.// -->
        </div>
        <!-- container.// -->
    </section>
    <!-- header-main .// -->
</header>
