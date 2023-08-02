@extends('layouts.front.index')

@section('content')
    <main>
        <div class="section">
            <div class="container">
                <div class="wrap">
                    <div class="product detail">
                        <div class="wrapper tabbed">
                            <!-- product custom starts -->
                            <div id="product-custom" class="product-about custom active">
                                <h3>ABOUT US</h3>
                                <div class="image">
                                    <img src="assets/products/custom-size.jpg" alt="">
                                </div>
                            </div>
                            <!-- product custom ends -->
                            <!-- product description starts -->
                            <div id="product-description" class="product-about description">
                                <div class="text-block">
                                    <h3>WHO WE ARE</h3>
                                    <div class="grey-color">
                                        <p>{{ $global->description }}</p>
                                    </div>
                                </div>

                                <div class="dotgrid">
                                    <div class="wrapper">
                                        <div class="list-block">
                                            <h4>Contact</h4>
                                            <p class="grey-color">{{ $global->address }}</p>
                                            <p class="grey-color">{{ $global->phone }}</p>
                                            <p class="grey-color">{{ $global->email }}</p>
                                            <p class="grey-color">{{ $global->opening1 }}</p>
                                            <p class="grey-color">{{ $global->opening2 }}</p>
                                        </div>
                                        <div class="list-block">
                                            <h4>Our Social Media</h4>
                                            <p><a href="{{ $global->instagram }}">Instagram</a></p>
                                            <p><a href="{{ $global->whatsapp }}">Whatsapp</a></p>
                                            <p><a href="{{ $global->tiktok }}">TikTok</a></p>
                                        </div>
                                        <div class="list-block">
                                            <h4>Our Shop</h4>
                                            <p><a href="{{ $global->lazada }}">Lazada</a></p>
                                            <p><a href="{{ $global->shopee }}">Shopee</a></p>
                                            <p><a href="{{ $global->tokopedia }}">Tokopedia</a></p>
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
