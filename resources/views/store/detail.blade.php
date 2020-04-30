@extends('welcome')

@section('content')

    <section class="section-intro py-4">
        <div class="container">
            <div class="intro-banner-wrap">
                <img src="{{ asset('images/banner.jpg') }}" class="img-fluid rounded" alt="homepage banner">
            </div>
        </div>
    </section>

    <section class="section-content padding-y bg">

        <div class="container">

            <div class="card">
                <div class="row no-gutters">
                    <aside class="col-sm-6 border-right">
                        <article class="gallery-wrap">
                            <div class="img-big-wrap">
                                <a href="#">
                                    <img src="{{ asset('images/items/4.jpg') }}" alt="product image">
                                </a>
                            </div>
                            <!-- img-big-wrap.// -->
                            <div class="thumbs-wrap">
                                <a href="#" class="item-thumb">
                                    <img src="{{ asset('images/items/4.jpg') }}" alt="product image">
                                </a>
                                <a href="#" class="item-thumb">
                                    <img src="{{ asset('images/items/4.jpg') }}" alt="product image">
                                </a>
                                <a href="#" class="item-thumb">
                                    <img src="{{ asset('images/items/4.jpg') }}" alt="product image">
                                </a>
                                <a href="#" class="item-thumb">
                                    <img src="{{ asset('images/items/4.jpg') }}" alt="product image">
                                </a>
                            </div>
                            <!-- thumbs-wrap.// -->
                        </article>
                        <!-- gallery-wrap .end// -->
                    </aside>
                    <main class="col-sm-6">
                        <article class="content-body">
                            <h2 class="title">Great demo product name</h2>

                            <p>Here goes description consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco. Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed
                                do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris.</p>
                            <ul class="list-normal cols-two">
                                <li>Not just for commute</li>
                                <li>Branded tongue and cuff</li>
                                <li>Super fast and amazing</li>
                                <li>Lorem sed do eiusmod tempor</li>
                                <li>Easy fast and ver good</li>
                                <li>Lorem sed do eiusmod tempor</li>
                            </ul>

                            <div class="h3 mb-4">
                                <var class="price h4">$815.00</var>
                            </div>
                            <!-- price-wrap.// -->

                            <div class="form-row d-flex">
                                <div class="col-md-6">
                                    <div class="input-group mb-3 input-spinner">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-light" type="button" id="button-plus"> + </button>
                                        </div>
                                        <input type="text" class="form-control" value="1">
                                        <div class="input-group-append">
                                            <button class="btn btn-light" type="button" id="button-minus"> − </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-primary">
                                        Add to cart
                                        <i class="fas fa-shopping-cart"></i>
                                    </button>
                                </div>
                                <!-- col.// -->
                            </div>
                            <!-- row.// -->

                        </article>
                        <!-- product-info-aside .// -->
                    </main>
                    <!-- col.// -->
                </div>
                <!-- row.// -->
            </div>

        </div>

    </section>

@endsection
