@extends('layout')

@section('content')
    <section class="section swiper-container swiper-slider swiper-slider-1" data-loop="true" data-autoplay="5000">
        <div class="swiper-wrapper text-center text-lg-left">
            <div class="swiper-slide swiper-slide-caption context-dark"
                data-slide-bg="https://demo.s-cart.org/data/banner/banner-home-2.jpg">
                <div class="swiper-slide-caption section-md text-center">
                    <div class="container">
                        <a href="https://demo.s-cart.org/banner/980b670b-2eff-44e5-8d58-4a946f5909cb" target="_self">
                            <h1 class="swiper-title-1" data-caption-animate="fadeScale" data-caption-delay="100">Top-notch
                                Furniture</h1>
                            <p class="biggest text-white-70" data-caption-animate="fadeScale" data-caption-delay="200">Sofa
                                Store provides the best furniture and accessories for homes and offices.</p>
                            <div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="300"> <span
                                    class="button button-zachem-tak-delat button-white button-zakaria"> Shop now</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="swiper-slide swiper-slide-caption context-dark"
                data-slide-bg="https://demo.s-cart.org/data/banner/banner-home-1.jpg">
                <div class="swiper-slide-caption section-md text-center">
                    <div class="container">
                        <a href="https://demo.s-cart.org/banner/980b670b-2ef7-4a86-8492-205fd111ee33" target="_self">
                            <h1 class="swiper-title-1" data-caption-animate="fadeScale" data-caption-delay="100">Top-notch
                                Furniture</h1>
                            <p class="biggest text-white-70" data-caption-animate="fadeScale" data-caption-delay="200">Sofa
                                Store provides the best furniture and accessories for homes and offices.</p>
                            <div class="button-wrap" data-caption-animate="fadeInUp" data-caption-delay="300"> <span
                                    class="button button-zachem-tak-delat button-white button-zakaria"> Shop now</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="swiper-slide swiper-slide-caption context-dark"
                data-slide-bg="https://demo.s-cart.org/data/banner/banner-home-2.jpg">
                <div class="swiper-slide-caption section-md text-center">
                    <div class="container">
                        <a href="https://demo.s-cart.org/banner/980b6709-d524-4dee-bf93-38d0c6a248b1" target="_self">
                        </a>
                    </div>
                </div>
            </div>
            <div class="swiper-slide swiper-slide-caption context-dark"
                data-slide-bg="https://demo.s-cart.org/data/banner/banner-home-1.jpg">
                <div class="swiper-slide-caption section-md text-center">
                    <div class="container">
                        <a href="https://demo.s-cart.org/banner/980b6709-d15a-4490-8787-4fb232252c0d" target="_self">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="swiper-pagination"></div>

        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </section>




    <div class="section bg-default">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading_tab_header">
                        <div class="heading_s2">
                            <h2 class="wow fadeScale"><a href="https://demo.s-cart.org/flash-sale.html"
                                    class="text_default">Flash sale</a></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row row-30 row-lg-50">
                        @foreach ($hotproduct as $hotpro)
                            <div class="col-sm-6">

                                <div class="deal_wrap">
                                    <div class="product_img">
                                        <a href="{{ route('detail', $hotpro->slug) }}">
                                            <img src="{{ env('APP_URL') . '/documents/website/' . $hotpro->image }}"
                                                alt="el_img1">
                                        </a>
                                    </div>
                                    <div class="deal_content">
                                        <div class="product_info">
                                            <h5 class="product_title"><a
                                                    href="{{ route('detail', $hotpro->slug) }}">{{ $hotpro->name }}</a>
                                            </h5>
                                            <div class="product-price-wrap">
                                                <div class="product-price product-price-old">{{ number_format($hotpro->old_price) }}₫</div>
                                                <div class="product-price">{{number_format( $hotpro->price )}}₫</div>
                                            </div>
                                        </div>
                                        <div class="deal_progress">
                                            <span class="stock-sold">Already Sold: <strong>{{ $hotpro->quantitybuy($hotpro->id) }}</strong></span>
                                            <span class="stock-available">Available: <strong>{{ $hotpro->quantity }}</strong></span>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="{{ $hotpro->quantitybuy($hotpro->id)/($hotpro->quantitybuy($hotpro->id)+$hotpro->quantity) *100 }}"
                                                    aria-valuemin="0" aria-valuemax="100" style="width:{{ $hotpro->quantitybuy($hotpro->id)/($hotpro->quantitybuy($hotpro->id)+$hotpro->quantity) *100 }}%"> {{ $hotpro->quantitybuy($hotpro->id)/($hotpro->quantitybuy($hotpro->id)+$hotpro->quantity) *100 }}% </div>
                                            </div>
                                        </div>
                                        <div class="countdown_time" data-time="2025-11-29 23:00:00"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach




                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .deal_wrap {
            border: 2px solid #FF324D;
            border-radius: 20px;
            overflow: hidden;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            margin-bottom: 25px;
        }

        .deal_wrap .product_img {
            max-width: 200px;
            width: 100%;
        }

        .deal_wrap .deal_content {
            width: 100%;
            padding: 30px 30px 30px 0;
        }

        .deal_wrap .deal_content .product_info {
            padding: 0;
        }

        .deal_wrap .countdown_box_cus {
            float: left;
            width: 25%;
            padding: 5px;
        }

        .deal_wrap .countdown_box_cus .countdown-wrap-cus {
            background: #dad6d6;
        }

        .deal_wrap .countdown_box_cus .countdown-cus {
            font-size: 24px;
            display: block;
        }

        .deal_wrap .countdown_time .cd_text {
            font-size: 13px;
            display: block;
        }

        .deal_wrap .deal_content .deal_progress {
            padding-top: 5px;
            display: block;
        }

        .deal_wrap .deal_content .deal_progress .stock-available {
            float: right;
        }

        .deal_wrap .deal_content .deal_progress .progress {
            margin-top: 5px;
            margin-bottom: 20px;
            border-radius: 20px;
        }

        .deal_progress .progress-bar {
            background-color: #FF324D;
            text-indent: -99999px;
        }
    </style>
    <style>
        section.contact {
            width: 100%;
            position: fixed;
            bottom: 5px;
            left: 0;
            right: 0;
            z-index: 2;
            background-color: #0c0c0c6b;
            -moz-box-shadow: 0 -1px 0 rgba(0, 0, 0, .2);
        }

        section.contact a {
            color: #fff !important
        }
    </style>
    {{-- <section class="contact">
        <div class="container" style="padding:10px !important;color:#fff;text-align: center;">
            <div class="row">
                <div class="col-xs-12 col-sm-6"> <a href="https://demo.s-cart.org/sc_admin"><span class="fa fa-map-signs"
                            aria-hidden="true"></span> ADMIN PANEL</a> </div>
                <div class="col-xs-12 col-sm-6"> <a href="https://s-cart.org/download.html"><span
                            class="fa fa-arrow-circle-down" aria-hidden="true"></span> Download</a> </div>
            </div>
    </section> --}}

    <section class="section section-xxl bg-default">
        <div class="container">
            <h2 class="wow fadeScale">New products</h2>
            <div class="row row-30 row-lg-50">
                @foreach ($listproduct as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <article class="product wow fadeInRight">
                            <div class="product-body">
                                <div class="product-figure">
                                    <a href="{{ route('detail', $product->slug) }}">
                                        <img src="{{ env('APP_URL') . '/documents/website/' . $product->image }}"
                                            alt="{{ $product->name }}" />
                                    </a>
                                </div>
                                <h5 class="product-title"><a
                                        href="{{ route('detail', $product->slug) }}">{{ $product->name }}</a></h5>
                                        @if($product->checkattribute($product->id))

                                            <a href="{{ route('detail', $product->slug) }}" style
                                                class="button button-secondary  button-zakaria add-to-cart-list"><i
                                                    class="fa fa-cart-plus"></i> Add to cart</a>

                                        @else
                                            <a onClick="addToCartAjax('{{ $product->id }}','shoppingcart','1')" style
                                                class="button button-secondary  button-zakaria add-to-cart-list"><i
                                                    class="fa fa-cart-plus"></i> Add to cart</a>

                                        @endif
                                

                                        
                                <div class="product-price-wrap">
                                    <div class="product-price product-price-old">{{ number_format($product->old_rice )}}₫</div>
                                    <div class="product-price">{{ number_format($product->price )}}₫</div>
                                </div>
                            </div>
                            <span><img class="product-badge new"
                                    src="https://demo.s-cart.org/templates/s-cart-light/images/home/sale.png"
                                    class="new" alt /></span>
                            <div class="product-button-wrap">
                                <div class="product-button">
                                    
                                    <a class="button button-secondary button-zakaria"
                                        onClick="addToWishListAjax( '{{$product->id}}' )">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                </div>
                                <div class="product-button">
                                    <a class="button button-primary button-zakaria"
                                        onClick="addToCartAjax('980b670b-33d7-4924-8821-08137e74840a','compare','1')">
                                        <i class="fa fa-exchange"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>





    <div class="col-12">
        <div class="sc-notice">
        </div>
    </div>







    
@endsection

@push('scripts')
    

    <script type="text/javascript">
        function addToCartAjax(id, instance = null, storeId = null) {
           
            $.ajax({
                url: '{{ url('/addtoCart') }}',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id,
                    qty: 1,
                    instance: instance,
                    storeId: storeId,
                    _token: "{{ csrf_token() }}"
                },
                async: false,
                success: function(data) {
                    console.log(data);
                    error = parseInt(data.error);
                    if (error == 0) {
                        setTimeout(function() {
                            if (data.instance == 'shoppingcart') {
                                $('.sc-cart').html(data.count_cart);
                            } else {
                                $('.sc-' + data.instance).html(data.count_cart);
                            }
                        }, 1000);
                        alertJs('success', data.msg);
                    } else {
                        alertJs('error', data.msg);
                    }

                }
            });
        }
    </script>


<script type="text/javascript">
    function addToWishListAjax(id) {
       
        $.ajax({
            url: '{{ url('/addtoWishList') }}',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id,
                _token: "{{ csrf_token() }}"
            },
            async: false,
            success: function(data) {
                console.log(data);
                error = parseInt(data.error);
                alertJs('success', data.msg);
                if (error == 0) {
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
@endpush
