<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <!-- custom link css -->
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/style/css/style.css') }}">
    <!-- remix icon cdn -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <!-- js swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/indo/logo/logo.jpg') }}" />
</head>

<body>
    <div id="page" class="page-home">
        <header>
            <div class="inner-header">
                <div class="container wide">
                    <div class="wrap">
                        <div class="header-left">
                            <div class="menu-bar">
                                <a href="#0" class="menu-trigger" trigger-button data-target="mobile-menu"><i
                                        class="ri-menu-line"></i></a>
                            </div>
                            <div class="list-inline">
                                <ul>
                                </ul>
                            </div>
                        </div>
                        <div class="header-center">
                            <nav class="menu">
                                <ul>
                                    <li><a href="{{ route('home') }}"><span>Home</span></a></li>
                                    <li>
                                        <a href="{{ route('product.all') }}">
                                            <span>Products</span>
                                            <i class="ri-arrow-down-s-line"></i>
                                        </a>
                                        <ul class="sub-mega">
                                            <li>
                                                <div class="container">
                                                    <div class="wrapper">
                                                        <div class="mega-content">
                                                            <!-- thumbnail navbar starts -->
                                                            <div class="dotgrid">
                                                                <div class="wrapper">
                                                                    @foreach ($global->new_arrival as $item)
                                                                        <div class="item">
                                                                            <div class="dot-image">
                                                                                <a href="{{ route('product.detail', [$item->id]) }}"
                                                                                    class="product-permalink"></a>
                                                                                <div class="thumbnail">
                                                                                    <img src="{{ asset('photoproduct/' . $item->photo) }}"
                                                                                        alt="">
                                                                                </div>
                                                                                <div class="actions">
                                                                                    <ul>
                                                                                        <li><a href=""><i
                                                                                                    class="ri-eye-line"></i></a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                                @if ($item->promo)
                                                                                    <div class="label">
                                                                                        <span>-{{ $item->promo->discount }}%</span>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                            <div class="dot-info">
                                                                                <h2 class="dot-title">
                                                                                    <a
                                                                                        href="">{{ $item->name }}</a>
                                                                                </h2>
                                                                                @if ($item->promo)
                                                                                    <div class="product-price">
                                                                                        <span class="before">Rp
                                                                                            {{ number_format($item->price) }}</span>
                                                                                        <span class="current">Rp
                                                                                            {{ number_format(($item->price * (100 - $item->promo->discount)) / 100) }}</span>
                                                                                    </div>
                                                                                @else
                                                                                    <div class="product-price">
                                                                                        <span class="current">Rp
                                                                                            {{ number_format($item->price) }}</span>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <!-- thumbnail navbar ends -->
                                                            <div class="links">
                                                                <div class="list-block">
                                                                    <h3 class="dot-title">Categories</h3>
                                                                    <ul>
                                                                        @foreach ($global->categories as $category)
                                                                            <li><a
                                                                                    href="{{ route('product.all') }}?category_id={{ $category->id }} ">{{ $category->name }}</a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                                <div class="list-block">
                                                                    <h3 class="dot-title">Brands</h3>
                                                                    <ul>
                                                                        @foreach ($global->brands as $brand)
                                                                            <li><a
                                                                                    href="{{ route('product.all') }}?brand_id={{ $brand->id }} ">{{ $brand->name }}</a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <a href="">
                                            <span>Contact</span>
                                            <i class="ri-arrow-down-s-line"></i>
                                        </a>
                                        <ul class="sub-mega">
                                            <li>
                                                <div class="container">
                                                    <div class="wrapper">
                                                        <div class="mega-content">
                                                            <div class="links">
                                                                <div class="list-block">
                                                                    <h3 class="dot-title">Our Shop</h3>
                                                                    <ul>
                                                                        <li><a href="{{ $global->lazada }}"
                                                                                target="_blank">Lazada</a></li>
                                                                        <li><a href="{{ $global->shopee }}"
                                                                                target="_blank">Shopee</a></li>
                                                                        <li><a href="{{ $global->tokopedia }}"
                                                                                target="_blank">Tokopedia</a></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="list-block">
                                                                    <h3 class="dot-title">Our Social Media</h3>
                                                                    <ul>
                                                                        <li><a
                                                                                href="{{ $global->instagram }}">Instagram</a>
                                                                        </li>
                                                                        <li><a
                                                                                href="{{ $global->whatsapp }}">WhatsApp</a>
                                                                        </li>
                                                                        <li><a href="{{ $global->tiktok }}">TikTok</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('about') }}"><span>About</span></a></li>
                                    <li>
                                        <i class="ri-search-line search-btn"></i>
                                    </li>
                                </ul>
                            </nav>
                            <div class="branding">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('assets/indo/logo/logo.jpg') }}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="header-right">
                            <div class="list-inline">
                                <ul>
                                    <li><a href="#0" trigger-button data-target="search-float"
                                            style="display: none;"><i class="ri-search-line"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="search-float" class="search-float">
                    <div class="container wide">
                        <form action="" class="search">
                            <i class="ri-search-line"></i>
                            <input type="search" class="input" id="" placeholder="search products">
                            <i class="ri-close-line" close-button></i>
                        </form>
                    </div>
                </div>
            </div>
        </header>
        @yield('content')
        <!-- footer starts -->
        <footer>
            <div class="inner-footer">
                <div class="container">
                    <div class="wrap">
                        <div class="top">
                            <div class="list-block-">
                                <h3 class="dot-title">Our Shop</h3>
                                <ul>
                                    <li><a href="{{ $global->lazada }}" target="_blank">Lazada</a></li>
                                    <li><a href="{{ $global->shopee }}" target="_blank">Shopee</a></li>
                                    <li><a href="{{ $global->tokopedia }}" target="_blank">Tokopedia</a></li>
                                </ul>
                            </div>
                            <div class="list-block-">
                                <h3 class="dot-title">Categories</h3>
                                <ul>
                                    @foreach ($global->categories as $category)
                                        <li>
                                            <a
                                                href="{{ route('product.all') }}?category_id={{ $category->id }} ">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="list-block-">
                                <h3 class="dot-title">Contact</h3>
                                <div class="comp=address grey-color">
                                    <p>{{ $global->address }}</p>
                                    <p>
                                        <a href="">{{ $global->phone }}</a>
                                        <br>
                                        <a href="">{{ $global->email }}</a>
                                    </p>
                                    <p>
                                        {{ $global->opening1 }} <br>
                                        {{ $global->opening2 }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="bottom">
                            <div class="list-inline">
                                <ul>
                                    <li><a href="{{ $global->whatsapp }}"><i class="ri-whatsapp-line"></i></a></li>
                                    <li><a href="{{ $global->tiktok }}"><i class="ri-tiktok-line"></i></a></li>
                                    <li><a href="{{ $global->instagram }}"><i class="ri-instagram-line"></i></a></li>
                                </ul>
                            </div>
                            <div class="copyright">
                                <p>2023 - Indobeautynesia - All rights reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer ends -->
    </div>

    <div class="overlay" data-overlay></div>
    <div id="mobile-menu" class="mobile-menu">
        <div class="wrap">
            <a href="" class="close-trigger" close-button>
                <i class="ri-close-line"></i>
            </a>
            <div class="main-menu scrollto">
                <nav class="wrapper">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="has-child">
                            <a href="{{ route('product.all') }}">
                                <span>Products</span>
                                <span class="child-trigger">
                                    <i class="ri-arrow-down-s-line"></i>
                                </span>
                            </a>
                            <ul class="sub-menu list-block">
                                <div class="list-block">
                                    <h3 class="dot-title">Categories</h3>
                                    <ul>
                                        @foreach ($global->categories as $category)
                                            <li><a
                                                    href="{{ route('product.all') }}?category_id={{ $category->id }} ">{{ $category->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </ul>
                            <ul class="sub-menu list-block">
                                <div class="list-block">
                                    <h3 class="dot-title">Brands</h3>
                                    <ul>
                                        @foreach ($global->brands as $brand)
                                            <li><a
                                                    href="{{ route('product.all') }}?brand_id={{ $brand->id }} ">{{ $brand->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </ul>
                        </li>
                        <li class="has-child">
                            <a href="{{ route('about') }}">
                                <span>Contact</span>
                                <span class="child-trigger">
                                    <i class="ri-arrow-down-s-line"></i>
                                </span>
                            </a>
                            <ul class="sub-menu list-block">
                                <div class="list-block">
                                    <h3 class="dot-title">Our Shop</h3>
                                    <ul>
                                        <li><a href="{{ $global->lazada }}" target="_blank">Lazada</a></li>
                                        <li><a href="{{ $global->shopee }}" target="_blank">Shopee</a></li>
                                        <li><a href="{{ $global->tokopedia }}" target="_blank">Tokopedia</a></li>
                                    </ul>
                                </div>
                                <div class="list-block">
                                    <h3 class="dot-title">Our Social Media</h3>
                                    <ul>
                                        <li><a href="{{ $global->instagram }}">Instagram</a>
                                        </li>
                                        <li><a href="{{ $global->whatsapp }}">WhatsApp</a>
                                        </li>
                                        <li><a href="{{ $global->tiktok }}">TikTok</a>
                                        </li>
                                    </ul>
                                </div>
                            </ul>
                        </li>
                        <li><a href="{{ route('about') }}"><span>About</span></a></li>
                        <li>
                            <div class="search-mobile">
                                <input type="text" class="input-search" id=""
                                    placeholder="search products">
                                <div class="button">
                                    <button type="submit" class="primary-btn search-submit-btn">Search</button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="button">
                </div>
            </div>
        </div>
    </div>
    <!-- whatsapp floating button -->
    <a href="{{ $global->whatsapp }}?text=Halo,%20Saya%20melihat%20website%20Anda%20dan%20tertarik%20ingin%20konsultasi%20dengan%20Anda"
        class="whatsapp" target="_blank">
        <div class="whatsapp-float">
            <i class="ri-whatsapp-line"></i>
        </div>
    </a>
    <div class="search-modal">
        <div class="search-bar">
            <input type="text" class="input-search" id="" placeholder="search products">
            <div class="button">
                <button type="submit" class="primary-btn search-submit-btn">Search</button>
            </div>
        </div>
    </div>
    <!-- swiper js -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <!-- custom js -->
    <script src="{{ asset('assets/script.js') }}"></script>
    <script>
        $(function() {
            console.log("ready!");

            $('.search-btn').click(function(e) {
                $('.search-modal').addClass('active');
                $('body').css("overflow", "hidden").css("position", "fixed");
                e.preventDefault();
            });

            $('.search-submit-btn').click(function(e) {
                $('.search-modal').removeClass('active');
                const val = $('.input-search').val()
                $('body').css("overflow", "auto").css("position", "initial");
                window.location.href = "{{ route('product.all') }}" + "?search=" + val
                e.preventDefault();
            });
        });
    </script>
</body>

</html>
