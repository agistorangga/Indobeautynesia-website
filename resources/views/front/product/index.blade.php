@extends('layouts.front.index')

@section('content')
    <main class="page-category">
        <div class="section">
            <div class="container wide">
                <div class="wrap">
                    <div class="heading">
                        <h1 class="title">Products</h1>
                    </div>
                    <div class="content">
                        <div id="sidebar-filter" class="sidebar">
                            <div class="wrap">
                                <a href="#0" class="close-trigger" close-button>
                                    <i class="ri-close-line"></i>
                                </a>
                                <div class="sidebar-content">
                                    <div class="sidebar-title">Filter</div>
                                    <div class="widget">
                                        <div class="summary">
                                            <input type="checkbox" name="cats" id="aaa" checked>
                                        </div>
                                    </div>
                                    <div class="widget">
                                        <div class="summary">
                                            <input type="checkbox" name="cats" id="aab" checked>
                                            <label for="aab">
                                                <span>Type</span>
                                                <i class="ri-arrow-down-s-line"></i>
                                            </label>
                                            <div class="accord list-block scrollto">
                                                <ul class="wrapper initial">
                                                    <li>
                                                        @if (request()->get('brand_id') || request()->get('category_id'))
                                                            <a
                                                                href="{{ url()->full() }}&bundling_id=0">No Bundling</a>
                                                        @else
                                                            <a
                                                                href="{{ url()->current() }}?bundling_id=0">No Bundling</a>
                                                        @endif
                                                    </li>
                                                    <li>
                                                        @if (request()->get('brand_id') || request()->get('category_id'))
                                                            <a
                                                                href="{{ url()->full() }}&bundling_id=1">Bundling</a>
                                                        @else
                                                            <a
                                                                href="{{ url()->current() }}?bundling_id=1">Bundling</a>
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget">
                                        <div class="summary">
                                            <input type="checkbox" name="cats" id="aac" checked>
                                            <label for="aac">
                                                <span>Categories</span>
                                                <i class="ri-arrow-down-s-line"></i>
                                            </label>
                                            <div class="accord list-block scrollto">
                                                <ul class="wrapper initial">
                                                    @foreach ($categories as $category)
                                                        <li>
                                                            @if (request()->get('brand_id') || request()->get('bundling_id'))
                                                                <a
                                                                    href="{{ url()->full() }}&category_id={{ $category->id }} ">{{ $category->name }}</a>
                                                            @else
                                                                <a
                                                                    href="{{ url()->current() }}?category_id={{ $category->id }} ">{{ $category->name }}</a>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget">
                                        <div class="summary">
                                            <input type="checkbox" name="cats" id="aad" checked>
                                            <label for="aad">
                                                <span>Brands</span>
                                                <i class="ri-arrow-down-s-line"></i>
                                            </label>
                                            <div class="accord list-block scrollto">
                                                <ul class="wrapper initial">
                                                    @foreach ($brands as $brand)
                                                        <li>
                                                            @if (request()->get('category_id') || request()->get('bundling_id'))
                                                                <a
                                                                    href="{{ url()->full() }}&brand_id={{ $brand->id }} ">{{ $brand->name }}</a>
                                                            @else
                                                                <a
                                                                    href="{{ url()->current() }}?brand_id={{ $brand->id }} ">{{ $brand->name }}</a>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="category-content">
                            <div class="sorter">
                                <a href="#0" class="menu-trigger" trigger-button data-target="sidebar-filter">
                                    <i class="ri-filter-line"></i>
                                </a>
                                <div class="left">
                                    <span class="grey-color">Showing {{ count($products) }} of {{ $products->total() }}
                                        results</span>
                                </div>
                            </div>
                            <div class="dotgrid">
                                <div class="wrapper">
                                    <!-- copy item from carousel -->
                                    @foreach ($products as $item)
                                        <div class="item">
                                            <div class="dot-image">
                                                <a href="{{ route('product.detail', [$item->id]) }}"
                                                    class="product-permalink"></a>
                                                <div class="thumbnail">
                                                    <img src="{{ asset('photoproduct/' . $item->photo) }}" alt="">
                                                </div>
                                                <div class="actions">
                                                    <ul>
                                                        <li><a href=""><i class="ri-eye-line"></i></a></li>
                                                    </ul>
                                                </div>
                                                @if ($item->promo)
                                                    <div class="label"><span>-{{ $item->promo->discount }}%</span></div>
                                                @endif
                                            </div>
                                            <div class="dot-info">
                                                <h2 class="dot-title">
                                                    <a href="">{{ $item->name }}</a>
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
                            {{-- <div class="button"><a href="" class="primary-btn">Load more</a></div> --}}
                            {{ $products->links('vendor.pagination.front') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
