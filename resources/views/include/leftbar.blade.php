
    <div class="aside row row-30 row-md-50 justify-content-md-between">


        <div class="aside-item col-sm-6 col-lg-12">
            <h6 class="aside-title">Special products</h6>
            <div class="row row-10 row-lg-20 gutters-10">
                @foreach($listproductrelated as $productspecial)
                <div class="col-4 col-sm-6 col-md-12">
                    <article class="product-minimal">
                        <div class="unit unit-spacing-sm flex-column flex-md-row align-items-center">
                            <div class="unit-left">
                                <a class="post-minimal-figure"
                                    href="{{ route('detail',$productspecial->slug) }}">
                                    <img src="{{ env('APP_URL').'/documents/website/'.$productspecial->image }}" alt
                                        width="106" height="104">
                                </a>
                            </div>
                            <div class="unit-body">
                                <p class="product-minimal-title"><a
                                        href="h{{ route('detail',$productspecial->slug) }}">{{$productspecial->name}}</a></p>
                                <p class="product-minimal-price">
                                <div class="product-price-wrap">
                                    <div class="product-price product-price-old">{{number_format($productspecial->old_price)}} đ</div>
                                    <div class="product-price">{{number_format($productspecial->price)}} đ</div>
                                </div>
                                </p>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach


            </div>
        </div>

        <div class="aside-item col-sm-6 col-lg-12">
            <h6 class="aside-title">Last view products</h6>

            <div class="row row-20 row-lg-30 gutters-10">
                @if(is_array ($history) )

                    @foreach ($history as $key => $item_his)
                        
                    
                    <div class="col-4 col-lg-12">

                        <article class="post post-minimal">
                            <div class="unit unit-spacing-sm flex-column flex-lg-row align-items-lg-center">
                                <div class="unit-left"><a class="post-minimal-figure"
                                        href="{{ route('detail',$productspecial->getproduct($key)->slug) }}">
                                        <img src="{{ env('APP_URL').'/documents/website/'.$productspecial->getproduct($key)->image }}" alt
                                            width="106" height="104"></a></div>
                                <div class="unit-body">
                                    <p class="post-minimal-title"><a
                                            href="{{ route('detail',$productspecial->getproduct($key)->slug) }}">{{ $productspecial->getproduct($key)->name }}</a></p>
                                    <div class="post-minimal-time">
                                        <time datetime="2024-01-08 10:18:57">{{ $item_his }}</time>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>


    </div>
