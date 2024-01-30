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
                        <h2 class="breadcrumbs-custom-title">Blogs</h2>
                    </div>
                </div>
            </div>
            <div class="breadcrumbs-custom-footer">
                <div class="container">
                    <ul class="breadcrumbs-custom-path">
                        <li><a href="https://demo.s-cart.org">Home</a></li>
                        <li class="active">Blogs</li>
                    </ul>
                </div>
            </div>
        </section>



        <div class="col-12">
            <div class="sc-notice">
            </div>
        </div>


        <section class="section section-xl bg-default">
            <div class="container">
                <div class="row row-30">
                    <div class="col-sm-6 col-lg-4">
                        <article class="post post-classic box-md"><a class="post-classic-figure"
                                href="https://demo.s-cart.org/news/thi-tran-sapa.html">
                                <img src="https://demo.s-cart.org/data/content/blog-6.jpg" alt width="370"
                                    height="239"></a>
                            <div class="post-classic-content">
                                <div class="post-classic-time">
                                    <time datetime="2022-12-23 04:16:48">2022-12-23 04:16:48</time>
                                </div>
                                <h5 class="post-classic-title"><a
                                        href="https://demo.s-cart.org/news/thi-tran-sapa.html">Thi Tran Sapa</a></h5>
                                <p class="post-classic-text">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua
                                </p>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <article class="post post-classic box-md"><a class="post-classic-figure"
                                href="https://demo.s-cart.org/news/ruong-bac-thang-ha-giang.html">
                                <img src="https://demo.s-cart.org/data/content/blog-5.jpg" alt width="370"
                                    height="239"></a>
                            <div class="post-classic-content">
                                <div class="post-classic-time">
                                    <time datetime="2022-12-23 04:16:48">2022-12-23 04:16:48</time>
                                </div>
                                <h5 class="post-classic-title"><a
                                        href="https://demo.s-cart.org/news/ruong-bac-thang-ha-giang.html">Ruong Bac
                                        Thang Ha Giang</a></h5>
                                <p class="post-classic-text">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua
                                </p>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <article class="post post-classic box-md"><a class="post-classic-figure"
                                href="https://demo.s-cart.org/news/trang-an.html">
                                <img src="https://demo.s-cart.org/data/content/blog-4.jpg" alt width="370"
                                    height="239"></a>
                            <div class="post-classic-content">
                                <div class="post-classic-time">
                                    <time datetime="2022-12-23 04:16:48">2022-12-23 04:16:48</time>
                                </div>
                                <h5 class="post-classic-title"><a
                                        href="https://demo.s-cart.org/news/trang-an.html">Trang An</a></h5>
                                <p class="post-classic-text">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua
                                </p>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <article class="post post-classic box-md"><a class="post-classic-figure"
                                href="https://demo.s-cart.org/news/hang-son-doong.html">
                                <img src="https://demo.s-cart.org/data/content/blog-3.jpg" alt width="370"
                                    height="239"></a>
                            <div class="post-classic-content">
                                <div class="post-classic-time">
                                    <time datetime="2022-12-23 04:16:48">2022-12-23 04:16:48</time>
                                </div>
                                <h5 class="post-classic-title"><a
                                        href="https://demo.s-cart.org/news/hang-son-doong.html">Hang Son Doong</a></h5>
                                <p class="post-classic-text">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua
                                </p>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <article class="post post-classic box-md"><a class="post-classic-figure"
                                href="https://demo.s-cart.org/news/vinh-ha-long.html">
                                <img src="https://demo.s-cart.org/data/content/blog-2.jpg" alt width="370"
                                    height="239"></a>
                            <div class="post-classic-content">
                                <div class="post-classic-time">
                                    <time datetime="2022-12-23 04:16:48">2022-12-23 04:16:48</time>
                                </div>
                                <h5 class="post-classic-title"><a
                                        href="https://demo.s-cart.org/news/vinh-ha-long.html">Vinh Ha Long</a></h5>
                                <p class="post-classic-text">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua
                                </p>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <article class="post post-classic box-md"><a class="post-classic-figure"
                                href="https://demo.s-cart.org/news/cau-vang.html">
                                <img src="https://demo.s-cart.org/data/content/blog-1.jpg" alt width="370"
                                    height="239"></a>
                            <div class="post-classic-content">
                                <div class="post-classic-time">
                                    <time datetime="2022-12-23 04:16:48">2022-12-23 04:16:48</time>
                                </div>
                                <h5 class="post-classic-title"><a
                                        href="https://demo.s-cart.org/news/cau-vang.html">Cau Vang</a></h5>
                                <p class="post-classic-text">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua
                                </p>
                            </div>
                        </article>
                    </div>
                    <div class="pagination-wrap">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

@endsection



