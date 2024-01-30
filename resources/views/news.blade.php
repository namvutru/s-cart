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
        <section class="contact">
            <div class="container" style="padding:10px !important;color:#fff;text-align: center;">
                <div class="row">
                    <div class="col-xs-12 col-sm-6"> <a href="https://demo.s-cart.org/sc_admin"><span
                                class="fa fa-map-signs" aria-hidden="true"></span> ADMIN PANEL</a> </div>
                    <div class="col-xs-12 col-sm-6"> <a href="https://s-cart.org/download.html"><span
                                class="fa fa-arrow-circle-down" aria-hidden="true"></span> Download</a> </div>
                </div>
        </section>


        <section class="breadcrumbs-custom">
            <div class="parallax-container" data-parallax-img="https://demo.s-cart.org/data/banner/breadcrumb.jpg">
                <div class="material-parallax parallax">
                    <img src="https://demo.s-cart.org/data/banner/breadcrumb.jpg" alt
                        style="display: block; transform: translate3d(-50%, 83px, 0px);">
                </div>
                <div class="breadcrumbs-custom-body parallax-content context-dark">
                    <div class="container">
                        <h2 class="breadcrumbs-custom-title">Ruong Bac Thang Ha Giang</h2>
                    </div>
                </div>
            </div>
            <div class="breadcrumbs-custom-footer">
                <div class="container">
                    <ul class="breadcrumbs-custom-path">
                        <li><a href="https://demo.s-cart.org">Home</a></li>
                        <li><a href="https://demo.s-cart.org/news">Blogs</a></li>
                        <li class="active">Ruong Bac Thang Ha Giang</li>
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
                    <div class="col-12">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                            do eiusmod tempor incididunt ut labore et dolore magna aliqua.<img alt
                                src="/data/product/product-10.png"
                                style="width: 150px; float: right; margin: 10px;" /></p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                            do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
        </section>

@endsection




