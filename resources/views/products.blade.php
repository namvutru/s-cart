@extends('layout')

@section('content')


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
            <div class="col-xs-12 col-sm-6"> <a href="https://demo.s-cart.org/sc_admin"><span class="fa fa-map-signs" aria-hidden="true"></span> ADMIN PANEL</a> </div>
            <div class="col-xs-12 col-sm-6"> <a href="https://s-cart.org/download.html"><span class="fa fa-arrow-circle-down" aria-hidden="true"></span> Download</a> </div>
        </div>
</section> --}}


<section class="breadcrumbs-custom">
    <div class="parallax-container" data-parallax-img="https://demo.s-cart.org/data/banner/breadcrumb.jpg">
        <div class="material-parallax parallax">
            <img src="https://demo.s-cart.org/data/banner/breadcrumb.jpg" alt style="display: block; transform: translate3d(-50%, 83px, 0px);">
        </div>
        <div class="breadcrumbs-custom-body parallax-content context-dark">
            <div class="container">
                <h2 class="breadcrumbs-custom-title">Tìm kiếm: @if(isset($keyword)){{ $keyword }} @endif</h2>
            </div>
        </div>
    </div>
    <div class="breadcrumbs-custom-footer">
        <div class="container">
            <ul class="breadcrumbs-custom-path">
                <li><a href="https://demo.s-cart.org">Trang chủ</a></li>
                <li class="active">Tìm kiếm</li>
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
                <div class="product-top-panel group-md">

                    <p class="product-top-panel-title">
                        Hiển thị <b> {{$listproduct->firstItem()}}</b>-<b> {{$listproduct->lastItem()}}</b> của <b>{{$listproduct_count}}</b> kết quả</b>
                        
                    </p>

                    <form action method="GET" id="filter_sort">
                        <input type="hidden" name="keyword" value="a">
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

                <div class="row row-30 row-lg-50">

                @foreach($listproduct as $product)
                    <div class="col-sm-6 col-md-4 col-lg-6 col-xl-4">

                        <article class="product wow fadeInRight">
                            <div class="product-body">
                                <div class="product-figure">
                                    <a href="{{ 'detail',$product->slug }}">
                                        <img src="{{env('APP_URL').'/documents/website/'.$product->image}}" alt="{{$product->name}}" />
                                    </a>
                                </div>
                                <h5 class="product-title"><a href="{{route('detail',$product->slug)}}">{{$product->name}}</a></h5>
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
                                    <div class="product-price product-price-old">{{number_format($product->old_price)}}</div>
                                    <div class="product-price">{{number_format($product->price)}}</div>
                                </div>
                            </div>
                            <span><img class="product-badge new" src="https://demo.s-cart.org/templates/s-cart-light/images/home/sale.png" class="new" alt /></span>
                            <div class="product-button-wrap">
                                <div class="product-button">
                                    <a class="button button-secondary button-zakaria"
                                    onClick="addToWishListAjax( '{{$product->id}}' )">
                                    <i class="fas fa-heart"></i>
                                </a>
                                </div>
                                <div class="product-button">
                                    <a class="button button-primary button-zakaria" onClick="addToCartAjax('980b670b-33d7-4924-8821-08137e74840a','compare','1')">
                                        <i class="fa fa-exchange"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
                    
            </div>
            <div class="pagination-wrap">
                @if(isset($filter_sort))
                {!!$listproduct->appends('filter_sort',$filter_sort)->appends('keyword',$keyword)->links('vendor.pagination.bootstrap-4') !!}
                @else 
                {!!$listproduct->appends('keyword',$keyword)->links('vendor.pagination.bootstrap-4') !!}
                
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





