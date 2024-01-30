@extends('layout')

@section('content')
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



    <section class="breadcrumbs-custom">
        <div class="parallax-container" data-parallax-img="https://demo.s-cart.org/data/banner/banner-store.jpg">
            <div class="material-parallax parallax">
                <img src="https://demo.s-cart.org/data/banner/banner-store.jpg" alt
                    style="display: block; transform: translate3d(-50%, 83px, 0px);">
            </div>
            <div class="breadcrumbs-custom-body parallax-content context-dark">
                <div class="container">
                   @if (isset($category))
                        <h2 class="breadcrumbs-custom-title">{{ $category->name }}</h2>
                    @else
                        <h2 class="breadcrumbs-custom-title">Shop</h2>
                    @endif
                    
                </div>
            </div>
        </div>
        <div class="breadcrumbs-custom-footer">
            <div class="container">
                <ul class="breadcrumbs-custom-path">
                    <li><a href="https://demo.s-cart.org">Home</a></li>
                    <li class="active">Shop</li>
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
                    <div class="aside row row-30 row-md-50 justify-content-md-between">


                        <div class="aside-item col-sm-6 col-md-5 col-lg-12">
                            <h6 class="aside-title">Categries</h6>
                            <ul class="list-shop-filter">
                                @foreach ($listrootcategory as $cate)
                                    <li class="product-minimal-title active"><a
                                            href="{{ route('category', $cate->slug) }}"> {{ $cate->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="aside-item col-sm-6 col-lg-12">
                            <h6 class="aside-title">Brands</h6>
                            <div class="row row-10 row-lg-20 gutters-10">
                                <div class="group-sm group-tags">
                                    @foreach ($listbrand as $brand)
                                        <a class="link-tag" href="">
                                            {{ $brand->name }}</a>
                                    @endforeach


                                </div>

                            </div>
                        </div>

                        @include('include.leftbar')

                    </div>
                </div>

               


                <div class="col-lg-9 col-xl-9">
                  
                     @if(isset($listchild))

                    <h6 class="aside-title">Subcategory</h6>

                    
                    <div class="row item-folder">
                        @foreach($listchild as $child)
                        
                        <div class="col-6 col-sm-6 col-md-3">
                            <div class="item-folder-wrapper product-single">
                                <div class="single-products">
                                    <div class="productinfo text-center product-box-980b670b-2196-41fe-b21e-66970db9cb3b">
                                        <a href="{{ route('category',$child->slug) }}">
                                            <img
                                          
                                                src=" {{ env('APP_URL') . '/documents/website/' .$child->image }}"
                                                alt="{{ $child->name }}" /></a>
                                        <a href="{{ route('category',$child->slug) }}">
                                            <p>{{ $child->name }}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                    


                    <div class="product-top-panel group-md">

                        <p class="product-top-panel-title">
                            Hiển thị <b> {{ $listproduct->firstItem() }}</b>-<b> {{ $listproduct->lastItem() }}</b> của
                            <b>{{ $listproduct_count }}</b> kết quả</b>

                        </p>

                        <form 
                        action="@if(!isset($category)) {{ route('pagecategory') }} @else {{ route('category',$category->slug) }} @endif"
                        
                        method="GET"  id="filter_sort">
                            <select class="form-control" name="filter_sort">
                                
                                @if(isset($filter_sort))

                                    <option value="price_asc" @if($filter_sort=="price_asc") selected @endif>
                                        Price ascending</option>
                                    <option value="price_desc" @if($filter_sort=="price_desc") selected @endif>
                                        Price descending</option>
                                    <option value="sort_asc" @if($filter_sort=="sort_asc") selected @endif>
                                        Sort ascending</option>
                                    <option value="sort_desc" @if($filter_sort=="sort_desc") selected @endif>
                                        Sort descending</option>
                                    <option value="id_asc" @if($filter_sort=="id_asc") selected @endif>
                                        ID ascending
                                    </option>
                                    <option value="id_desc" @if($filter_sort=="id_desc") selected @endif>
                                        ID descending</option>   
                                @else
                                    <option value>Sort</option>
                                    <option value="price_asc" >
                                        Price ascending</option>
                                    <option value="price_desc" >
                                        Price descending</option>
                                    <option value="sort_asc">
                                        Sort ascending</option>
                                    <option value="sort_desc" >
                                        Sort descending</option>
                                    <option value="id_asc" >
                                        ID ascending
                                    </option>
                                    <option value="id_desc" >
                                        ID descending</option>  

                                        
                                    
                                
                                @endif
                            </select>
                        </form>

                    </div>
                    <br>

                    <div class="row row-30 row-lg-50">
                        @foreach ($listproduct as $product)
                            <div class="col-sm-6 col-md-4 col-lg-6 col-xl-4">
                                

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
                                            <div class="product-price product-price-old">{{number_format( $product->price )}} đ</div>
                                            <div class="product-price">{{number_format(  $product->price )}} đ</div>
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

                    <div class="pagination-wrap" style="align-items: center;">
                        @if(isset($category))
                            @if(isset($filter_sort))
                                {!!$listproduct->appends('category',$category)->appends('filter_sort',$filter_sort)->links('vendor.pagination.bootstrap-4') !!}
                            @else
                                {!!$listproduct->appends('category',$category)->links('vendor.pagination.bootstrap-4') !!}      
                            @endif
                        
                        
                            
                        @else
                            
                        
                            @if(isset($filter_sort))
                                {!!$listproduct->appends('filter_sort',$filter_sort)->links('vendor.pagination.bootstrap-4') !!}
                            @else
                                {!!$listproduct->links('vendor.pagination.bootstrap-4') !!}      
                            @endif
        
                        @endif
                        
                    </div>




                </div>
            </div>
           
    </section>
@endsection


@push('scripts') 
    <script>
        $('[name="filter_sort"]').change(function(event) {
            $('#filter_sort').submit();
        });
    </script>


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





