@extends('frontEnd.layouts.master') @section('title', 'Home') @push('seo')
<meta name="app-url" content="" />
<meta name="robots" content="index, follow" />
<meta name="description" content="" />
<meta name="keywords" content="" />

<!-- Open Graph data -->
<meta property="og:title" content="" />
<meta property="og:type" content="website" />
<meta property="og:url" content="" />
<meta property="og:image" content="{{ asset($generalsetting->white_logo) }}" />
<meta property="og:description" content="" />
@endpush @push('css')
<link rel="stylesheet" href="{{ asset('public/frontEnd/css/owl.carousel.min.css') }}" />
<link rel="stylesheet" href="{{ asset('public/frontEnd/css/owl.theme.default.min.css') }}" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css" rel="stylesheet" />
@endpush @section('content')
<section class="slider-section">
    <div class="container">
        <div class="row">
            {{--
            <div class="col-sm-3 hidetosm">
                <div class="sidebar-menu">
                    <ul class="hideshow">
                        @foreach ($menucategories as $key => $category)
                            <li>
                                <a href="{{ route('category', $category->slug) }}">
                                    <img src="{{ asset($category->image) }}" alt="" />
                                    {{ $category->name }}
                                    <i class="fa-solid fa-chevron-right"></i>
                                </a>
                                <ul class="sidebar-submenu">
                                    @foreach ($category->subcategories as $key => $subcategory)
                                        <li>
                                            <a href="{{ route('subcategory', $subcategory->slug) }}">
                                                {{ $subcategory->subcategoryName }} <i
                                                    class="fa-solid fa-chevron-right"></i> </a>
                                            <ul class="sidebar-childmenu">
                                                @foreach ($subcategory->childcategories as $key => $childcat)
                                                    <li>
                                                        <a href="{{ route('products', $childcat->slug) }}">
                                                            {{ $childcat->childcategoryName }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            --}}
            <div class="col-sm-12">
                <div class="home-slider-container">
                    <div class="main_slider owl-carousel">
                        @foreach ($sliders as $key => $value)
                            <div class="slider-item">
                                <img src="{{ asset($value->image) }}" alt="" />
                            </div>
                            <!-- slider item -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- slider end -->

<section class="homeproduct">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="sec_title">
                    <h3 class="section-title-header">
                        <div class="timer_inner">
                            <div class="">
                                <span class="section-title-name"> {{ __('messages.topCat') }} </span>
                            </div>
                        </div>
                    </h3>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="topcategory">
                    @foreach ($frontcategory as $key => $value)
                        <div class="cat_item">
                            <div class="cat_img">
                                <a href="{{ route('category', $value->slug) }}">
                                    <img src="{{ asset($value->image) }}" alt="" />
                                </a>
                            </div>
                            <div class="cat_name">
                                <a href="{{ route('category', $value->slug) }}">
                                    {{ $value->name }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @if ($sliders_2)
            <div class="col-sm-12 mt-2">
                <div class="home-slider-container">
                    <div class="another_slider">
                        <div class="slider-item">
                            <img style="border-radius: 13px;" src="{{ asset($sliders_2->image) }}" alt="" />
                        </div>
                        <!-- slider item -->
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

@if($hotdeal_top->count() > 0)
<section class="homeproduct">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="sec_title">
                    <h3 class="section-title-header">
                        <div class="timer_inner">
                            <div class="">
                                <span class="section-title-name"> {{ __('messages.hotDeal') }} </span>
                            </div>
                            <a href="{{ route('hotdeals') }}" class="view_more_btn" style="float:left">{{ __('messages.viewMore') }}</a>

                            <!-- <div class="">
                                <div class="offer_timer" id="simple_timer"></div>
                            </div> -->
                        </div>
                    </h3>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="product_sliders">
                    @foreach ($hotdeal_top as $key => $value)
                        <div class="product_item wist_item">
                            <div class="product_item_inner">
                                @if($value->old_price)
                                <div class="sale-badge">
                                    <div class="sale-badge-inner">
                                        <div class="sale-badge-box">
                                            <span class="sale-badge-text">
                                                <p>@php $discount=((($value->old_price)-($value->new_price))) @endphp {{ number_format($discount, 0) }}৳</p>
                                                ছাড়
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="pro_img">
                                    <a href="{{ route('product', $value->slug) }}">
                                        <img src="{{ asset($value->image ? $value->image->image : '') }}"
                                            alt="{{ $value->name }}" />
                                    </a>
                                </div>
                                <div class="pro_des">
                                    <div class="pro_name">
                                        <a
                                            href="{{ route('product', $value->slug) }}">{{ Str::limit($value->name, 80) }}</a>
                                    </div>
                                    <div class="pro_price">
                                        <p>
                                            @if ($value->old_price)
                                             <del>৳ {{ $value->old_price }}</del>
                                            @endif

                                            ৳ {{ $value->new_price }}

                                        </p>
                                    </div>
                                </div>
                            </div>

                           @if (!$value->prosizes->isEmpty() || !$value->procolors->isEmpty())
                                <div class="pro_btn">

                                    <div class="cart_btn order_button">
                                        <a href="{{ route('product', $value->slug) }}"
                                            class="addcartbutton">{{ __('messages.cartButton') }}</a>
                                    </div>
                                </div>
                            @else
                                <div class="pro_btn">
                                    <button class="add-to-cart-button" data-id="{{ $value->id }}">{{ __('messages.cartButton') }}</button>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            @if ($sliders_3)
            <div class="col-sm-12">
                <div class="home-slider-container">
                    <div class="another_slider">
                        <div class="slider-item">
                            <img style="border-radius: 13px;" src="{{ asset($sliders_3->image) }}" alt="" />
                        </div>
                        <!-- slider item -->
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endif
@foreach ($homeproducts as $homecat)
    @if ($homecat->products->count() > 0)
    <section class="homeproduct">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="sec_title">
                        <h3 class="section-title-header">
                            <span class="section-title-name">{{ $homecat->getTranslation(App::getLocale(), $homecat->id) }}</span>
                            <a href="{{ route('category', $homecat->slug) }}" class="view_more_btn">{{ __('messages.viewMore') }}</a>
                        </h3>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="product_sliders">
                        @foreach ($homecat->products as $key => $value)
                           <div class="product_item wist_item" id="{{ $value->id }}">
                            <div class="product_item_inner">
                                @if($value->old_price)
                                <div class="sale-badge">
                                    <div class="sale-badge-inner">
                                        <div class="sale-badge-box">
                                            <span class="sale-badge-text">
                                                <p>@php $discount=((($value->old_price)-($value->new_price))) @endphp {{ number_format($discount, 0) }}৳</p>
                                                ছাড়
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="pro_img">
                                    <a href="{{ route('product', $value->slug) }}">
                                        <img src="{{ asset($value->image ? $value->image->image : '') }}"
                                            alt="{{ $value->name }}" />
                                    </a>
                                </div>
                                <div class="pro_des">
                                    <div class="pro_name">
                                        <a
                                            href="{{ route('product', $value->slug) }}">{{ Str::limit($value->name, 80) }}</a>
                                    </div>
                                    <div class="pro_price">
                                        <p>
                                            @if ($value->old_price)
                                             <del>৳ {{ $value->old_price }}</del>
                                            @endif

                                            ৳ {{ $value->new_price }}

                                        </p>
                                    </div>
                                </div>
                            </div>

                            @if (!$value->prosizes->isEmpty() || !$value->procolors->isEmpty())
                                <div class="pro_btn">

                                    <div class="cart_btn order_button">
                                        <a href="{{ route('product', $value->slug) }}"
                                            class="addcartbutton">{{ __('messages.cartButton') }}</a>
                                    </div>
                                </div>
                            @else
                                <div class="pro_btn">
                                <button class="add-to-cart-button" data-id="{{ $value->id }}">{{ __('messages.cartButton') }}</button>
                                </div>
                            @endif
                            {{--<div class="product-overflow-quantity">
                                <a class="details-link" href="#"> </a>
                                <div class="product-added-price">
                                    <h4 class="added-price">৳ <span class="add_price">{{ $value->new_price }}</span></h4>
                                </div>
                                <div class="cart-items-number product-after-add-cart d-flex flex-coloumn"> </div>
                                
                                <div class="hover-quantity-area">
                                    <div class="qty d-flex justify-content-between align-items-center">
                                        <button type="button" class="minus cart_decrement_by_id" data-id="{{ $value->id }}"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M696 480H328c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h368c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8z"></path><path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372 372 166.6 372 372-166.6 372-372 372z"></path></svg></button>
                                        <input type="text" name="qty" class="qty form-control" value="1">
                                        <button type="button" class="plus cart_increment_by_id" data-id="{{ $value->id }}"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M696 480H544V328c0-4.4-3.6-8-8-8h-48c-4.4 0-8 3.6-8 8v152H328c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h152v152c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8V544h152c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8z"></path><path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372 372 166.6 372 372-166.6 372-372 372z"></path></svg></button>
                                    </div>
                                </div>
                                <p class="text-white text-center pt-3 mb-0 hover-quantity-area-textcart">in cart</p>
                                
                            </div>
                            <button class="cart-badge add-to-cart-button" data-id="{{ $value->id }}">
                                <div class="cart-badge-inner">
                                    <div class="cart-badge-box">
                                        <span class="cart-badge-text">
                                            <p class="text-white">+</p>
                                        </span>
                                    </div>
                                </div>
                            </button>--}}
                        </div>
                        @endforeach
                    </div>
                </div>
                @if ($loop->first && $sliders_4)
                <div class="col-sm-12 mt-2">
                    <div class="home-slider-container">
                        <div class="another_slider">
                            <div class="slider-item">
                                <img style="border-radius: 13px;" src="{{ asset($sliders_4->image) }}" alt="" />
                            </div>
                            <!-- slider item -->
                        </div>
                    </div>
                </div>
                @endif
                @if ($loop->iteration === 2 && $sliders_5)
                <div class="col-sm-12 mt-2">
                    <div class="home-slider-container">
                        <div class="another_slider">
                            <div class="slider-item">
                                <img style="border-radius: 13px;" src="{{ asset($sliders_5->image) }}" alt="" />
                            </div>
                            <!-- slider item -->
                        </div>
                    </div>
                </div>
                @endif
                @if ($loop->iteration === 3 && $sliders_6)
                <div class="col-sm-12 mt-2">
                    <div class="home-slider-container">
                        <div class="another_slider">
                            <div class="slider-item">
                                <img style="border-radius: 13px;" src="{{ asset($sliders_6->image) }}" alt="" />
                            </div>
                            <!-- slider item -->
                        </div>
                    </div>
                </div>
                @endif
                @if ($loop->iteration === 4 && $sliders_7)
                <div class="col-sm-12 mt-2">
                    <div class="home-slider-container">
                        <div class="another_slider">
                            <div class="slider-item">
                                <img style="border-radius: 13px;" src="{{ asset($sliders_7->image) }}" alt="" />
                            </div>
                            <!-- slider item -->
                        </div>
                    </div>
                </div>
                @endif
                @if ($loop->iteration === 5 && $sliders_8)
                <div class="col-sm-12 mt-2">
                    <div class="home-slider-container">
                        <div class="another_slider">
                            <div class="slider-item">
                                <img style="border-radius: 13px;" src="{{ asset($sliders_8->image) }}" alt="" />
                            </div>
                            <!-- slider item -->
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    @endif
@endforeach

<!-- Start brand Area  -->
<section class="homeproduct">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="sec_title">
                    <h3 class="section-title-header">
                        <span class="section-title-name"> {{ __('messages.topBrand') }} </span>

                    </h3>
                </div>
            </div>
            @foreach($brands as $item)
            <div class="col-6 col-sm-4 col-lg-2">
                {{-- <a href="{{ url('brands/' . $item->slug) }}" title="{{$item->name}}" style="transition: all 0.5s ease-in-out;box-shadow: 0 0 12px rgb(0 0 0 / 42%);" href="" class="cat-block"> --}}
                <figure class="border rounded d-flex align-items-center justify-content-center" style="border: 1px solid #c5c5c5; height: 140px;">
                    <a href="{{ url('brands/' . $item->slug) }}" title="{{ $item->name }}" href="" class="cat-block">
                        <span class="d-flex align-items-center justify-content-center">
                            <img style="padding: 10px; max-width: 80%; max-height: 100%;"
                                src="{{ asset($item->image) }}" />
                        </span>
                    </a>
                </figure>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End brand Area  -->

@endsection

@push('script')
<script src="{{ asset('public/frontEnd/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('public/frontEnd/js/jquery.syotimer.min.js') }}"></script>

{{--<script>
    $(document).ready(function() {
        $(".minus").click(function() {
            const cartId = $(this).data("id");
            var $input = $(this).parent().find("input");
            var count = parseInt($input.val()) - 1;
            count = count < 1 ? 1 : count;
            $input.val(count);
            $input.change();
            const $status = $(this).closest('.product-overflow-quantity');
            if (count == 1) {
                $status.removeClass('active');
                localStorage.removeItem(`activeStatus-${cartId}`);
                $status.siblings('.cart-badge').show();
            } 
            return false;
        });
        $(".plus").click(function() {
            var $input = $(this).parent().find("input");
            $input.val(parseInt($input.val()) + 1);
            $input.change();
            return false;
        });
    });
</script>--}}

{{--<script>
    $(document).ready(function() {
        $('.product_item').each(function() {
            const cartId = $(this).attr('id');
            if (localStorage.getItem(`activeStatus-${cartId}`) === 'true') {
                $(this).children('.product-overflow-quantity').addClass('active');
                $(this).children('.product-overflow-quantity').siblings('.cart-badge').hide();
            }
        });

        $('.cart-badge').click(function() {
            const $parentCart = $(this).parent();
            const cartId = $parentCart.attr('id');

            $parentCart.children('.product-overflow-quantity').toggleClass('active');

            if ($parentCart.children('.product-overflow-quantity').hasClass('active')) {
                $(this).hide();
                localStorage.setItem(`activeStatus-${cartId}`, 'true');
            } else {
                localStorage.removeItem(`activeStatus-${cartId}`);
            }
        });
    });
</script>--}}

<script>
    $(document).ready(function() {
        $(".main_slider").owlCarousel({
            items: 1,
            loop: true,
            dots: false,
            autoplay: true,
            nav: true,
            autoplayHoverPause: false,
            margin: 0,
            mouseDrag: true,
            smartSpeed: 8000,
            autoplayTimeout: 7000,
            animateOut: "fadeOutLeft",
            animateIn: "slideInRight",

            navText: ["<i class='fa-solid fa-angle-left'></i>",
                "<i class='fa-solid fa-angle-right'></i>"
            ],
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".hotdeals-slider").owlCarousel({
            margin: 15,
            loop: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 3,
                    nav: true,
                },
                600: {
                    items: 3,
                    nav: false,
                },
                1000: {
                    items: 6,
                    nav: true,
                    loop: false,
                },
            },
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".category-slider").owlCarousel({
            margin: 15,
            loop: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 5,
                    nav: true,
                },
                600: {
                    items: 3,
                    nav: false,
                },
                1000: {
                    items: 8,
                    nav: true,
                    loop: false,
                },
            },
        });

        $(".product_slider").owlCarousel({
            margin: 15,
            items: 6,
            loop: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2,
                    nav: false,
                },
                600: {
                    items: 5,
                    nav: false,
                },
                1000: {
                    items: 6,
                    nav: false,
                },
            },
        });
    });
</script>

<!-- <script>
    $("#simple_timer").syotimer({
        date: new Date(2015, 0, 1),
        layout: "hms",
        doubleNumbers: false,
        effectType: "opacity",

        periodUnit: "d",
        periodic: true,
        periodInterval: 1,
    });
</script> -->
@endpush
