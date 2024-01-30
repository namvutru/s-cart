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
 


    <section class="breadcrumbs-custom">
        <div class="breadcrumbs-custom-footer">
            <div class="container">
                <ul class="breadcrumbs-custom-path">
                    <li><a href="https://demo.s-cart.org">Home</a></li>
                    <li class="active">Page wishlist</li>
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
                    <h6 class="aside-title">Page wishlist</h6>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-danger">
                                <div class="table-responsive">
                                    <table class="table box table-bordered">
                                        <thead>
                                            <tr style="background: #eaebec">
                                                <th style="width: 50px;">No.</th>
                                                <th style="width: 100px;">SKU code</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($wishlist as $key => $item)
                                                <tr class="row_cart">
                                                    <td>2</td>
                                                    <td>{{ $listproduct[$item->id]->slug }}</td>
                                                    <td>
                                                        <a href="{{ route('detail', $listproduct[$item->id]->slug) }}"
                                                            class="row_cart-name">
                                                            <img width="100"
                                                                src="{{ env('APP_URL') . '/documents/website/' . $listproduct[$item->id]->image }}"
                                                                alt="{{ $item->name }}">
                                                            <span>
                                                                {{ $item->name }}<br />
                                                            </span>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <div class="product-price-wrap">
                                                            <div class="product-price product-price-old">{{number_format( $item->price )}} đ</div>
                                                            <div class="product-price">{{ number_format($item->price) }} đ</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a onClick="return confirm('Confirm')" title="Remove Item"
                                                            alt="Remove Item" class="cart_quantity_delete"
                                                            href="{{ route('removeToWishList', $item->rowId) }}"><i
                                                                class="fa fa-times"></i></a>
                                                    </td>
                                                </tr>
                                                
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </section>
@endsection


@push('scripts')
@endpush
