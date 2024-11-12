<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />

    <title>@yield('title') - {{$generalsetting->name}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset($generalsetting->favicon)}}" />
    <meta name="author" content="Super Ecommerce" />
    <link rel="canonical" href="" />
    @stack('seo')
    @stack('css')
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/owl.theme.default.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/mobile-menu.css')}}" />
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/select2.min.css')}}" />

    <link rel="stylesheet" href="{{asset('public/frontEnd/css/wsit-menu.css')}}" />
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/responsive.css')}}" />
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/main.css')}}" />

    <meta name="facebook-domain-verification" content="38f1w8335btoklo88dyfl63ba3st2e" />

    <!-- App css -->
    <link href="{{asset('public/frontEnd/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- icons -->
    <link href="{{asset('public/backEnd/')}}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- toastr css -->
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/assets/css/toastr.min.css" />
    <!-- custom css -->
    <!-- <link href="{{asset('public/backEnd/')}}/assets/css/custom.css" rel="stylesheet" type="text/css" /> -->
  </head>

  <!-- body start -->
  <body data-layout-mode="default" data-theme="light" data-layout-width="fluid" data-topbar-color="dark" data-menu-position="fixed" data-leftbar-color="light" data-leftbar-size="default" data-sidebar-user="false">
    <div class="mobile-menu">
        <div class="mobile-menu-logo">
            <div class="logo-image">
                <img src="{{asset($generalsetting->white_logo)}}" alt="" />
            </div>
            <div class="mobile-menu-close">
                <i class="fa fa-times"></i>
            </div>
        </div>
        <div class="mobile-menu-logo">
            <li>
              <a href="{{ route('switchLang', 'en') }}">
                  <span style="color: {{ App::getLocale() == 'en' ? '#fe5200' : 'inherit' }}">Enlish</span>
              </a>/
              <a href="{{ route('switchLang', 'bn') }}">
                  <span style="color: {{ App::getLocale() == 'bn' ? '#fe5200' : 'inherit' }}">বাংলা</span>
              </a>
            </li>
            <li>
              <a href="{{route('customer.order_track')}}">
                  <span>
                      <i class="fa fa-truck"></i>
                  </span>
                  <span>{{ __('messages.track') }}</span>
              </a>
            </li>
            @if(Auth::guard('customer')->user())
            <li>
                <a href="{{route('customer.account')}}">
                    <span>
                        <i class="fa-solid fa-user"></i>
                    </span>
                    <span>{{ __('messages.account') }}</span>
                </a>
            </li>
            @else
            <li>
                <a href="{{route('customer.login')}}">
                    <span>
                        <i class="fa-solid fa-user"></i>
                    </span>
                    <span>{{ __('messages.login') }}</span>
                </a>
            </li>
            @endif
        </div>
        <ul class="first-nav">
            @foreach($menucategories as $scategory)
            <li class="parent-category">
                <a href="{{url('category/'.$scategory->slug)}}" class="menu-category-name">
                    <img src="{{asset($scategory->image)}}" alt="" class="side_cat_img" />
                    {{ $scategory->getTranslation(App::getLocale(), $scategory->id) }}
                </a>
                @if($scategory->subcategories->count() > 0)
                <span class="menu-category-toggle">
                    <i class="fa fa-chevron-down"></i>
                </span>
                @endif
                <ul class="second-nav" style="display: none;">
                    @foreach($scategory->subcategories as $subcategory)
                    <li class="parent-subcategory">
                        <a href="{{url('subcategory/'.$subcategory->slug)}}" class="menu-subcategory-name">{{ $subcategory->subcatTrans(App::getLocale(), $subcategory->id) }}</a>
                        @if($subcategory->childcategories->count() > 0)
                        <span class="menu-subcategory-toggle"><i class="fa fa-chevron-down"></i></span>
                        @endif
                        <ul class="third-nav" style="display: none;">
                            @foreach($subcategory->childcategories as $childcat)
                            <li class="childcategory"><a href="{{url('products/'.$childcat->slug)}}" class="menu-childcategory-name">{{ $childcat->childcatTrans(App::getLocale(), $childcat->id) }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
    </div>
  <!-- Begin page -->
    <div id="wrapper">
        <!-- Topbar Start -->
        @php $subtotal = Cart::instance('shopping')->subtotal(); @endphp
        <div class="navbar-custom">
            <div class="mobile-header sticky">
                <div class="mobile-logo">
                    <div class="menu-bar">
                        <a class="toggle">
                            <i class="fa-solid fa-bars"></i>
                        </a>
                    </div>
                    <div class="menu-logo">
                        <a href="{{route('home')}}"><img src="{{asset($generalsetting->white_logo)}}" alt="" /></a>
                    </div>
                    <div class="menu-bag cart-qty">
                        <a href="{{route('customer.checkout')}}">
                            <p class="margin-shopping">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <span>{{Cart::instance('shopping')->content()->count()}}</span>
                            </p>
                        </a>
                    </div>
                </div>
            </div>

            <div class="mobile-search">
                <form action="{{route('search')}}">
                    <button><i data-feather="search"></i></button>
                    <input type="text" placeholder="{{ __('messages.search') }}" value="" class="msearch_keyword msearch_click" name="keyword" />
                </form>
                <div class="search_result"></div>
            </div>

            <div class="logo-area">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="logo-header">
                                <div class="main-logo">
                                    <a href="{{route('home')}}"><img src="{{asset($generalsetting->white_logo)}}" alt="" /></a>
                                </div>
                                <div class="main-search">
                                    <form action="{{route('search')}}">
                                        <button>
                                            <i data-feather="search"></i>
                                        </button>
                                        <input type="text" placeholder="{{ __('messages.search') }}" class="search_keyword search_click" name="keyword" />
                                    </form>
                                    <div class="search_result"></div>
                                </div>
                                <div class="header-list-items">
                                    <ul>
                                        <li class="track_btn">
                                            <a href="{{ route('switchLang', 'en') }}" style="color: {{ App::getLocale() == 'en' ? '#fe5200' : 'inherit' }}; font-size:small;">English</a> / <a href="{{ route('switchLang', 'bn') }}" style="color: {{ App::getLocale() == 'bn' ? '#fe5200' : 'inherit' }}; font-size:small;">বাংলা</a>
                                        </li>
                                        <li class="track_btn">
                                            <a href="{{route('customer.order_track')}}"> <i class="fa fa-truck"></i>{{ __('messages.track') }}</a>
                                        </li>
                                        @if(Auth::guard('customer')->user())
                                        <li class="for_order">
                                            <p>
                                                <a href="{{route('customer.account')}}">
                                                    <i class="fa-regular fa-user"></i>

                                                    {{Str::limit(Auth::guard('customer')->user()->name,14)}}
                                                </a>
                                            </p>
                                        </li>
                                        @else
                                        <li class="for_order">
                                            <p>
                                                <a href="{{route('customer.login')}}">
                                                    <i class="fa-regular fa-user"></i>
                                                    {{ __('messages.login') }}
                                                </a>
                                            </p>
                                        </li>
                                        @endif

                                        <li class="cart-dialog cart-qty" id="cart-qty">
                                            <a href="{{route('customer.checkout')}}">
                                                <p class="margin-shopping">
                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                    <span>{{Cart::instance('shopping')->content()->count()}}</span>
                                                </p>
                                            </a>
                                            <div class="cshort-summary">
                                                <ul>
                                                    @foreach(Cart::instance('shopping')->content() as $key=>$value)
                                                    <li>
                                                        <a href=""><img src="{{asset($value->options->image)}}" alt="" /></a>
                                                    </li>
                                                    <li><a href="">{{Str::limit($value->name, 30)}}</a></li>
                                                    <li>Qty: {{$value->qty}}</li>
                                                    <li>
                                                        <p>৳{{$value->price}}</p>
                                                        <button class="remove-cart cart_remove" data-id="{{$value->rowId}}"><i data-feather="x"></i></button>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                <p><strong>{{ __('messages.total') }} : ৳{{$subtotal}}</strong></p>
                                                <a href="{{route('customer.checkout')}}" class="go_cart">{{ __('messages.cartButton') }}</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end Topbar -->

      <!-- ========== Left Sidebar Start ========== -->
      <div class="left-side-menu">
        <div class="h-100" data-simplebar>
          <!--- Sidemenu -->
          <div id="sidebar-menu">
            <ul id="side-menu">
              @foreach ($menucategories as $key => $scategory)
              <li>
                <a href="{{ url('category/' . $scategory->slug) }}">
                  <i data-feather="shopping-cart"></i>
                  <span>{{ $scategory->getTranslation(App::getLocale(), $scategory->id) }}</span>
                  @if ($scategory->subcategories->count() > 0)
                  <a href="#sidebar-{{ $key }}" data-bs-toggle="collapse">
                    <span class="menu-arrow"></span>
                  </a>
                  @endif
                </a>
                @if ($scategory->subcategories->count() > 0)
                <div class="collapse" id="sidebar-{{ $key }}">
                  <ul class="nav-second-level">
                    @foreach ($scategory->subcategories as $index => $subcat)
                    <li>
                      <a href="{{ url('subcategory/' . $subcat->slug) }}">
                        <i data-feather="file-plus"></i>{{ $subcat->subcatTrans(App::getLocale(), $subcat->id) }}
                        @if($subcat->childcategories->count() > 0)
                        <a href="#subsidebar-{{ $index }}" data-bs-toggle="collapse">
                          <span class="menu-arrow sub-menu-arrow"></span>
                        </a>
                        @endif
                      </a>
                      @if($subcat->childcategories->count() > 0)
                      <div class="collapse" id="subsidebar-{{ $index }}">
                        <ul class="nav-second-level">
                          @foreach($subcat->childcategories as $childcat)
                          <li class="sub">
                            <a href="{{url('products/'.$childcat->slug)}}"><i data-feather="file-plus"></i>{{ $childcat->childcatTrans(App::getLocale(), $childcat->id) }}</a>
                          </li>
                          @endforeach
                        </ul>
                      </div>
                      @endif
                    </li>
                    @endforeach
                  </ul>
                </div>
                @endif
              </li>
              @endforeach
              <!-- nav items -->
            </ul>
          </div>
          <!-- End Sidebar -->

          <div class="clearfix"></div>
        </div>
        <!-- Sidebar -left -->
      </div>
      <!-- Left Sidebar End -->

      <div class="content-page">
        <div id="content">
            @yield('content')
        </div>
        <!-- content -->
      </div>
    </div>
    <!-- Footer Start -->
    <footer class="footer">
      <div class="container">
          <div class="row">
            <div class="col-sm-4 mb-3 mb-sm-0">
                <div class="footer-about">
                    <a href="{{route('home')}}">
                        <img src="{{asset($generalsetting->white_logo)}}" alt="" />
                    </a>
                    <p>{{$contact->address}}</p>
                    <a href="tel:{{$contact->hotline}}" class="footer-hotlint">{{$contact->hotline}}</a>
                </div>
            </div>
            <!-- col end -->
            <div class="col-sm-3 mb-3 mb-sm-0 col-6">
                <div class="footer-menu">
                    <ul>
                        <li class="title"><a>{{ __('messages.info') }}</a></li>
                        <li>
                            <a href="{{route('contact')}}">{{ __('messages.contact') }}</a>
                        </li>
                        @foreach($pages as $page)
                        <li><a href="{{route('page',['slug'=>$page->slug])}}">{{ $page->pageTrans(App::getLocale(), $page->id) }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- col end -->
            <div class="col-sm-2 mb-3 mb-sm-0 col-6">
                <div class="footer-menu">
                    <ul>
                        <li class="title"><a>{{ __('messages.policy') }}</a></li>
                        @foreach($pagesright as $key=>$value)
                        <li>
                            <a href="{{route('page',['slug'=>$value->slug])}}">{{ $value->pageTrans(App::getLocale(), $value->id) }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- col end -->
            <div class="col-sm-3 mb-3 mb-sm-0">
                <div class="footer-menu">
                    <ul>
                        <li class="title stay_conn"><a>{{ __('messages.connect') }}</a></li>
                    </ul>
                    <ul class="social_link">
                        @foreach($socialicons as $value)
                        <li class="social_list">
                            <a class="mobile-social-link" href="{{$value->link}}"><i class="{{$value->icon}}"></i></a>
                        </li>
                        @endforeach
                    </ul>
                    <div class="d_app">
                        <h2>{{ __('messages.payment') }}</h2>
                            <img src="{{asset('public/frontEnd/images/cod.png')}}" alt="" />
                            <!-- <img src="{{asset('public/frontEnd/images/bkash.png')}}" alt="" /> -->
                            <!-- <img src="{{asset('public/frontEnd/images/nagad.png')}}" alt="" /> -->
                    </div>
                </div>
            </div>
            <!-- col end -->
        </div>
      </div>
      <div class="footer-bottom">
          <div class="container">
              <div class="row">
                  <div class="col-sm-12">
                      <div class="copyright">
                          <p>Copyright © {{ date('Y') }} {{$generalsetting->name}}. All rights reserved.</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </footer>
    <!-- end Footer -->
    <!-- END wrapper -->

    {{--<div class="footer_nav">
      <ul>
          <li>
              <a class="toggle">
                  <span>
                      <i class="fa-solid fa-bars"></i>
                  </span>
                  <span>Category</span>
              </a>
          </li>

          <li>
              <a href="https://wa.me/8801888140165">
                  <span>
                      <i class="fa-solid bi bi-whatsapp"></i>
                  </span>
                  <span>Whatsapp</span>
              </a>
          </li>

          <li class="mobile_home">
              <a href="{{route('home')}}">
                  <span><i class="fa-solid fa-home"></i></span>
                   <span>{{ __('messages.home') }}</span>
              </a>
          </li>

          <li>
              <a href="{{route('customer.order_track')}}">
                  <span>
                      <i class="fa fa-truck"></i>
                  </span>
                  <span>{{ __('messages.track') }}</span>
              </a>
          </li>
          @if(Auth::guard('customer')->user())
          <li>
              <a href="{{route('customer.account')}}">
                  <span>
                      <i class="fa-solid fa-user"></i>
                  </span>
                  <span>{{ __('messages.account') }}</span>
              </a>
          </li>
          @else
          <li>
              <a href="{{route('customer.login')}}">
                  <span>
                      <i class="fa-solid fa-user"></i>
                  </span>
                  <span>{{ __('messages.login') }}</span>
              </a>
          </li>
          @endif
      </ul>
    </div>--}}
    <!-- WhatsApp Button HTML -->
    <a href="https://wa.me/8801888140165" target="_blank" class="whatsapp-button">
        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/WhatsApp_icon.png" alt="Chat with us on WhatsApp" />
    </a>

    <!-- Vendor js -->
    <script src="{{asset('public/backEnd/')}}/assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="{{asset('public/backEnd/')}}/assets/js/app.min.js"></script>

        <script src="{{asset('public/frontEnd/js/jquery-3.6.3.min.js')}}"></script>
        <!-- <script src="{{asset('public/frontEnd/js/bootstrap.min.js')}}"></script> -->
        <script src="{{asset('public/frontEnd/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('public/frontEnd/js/mobile-menu.js')}}"></script>
        <script src="{{asset('public/frontEnd/js/wsit-menu.js')}}"></script>
        <script src="{{asset('public/frontEnd/js/mobile-menu-init.js')}}"></script>
        <script src="{{asset('public/frontEnd/js/wow.min.js')}}"></script>
        <script>
            new WOW().init();
        </script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        <!-- feather icon -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
        <script>
            feather.replace();
        </script>
        <script src="{{asset('public/backEnd/')}}/assets/js/toastr.min.js"></script>
        {!! Toastr::message() !!}
        @stack('script')
        <script>
            $(".quick_view").on("click", function () {
                var id = $(this).data("id");
                $("#loading").show();
                if (id) {
                    $.ajax({
                        type: "GET",
                        data: { id: id },
                        url: "{{route('quickview')}}",
                        success: function (data) {
                            if (data) {
                                $("#custom-modal").html(data);
                                $("#custom-modal").show();
                                $("#loading").hide();
                                $("#page-overlay").show();
                            }
                        },
                    });
                }
            });
        </script>
        <!-- quick view end -->
        <!-- cart js start -->

        <script>
            $(document).on('click', '.add-to-cart-button', function(e) {
                e.preventDefault();

                var productId = $(this).data('id');
                var qty = 1;

                $.ajax({
                    url: '{{ route('cart.store') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: productId,
                        qty: qty,
                    },
                    success: function(data) {
                        if(data){
                            return cart_count();
                        }
                    },
                    error: function(xhr) {
                        // Handle errors (optional)
                        alert('Something went wrong!');
                    }
                });
            });
            function cart_count(){
                $.ajax({
                    type:"GET",
                    url:"{{route('cart.count')}}",
                    success:function(data){               
                    if(data){
                        $(".cart-qty").html(data);
                    }else{
                        $(".cart-qty").empty();
                    }
                    }
                }); 
            };
        </script>


        <script>
            $(".addcartbutton").on("click", function () {
                var id = $(this).data("id");
                var qty = 1;
                if (id) {
                    $.ajax({
                        cache: "false",
                        type: "GET",
                        url: "{{url('add-to-cart')}}/" + id + "/" + qty,
                        dataType: "json",
                        success: function (data) {
                            if (data) {
                                toastr.success('Success', 'Product add to cart successfully');
                                return cart_count() + mobile_cart();
                            }
                        },
                    });
                }
            });
            $(".cart_store").on("click", function () {
                var id = $(this).data("id");
                var qty = $(this).parent().find("input").val();
                if (id) {
                    $.ajax({
                        type: "GET",
                        data: { id: id, qty: qty ? qty : 1 },
                        url: "{{route('cart.store')}}",
                        success: function (data) {
                            if (data) {
                                toastr.success('Success', 'Product add to cart succfully');
                                return cart_count() + mobile_cart();
                            }
                        },
                    });
                }
            });

            $(".cart_remove").on("click", function () {
                var id = $(this).data("id");
                if (id) {
                    $.ajax({
                        type: "GET",
                        data: { id: id },
                        url: "{{route('cart.remove')}}",
                        success: function (data) {
                            if (data) {
                                $(".cartlist").html(data);
                                return cart_count() + mobile_cart() + cart_summary();
                            }
                        },
                    });
                }
            });

            $(".cart_increment").on("click", function () {
                var id = $(this).data("id");
                if (id) {
                    $.ajax({
                        type: "GET",
                        data: { id: id },
                        url: "{{route('cart.increment')}}",
                        success: function (data) {
                            if (data) {
                                $(".cartlist").html(data);
                                return cart_count() + mobile_cart();
                            }
                        },
                    });
                }
            });

            $(".cart_decrement").on("click", function () {
                var id = $(this).data("id");
                if (id) {
                    $.ajax({
                        type: "GET",
                        data: { id: id },
                        url: "{{route('cart.decrement')}}",
                        success: function (data) {
                            if (data) {
                                $(".cartlist").html(data);
                                return cart_count() + mobile_cart();
                            }
                        },
                    });
                }
            });
            $(".cart_increment_by_id").on("click", function () {
                var id = $(this).data("id");
                if (id) {
                    $.ajax({
                        type: "GET",
                        data: { id: id },
                        url: "{{route('cart.increment_by_id')}}",
                        success: function (data) {
                            if (data) {
                                $(".cartlist").html(data);
                                return cart_count() + mobile_cart();
                            }
                        },
                    });
                }
            });

            $(".cart_decrement_by_id").on("click", function () {
                var id = $(this).data("id");
                if (id) {
                    $.ajax({
                        type: "GET",
                        data: { id: id },
                        url: "{{route('cart.decrement_by_id')}}",
                        success: function (data) {
                            if (data) {
                                $(".cartlist").html(data);
                                return cart_count() + mobile_cart();
                            }
                        },
                    });
                }
            });

            function cart_count() {
                $.ajax({
                    type: "GET",
                    url: "{{route('cart.count')}}",
                    success: function (data) {
                        if (data) {
                            $(".cart-qty").html(data);
                        } else {
                            $(".cart-qty").empty();
                        }
                    },
                });
            }
            function mobile_cart() {
                $.ajax({
                    type: "GET",
                    url: "{{route('mobile.cart.count')}}",
                    success: function (data) {
                        if (data) {
                            $(".mobilecart-qty").html(data);
                        } else {
                            $(".mobilecart-qty").empty();
                        }
                    },
                });
            }
            function cart_summary() {
                $.ajax({
                    type: "GET",
                    url: "{{route('shipping.charge')}}",
                    dataType: "html",
                    success: function (response) {
                        $(".cart-summary").html(response);
                    },
                });
            }
        </script>
        <!-- cart js end -->
        <script>
            $(".search_click").on("keyup change", function () {
                var keyword = $(".search_keyword").val();
                $.ajax({
                    type: "GET",
                    data: { keyword: keyword },
                    url: "{{route('livesearch')}}",
                    success: function (products) {
                        if (products) {
                            $(".search_result").html(products);
                        } else {
                            $(".search_result").empty();
                        }
                    },
                });
            });
            $(".msearch_click").on("keyup change", function () {
                var keyword = $(".msearch_keyword").val();
                $.ajax({
                    type: "GET",
                    data: { keyword: keyword },
                    url: "{{route('livesearch')}}",
                    success: function (products) {
                        if (products) {
                            $("#loading").hide();
                            $(".search_result").html(products);
                        } else {
                            $(".search_result").empty();
                        }
                    },
                });
            });
        </script>
        <!-- search js start -->
        <script></script>
        <script></script>
        <script>
            $(".district").on("change", function () {
                var id = $(this).val();
                $.ajax({
                    type: "GET",
                    data: { id: id },
                    url: "{{route('districts')}}",
                    success: function (res) {
                        if (res) {
                            $(".area").empty();
                            $(".area").append('<option value="">Select..</option>');
                            $.each(res, function (key, value) {
                                $(".area").append('<option value="' + key + '" >' + value + "</option>");
                            });
                        } else {
                            $(".area").empty();
                        }
                    },
                });
            });
        </script>
        <script>
            $(".toggle").on("click", function () {
                $("#page-overlay").show();
                $(".mobile-menu").addClass("active");
            });

            $("#page-overlay").on("click", function () {
                $("#page-overlay").hide();
                $(".mobile-menu").removeClass("active");
                $(".feature-products").removeClass("active");
            });

            $(".mobile-menu-close").on("click", function () {
                $("#page-overlay").hide();
                $(".mobile-menu").removeClass("active");
            });

            $(".mobile-filter-toggle").on("click", function () {
                $("#page-overlay").show();
                $(".feature-products").addClass("active");
            });
        </script>
        <script>
            $(document).ready(function () {
                $(".parent-category").each(function () {
                    const menuCatToggle = $(this).find(".menu-category-toggle");
                    const secondNav = $(this).find(".second-nav");

                    menuCatToggle.on("click", function () {
                        menuCatToggle.toggleClass("active");
                        secondNav.slideToggle("fast");
                        $(this).closest(".parent-category").toggleClass("active");
                    });
                });
                $(".parent-subcategory").each(function () {
                    const menuSubcatToggle = $(this).find(".menu-subcategory-toggle");
                    const thirdNav = $(this).find(".third-nav");

                    menuSubcatToggle.on("click", function () {
                        menuSubcatToggle.toggleClass("active");
                        thirdNav.slideToggle("fast");
                        $(this).closest(".parent-subcategory").toggleClass("active");
                    });
                });
            });
        </script>

        <script>
            var menu = new MmenuLight(document.querySelector("#menu"), "all");

            var navigator = menu.navigation({
                selectedClass: "Selected",
                slidingSubmenus: true,
                // theme: 'dark',
                title: "ক্যাটাগরি",
            });

            var drawer = menu.offcanvas({
                // position: 'left'
            });

            //  Open the menu.
            document.querySelector('a[href="#menu"]').addEventListener("click", (evnt) => {
                evnt.preventDefault();
                drawer.open();
            });
        </script>

        <script>
            // document.addEventListener("DOMContentLoaded", function () {
            //     window.addEventListener("scroll", function () {
            //         if (window.scrollY > 200) {
            //             document.getElementById("navbar_top").classList.add("fixed-top");
            //         } else {
            //             document.getElementById("navbar_top").classList.remove("fixed-top");
            //             document.body.style.paddingTop = "0";
            //         }
            //     });
            // });
            /*=== Main Menu Fixed === */
            // document.addEventListener("DOMContentLoaded", function () {
            //     window.addEventListener("scroll", function () {
            //         if (window.scrollY > 0) {
            //             document.getElementById("m_navbar_top").classList.add("fixed-top");
            //             // add padding top to show content behind navbar
            //             navbar_height = document.querySelector(".navbar").offsetHeight;
            //             document.body.style.paddingTop = navbar_height + "px";
            //         } else {
            //             document.getElementById("m_navbar_top").classList.remove("fixed-top");
            //             // remove padding top from body
            //             document.body.style.paddingTop = "0";
            //         }
            //     });
            // });
            /*=== Main Menu Fixed === */

            $(window).scroll(function () {
                if ($(this).scrollTop() > 50) {
                    $(".scrolltop:hidden").stop(true, true).fadeIn();
                } else {
                    $(".scrolltop").stop(true, true).fadeOut();
                }
            });
            $(function () {
                $(".scroll").click(function () {
                    $("html,body").animate({ scrollTop: $(".gotop").offset().top }, "1000");
                    return false;
                });
            });
        </script>
        <script>
            $(".filter_btn").click(function(){
               $(".filter_sidebar").addClass('active');
               $("body").css("overflow-y", "hidden");
            })
            $(".filter_close").click(function(){
               $(".filter_sidebar").removeClass('active');
               $("body").css("overflow-y", "auto");
            })
        </script>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K29C9BKJ"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->

  </body>
</html>
