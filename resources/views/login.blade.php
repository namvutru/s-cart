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
                    <div class="col-xs-12 col-sm-6"> <a href="https://demo.s-cart.org/sc_admin"><span
                                class="fa fa-map-signs" aria-hidden="true"></span> ADMIN PANEL</a> </div>
                    <div class="col-xs-12 col-sm-6"> <a href="https://s-cart.org/download.html"><span
                                class="fa fa-arrow-circle-down" aria-hidden="true"></span> Download</a> </div>
                </div>
        </section> --}}


        <section class="breadcrumbs-custom">
            <div class="breadcrumbs-custom-footer">
                <div class="container">
                    <ul class="breadcrumbs-custom-path">
                        <li><a href="https://demo.s-cart.org">Home</a></li>
                        <li class="active">Login page</li>
                    </ul>
                </div>
            </div>
        </section>



        <div class="col-12">
            <div class="sc-notice">
            </div>
        </div>



        <section class="section section-sm section-first bg-default text-md-left">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <h2>Login account</h2>
                        <form action="{{ route('login') }}" method="post" class="box">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="control-label">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <ul>
                                <li class="rd-dropdown-item">
                                    <a class="rd-dropdown-link"
                                        href="https://demo.s-cart.org/plugin/login_socialite/facebook"><i
                                            class="fab fa-facebook"></i>
                                        Login facebook</a>
                                </li>
                                <li class="rd-dropdown-item">
                                    <a class="rd-dropdown-link"
                                        href="https://demo.s-cart.org/plugin/login_socialite/google"><i
                                            class="fab fa-google-plus"></i>
                                        Login google</a>
                                </li>
                                <li class="rd-dropdown-item">
                                    <a class="rd-dropdown-link"
                                        href="https://demo.s-cart.org/plugin/login_socialite/github"><i
                                            class="fab fa-github"></i>
                                        Login github</a>
                                </li>
                            </ul>
                            <p class="lost_password form-group">
                                <a class="btn btn-link" href="https://demo.s-cart.org/customer/forgot.html">
                                    Forgot password
                                </a>
                                <br>
                                <a class="btn btn-link" href="{{ route('pageregister') }}">
                                    Account register
                                </a>
                            </p>
                            <button name="SubmitLogin" style class=" button button-lg  button-secondary"
                                type="submit">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>







     @endsection
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
                    "_token": "essIKIqH96Wn7WmfogmLUhjVnLMmjKgMi2zG69JL"
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


