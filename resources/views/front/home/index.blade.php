@extends('layouts.front.index')

@section('content')
    <main>
        <!-- Hero Slider starts -->
        <div class="slider">
            <div class="sliderbox swiper">
                <div class="wrap swiper-wrapper">
                    @foreach ($promo as $item)
                        <div class="item-banner swiper-slide">
                            <div class="image">
                                <div class="ob-cover">
                                    <img src="{{ asset('photopromo/' . $item->photo) }}" alt="">
                                </div>
                                <div class="title-info">
                                    <div class="container wide">
                                        <div class="wrap">
                                            <span class="price">promo</span>
                                            <h3 class="title">Discount up to {{ $item->discount }}%</h3>
                                            <div class="button"><a href="{{ route('promo', [$item->id]) }}"
                                                    class="secondary-btn">Shop Now</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="custom-pagination">
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
        <!-- Hero Slider ends -->

        <!-- Guide starts -->
        @if (count($promo) > 0)
            <div class="guide">
                <div class="container">
                    <div class="wrap">
                        <div class="heading">
                            <h2 class="title">Promo</h2>
                        </div>
                        <div class="dotgrid scrollto">
                            <div class="wrapper">
                                @foreach ($promo as $item)
                                    <a href="{{ route('promo', [$item->id]) }}">
                                        <div class="item">
                                            <div class="dot-image">
                                                <div class="thumbnail hover">
                                                    <img src="{{ asset('photopromo/' . $item->photo) }}" alt="">
                                                </div>
                                            </div>
                                            <div class="dot-info">
                                                <h3 class="dot-title">{{ $item->name }}</h3>
                                                <p class="grey-color">{{ $item->description }}</p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- Guide ends -->

        <!-- New Arrival starts -->
        <div class="carousel">
            <div class="container">
                <div class="wrap">
                    <div class="heading">
                        <h2 class="title">New Arrivals</h2>
                    </div>
                    <div class="inner-wrapper">
                        <div class="dotgrid carouselbox swiper">
                            <!-- copy from mega menu structure -->
                            <div class="wrapper swiper-wrapper">
                                @foreach ($new_arrival as $item)
                                    <div class="item swiper-slide">
                                        <div class="dot-image">
                                            <a href="{{ route('product.detail', [$item->id]) }}"
                                                class="product-permalink"></a>
                                            <div class="thumbnail">
                                                <img src="{{ asset('photoproduct/' . $item->photo) }}" alt="">
                                            </div>
                                            <div class="actions">
                                                <ul>
                                                    <li><a href="{{ route('product.detail', [$item->id]) }}"><i
                                                                class="ri-eye-line"></i></a></li>
                                                </ul>
                                            </div>
                                            @if ($item->promo && $item->promo_id != null)
                                                <div class="label"><span>-{{ $item->promo->discount }}%</span></div>
                                            @endif
                                        </div>
                                        <div class="dot-info">
                                            <h2 class="dot-title">
                                                <a
                                                    href="{{ route('product.detail', [$item->id]) }}">{{ $item->name }}</a>
                                            </h2>
                                            @if ($item->promo && $item->promo_id != null)
                                                <div class="product-price">
                                                    <span class="before">Rp {{ number_format($item->price) }}</span>
                                                    <span class="current">Rp
                                                        {{ number_format(($item->price * (100 - $item->promo->discount)) / 100) }}</span>
                                                </div>
                                            @else
                                                <div class="product-price">
                                                    <span class="current">Rp {{ number_format($item->price) }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="nav">
                            <div class="swiper-button-next">
                                <i class="ri-arrow-right-line"></i>
                            </div>
                            <div class="swiper-button-prev">
                                <i class="ri-arrow-left-line"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New Arrival ends -->

        <!-- Category starts -->
        <div class="bycats">
            <div class="container">
                <div class="wrap">
                    <div class="heading sort-list tabs">
                        <!-- <span class="grey-color">Categories</span> -->
                        <div class="wrap">
                            <h3 class="opt-trigger">
                                <span class="value">Skincare</span>
                                <i class="ri-arrow-down-s-line"></i>
                            </h3>
                            <ul>
                                @foreach ($categories as $category)
                                    <li><a data-id="category-{{ $category->id }}" href="#0"
                                            class="tabbed-trigger">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>

                        </div>

                    </div>

                    <div class="tabbed">
                        @foreach ($categories as $category)
                            <div id="category-{{ $category->id }}" class="sort-data">
                                <div class="dotgrid">
                                    <div class="wrapper">
                                        <!-- copy item from carousel -->
                                        @foreach ($category->products as $product)
                                            <div class="item">
                                                <div class="dot-image">
                                                    <div class="thumbnail">
                                                        <a href="{{ route('product.detail', [$product->id]) }}">
                                                            <img src="{{ asset('photoproduct/' . $product->photo) }}"
                                                                alt="">
                                                        </a>
                                                    </div>
                                                    <div class="actions">
                                                        <ul>
                                                            <li><a href="{{ route('product.detail', [$product->id]) }}"><i
                                                                        class="ri-eye-line"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    @if ($product->promo && $product->promo_id != null)
                                                        <div class="label">
                                                            <span>-{{ $product->promo->discount }}%</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="dot-info">
                                                    <h2 class="dot-title">
                                                        <a href="">{{ $product->name }}</a>
                                                    </h2>
                                                    @if ($product->promo && $product->promo_id != null)
                                                        <div class="product-price">
                                                            <span class="before">Rp
                                                                {{ number_format($product->price) }}</span>
                                                            <span class="current">
                                                                Rp
                                                                {{ number_format(($product->price * (100 - $product->promo->discount)) / 100) }}
                                                            </span>
                                                        </div>
                                                    @else
                                                        <div class="product-price">
                                                            <span class="current">Rp
                                                                {{ number_format($product->price) }}</span>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
        <!-- Category ends -->

        <!-- Skincare Package starts -->
        @if (count($packages) > 0)
            <div class="carousel">
                <div class="container">
                    <div class="wrap">
                        <div class="heading">
                            <h2 class="title">Skincare Package</h2>
                        </div>
                        <div class="inner-wrapper">
                            <div class="dotgrid carouselbox swiper">
                                <!-- copy from mega menu structure -->
                                <div class="wrapper swiper-wrapper">
                                    @foreach ($packages as $item)
                                        <div class="item swiper-slide">
                                            <div class="dot-image">
                                                <a href="{{ route('product.detail', [$item->id]) }}"
                                                    class="product-permalink"></a>
                                                <div class="thumbnail">
                                                    <img src="{{ asset('photoproduct/' . $item->photo) }}"
                                                        alt="">
                                                </div>
                                                <div class="actions">
                                                    <ul>
                                                        <li><a href="{{ route('product.detail', [$item->id]) }}"><i
                                                                    class="ri-eye-line"></i></a></li>
                                                    </ul>
                                                </div>
                                                @if ($item->promo && $item->promo_id != null)
                                                    <div class="label">
                                                        <span>-{{ $item->promo->discount }}%</span>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="dot-info">
                                                <h2 class="dot-title">
                                                    <a
                                                        href="{{ route('product.detail', [$item->id]) }}">{{ $item->name }}</a>
                                                </h2>
                                                @if ($item->promo)
                                                    <div class="product-price">
                                                        <span class="before">Rp {{ number_format($item->price) }}</span>
                                                        <span class="current">Rp
                                                            {{ number_format(($item->price * (100 - $item->promo->discount)) / 100) }}</span>
                                                    </div>
                                                @else
                                                    <div class="product-price">
                                                        <span class="current">Rp {{ number_format($item->price) }}</span>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="nav">
                                <div class="swiper-button-next">
                                    <i class="ri-arrow-right-line"></i>
                                </div>
                                <div class="swiper-button-prev">
                                    <i class="ri-arrow-left-line"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- Skincare Package ends -->

        <!-- Banner starts -->
        <div class="banner">
            <div class="container">
                <div class="wrap">
                    @if ($promo_footer)
                        <div class="content">
                            <div class="content-writing">
                                <span>Promo</span>
                                <h3 class="title">Get Ready for {{ $promo_footer->name }} !</h3>
                                <div class="button"><a href="{{ route('promo', [$promo_footer->id]) }}"
                                        class="primary-btn">Shop Now</a>
                                </div>
                            </div>
                            <div class="content-image">
                                <img src="{{ asset('photopromo/' . $promo_footer->photo) }}" alt="">
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- Banner ends -->

        <!-- Social Media starts -->
        <div class="brands">
            <div class="logo-wrapper" style="">
                @foreach ($brands as $brand)
                    <div class="brand" style="">
                        <a href="{{ route('product.all') }}?brand_id={{ $brand->id }} ">
                            <div class="logo-brand">
                                <img src="{{ asset($brand->image) }}" alt="">
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Social Media ends -->
    </main>
@endsection
