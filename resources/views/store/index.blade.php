@extends('welcome')

@section('content')

    <section class="section-intro py-4">
        <div class="container">
            <div class="intro-banner-wrap">
                <img src="{{ asset('images/banner.jpg') }}" class="img-fluid rounded" alt="homepage banner">
            </div>
        </div>
    </section>

    <section class="section-content py-4">
        <div class="container">
            <article class="card card-body">
                <div class="row">
                    <div class="col-md-4">
                        <figure class="item-feature">
                            <span class="text-primary"><i class="fa fa-2x fa-truck"></i></span>
                            <figcaption class="pt-3">
                                <h5 class="title">Fast delivery</h5>
                                <p>Dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore </p>
                            </figcaption>
                        </figure> <!-- iconbox // -->
                    </div><!-- col // -->
                    <div class="col-md-4">
                        <figure class="item-feature">
                            <span class="text-primary"><i class="fa fa-2x fa-landmark"></i></span>
                            <figcaption class="pt-3">
                                <h5 class="title">Creative Strategy</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                </p>
                            </figcaption>
                        </figure> <!-- iconbox // -->
                    </div><!-- col // -->
                    <div class="col-md-4">
                        <figure class="item-feature">
                            <span class="text-primary"><i class="fa fa-2x fa-lock"></i></span>
                            <figcaption class="pt-3">
                                <h5 class="title">High secured </h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                </p>
                            </figcaption>
                        </figure> <!-- iconbox // -->
                    </div> <!-- col // -->
                </div>
            </article>

        </div> <!-- container .//  -->
    </section>

    <section class="section-name py-2">
        <div class="container">

            <header class="section-heading d-flex justify-content-between">
                <h3 class="section-title">Popular</h3>
                <a href="#" class="btn btn-outline-primary">See all</a>
            </header>
            <!-- sect-heading -->


            <div class="row">

                <div class="col-md-3">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap">
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
                <div class="col-md-3">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap">
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

                <div class="col-md-3">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap">
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

                <div class="col-md-3">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap">
                            <img src="{{ asset('images/items/4.jpg') }}" alt="product image">
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

            </div>
            <!-- row.// -->

        </div>

        <!-- container // -->

    </section>

    <section class="section-content py-2">
        <div class="container">

            <header class="section-heading d-flex justify-content-between">
                <h3 class="section-title">Newly Arrived</h3>
                <a href="#" class="btn btn-outline-primary">See all</a>
            </header>

            <div class="row">
                <div class="col-md-3">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap">
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

                <div class="col-md-3">
                    <div class="card card-product-grid">

                        <a href="#" class="img-wrap">
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
                <div class="col-md-3">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap">
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
                <div class="col-md-3">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap">
                            <img src="{{ asset('images/items/9.jpg') }}" alt="product image">
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
            </div>
            <!-- row.// -->
        </div>
        <!-- container .//  -->
    </section>

    <section class="section-content py-2">
        <div class="container">

            <header class="section-heading d-flex justify-content-between">
                <h3 class="section-title">Recommended</h3>
                <a href="#" class="btn btn-outline-primary">See all</a>
            </header>
            <!-- sect-heading -->

            <div class="row">

                <div class="col-md-3">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap">
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
                <div class="col-md-3">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap">
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

                <div class="col-md-3">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap">
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

                <div class="col-md-3">
                    <div class="card card-product-grid">
                        <a href="#" class="img-wrap">
                            <img src="{{ asset('images/items/8.jpg') }}" alt="product image">
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

            </div>


        </div> <!-- container .//  -->
    </section>

@endsection
