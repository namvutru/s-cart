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
                <div class="col-xs-12 col-sm-6"> <a href="https://demo.s-cart.org/sc_admin"><span class="fa fa-map-signs"
                            aria-hidden="true"></span> ADMIN PANEL</a> </div>
                <div class="col-xs-12 col-sm-6"> <a href="https://s-cart.org/download.html"><span
                            class="fa fa-arrow-circle-down" aria-hidden="true"></span> Download</a> </div>
            </div>
    </section> --}}


    <section class="breadcrumbs-custom">
        <div class="breadcrumbs-custom-footer">
            <div class="container">
                <ul class="breadcrumbs-custom-path">
                    <li><a href="https://demo.s-cart.org">Home</a></li>
                    <li class="active">Shopping cart</li>
                </ul>
            </div>
        </div>
    </section>



    <div class="col-12">
        <div class="sc-notice">
        </div>
    </div>


    <section class="section section-xl bg-default text-md-left">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h5><i class="fa fa-shopping-bag" aria-hidden="true"></i> Demo S-Cart : Free Laravel eCommerce</h5>
                </div>
   <div class="col-md-12">
                    <form action="{{ route('checkout') }}" method="GET">
                        
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table box table-bordered">
                                    <thead>
                                        <tr style="background: #eaebec">
                                            <th style="width: 50px;">No.</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Subtotal</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php 
                                            $row = 1
                                        @endphp
                                        @foreach ($listcart as $key => $item)
                                        

                                            <tr class="row_cart form-group ">
                                                <td>{{$row}}</td>
                                                @php 
                                                    $row ++;
                                                @endphp
                                                <td>
                                                    <a href="{{ route('detail',$listproduct[$item->id]->slug) }}"
                                                        class="row_cart-name">
                                                        <img width="100"
                                                            src="{{ env('APP_URL').'/documents/website/'. $listproduct[$item->id]->image}}"
                                                            alt="{{ $listproduct[$item->id]->name }}">
                                                    </a>
                                                    <span>
                                                        <a href="{{ route('detail',$listproduct[$item->id]->slug) }}"
                                                            class="row_cart-name">{{$item->name }}</a><br />
                                                        <b>SKU code</b> : {{ $listproduct[$item->id]->slug }}
                                                        <br>
                                                        
                                                    </span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="product-price-wrap">
                                                        {{-- <div class="product-price product-price-old">{{number_format($item->price)}}</div> --}}
                                                        <div class="product-price">{{number_format($item->price)}}đ</div>
                                                    </div>
                                                </td>
                                                <td class="cart-col-qty">
                                                    <div class="cart-qty">
                                                        <input style="width: 150px; margin: 0 auto" type="number"
                                                            data-id="{{ $item->id }}"
                                                            data-price="{{ $item->price }}"
                                                            data-rowid="{{$item->rowId}}" data-store_id="1"
                                                            class="item-qty form-control"
                                                            name="qty-{{ $item->rowId }}" value="{{ $item->qty }}">
                                                    </div>
                                                    <span class="text-danger item-qty-{{ $item->rowId }}"
                                                        style="display: none;"></span>
                                                </td>
                                                <td align="right" class="total-{{ $item->rowId }}">
                                                    {{number_format($item->price*$item->qty)}}đ
                                                </td>
                                                <td align="center">
                                                    <a onClick="return confirm('Confirm?')" title="Remove Item"
                                                        alt="Remove Item" class="cart_quantity_delete"
                                                        href="{{ url('removeToCart/'.$item->rowId) }}">
                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="pull-right">
                                <a href="{{ route('checkout') }}" class=" button button-lg  button-secondary" type="submit">Checkout</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>







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
            $('#total').html(formatNumber(parseInt(25) + parseInt($('#shipping').val())));
        });
    </script>
    <script src="https://demo.s-cart.org/js/sweetalert2.all.min.js"></script>
   
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
                    "_token": "JAfnAAn4KGpy8vb0K6QhEykfolGjqRKto2KcrgvA"
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
    </script> --}}

    <script>
        $('.item-qty').on('change', function() {
            var new_qty = $(this).val();
            console.log('Giá trị đã thay đổi: ' + new_qty);
            var id =  $(this).data('id');
            var price =  $(this).data('price');
            var rowid =  $(this).data('rowid');

            console.log('Giá trị đã thay đổi: ' + id);
            updateCart(rowid,id,price,new_qty);
        });
    
    </script>
    <script>
        function removeItem(rowid){
            $.ajax({
                url: '{{  url('/removeToCart') }}',
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                data: {
                    rowId: rowid,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {

                    
                    alertJs('success', data.msg);
                }
            });

        }
    </script>
    <script>
        document.getElementById('cart_quantity_delete').addEventListener('click', function(event) {
            // Tắt sự kiện mặc định của nút
            event.preventDefault();
            var rowId = this.data('rowid');
           removeItem(rowId);

        });
    </script>




    <script type="text/javascript">
        function updateCart(rowid,id,price,new_qty) {
            // alert('namvutru');
            // let new_qty = obj.val();
            // let storeId = obj.data('store_id');
            // let rowid = obj.data('rowid');
            // let id = obj.data('id');
            $.ajax({
                url: '{{  url('/updatetoCart') }}',
                type: 'POST',
                dataType: 'json',
                async: false,
                cache: false,
                data: {

                    id: id,
                    price:price,
                    rowId: rowid,
                    new_qty: new_qty,
                    
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    console.log(data);
                    
                    error = parseInt(data.error);
                    if (error == 0) {
                        $('.total-'+rowid).html(data.total);  
                    }else{
                        alertJs('error', data.msg);
                    }
                       

                    
                    // error = parseInt(data.error);
                    

                }
            });
        }

        function buttonQty(obj, action) {

            
            var parent = obj.parent();
            var input = parent.find(".item-qty");
            if (action === 'reduce') {
                input.val(parseInt(input.val()) - 1);
            } else {
                input.val(parseInt(input.val()) + 1);
            }
            
        }
    </script>
    </body>

    </html>
@endsection
