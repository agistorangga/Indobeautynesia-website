@extends('layouts.front.index')

@section('content')
    <main>
        <div class="section">
            <div class="container">
                <div class="wrap">
                    <div class="product dotgrid">
                        <div class="wrapper">
                            <div class="image">
                                <div class="outer-main">
                                    <div class="main-image swiper">
                                        <div class="wrap swiper-wrapper">
                                            <div class="item swiper-slide"><img
                                                    src="{{ asset('photoproduct/' . $product->photo) }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="summary">
                                <div class="entry">
                                    <h1 class="title">{{ $product->name }}</h1>
                                    <div class="product-group">
                                        @if ($product->promo)
                                            <div class="product-price">
                                                <span class="current">Rp
                                                    {{ number_format(($product->price * (100 - $product->promo->discount)) / 100) }}</span>
                                                <div class="wrap">
                                                    <span class="before">Rp {{ number_format($product->price) }}</span>
                                                    <span class="discount">-{{ $product->promo->discount }}%</span>
                                                </div>
                                            </div>
                                        @else
                                            <div class="product-price">
                                                <span class="current">Rp
                                                    {{ number_format($product->price) }}</span>
                                            </div>
                                        @endif

                                    </div>
                                    <div class="product-stock">
                                        <div class="wrap">
                                            <strong>Stock</strong>
                                            <span class="grey-color">selalu ada</span>
                                            <i class="ri-checkbox-circle-line"></i>
                                        </div>
                                    </div>
                                    <a
                                        href="https://wa.me/6281231230123?text=Halo,%20saya%20ingin%20memesan%20product%20{{ $product->name }}%20{{ $product->size }}">
                                        <div class="product-action">
                                            <div class="buynow button">
                                                <button type="submit" class="secondary-btn">Buy Now</button>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="shipping">
                                        <ul>
                                            <li>
                                                <i class="ri-gift-line"></i>
                                                <span>Order via</span>
                                                <span class="grey-color">Tokopedia, Lazada, Shopee</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product detail">
                        <div class="wrapper tabbed">
                            <nav class="list-inline scrollto">
                                <ul class="wrapper">
                                    <li class="active"><a href=""><span>Description</span></a></li>
                                </ul>
                            </nav>
                            <!-- product description starts -->
                            <div id="product-description" class="product-about description active">
                                <div class="text-block">
                                    <h3>{{ $product->name }}</h3>
                                </div>

                                <div class="dotgrid">
                                    <div class="wrapper">
                                        <div class="list-block">
                                            <h4>Highlights :</h4>
                                            <p class="grey-color">
                                                {{ $product->description }}
                                            </p>
                                        </div>
                                        <div class="list-block">
                                            <h4>Package Weight :</h4>
                                            <p class="grey-color">{{ $product->package_weight }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product description ends -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
