@extends('welcome')

@section('content')

    <section class="section-pagetop bg">
        <div class="container">
            <h2 class="title-page">Search results</h2>
            <nav>
                <ol class="breadcrumb text-white">
                    <li class="breadcrumb-item">
                        <a href="{{ route('index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Search results</li>
                </ol>
            </nav>
        </div>
        <!-- container //  -->
    </section>

    <section class="section-content padding-y">
        <div class="container">

            <div class="row">
                <aside class="col-md-3">

                    <div class="card">
                        <article class="filter-group">
                            <header class="card-header">
                                <a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true" class="">
                                    <i class="icon-control fa fa-chevron-down"></i>
                                    <h6 class="title">Product type</h6>
                                </a>
                            </header>
                            <div class="filter-content collapse show" id="collapse_1" style="">
                                <div class="card-body">
                                    <ul class="list-menu">
                                        <li><a href="#">People  </a></li>
                                        <li><a href="#">Watches </a></li>
                                        <li><a href="#">Cinema  </a></li>
                                        <li><a href="#">Clothes  </a></li>
                                        <li><a href="#">Home items </a></li>
                                        <li><a href="#">Animals</a></li>
                                        <li><a href="#">People </a></li>
                                    </ul>

                                </div>
                                <!-- card-body.// -->
                            </div>
                        </article> <!-- filter-group  .// -->
                        <article class="filter-group">
                            <header class="card-header">
                                <a href="#" data-toggle="collapse" data-target="#collapse_2" aria-expanded="true" class="">
                                    <i class="icon-control fa fa-chevron-down"></i>
                                    <h6 class="title">Brands </h6>
                                </a>
                            </header>
                            <div class="filter-content collapse show" id="collapse_2" style="">
                                <div class="card-body">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" checked="" class="custom-control-input">
                                        <div class="custom-control-label">Nikon
                                            <b class="badge badge-pill badge-light float-right">120</b>  </div>
                                    </label>
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" checked="" class="custom-control-input">
                                        <div class="custom-control-label">Canon
                                            <b class="badge badge-pill badge-light float-right">15</b>  </div>
                                    </label>
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" checked="" class="custom-control-input">
                                        <div class="custom-control-label">Samsung
                                            <b class="badge badge-pill badge-light float-right">35</b> </div>
                                    </label>
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" checked="" class="custom-control-input">
                                        <div class="custom-control-label">Apple
                                            <b class="badge badge-pill badge-light float-right">89</b> </div>
                                    </label>
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input">
                                        <div class="custom-control-label">OnePlus
                                            <b class="badge badge-pill badge-light float-right">30</b>  </div>
                                    </label>
                                </div> <!-- card-body.// -->
                            </div>
                        </article> <!-- filter-group .// -->
                        <article class="filter-group">
                            <header class="card-header">
                                <a href="#" data-toggle="collapse" data-target="#collapse_3" aria-expanded="false" class="">
                                    <i class="icon-control fa fa-chevron-down"></i>
                                    <h6 class="title">Price range </h6>
                                </a>
                            </header>
                            <div class="filter-content collapse show" id="collapse_3" style="">
                                <div class="card-body">
                                    <input type="range" class="custom-range" min="0" max="100" name="">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Min</label>
                                            <input class="form-control" placeholder="&#x20A6;0" type="number">
                                        </div>
                                        <div class="form-group text-right col-md-6">
                                            <label>Max</label>
                                            <input class="form-control" placeholder="&#x20A6;10,000" type="number">
                                        </div>
                                    </div> <!-- form-row.// -->
                                </div><!-- card-body.// -->
                            </div>
                        </article> <!-- filter-group .// -->
                        <article class="filter-group">
                            <header class="card-header">
                                <a href="#" data-toggle="collapse" data-target="#collapse_4" aria-expanded="true" class="">
                                    <i class="icon-control fa fa-chevron-down"></i>
                                    <h6 class="title">Sizes </h6>
                                </a>
                            </header>
                            <div class="filter-content collapse show" id="collapse_4" style="">
                                <div class="card-body">
                                    <label class="checkbox-btn">
                                        <input type="checkbox">
                                        <span class="btn btn-light"> XS </span>
                                    </label>

                                    <label class="checkbox-btn">
                                        <input type="checkbox">
                                        <span class="btn btn-light"> SM </span>
                                    </label>

                                    <label class="checkbox-btn">
                                        <input type="checkbox">
                                        <span class="btn btn-light"> LG </span>
                                    </label>

                                    <label class="checkbox-btn">
                                        <input type="checkbox">
                                        <span class="btn btn-light"> XXL </span>
                                    </label>
                                </div><!-- card-body.// -->
                            </div>
                        </article> <!-- filter-group .// -->
                        <article class="filter-group">
                            <header class="card-header">
                                <a href="#" data-toggle="collapse" data-target="#collapse_5" aria-expanded="false" class="">
                                    <i class="icon-control fa fa-chevron-down"></i>
                                    <h6 class="title">More filters </h6>
                                </a>
                            </header>
                            <div class="filter-content in collapse" id="collapse_5" style="">
                                <div class="card-body">
                                    <label class="custom-control custom-radio">
                                        <input type="radio" name="myfilter_radio" checked="" class="custom-control-input">
                                        <div class="custom-control-label">Any condition</div>
                                    </label>

                                    <label class="custom-control custom-radio">
                                        <input type="radio" name="myfilter_radio" class="custom-control-input">
                                        <div class="custom-control-label">Brand new </div>
                                    </label>

                                    <label class="custom-control custom-radio">
                                        <input type="radio" name="myfilter_radio" class="custom-control-input">
                                        <div class="custom-control-label">Used items</div>
                                    </label>

                                    <label class="custom-control custom-radio">
                                        <input type="radio" name="myfilter_radio" class="custom-control-input">
                                        <div class="custom-control-label">Very old</div>
                                    </label>
                                </div><!-- card-body.// -->
                            </div>
                        </article> <!-- filter-group .// -->
                        <button class="btn btn-block btn-primary mt-2">Apply</button>

                    </div> <!-- card.// -->

                </aside> <!-- col.// -->
                <main class="col-md-9">

                    <header class="border-bottom mb-4 pb-3">
                        <div class="form-inline">
                            <span class="mr-md-auto">32 Items found </span>
                            <select class="mr-2 form-control">
                                <option>Latest items</option>
                                <option>Trending</option>
                                <option>Most Popular</option>
                                <option>Cheapest</option>
                            </select>
                        </div>
                    </header>
                    <!-- sect-heading -->

                    <div class="row">

                        <div class="col-md-4">
                            <div class="card card-product-grid">
                                <a href="{{ route('productDetail') }}" class="img-wrap">
                                    <img src="{{ asset('images/items/1.jpg') }}" alt="product image">
                                </a>
                                <div class="card-body p-3">
                                    <p class="card-title">Just another product name</p>
                                    <p class="card-text price mt-1">&#x20A6;2,000.00</p>

                                    <div class="text-center mt-2">
                                        <button type="button" class="btn btn-primary">
                                            Add to cart
                                            <i class="fas fa-shopping-cart"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- col.// -->
                        <div class="col-md-4">
                            <div class="card card-product-grid">
                                <a href="{{ route('productDetail') }}" class="img-wrap">
                                    <img src="{{ asset('images/items/2.jpg') }}" alt="product image">
                                </a>
                                <div class="card-body p-3">
                                    <p class="card-title">Some item name here</p>
                                    <p class="card-text price mt-1">&#x20A6;2,800.00</p>
                                    <div class="text-center mt-2">
                                        <button type="button" class="btn btn-primary">
                                            Add to cart
                                            <i class="fas fa-shopping-cart"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- col.// -->

                        <div class="col-md-4">
                            <div class="card card-product-grid">
                                <a href="{{ route('productDetail') }}" class="img-wrap">
                                    <img src="{{ asset('images/items/3.jpg') }}" alt="product image">
                                </a>
                                <div class="card-body p-3">
                                    <p class="card-title">Great product name here</p>
                                    <p class="card-text price mt-1">&#x20A6;800.00</p>
                                    <div class="text-center mt-2">
                                        <button type="button" class="btn btn-primary">
                                            Add to cart
                                            <i class="fas fa-shopping-cart"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- col.// -->

                        <!-- col.// -->

                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-product-grid">
                                <a href="{{ route('productDetail') }}" class="img-wrap">
                                    <img src="{{ asset('images/items/5.jpg') }}" alt="product image">
                                </a>
                                <div class="card-body p-3">
                                    <p class="card-title">Just another product name</p>
                                    <p class="card-text price mt-1">&#x20A6;1,790.00</p>

                                    <div class="text-center mt-2">
                                        <button type="button" class="btn btn-primary">
                                            Add to cart
                                            <i class="fas fa-shopping-cart"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- col.// -->

                        <div class="col-md-4">
                            <div class="card card-product-grid">

                                <a href="{{ route('productDetail') }}" class="img-wrap">
                                    <img src="{{ asset('images/items/6.jpg') }}" alt="product image">
                                </a>

                                <div class="card-body p-3">
                                    <p class="card-title">Some item name here</p>
                                    <p class="card-text price mt-1">&#x20A6;1,790.00</p>

                                    <div class="text-center mt-2">
                                        <button type="button" class="btn btn-primary">
                                            Add to cart
                                            <i class="fas fa-shopping-cart"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- col.// -->
                        <div class="col-md-4">
                            <div class="card card-product-grid">
                                <a href="{{ route('productDetail') }}" class="img-wrap">
                                    <img src="{{ asset('images/items/7.jpg') }}" alt="product image">
                                </a>

                                <div class="card-body p-3">
                                    <p class="card-title">Great product name here</p>
                                    <p class="card-text price mt-1">&#x20A6;1,790.00</p>

                                    <div class="text-center mt-2">
                                        <button type="button" class="btn btn-primary">
                                            Add to cart
                                            <i class="fas fa-shopping-cart"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- col.// -->
                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="card card-product-grid">
                                <a href="{{ route('productDetail') }}" class="img-wrap">
                                    <img src="{{ asset('images/items/10.jpg') }}" alt="product image">
                                </a>
                                <div class="card-body p-3">
                                    <p class="card-title">Just another product name</p>
                                    <p class="card-text price mt-1">&#x20A6;2,000.00</p>

                                    <div class="text-center mt-2">
                                        <button type="button" class="btn btn-primary">
                                            Add to cart
                                            <i class="fas fa-shopping-cart"></i>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- col.// -->
                        <div class="col-md-4">
                            <div class="card card-product-grid">
                                <a href="{{ route('productDetail') }}" class="img-wrap">
                                    <img src="{{ asset('images/items/12-1.jpg') }}" alt="product image">
                                </a>
                                <div class="card-body p-3">
                                    <p class="card-title">Some item name here</p>
                                    <p class="card-text price mt-1">&#x20A6;2,800.00</p>

                                    <div class="text-center mt-2">
                                        <button type="button" class="btn btn-primary">
                                            Add to cart
                                            <i class="fas fa-shopping-cart"></i>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- col.// -->

                        <div class="col-md-4">
                            <div class="card card-product-grid">
                                <a href="{{ route('productDetail') }}" class="img-wrap">
                                    <img src="{{ asset('images/items/11.jpg') }}" alt="product image">
                                </a>
                                <div class="card-body p-3">
                                    <p class="card-title">Great product name here</p>
                                    <p class="card-text price mt-1">&#x20A6;800.00</p>

                                    <div class="text-center mt-2">
                                        <button type="button" class="btn btn-primary">
                                            Add to cart
                                            <i class="fas fa-shopping-cart"></i>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- col.// -->

                    </div>




                    {{--                    <article class="card card-product-list">--}}
{{--                        <div class="row no-gutters">--}}
{{--                            <aside class="col-md-3">--}}
{{--                                <a href="#" class="img-wrap">--}}
{{--                                    <span class="badge badge-danger"> NEW </span>--}}
{{--                                    <img src="images/items/3.jpg">--}}
{{--                                </a>--}}
{{--                            </aside> <!-- col.// -->--}}
{{--                            <div class="col-md-6">--}}
{{--                                <div class="info-main">--}}
{{--                                    <a href="#" class="h5 title"> Great product name goes here  </a>--}}
{{--                                    <div class="rating-wrap mb-3">--}}
{{--                                        <ul class="rating-stars">--}}
{{--                                            <li style="width:80%" class="stars-active">--}}
{{--                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i>--}}
{{--                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i>--}}
{{--                                                <i class="fa fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i>--}}
{{--                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i>--}}
{{--                                                <i class="fa fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                        <div class="label-rating">7/10</div>--}}
{{--                                    </div> <!-- rating-wrap.// -->--}}

{{--                                    <p> Take it as demo specs, ipsum dolor sit amet, consectetuer adipiscing elit, Lorem ipsum dolor sit amet, consectetuer adipiscing elit, Ut wisi enim ad minim veniam </p>--}}
{{--                                </div> <!-- info-main.// -->--}}
{{--                            </div> <!-- col.// -->--}}
{{--                            <aside class="col-sm-3">--}}
{{--                                <div class="info-aside">--}}
{{--                                    <div class="price-wrap">--}}
{{--                                        <span class="price h5"> $140 </span>--}}
{{--                                        <del class="price-old"> $198</del>--}}
{{--                                    </div> <!-- info-price-detail // -->--}}
{{--                                    <p class="text-success">Free shipping</p>--}}
{{--                                    <br>--}}
{{--                                    <p>--}}
{{--                                        <a href="#" class="btn btn-primary btn-block"> Details </a>--}}
{{--                                        <a href="#" class="btn btn-light btn-block"><i class="fa fa-heart"></i>--}}
{{--                                            <span class="text">Add to wishlist</span>--}}
{{--                                        </a>--}}
{{--                                    </p>--}}
{{--                                </div> <!-- info-aside.// -->--}}
{{--                            </aside> <!-- col.// -->--}}
{{--                        </div> <!-- row.// -->--}}
{{--                    </article> <!-- card-product .// -->--}}


{{--                    <article class="card card-product-list">--}}
{{--                        <div class="row no-gutters">--}}
{{--                            <aside class="col-md-3">--}}
{{--                                <a href="#" class="img-wrap"><img src="images/items/4.jpg"></a>--}}
{{--                            </aside> <!-- col.// -->--}}
{{--                            <div class="col-md-6">--}}
{{--                                <div class="info-main">--}}
{{--                                    <a href="#" class="h5 title"> Great product name goes here  </a>--}}
{{--                                    <div class="rating-wrap mb-3">--}}
{{--                                        <ul class="rating-stars">--}}
{{--                                            <li style="width:80%" class="stars-active">--}}
{{--                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i>--}}
{{--                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i>--}}
{{--                                                <i class="fa fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i>--}}
{{--                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i>--}}
{{--                                                <i class="fa fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                        <div class="label-rating">7/10</div>--}}
{{--                                    </div> <!-- rating-wrap.// -->--}}

{{--                                    <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, Lorem ipsum dolor sit amet, consectetuer adipiscing elit, Ut wisi enim ad minim veniam </p>--}}
{{--                                </div> <!-- info-main.// -->--}}
{{--                            </div> <!-- col.// -->--}}
{{--                            <aside class="col-sm-3">--}}
{{--                                <div class="info-aside">--}}
{{--                                    <div class="price-wrap">--}}
{{--                                        <span class="price h5"> $56 </span>--}}
{{--                                        <del class="price-old"> $85</del>--}}
{{--                                    </div> <!-- info-price-detail // -->--}}
{{--                                    <p class="text-success">Free shipping</p>--}}
{{--                                    <br>--}}
{{--                                    <p>--}}
{{--                                        <a href="#" class="btn btn-primary btn-block"> Details </a>--}}
{{--                                        <a href="#" class="btn btn-light btn-block"><i class="fa fa-heart"></i>--}}
{{--                                            <span class="text">Add to wishlist</span></a>--}}
{{--                                    </p>--}}
{{--                                </div> <!-- info-aside.// -->--}}
{{--                            </aside> <!-- col.// -->--}}
{{--                        </div> <!-- row.// -->--}}
{{--                    </article> <!-- card-product .// -->--}}

{{--                    <article class="card card-product-list">--}}
{{--                        <div class="row no-gutters">--}}
{{--                            <aside class="col-md-3">--}}
{{--                                <a href="#" class="img-wrap"><img src="images/items/5.jpg"></a>--}}
{{--                            </aside> <!-- col.// -->--}}
{{--                            <div class="col-md-6">--}}
{{--                                <div class="info-main">--}}
{{--                                    <a href="#" class="h5 title"> Great product name goes here  </a>--}}
{{--                                    <div class="rating-wrap mb-3">--}}
{{--                                        <ul class="rating-stars">--}}
{{--                                            <li style="width:80%" class="stars-active">--}}
{{--                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i>--}}
{{--                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i>--}}
{{--                                                <i class="fa fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i>--}}
{{--                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i>--}}
{{--                                                <i class="fa fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                        <div class="label-rating">7/10</div>--}}
{{--                                    </div> <!-- rating-wrap.// -->--}}

{{--                                    <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, Lorem ipsum dolor sit amet, consectetuer adipiscing elit, Ut wisi enim ad minim veniam </p>--}}
{{--                                </div> <!-- info-main.// -->--}}
{{--                            </div> <!-- col.// -->--}}
{{--                            <aside class="col-sm-3">--}}
{{--                                <div class="info-aside">--}}
{{--                                    <div class="price-wrap">--}}
{{--                                        <span class="price h5"> $56.00 </span>--}}
{{--                                    </div> <!-- info-price-detail // -->--}}
{{--                                    <p class="text-success">Free shipping</p>--}}
{{--                                    <br>--}}
{{--                                    <p>--}}
{{--                                        <a href="#" class="btn btn-primary btn-block"> Details </a>--}}
{{--                                        <a href="#" class="btn btn-light btn-block"><i class="fa fa-heart"></i>--}}
{{--                                            <span class="text">Add to wishlist</span>--}}
{{--                                        </a>--}}
{{--                                    </p>--}}
{{--                                </div> <!-- info-aside.// -->--}}
{{--                            </aside> <!-- col.// -->--}}
{{--                        </div> <!-- row.// -->--}}
{{--                    </article> <!-- card-product .// -->--}}

{{--                    <article class="card card-product-list">--}}
{{--                        <div class="row no-gutters">--}}
{{--                            <aside class="col-md-3">--}}
{{--                                <a href="#" class="img-wrap"><img src="images/items/6.jpg"></a>--}}
{{--                            </aside> <!-- col.// -->--}}
{{--                            <div class="col-md-6">--}}
{{--                                <div class="info-main">--}}
{{--                                    <a href="#" class="h5 title"> Product name can be here  </a>--}}
{{--                                    <div class="rating-wrap mb-3">--}}
{{--                                        <ul class="rating-stars">--}}
{{--                                            <li style="width:80%" class="stars-active">--}}
{{--                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i>--}}
{{--                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i>--}}
{{--                                                <i class="fa fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i>--}}
{{--                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i>--}}
{{--                                                <i class="fa fa-star"></i>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                        <div class="label-rating">7/10</div>--}}
{{--                                    </div> <!-- rating-wrap.// -->--}}

{{--                                    <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, Lorem ipsum dolor sit amet, consectetuer adipiscing elit, Ut wisi enim ad minim veniam </p>--}}
{{--                                </div> <!-- info-main.// -->--}}
{{--                            </div> <!-- col.// -->--}}
{{--                            <aside class="col-sm-3">--}}
{{--                                <div class="info-aside">--}}
{{--                                    <div class="price-wrap">--}}
{{--                                        <span class="price h5"> $62 </span>--}}
{{--                                    </div> <!-- info-price-detail // -->--}}
{{--                                    <p class="text-success">Free shipping</p>--}}
{{--                                    <br>--}}
{{--                                    <p>--}}
{{--                                        <a href="#" class="btn btn-primary btn-block"> Details </a>--}}
{{--                                        <a href="#" class="btn btn-light btn-block"><i class="fa fa-heart"></i>--}}
{{--                                            <span class="text">Add to wishlist</span>--}}
{{--                                        </a>--}}
{{--                                    </p>--}}
{{--                                </div> <!-- info-aside.// -->--}}
{{--                            </aside> <!-- col.// -->--}}
{{--                        </div> <!-- row.// -->--}}
{{--                    </article> <!-- card-product .// -->--}}




                    <nav aria-label="Page navigation sample">
                        <ul class="pagination">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>

                </main> <!-- col.// -->

            </div>

        </div> <!-- container .//  -->
    </section>

@endsection
