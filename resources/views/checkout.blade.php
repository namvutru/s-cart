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
                        <li class="active">Checkout</li>
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
                    <div class="col-12">
                        <h5><i class="fa fa-shopping-bag" aria-hidden="true"></i> Demo S-Cart : Free Laravel eCommerce
                        </h5>
                    </div>
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
                                                        <div class="product-price">{{number_format($item->price)}} đ</div>
                                                    </div>
                                                </td>
                                                <td class="cart-col-qty">
                                                    <div class="cart-qty">
                                                        {{ $item->qty }}
                                                    </div>
                                                    <span class="text-danger item-qty-{{ $item->rowId }}"
                                                        style="display: none;"></span>
                                                </td>
                                                <td align="right" class="total-{{ $item->rowId }}">
                                                    {{number_format($item->price*$item->qty)}} đ
                                                </td>
                                                {{-- <td align="center">
                                                    <a onClick="return confirm('Confirm?')" title="Remove Item"
                                                        alt="Remove Item" class="cart_quantity_delete"
                                                        href="{{ url('removeToCart/'.$item->rowId) }}">
                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                    </a>
                                                </td> --}}
                                            </tr>
                                            @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <form class="sc-shipping-address" id="sc_form-process" role="form" method="POST"
                            action="{{ route('restorecart') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-borderless table-responsive">
                                        <tr width="100%">
                                            <td class="form-group">
                                                <label class="control-label"><i class="fa fa-user"></i>
                                                    First name:</label>
                                                <input class="form-control" name="first_name" type="text"
                                                    placeholder="First name"
                                                     value=" @if(Auth::check()) {{ Auth::user()->first_name }} @else {{ old('first_name') }}  @endif">
                                                    @if ($errors->get('first_name'))
                                                    
                                                        <ul>
                                                            @foreach ($errors->get('first_name') as $error)
                                                            <li>
                                                                <span class="help-block">{{ $error}}</span>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                            </td>
                                            <td class="form-group">
                                                <label class="control-label"><i class="fa fa-user"></i>
                                                    Last name:</label>
                                                <input class="form-control" name="last_name" type="text"
                                                    placeholder="Last name" value="@if(Auth::check()) {{ Auth::user()->last_name }} @else {{ old('last_name') }}  @endif">
                                                    @if ($errors->get('last_name'))
                                                    
                                                        <ul>
                                                            @foreach ($errors->get('last_name') as $error)
                                                            <li>
                                                                <span class="help-block">{{ $error}}</span>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="form-group">
                                                <label class="control-label"><i class="fa fa-envelope"></i>
                                                    Email:</label>
                                                <input class="form-control" name="email" type="text"
                                                    placeholder="Email" value="@if(Auth::check()) {{ Auth::user()->email }} @else {{ old('email') }}  @endif">
                                                    @if ($errors->get('email'))
                                                    
                                                        <ul>
                                                            @foreach ($errors->get('email') as $error)
                                                            <li>
                                                                <span class="help-block">{{ $error}}</span>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                            </td>
                                            <td class="form-group">
                                                <label class="control-label"><i class="fa fa-phone"
                                                        aria-hidden="true"></i> Phone:</label>
                                                <input class="form-control" name="phone" type="text"
                                                    placeholder="Phone" value="@if(Auth::check()) {{ Auth::user()->phone_number }} @else {{ old('phone') }}  @endif">
                                                    @if ($errors->get('phone'))
                                                    
                                                        <ul>
                                                            @foreach ($errors->get('phone') as $error)
                                                            <li>
                                                                <span class="help-block">{{ $error}}</span>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                            </td>
                                        </tr>
                                        
                                        
                                        <tr>
                                            <td colspan="2" class="form-group ">
                                                <label for="address" class="control-label"><i
                                                        class="fa fa-list-ul"></i>
                                                    Address:</label>
                                                <input class="form-control" name="address" type="text"
                                                    placeholder="Address" value="@if(Auth::check()) {{ Auth::user()->address }} @else {{ old('address') }}  @endif">
                                                    @if ($errors->get('address'))
                                                    
                                                        <ul>
                                                            @foreach ($errors->get('address') as $error)
                                                            <li>
                                                                <span class="help-block">{{ $error}}</span>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                            </td>
                                        </tr>
                                       
                                        
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table box table-bordered" id="sc_showTotal">
                                                <tr class="sc_showTotal">
                                                    <th>SubTotal</th>
                                                    <td style="text-align: right" id="subtotal">
                                                        {{ number_format(intval(str_replace(",", "",Cart::instance('shoppingcart')->subtotal()))) }} đ
                                                    </td>
                                                </tr>
                                                
                                                <tr class="sc_showTotal"
                                                    style="background:#f5f3f3;font-weight: bold;">
                                                    <th>Total</th>
                                                    <td style="text-align: right" id="total">
                                                        {{ number_format(intval(str_replace(",", "",Cart::instance('shoppingcart')->subtotal()))) }} đ
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group ">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label class="control-label"
                                                                    for="inputGroupSuccess3"><i class="fa fa-exchange"
                                                                        aria-hidden="true"></i> Coupon
                                                                    <span
                                                                        style="display:inline; cursor: pointer; display: none"
                                                                        class="text-danger" id="removeCoupon">(Remove
                                                                        coupon <i class="fa fa fa-times"></i>)</span>
                                                                </label>
                                                                <div id="coupon-group" class="input-group ">
                                                                    <input type="text" placeholder="Your coupon"
                                                                        class="form-control" id="coupon-value"
                                                                        aria-describedby="inputGroupSuccess3Status">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text "
                                                                            id="coupon-button"
                                                                            style="cursor: pointer;"
                                                                            data-loading-text="<i class='fa fa-spinner fa-spin'></i> checking">Apply</span>
                                                                    </div>
                                                                </div>
                                                                <span class="status-coupon" style="display: none;"
                                                                    class="glyphicon glyphicon-ok form-control-feedback"
                                                                    aria-hidden="true"></span>
                                                                <div class="coupon-msg  "
                                                                    style="text-align: left;padding-left: 10px; ">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <div class="row" style="padding-bottom: 20px;">
                                        <div class="col-md-12 text-center">
                                            <div class="pull-right">
                                                <button onClick="location.href=' https://demo.s-cart.org/cart.html '"
                                                    style class=" button button-lg  button-secondary" type="submit"
                                                    id="sc_button-form-process">Checkout</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

@endsection

@push('scripts')



<script src="https://demo.s-cart.org/templates/s-cart-light/js/core.min.js"></script>
<script src="https://demo.s-cart.org/templates/s-cart-light/js/script.js"></script>

<script type="text/javascript">
    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
    }
    $('#shipping').change(function() {
        $('#total').html(formatNumber(parseInt(64) + parseInt($('#shipping').val())));
    });
</script>
<script src="https://demo.s-cart.org/js/sweetalert2.all.min.js"></script>


<script type="text/javascript">
    function addToCartAjax(id, instance = null, storeId = null) {
        $.ajax({
            url: "https://demo.s-cart.org/add_to_cart_ajax",
            type: "POST",
            dataType: "JSON",
            data: {
                "id": id,
                "instance": instance,
                "storeId": storeId,
                "_token": "xFAgDFeaJygtKfo3815kFj109LKGah5KIJXkUGyh"
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




<script type="text/javascript">
    $('#coupon-button').click(function() {
        var coupon = $('#coupon-value').val();
        if (coupon == '') {
            $('#coupon-group').addClass('has-error');
            $('.coupon-msg').html('Coupon empty').addClass('text-danger').show();
        } else {
            $('#coupon-button').prop('disabled', true);
            setTimeout(function() {
                $.ajax({
                        url: 'https://demo.s-cart.org/plugin/discount_pro/discount_pro_process',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            code: coupon,
                            uID: 0,
                            _token: "xFAgDFeaJygtKfo3815kFj109LKGah5KIJXkUGyh",
                        },
                    })
                    .done(function(result) {
                        $('#coupon-value').val('');
                        $('.coupon-msg').removeClass('text-danger');
                        $('.coupon-msg').removeClass('text-success');
                        $('#coupon-group').removeClass('has-error');
                        $('.coupon-msg').hide();
                        if (result.error == 1) {
                            $('#coupon-group').addClass('has-error');
                            $('.coupon-msg').html(result.msg).addClass('text-danger').show();
                        } else {
                            $('#removeCoupon').show();
                            $('.coupon-msg').html(result.msg).addClass('text-success').show();
                            $('.sc_showTotal').remove();
                            $('#sc_showTotal').prepend(result.html);
                        }
                    })
                    .fail(function() {
                        console.log("error");
                    })
                $('#coupon-button').prop('disabled', false);
            }, 2000);
        }

    });
    $('#removeCoupon').click(function() {
        $.ajax({
                url: 'https://demo.s-cart.org/plugin/discount_pro/discount_remove',
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: "xFAgDFeaJygtKfo3815kFj109LKGah5KIJXkUGyh",
                },
            })
            .done(function(result) {
                $('#removeCoupon').hide();
                $('#coupon-value').val('');
                $('.coupon-msg').removeClass('text-danger');
                $('.coupon-msg').removeClass('text-success');
                $('.coupon-msg').hide();
                $('.sc_showTotal').remove();
                $('#sc_showTotal').prepend(result.html);
            })
            .fail(function() {
                console.log("error");
            })
    });
</script>
<script type="text/javascript">
    $('#sc_button-form-process').click(function() {
        $('#sc_form-process').submit();
        $(this).prop('disabled', true);
    });

    $('#addressList').change(function() {
        var id = $('#addressList').val();
        if (!id) {
            return;
        } else if (id == 'new') {
            $('#sc_form-process [name="first_name"]').val('');
            $('#sc_form-process [name="last_name"]').val('');
            $('#sc_form-process [name="phone"]').val('');
            $('#sc_form-process [name="postcode"]').val('');
            $('#sc_form-process [name="company"]').val('');
            $('#sc_form-process [name="country"]').val('');
            $('#sc_form-process [name="address1"]').val('');
            $('#sc_form-process [name="address2"]').val('');
            $('#sc_form-process [name="address3"]').val('');
        } else {
            $.ajax({
                url: 'https://demo.s-cart.org/customer/address_detail',
                type: 'GET',
                dataType: 'json',
                async: false,
                cache: false,
                data: {
                    id: id,
                },
                success: function(data) {
                    error = parseInt(data.error);
                    if (error === 1) {
                        alert(data.msg);
                    } else {
                        $('#sc_form-process [name="first_name"]').val(data.first_name);
                        $('#sc_form-process [name="last_name"]').val(data.last_name);
                        $('#sc_form-process [name="phone"]').val(data.phone);
                        $('#sc_form-process [name="postcode"]').val(data.postcode);
                        $('#sc_form-process [name="company"]').val(data.company);
                        $('#sc_form-process [name="country"]').val(data.country);
                        $('#sc_form-process [name="address1"]').val(data.address1);
                        $('#sc_form-process [name="address2"]').val(data.address2);
                        $('#sc_form-process [name="address3"]').val(data.address3);
                    }

                }
            });
        }
    });
</script>



@endpush

   