@extends('layout')

@section('content')
    {{-- <style> section.contact { width: 100%; position: fixed; bottom: 5px; left: 0; right: 0; z-index: 2; background-color: #0c0c0c6b; -moz-box-shadow: 0 -1px 0 rgba(0,0,0,.2); } section.contact a { color:#fff !important } </style> <section class="contact"> <div class="container" style="padding:10px !important;color:#fff;text-align: center;"> <div class="row"> <div class="col-xs-12 col-sm-6"> <a href="https://demo.s-cart.org/sc_admin"><span class="fa fa-map-signs" aria-hidden="true"></span> ADMIN PANEL</a> </div> <div class="col-xs-12 col-sm-6"> <a href="https://s-cart.org/download.html"><span class="fa fa-arrow-circle-down" aria-hidden="true"></span> Download</a> </div> </div> </section>
 --}}

    <section class="breadcrumbs-custom">
        <div class="parallax-container" data-parallax-img="https://demo.s-cart.org/data/banner/breadcrumb.jpg">
            <div class="material-parallax parallax">
                <img src="https://demo.s-cart.org/data/banner/breadcrumb.jpg" alt
                    style="display: block; transform: translate3d(-50%, 83px, 0px);">
            </div>
            <div class="breadcrumbs-custom-body parallax-content context-dark">
                <div class="container">
                    <h2 class="breadcrumbs-custom-title">{{ $product->name }}</h2>
                </div>
            </div>
        </div>
        <div class="breadcrumbs-custom-footer">
            <div class="container">
                <ul class="breadcrumbs-custom-path">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('pagecategory') }}">Shop</a></li>
                    {{-- <li><a href="https://demo.s-cart.org/category/pho-nam-dinh.html">Pho Nam Dinh</a></li> --}}
                    <li class="active">{{ $product->name }}</li>
                </ul>
            </div>
        </div>
    </section>



    <div class="col-12">
        <div class="sc-notice">
        </div>
    </div>


    <section class="section section-xxl bg-default text-md-left">
        <div class="container">
            <div class="row row-50">



                

                <div class="col-lg-4 col-xl-3">
                    @include('include.leftbar') 
                    
                </div>


                <div class="col-lg-9 col-xl-9">

                    <section class="section section-sm section-first bg-default">
                        <div class="container">
                            <div class="row row-30">
                                <div class="col-lg-6">
                                    <div class="slick-vertical slick-product">

                                        <div class="slick-slider carousel-parent" id="carousel-parent" data-items="1"
                                            data-swipe="true" data-child="#child-carousel" data-for="#child-carousel">
                                            <div class="item">
                                                <div class="slick-product-figure"><img
                                                        src="{{ env('APP_URL') . '/documents/website/' . $product->image }}"
                                                        alt width="530" height="480" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <form id="buy_block" class="product-information"
                                        action="{{ route('addtoCart') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" id="product-detail-id"
                                            value="{{ $product->id }}" />
                                        
                                        <div class="single-product">
                                            <h3 class="text-transform-none font-weight-medium" id="product-detail-name">
                                                {{ $product->name }}</h3>
                                            <p>
                                                SKU: <span id="product-detail-model">{{ $product->slug }}</span>
                                            </p>
                                            <div class="group-md group-middle">
                                                <div class="single-product-price" id="product-detail-price">
                                                    <span class="sc-new-price">{{number_format( $product->price) }}₫</span>
                                                    <span class="sc-old-price">{{ number_format($product->old_price) }}₫</span>
                                                </div>
                                            </div>
                                            <hr class="hr-gray-100">
                                            <div class="group-xs group-middle">
                                                <div class="product-stepper">
                                                    <input class="form-input" name="qty" type="number"
                                                        data-zeros="true" value="1" min="1" max="100">
                                                </div>
                                                <div>
                                                    <button style class=" button button-lg  button-secondary"
                                                        type="submit" id="sc_button-form-process">Add to cart</button>
                                                </div>
                                            </div>
                                            <div id="product-detail-attr">
                                                @if($listcolor)
                                                    <br><b><label> Color</label></b>:
                                                    @foreach($listcolor as $key => $color)

                                                        
                                                        <label class="radio-inline"><input checked type="radio"
                                                                name="color" value="{{ $color->id}}">
                                                            {{ $color->name_attribute }}<span class="option_price">(+{{ $color->price }})</span>
                                                        </label>
                                                    @endforeach

                                                @endif
                                               
                                                @if($listsize)
                                                    <br><b><label> Size</label></b>:
                                                    @foreach($listsize as $key => $size)
                                                    <label class="radio-inline"><input checked type="radio"
                                                            name="size" value="{{ $size->id }}">
                                                        {{ $size->name_attribute }}<span class="option_price">(+{{ $size->price }})</span>
                                                    </label>
                                                @endforeach


                                                @endif
                                                
                                            </div>
                                            <div>
                                                Stock status:
                                                <span id="stock_status">
                                                    In stock
                                                </span>
                                            </div>
                                          
                                            @if (isset($category))
                                                <div>
                                                    Category:
                                                    <a href="{{ route('category',$category->slug) }}">{{$category->name}}</a>,
                                                </div>
                                            @endif
                                            @if (isset($brand))
                                                <div>
                                                    Brand:
                                                    <span id="product-detail-brand">
                                                        <a href="">{{ $brand->name }}</a>
                                                    </span>
                                                </div>

                                            @endif
                                        
                                            
                                            <hr class="hr-gray-100">
                                            <div class="group-xs group-middle"><span
                                                    class="list-social-title">Share</span>
                                                <div>
                                                    <ul class="list-inline list-social list-inline-sm">
                                                        <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                                                        <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                                                        <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                                                        <li><a class="icon mdi mdi-google-plus" href="#"></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="tabs-custom tabs-horizontal tabs-line" id="tabs-1">

                                <div class="nav-tabs-wrap">
                                    <ul class="nav nav-tabs nav-tabs-1">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" href="#tabs-1-1" data-toggle="tab">Description</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content tab-content-1">
                                    <div class="tab-pane fade show active" id="tabs-1-1">
                                        {!! $product->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="section section-sm section-last bg-default">
                        <div class="container">
                            <h4 class="font-weight-sbold">Recommend products</h4>
                            <div class="row row-lg row-30 row-lg-50 justify-content-center">

                                @foreach($listproductrelatedown as $productrelate)
                                <div class="col-sm-6 col-md-5 col-lg-3">
                                    <article class="product wow fadeInRight">
                                        <div class="product-body">
                                            <div class="product-figure">
                                                <a href="{{route('detail',$productrelate ->slug ) }}">
                                                    <img src=" {{env('APP_URL'). '/documents/website/'.$productrelate->image }}"
                                                        alt="{{ $productrelate ->name }}" />
                                                </a>
                                            </div>
                                            <h5 class="product-title"><a
                                                    href="{{route('detail',$productrelate ->slug ) }}">{{ $productrelate ->name }}</a></h5>
                                            <a onClick="addToCartAjax('{{ $productrelate ->id}}')"
                                                style class="button button-secondary  button-zakaria add-to-cart-list"><i
                                                    class="fa fa-cart-plus"></i> Add to cart</a>
                                            <div class="product-price-wrap">
                                                <div class="product-price product-price-old">{{ number_format($productrelate ->old_price) }}đ</div>
                                                <div class="product-price">{{ number_format($productrelate ->price)}}đ</div>
                                            </div>
                                        </div>
                                        {{-- <span><img class="product-badge new"
                                                src="https://demo.s-cart.org/templates/s-cart-light/images/home/sale.png"
                                                class="new" alt /></span> --}}
                                        <div class="product-button-wrap">
                                            <div class="product-button">
                                                <a class="button button-secondary button-zakaria"
                                                    onClick="addToWishListAjax( '{{ $productrelate ->id}}' )">
                                                    <i class="fas fa-heart"></i>
                                                </a>
                                            </div>
                                            <div class="product-button">
                                                <a class="button button-primary button-zakaria"
                                                    onClick="addToCartAjax('980b670b-33b8-4a98-bb98-b53ba8cc8cbf','compare','1')">
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

                </div>




            </div>
        </div>
    </section>
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





