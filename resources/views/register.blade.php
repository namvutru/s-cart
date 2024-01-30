@extends('layout')

@section('content')

{{-- <section class="contact">
    <div class="container" style="padding:10px !important;color:#fff;text-align: center;">
        <div class="row">
            <div class="col-xs-12 col-sm-6"> <a href="https://demo.s-cart.org/sc_admin"><span
                        class="fa fa-map-signs" aria-hidden="true"></span> ADMIN PANEL</a> </div>
            <div class="col-xs-12 col-sm-6"> <a href="https://s-cart.org/download.html"><span
                        class="fa fa-arrow-circle-down" aria-hidden="true"></span> Download</a> </div>
        </div>
    </div>
</section> --}}


<section class="breadcrumbs-custom">
    <div class="breadcrumbs-custom-footer">
        <div class="container">
            <ul class="breadcrumbs-custom-path">
                <li><a href="https://demo.s-cart.org">Home</a></li>
                <li class="active">Account register</li>
            </ul>
        </div>
    </div>
</section>







<section class="section section-sm section-first bg-default text-md-left">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12">
                <h2>Account register</h2>
                <form action="{{ route('register') }}" method="post" class="box"
                    id="sc_form-process">
                    @csrf
                    <div class="form_content" id="collapseExample">
                        <div class="form-group">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                       
                        
                        <div class="form-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Name Confirm">
                            
                        </div>
                        <style>
                            #sc_button-form-process {
                                display: none !important;
                            }
                        </style>
                        
                        <button class="g-recaptcha button"
                            data-sitekey="6LcyhswZAAAAALSgF3tAJxMsy7jTqvL5NnFFmVrg" data-callback="onSubmit"
                            data-action="submit">Signup</button>
                        <script>
                            function onSubmit(token) {
                                document.getElementById("sc_form-process").submit();
                            }
                        </script>
                        <div class="submit">
                            <button name="SubmitCreate" style class=" button button-lg  button-secondary"
                                type="submit" id="sc_button-form-process">Signup</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection







      

        






       
    
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
                    "_token": "4XPFb8TotMIfR9oMZUF1UDYWfxCQ3mLn12aLtVPT"
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




    <
