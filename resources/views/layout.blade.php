<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css"
        href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700%7CLato%7CKalam:300,400,700">
    <link rel="canonical" href="https://demo.s-cart.org" />
    <meta name="description" content="Free website shopping cart for business">
    <meta name="keywords" content>
    <title>Demo S-Cart : Free Laravel eCommerce</title>
    <link rel="icon" href="https://demo.s-cart.org/images/icon.png" type="image/png" sizes="16x16">
    <meta property="og:image" content="https://demo.s-cart.org/images/org.jpg" />
    <meta property="og:url" content="https://demo.s-cart.org" />
    <meta property="og:type" content="Website" />
    <meta property="og:title" content="Demo S-Cart : Free Laravel eCommerce" />
    <meta property="og:description" content="Free website shopping cart for business" />
    <meta name="csrf-token" content="Qi3evAbBJWtB3v7SGJt6MNosNuUttOBO5pG5AYtx">


    <style>
        .sc-overlay {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            transform: -webkit-translate(-50%, -50%);
            transform: -moz-translate(-50%, -50%);
            transform: -ms-translate(-50%, -50%);
            color: #1f222b;
            z-index: 9999;
            background: rgba(255, 255, 255, 0.7);
        }

        #sc-loading {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 50;
            background: rgba(255, 255, 255, 0.7);
        }

        /*end loading */

        /*price*/
        .sc-new-price {
            color: #FE980F;
            font-size: 20px;
            padding: 10px 5px;
            font-weight: bold;
        }

        .sc-old-price {
            text-decoration: line-through;
            color: #a95d5d;
            font-size: 18px;
            padding: 10px;
        }

        /*end price*/
        .sc-product-build {
            font-size: 20px;
            font-weight: bold;
        }

        .sc-product-build img {
            width: 50px;
        }

        .sc-product-group img {
            width: 100px;
            cursor: pointer;
        }

        .sc-product-group:hover {
            box-shadow: 0px 0px 2px #999;
        }

        .sc-product-group:active {
            box-shadow: 0px 0px 2px #ff00ff;
        }

        .sc-product-group.active {
            box-shadow: 0px 0px 2px #ff00ff;
        }

        .sc-shipping-address td {
            padding: 3px !important;
        }

        .sc-shipping-address textarea,
        .sc-shipping-address input[type="text"],
        .sc-shipping-address option {
            width: 100%;
            padding: 7px !important;
        }

        .row_cart>td {
            vertical-align: middle !important;
        }

        input[type="number"] {
            text-align: center;
            padding: 2px;
        }

        .sc-notice {
            clear: both;
            clear: both;
            font-size: 20px;
            background: #f3f3f3;
            width: 100%;
        }

        img.new {
            position: absolute;
            right: 0px;
            top: 0px;
            padding: 0px !important;
        }

        .pointer {
            cursor: pointer;
        }

        .add-to-cart-list {
            padding: 5px 10px !important;
            margin: 2px !important;
            letter-spacing: 0px !important;
            font-size: 12px !important;
            border-radius: 5px;
        }

        .help-block {
            font-size: 12px;
            color: red;
            font-style: italic;
        }

        .post-minimal-time {
            font-size: 10px;
            font-style: italic;
        }

        .sc-point {
            cursor: pointer;
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-..." crossorigin="anonymous">


    <link href="https://db.onlinewebfonts.com/c/30a0adada561ec8493b9dfce36a805f8?family=fl-icons" rel="stylesheet">

    <style>
        @font-face {
            font-family: "fl-icons";
            src: url("https://db.onlinewebfonts.com/t/30a0adada561ec8493b9dfce36a805f8.eot");
            src: url("https://db.onlinewebfonts.com/t/30a0adada561ec8493b9dfce36a805f8.eot?#iefix")format("embedded-opentype"),
                url("https://db.onlinewebfonts.com/t/30a0adada561ec8493b9dfce36a805f8.woff2")format("woff2"),
                url("https://db.onlinewebfonts.com/t/30a0adada561ec8493b9dfce36a805f8.woff")format("woff"),
                url("https://db.onlinewebfonts.com/t/30a0adada561ec8493b9dfce36a805f8.ttf")format("truetype"),
                url("https://db.onlinewebfonts.com/t/30a0adada561ec8493b9dfce36a805f8.svg#fl-icons")format("svg");
        }

        font-family: "fl-icons";
    </style>


    <link rel="stylesheet" href="https://demo.s-cart.org/templates/s-cart-light/css/bootstrap.css">
    <link rel="stylesheet" href="https://demo.s-cart.org/templates/s-cart-light/css/fonts.css">
    <link rel="stylesheet" href="https://demo.s-cart.org/templates/s-cart-light/css/style.css">
    <style>
        ####CSS HERE ######
    </style>
    <style>
        .ie-panel {
            display: none;
            background: #212121;
            padding: 10px 0;
            box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, .3);
            clear: both;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        html.ie-10 .ie-panel,
        html.lt-ie-10 .ie-panel {
            display: block;
        }
    </style>


    @stack('style')
</head>

<body>
    <div class="ie-panel">
        <a href="http://windows.microsoft.com/en-US/internet-explorer/">
            <img src="https://demo.s-cart.org/templates/s-cart-light/images/ie8-panel/warning_bar_0000_us.jpg"
                height="42" width="820"
                alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today.">
        </a>
    </div>
    <div class="page">

        <header class="section page-header">

            <div class="rd-navbar-wrap">
                <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
                    data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed"
                    data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed"
                    data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static"
                    data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static"
                    data-lg-stick-up-offset="100px" data-xl-stick-up-offset="100px" data-xxl-stick-up-offset="100px"
                    data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
                    <div class="rd-navbar-main-outer">
                        <div class="rd-navbar-main">

                            <div class="rd-navbar-panel">

                                <button class="rd-navbar-toggle"
                                    data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>

                                <div class="rd-navbar-brand">
                                    <a class="brand" href="https://demo.s-cart.org"><img class="brand-logo-dark"
                                            src="https://demo.s-cart.org/data/logo/scart-mid.png" alt width="105"
                                            height="44" />
                                        <img class="brand-logo-light"
                                            src="https://demo.s-cart.org/data/logo/scart-mid.png" alt width="106"
                                            height="44" /></a>
                                </div>
                            </div>
                            <div class="rd-navbar-nav-wrap">

                                <ul class="rd-navbar-nav">
                                    <li class="rd-nav-item">
                                        <a class="rd-nav-link" href="{{ env('APP_URL') }}">Home</a>
                                    </li>
                                    <li class="rd-nav-item">
                                        <a class="rd-nav-link" href="{{ route('pagecategory') }}"> Shop </a>
                                    </li>
                                    <li class="rd-nav-item"><a class="rd-nav-link"
                                            href="@if (Auth::check()) {{ route('userinfo') }}
                                            @else
                                            {{ route('pagelogin') }} @endif
                                        "><i
                                                class="fa fa-lock"></i>
                                            @if (Auth::check())
                                                {{ Auth::user()->name }}
                                            @else
                                                customer
                                            @endif
                                        </a>
                                        <ul class="rd-menu rd-navbar-dropdown">
                                            <li class="rd-dropdown-item">
                                                @if (Auth::check())
                                                    <form action="{{ route('logout') }}" method="post">
                                                        @csrf
                                                        <button class="rd-dropdown-link btn font-weight-normal"
                                                            href=""><i class="fa fa-user"></i> Logout</button>

                                                    </form>
                                                @else
                                                    <a class="rd-dropdown-link" href="{{ route('pagelogin') }}"><i
                                                            class="fa fa-user"></i> Login</a>
                                                @endif

                                            </li>
                                            <li class="rd-dropdown-item">
                                                <a class="rd-dropdown-link" href="{{ route('wishlist') }}"><i
                                                        class="fas fa-heart"></i> Wishlist

                                                    {{--  <span class="count sc-wishlist" id="shopping-wishlist">0</span> --}}
                                                </a>
                                            </li>
                                            {{-- <li class="rd-dropdown-item">
                                                <a class="rd-dropdown-link" href="https://demo.s-cart.org/compare.html"><i class="fa fa-exchange"></i> Compare
                                                    <span class="count sc-compare" id="shopping-compare">0</span>
                                                </a>
                                            </li> --}}
                                        </ul>
                                    </li>
                                    {{-- <li class="rd-nav-item">
                                        <a class="rd-nav-link" href="#">
                                            <img src="https://demo.s-cart.org/data/language/flag_uk.png" style="height: 25px;"> <i class="fas fa-caret-down"></i>
                                        </a>
                                        <ul class="rd-menu rd-navbar-dropdown">
                                            <li class="rd-dropdown-item">
                                                <a class="rd-dropdown-link" href="https://demo.s-cart.org/locale/en">
                                                    <img src="https://demo.s-cart.org/data/language/flag_uk.png" style="height: 25px;"> English
                                                </a>
                                            </li>
                                            <li class="rd-dropdown-item">
                                                <a class="rd-dropdown-link" href="https://demo.s-cart.org/locale/vi">
                                                    <img src="https://demo.s-cart.org/data/language/flag_vn.png" style="height: 25px;"> Tiếng Việt
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="rd-nav-item">
                                        <a class="rd-nav-link" href="#">
                                            VietNam Dong <i class="fas fa-caret-down"></i>
                                        </a>
                                        <ul class="rd-menu rd-navbar-dropdown">
                                            <li class="rd-dropdown-item">
                                                <a class="rd-dropdown-link" href="https://demo.s-cart.org/currency/USD">
                                                    USD Dola
                                                </a>
                                            </li>
                                            <li class="rd-dropdown-item" disabled>
                                                <a class="rd-dropdown-link" href="https://demo.s-cart.org/currency/VND">
                                                    VietNam Dong
                                                </a>
                                            </li>
                                        </ul>
                                    </li> --}}
                                </ul>
                            </div>
                            <div class="rd-navbar-main-element">

                                <div class="rd-navbar-search rd-navbar-search-2">
                                    <button class="rd-navbar-search-toggle rd-navbar-fixed-element-3"
                                        data-rd-navbar-toggle=".rd-navbar-search"><span></span></button>
                                    <form class="rd-search" action="{{ route('search') }}" method="GET">
                                        <div class="form-wrap">
                                            <input class="rd-navbar-search-form-input form-input" type="text"
                                                name="keyword" placeholder="Input keyword" />
                                            <button class="rd-search-form-submit" type="submit"></button>
                                        </div>
                                    </form>
                                </div>


                                <div class="rd-navbar-basket-wrap">
                                    <a href="{{ route('cart') }}">

                                        <button class="rd-navbar-basket fl-bigmug-line-shopping202 ">

                                            <span class="count sc-cart" id="shopping-cart">{{ $cartcount }}</span>

                                        </button>
                                    </a>
                                </div>

                                <a title="Shopping cart" style="margin-top:10px;"
                                    class="rd-navbar-basket rd-navbar-basket-mobile fl-bigmug-line-shopping202 rd-navbar-fixed-element-2"
                                    href="{{ route('cart') }}">
                                    <span class="count sc-cart">{{ $cartcount }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        @yield('content')





        <footer class="section footer-classic">
            <div class="footer-classic-body section-lg bg-brown-2">
                <div class="container">
                    <div class="row row-40 row-md-50 justify-content-xl-between">
                        <div class="col-sm-6 col-lg-4 col-xl-3 wow fadeInRight">
                            <a href="https://demo.s-cart.org">
                                <img class="logo-footer" src="https://demo.s-cart.org/data/logo/scart-mid.png"
                                    alt="Demo S-Cart : Free Laravel eCommerce">
                            </a>
                            <p>Demo S-Cart : Free Laravel eCommerce</p>
                            <p> </p>
                            <div class="footer-classic-social">
                                <div class="group-lg group-middle">
                                    <div>
                                        <ul class="list-inline list-social list-inline-sm">
                                            <li><a class="icon mdi mdi-facebook"
                                                    href="https://www.facebook.com/SCart.Ecommerce/"></a></li>
                                            <li><a class="icon mdi mdi-twitter"
                                                    href="https://twitter.com/ecommercescart"></a></li>
                                            <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                                            <li><a class="icon mdi mdi-youtube-play"
                                                    href="https://www.youtube.com/channel/UCR8kitefby3N6KvvawQVqdg/videos"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 col-xl-3 wow fadeInRight" data-wow-delay=".1s">
                            <h4 class="footer-classic-title">About us</h4>
                            <ul class="contacts-creative">
                                <li>
                                    <div class="unit unit-spacing-sm flex-column flex-md-row">
                                        <div class="unit-left"><span class="icon mdi mdi-map-marker"></span></div>
                                        <div class="unit-body"><a href="#">Address: 123st - abc - xyz</a></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="unit unit-spacing-sm flex-column flex-md-row">
                                        <div class="unit-left"><span class="icon mdi mdi-phone"></span></div>
                                        <div class="unit-body"><a href="tel:#">Hotline: Support: 0987654321</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="unit unit-spacing-sm flex-column flex-md-row">
                                        <div class="unit-left"><span class="icon mdi mdi-email-outline"></span></div>
                                        <div class="unit-body"><a href="mailto:#demo@s-cart.org">Email:
                                                demo@s-cart.org</a></div>
                                    </div>
                                </li>
                                <li>
                                    <form class="rd-form-inline rd-form-inline-2" method="post"
                                        action="https://demo.s-cart.org/subscribe">
                                        <input type="hidden" name="_token"
                                            value="Qi3evAbBJWtB3v7SGJt6MNosNuUttOBO5pG5AYtx">
                                        <div class="form-wrap">
                                            <input class="form-input" id="subscribe-form-2-email" type="email"
                                                name="subscribe_email" required />
                                            <label class="form-label" for="subscribe-form-2-email">Email</label>
                                        </div>
                                        <div class="form-button">
                                            <button class="button button-icon-2 button-zakaria button-primary"
                                                type="submit" title="Subscribe email">
                                                <span class="fl-bigmug-line-paper122"></span>
                                            </button>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 wow fadeInRight" data-wow-delay=".2s">
                            <h4 class="footer-classic-title"> My profile</h4>

                            <ul class="contacts-creative">
                                <li class="rd-nav-item">
                                    <a class="rd-nav-link" href="https://demo.s-cart.org/customer/login.html">My
                                        profile</a>
                                </li>
                                <li class="rd-nav-item">
                                    <a class="rd-nav-link" href="https://demo.s-cart.org/compare.html">Product
                                        compare</a>
                                </li>
                                <li class="rd-nav-item">
                                    <a class="rd-nav-link" href="https://demo.s-cart.org/wishlst.html">Product
                                        Wishlist</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-classic-panel">
                <div class="container">
                    <div class="row row-10 align-items-center justify-content-sm-between">
                        <div class="col-md-auto">
                            <p class="rights"><span>&copy;&nbsp;</span><span
                                    class="copyright-year"></span><span>&nbsp;</span><span>Demo S-Cart : Free Laravel
                                    eCommerce</span><span>.&nbsp; All rights reserved</span></p>
                        </div>
                        <div class="col-md-auto order-md-1"> <a target="_blank"
                                href="https://www.facebook.com/groups/scart.opensource">Fanpage FB</a>
                        </div>
                        <div class="col-md-auto">
                            Power by <a href="https://s-cart.org">S-Cart 8.1.8</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <div id="sc-loading">
        <div class="sc-overlay"><i class="fa fa-spinner fa-pulse fa-5x fa-fw "></i></div>
    </div>
    <script src="https://demo.s-cart.org/templates/s-cart-light/js/core.min.js"></script>
    <script src="https://demo.s-cart.org/templates/s-cart-light/js/script.js"></script>

    <script type="text/javascript">
        function formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
        }
        $('#shipping').change(function() {
            $('#total').html(formatNumber(parseInt(0) + parseInt($('#shipping').val())));
        });
    </script>
    <script src="https://demo.s-cart.org/js/sweetalert2.all.min.js"></script>
    <script>
        function alertJs(type = 'error', msg = '') {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            Toast.fire({
                type: type,
                title: msg
            })
        }

        function alertMsg(type = 'error', msg = '', note = '') {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: true,
            });
            swalWithBootstrapButtons.fire(
                msg,
                note,
                type
            )
        }
    </script>

    {{-- <script type="text/javascript">
        function addToCartAjax(id, instance = null, storeId = null) {
            $.ajax({
                url: "https://demo.s-cart.org/add_to_cart_ajax",
                type: "POST",
                dataType: "JSON",
                data: {
                    "id": id,
                    "instance": instance,
                    "storeId": storeId,
                    "_token": "Qi3evAbBJWtB3v7SGJt6MNosNuUttOBO5pG5AYtx"
                },
                async: false,
                success: function(data) {
                    // console.log(data);
                    error = parseInt(data.error);
                    if (error == 0) {
                        setTimeout(function() {
                            if (data.instance == 'default') {
                                $('.sc-cart').html(data.count_cart);
                            } else {
                                $('.sc-' + data.instance).html(data.count_cart);
                            }
                        }, 1000);
                        alertJs('success', data.msg);
                    } else {
                        if (data.redirect) {
                            window.location.replace(data.redirect);
                            return;
                        }
                        alertJs('error', data.msg);
                    }

                }
            });
        }
    </script>

 --}}



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js"
        crossorigin="anonymous"></script>
    <script type="text/javascript">
        $('.countdown_time').each(function() {
            var endTime = $(this).data('time');
            $(this).countdown(endTime, function(tm) {
                let html =
                    '<div class="countdown_box_cus"><div class="countdown-wrap-cus"><span class="countdown-cus days">%D </span><span class="cd_text">Days</span></div></div><div class="countdown_box_cus"><div class="countdown-wrap-cus"><span class="countdown-cus hours">%H</span><span class="cd_text">Hours</span></div></div><div class="countdown_box_cus"><div class="countdown-wrap-cus"><span class="countdown-cus minutes">%M</span><span class="cd_text">Minutes</span></div></div><div class="countdown_box_cus"><div class="countdown-wrap-cus"><span class="countdown-cus seconds">%S</span><span class="cd_text">Seconds</span></div></div>';
                $(this).html(tm.strftime(html));
            });
        });
    </script>

    <script>
        @if (Session::has('message'))
            alertJs('{{ session('type') }}', '{{ session('message') }}');
        @endif
    </script>

    @stack('scripts')
</body>

</html>
