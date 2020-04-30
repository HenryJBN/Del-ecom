@extends('welcome')

@section('content')

    <section class="section-pagetop bg">
        <div class="container">
            <h2 class="title-page">Shopping Cart</h2>
            <nav>
                <ol class="breadcrumb text-white">
                    <li class="breadcrumb-item">
                        <a href="{{ route('index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Shopping cart</li>
                </ol>
            </nav>
        </div>
        <!-- container //  -->
    </section>

    <section class="section-content pb-5 bg">
        <div class="container">

            <div class="card">
                <div class="row no-gutters">
                    <aside class="col-md-9">
                        <article class="card-body border-bottom">
                            <div class="row">
                                <div class="col-md-7">
                                    <figure class="media">
                                        <div class="img-wrap mr-3"><img src="../images/items/1.jpg"
                                                                        class="border img-sm"></div>
                                        <figcaption class="media-body">
                                            <a href="#" class="title h6">Some name of item goes here nice </a>
                                            <div class="price-wrap">&#x20A6;1280</div>
                                        </figcaption>
                                    </figure>
                                </div> <!-- col.// -->
                                <div class="col-md-5 text-md-right text-right">
                                    <div class="input-group input-spinner">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-light" type="button" id="button-plus"> +</button>
                                        </div>
                                        <input type="text" class="form-control" value="1">
                                        <div class="input-group-append">
                                            <button class="btn btn-light" type="button" id="button-minus"> −</button>
                                        </div>
                                    </div> <!-- input-group.// -->
                                    <a href="#" class="btn btn-light"> <i class="fa fa-trash"></i> </a>
                                </div>
                            </div> <!-- row.// -->
                        </article> <!-- card-group.// -->
                        <article class="card-body border-bottom">
                            <div class="row">
                                <div class="col-md-7">
                                    <figure class="media">
                                        <div class="img-wrap mr-3"><img src="../images/items/2.jpg"
                                                                        class="border img-sm"></div>
                                        <figcaption class="media-body">
                                            <a href="#" class="title h6">Product name goes here nice </a>
                                            <div class="price-wrap">&#x20A6;1280</div>
                                        </figcaption>
                                    </figure>
                                </div> <!-- col.// -->
                                <div class="col-md-5 text-md-right text-right">
                                    <div class="input-group input-spinner">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-light" type="button" id="button-plus"> +</button>
                                        </div>
                                        <input type="text" class="form-control" value="1">
                                        <div class="input-group-append">
                                            <button class="btn btn-light" type="button" id="button-minus"> −</button>
                                        </div>
                                    </div> <!-- input-group.// -->
                                    <a href="#" class="btn btn-light"> <i class="fa fa-trash"></i> </a>
                                </div>
                            </div> <!-- row.// -->
                        </article> <!-- card-group.// -->
                        <article class="card-body border-bottom">
                            <div class="row">
                                <div class="col-md-7">
                                    <figure class="media">
                                        <div class="img-wrap mr-3"><img src="../images/items/3.jpg"
                                                                        class="border img-sm"></div>
                                        <figcaption class="media-body">
                                            <a href="#" class="title h6">Another name of some product goes just </a>
                                            <div class="price-wrap">&#x20A6;1280</div>
                                        </figcaption>
                                    </figure>
                                </div> <!-- col.// -->
                                <div class="col-md-5 text-md-right text-right">
                                    <div class="input-group input-spinner">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-light" type="button" id="button-plus"> +</button>
                                        </div>
                                        <input type="text" class="form-control" value="1">
                                        <div class="input-group-append">
                                            <button class="btn btn-light" type="button" id="button-minus"> −</button>
                                        </div>
                                    </div> <!-- input-group.// -->
                                    <a href="#" class="btn btn-light"> <i class="fa fa-trash"></i> </a>
                                </div>
                            </div> <!-- row.// -->
                        </article> <!-- card-group.// -->
                    </aside> <!-- col.// -->
                    <aside class="col-md-3 border-left">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Have coupon?</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="" placeholder="Coupon code">
                                    <span class="input-group-append">
				<button class="btn btn-primary">Apply</button>
			</span>
                                </div>
                            </div>
                            <dl class="dlist-align">
                                <dt>Total price:</dt>
                                <dd class="text-right">&#x20A6;69.00</dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt>Discount:</dt>
                                <dd class="text-right text-danger">- &#x20A6;13.00</dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt>Total:</dt>
                                <dd class="text-right text-dark b"><strong>&#x20A6;80.45</strong></dd>
                            </dl>
                            <hr>
                            <a href="#" class="btn btn-primary btn-block"> Check Out </a>
                            <a href="#" class="btn btn-light btn-block">Continue Shopping</a>
                        </div> <!-- card-body.// -->
                    </aside> <!-- col.// -->
                </div> <!-- row.// -->
            </div>
            <!-- card.// -->

        </div>
        <!-- container .//  -->
    </section>

@endsection
