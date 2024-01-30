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
                        <li><a href="https://demo.s-cart.org/customer">My account</a></li>
                        <li class="active">Change infomation</li>
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
                    <div class="col-12 col-sm-12 col-md-3">
                        <ul class="list-group list-group-flush member-nav">
                            <li class="list-group-item">
                                <a href="https://demo.s-cart.org/customer/change-password.html"><i class="fa fa-key"
                                        aria-hidden="true"></i> Change password</a>
                            </li>
                            <li class="list-group-item">
                                <a href="https://demo.s-cart.org/customer/change-info.html"><i class="fa fa-list-alt"
                                        aria-hidden="true"></i> Change infomation
                                </a>
                            </li>
                           
                            <li class="list-group-item">
                                <a href="https://demo.s-cart.org/customer/order-list.html"><i
                                        class="fa fa-cart-arrow-down" aria-hidden="true"></i> Order history</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-9 min-height-37vh">
                        <h6 class="title-store">Change infomation</h6>
                        <form method="POST" action="{{ route('updateinfo') }}">
                            @csrf
                            <div class="form-group row ">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">First
                                    name</label>
                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control" name="first_name"
                                        value="{{ Auth::user()->first_name }}">
                                        @if ($errors->get('first_name'))
                                                    
                                                        <ul>
                                                            @foreach ($errors->get('first_name') as $error)
                                                            <li>
                                                                <span class="help-block">{{ $error}}</span>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                </div>
                                
                            </div>
                            <div class="form-group row ">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">Last name</label>
                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control" name="last_name"
                                    value="{{ Auth::user()->last_name }}">
                                    @if ($errors->get('last_name'))
                                                    
                                                        <ul>
                                                            @foreach ($errors->get('last_name') as $error)
                                                            <li>
                                                                <span class="help-block">{{ $error}}</span>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control" name="phone" value="{{ Auth::user()->phone_number }}">
                                    @if ($errors->get('phone'))
                                                    
                                                        <ul>
                                                            @foreach ($errors->get('phone') as $error)
                                                            <li>
                                                                <span class="help-block">{{ $error}}</span>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    {{ Auth::user()->email }}
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="address1" class="col-md-4 col-form-label text-md-right">Address</label>
                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address"  value="{{ Auth::user()->address }}">
                                    @if ($errors->get('address'))
                                                    
                                                        <ul>
                                                            @foreach ($errors->get('address') as $error)
                                                            <li>
                                                                <span class="help-block">{{ $error}}</span>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                </div>
                            </div>
                           
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button style class=" button button-lg  button-secondary" type="submit">Update
                                        infomation</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>





        @endsection