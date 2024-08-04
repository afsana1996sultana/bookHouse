@extends('layouts.frontend')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
<style>
    .slider_active ul.slick-dots {
        position: absolute;
        bottom: 20px;
        display: flex;
        left: 50%;
        transform: translateX(-50%);
        margin: 0;
    }

    .slider_active {
        position: relative;
    }

    .slider_active ul.slick-dots li button {
        text-indent: -9999px;
        border: 0;
        margin: 0 2px;
        ;
        background: #C5C5C5;
        height: 10px;
        width: 30px;
        border-radius: 10px;
        transition: all .5s ease-in-out;
    }

    .slider_active ul.slick-dots li.slick-active button {
        width: 50px;
        background-color: #F06A25;
    }

    a.single-category {
        border: 1px solid #ddd;
        padding: 20px;
        display: block;
        background: #fff;
        transition: all .5s ease-in-out;
        border-radius: 20px;
    }

    a.single-category img {
        border-radius: 50%;
        width: 150px;
        height: 150px;
        margin: auto;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        padding: 10px;
    }

    a.single-category:hover {
        box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;
        margin-top: -5px;
    }

    .single-book h6 {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        line-clamp: 2;
        height: 52px;
        -webkit-box-orient: vertical;
    }

    .single-book button {
        background: #f06a256b;
        color: #F06A25;
        border: 0;
        border-radius: 4px;
        padding: 5px 10px;
        transition: all .5s ease-in-out;
    }

    .single-book:hover button {
        background: #F06A25;
        color: #fff;
    }

    .single-book {
        transition: all .5s ease-in-out;
    }

    .single-book:hover {
        box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
    }

    a.special_cat {
        display: block;
        text-align: center;
        background: #FFFFFF;
        padding: 25px 10px;
        border-radius: 5px;
        border: 1px solid #ddd;
        box-shadow: 5px 5px 0 #ddd;
        font-size: 20px;
        transition: all .3s ease-in-out;
    }

    .book-area,
    .category-area {
        background: #F0F0F0;
        padding: 35px 0;
    }

    .banner-area {
        padding: 20px 0;
    }

    a.special_cat:hover {
        box-shadow: rgb(204, 219, 232) 3px 3px 6px 0px inset, rgba(255, 255, 255, 0.5) -3px -3px 6px 1px inset;
        color: #F06A25;
    }

    .section-title a {
        position: relative;
    }

    .section-title a::after {
        position: absolute;
        content: '';
        left: 0;
        top: 100%;
        display: block;
        background: #F58021;
        width: 100%;
        height: 1px;
        transform-origin: right;
        transform: scaleX(0);
        transition: all .5s ease-in-out;
    }

    .section-title a:hover:after {
        transform: scale(1);
    }

    .read_more {
        color: #F06A25 !important;
    }
</style>

@endpush
@section('content-frontend')

<!-- slider start -->
<div class="slider-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="slider_active">
                    @foreach($sliders as $slider)
                    <a href="{{ $slider->slider_url }}"><img src="{{ asset($slider->slider_img) }}" alt=""></a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider end -->

    <!-- Campaign Slider Start-->
    @php
        $campaign = \App\Models\Campaing::where('status', 1)
            ->where('is_featured', 1)
            ->first();
    @endphp

    @if ($campaign)
        @php
            $start_diff = date_diff(date_create($campaign->flash_start), date_create(date('d-m-Y H:i:s')));
            $end_diff = date_diff(date_create(date('d-m-Y H:i:s')), date_create($campaign->flash_end));
        @endphp
        @if ($start_diff->invert == 0 && $end_diff->invert == 0)
            <section class="common-product section-padding">
                <div class="container wow animate__animated animate__fadeIn">
                    <div class="section-title">
                        <div class="title">
                            <h3>My Campaign Sell</h3>
                            <div class="deals-countdown-wrap">
                                <div class="deals-countdown"
                                    data-countdown="{{ date('Y-m-d H:i:s', strtotime($campaign->flash_end)) }}"></div>
                            </div>
                        </div>
                        <a class="read_more" href="{{ route('category_list.index') }}">আরো দেখুন</a>
                    </div>
                    <div class="carausel-5-columns-cover position-relative">
                        <div class="slider-arrow slider-arrow-2 carausel-5-columns-common-arrow"
                            id="carausel-5-columns-common-arrows"></div>
                        <div class="carausel-5-columns-common carausel-arrow-center" id="carausel-5-columns-common">
                            @foreach ($campaign->campaing_products->take(20) as $campaing_product)
                                @php
                                    $product = \App\Models\Product::find($campaing_product->product_id);
                                @endphp
                                @if ($product != null && $product->status != 0)
                                    @include('frontend.common.product_grid_view', ['product' => $product])
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endif
    <!-- Campaign Slider End-->

<!-- category start -->
<div class="category-area">
    <div class="container">
        <div class="row">
            <div class="section-title">
                <h1 class="mb-0" style="font-size: 20px;">পাবলিকেশন’স ক্যাটাগরি</h1>
                <a class="read_more" href="{{ route('category_list.index') }}">আরো দেখুন</a>
            </div>
        </div>

        @if($categories->isNotEmpty())
        <div class="category-slider d-block d-lg-none">
            @foreach($categories as $cat_item)
            <div>
                <a href="{{ route('product.category', $cat_item->slug) }}" class="single-category">
                    <img src="{{ asset($cat_item->image) }}" alt="">
                    <h6 class="mt-3 text-center fw-normal">{{ $cat_item->name_bn }}</h6>
                </a>
            </div>
            @endforeach
        </div>
        <div class="d-none d-lg-block">
            <div class="row g-2 g-md-5">
                @foreach($categories->take(6) as $cat_item)
                <div class="col-xl-2 col-6 col-md-4 col-lg-3">
                    <a href="{{ route('product.category', $cat_item->slug) }}" class="single-category">
                        <img src="{{ asset($cat_item->image) }}" alt="">
                        <h6 class="mt-3 text-center fw-normal">{{ $cat_item->name_bn }}</h6>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
<!-- category end -->

<!-- banner start -->
<div class="banner-area">
    <div class="container">
        <div class="row g-2 g-md-5">
            @foreach($home_banners->take(3) as $banner)
            <div class="col-lg-4 col-md-6">
                <a href="{{ $banner->banner_url ?? '' }}" class="single-banner">
                    <img src="{{ asset($banner->banner_img) }}" alt="">
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- banner end -->

<!-- book start -->
@if(count($home2_featured_categories) > 0)
@foreach($home2_featured_categories->take(4) as $home2_featured_category)
@if(count($home2_featured_category->products) > 0)
<div class="book-area">
    <div class="container">
        <div class="row">
            <div class="section-title">
                <h5 class="mb-0">{{ $home2_featured_category->name_bn }}</h5>
                <a class="read_more" href="{{ route('product.category', $home2_featured_category->slug) }}">আরো
                    দেখুন</a>
            </div>
        </div>
        <div class="row g-2">
            <div class="category__product__active">
                @foreach($home2_featured_category->products as $product)
                @include('frontend.common.product_grid_view')
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
@endforeach
@endif
<!-- book end -->

<!-- banner start -->
<div class="banner-area">
    <div class="container">
        <div class="row g-3">
            @if(get_footer_banner())
            <a href="{{ $banner->banner_url ?? '' }}"><img src="{{ asset(get_footer_banner()->banner_img) }}" height="210px" alt="{{ $banner->title_bn }}" /></a>
            @endif
        </div>
    </div>
</div>
<!-- banner end -->

<!-- book start -->
@if(count($home2_featured_categories) > 0)
@foreach($home2_featured_categories->skip(4)->take(4) as $home2_featured_category)
@if(count($home2_featured_category->products) > 0)
<div class="book-area">
    <div class="container">
        <div class="row">
            <div class="section-title">
                <h5 class="mb-0">{{ $home2_featured_category->name_bn }}</h5>
                <a class="read_more" href="{{ route('product.category', $home2_featured_category->slug) }}">আরো
                    দেখুন</a>
            </div>
        </div>
        <div class="row g-2">
            <div class="category__product__active">
                @foreach($home2_featured_category->products as $product)
                @include('frontend.common.product_grid_view')
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
@endforeach
@endif
<!-- book end -->

<!-- special category start -->
<div class="py-3 my-3 special-category">
    <div class="container">
        <div class="row g-3">
            @if($special_category->isNotEmpty())
            @foreach($special_category->take(4) as $special_cat)
            <div class="col-xl-3 col-6">
                <a href="{{ route('product.category', $special_cat->slug) }}" class="special_cat">{{ $special_cat->name_bn }}</a>
            </div>
            @endforeach
            @endif
        </div>
        @if(count($package_books) > 0)
        <div class="row" style="margin-top:30px">
            <div class="section-title">
                <h5 class="mb-0">প্যাকেজ বই</h5>
                <a class="read_more" href="{{ route('product.package.books') }}">আরো দেখুন</a>
            </div>
        </div>

        <div class="row g-2">
            <div class="category__product__active">
                @foreach($package_books as $product)
                @include('frontend.common.product_grid_view')
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
<!-- special category end -->

<!-- special category start -->
<div class="py-3 my-3 special-category">
    <div class="container">
        <div class="row g-3">
            @if($special_category->isNotEmpty())
            @foreach($special_category->skip(4)->take(4) as $special_cat)
            <div class="col-xl-3 col-6">
                <a href="{{ route('product.category', $special_cat->slug) }}" class="special_cat">{{ $special_cat->name_bn }}</a>
            </div>
            @endforeach
            @endif
        </div>

        @if(count($todays_sale) > 0)
        <div class="row" style="margin-top:30px">
            <div class="section-title">
                <h5 class="mb-0">সদ্য বিক্রিত বই</h5>
                <a class="read_more" href="{{ route('product.recently-sell.books') }}">আরো
                    দেখুন</a>
            </div>
        </div>

        <div class="row g-2">
            <div class="category__product__active">
                @foreach($todays_sale as $today_product)
                @php
                $product = \App\Models\Product::find($today_product->product_id);
                @endphp
                @if($product)
                <blade include|(%26%2339%3Bfrontend.common.product_grid_view%26%2339%3B%2C%5B%26%2339%3Bproduct%26%2339%3B%20%3D%3E%20%24product%5D) />
                @endif
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
<!-- special category end -->

<script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

<script>
    $('.slider_active').slick({
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        arrows: false,
        cssEase: 'linear',
        autoplay: true,
        autoplaySpeed: 2000,
        pauseOnHover: false,
        pauseOnFocus: false,
        pauseOnDotsHover: false,
        responsive: [{
                breakpoint: 768,
                settings: {
                    dots: false,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    dots: false,
                }
            }
        ]
    });

    //category

    $(document).ready(function() {
        $('.category-slider').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            prevArrow: '<i class="fa-solid fa-angle-left"></i>',
            nextArrow: '<i class="fa-solid fa-angle-right"></i>',
            arrows: true,
            responsive: [{
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 4
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2
                    }
                }
            ]
        });
    });
</script>
@endsection
