@extends('welcome')

@section('content')

    <section class="section-pagetop bg">
        <div class="container">
            <h2 class="title-page">Category</h2>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Category name</a></li>
                    <li class="breadcrumb-item"><a href="#">Sub category</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Items</li>
                </ol>
            </nav>
        </div>
        <!-- container //  -->
    </section>

    <section class="section-content pb-5 bg">
        <div class="container">

            <div class="row">

                <div class="col-md-3">
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
                <div class="col-md-3">
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

                <div class="col-md-3">
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

                <div class="col-md-3">
                    <div class="card card-product-grid">
                        <a href="{{ route('productDetail') }}" class="img-wrap">
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

            <div class="row">
                <div class="col-md-3">
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

                <div class="col-md-3">
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
                <div class="col-md-3">
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
                <div class="col-md-3">
                    <div class="card card-product-grid">
                        <a href="{{ route('productDetail') }}" class="img-wrap">
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

            <div class="row">

                <div class="col-md-3">
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
                <div class="col-md-3">
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

                <div class="col-md-3">
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

                <div class="col-md-3">
                    <div class="card card-product-grid">
                        <a href="{{ route('productDetail') }}" class="img-wrap">
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

            <nav aria-label="Page navigation sample" class="float-right">
                <ul class="pagination">
                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>

        </div>
        <!-- container .//  -->
    </section>

@endsection
