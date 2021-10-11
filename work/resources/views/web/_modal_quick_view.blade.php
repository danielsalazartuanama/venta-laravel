<div class="modal" id="quick_view{{$product->id}}">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- product details inner end -->
                    <div class="product-details-inner">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="product-large-slider slick-arrow-style_2 mb-20">
                                    @foreach($product->images as $image)
                                    <div class="pro-large-img">
                                        <img src="{{$image->url}}" alt="{{$product->name}}">
                                    </div>
                                    @endforeach
                                    {{-- <div class="pro-large-img">
                                        <img src="{{asset('galio/assets/img/product/product-details-img1.jpg')}}" alt="" />
                                    </div>
                                    <div class="pro-large-img">
                                        <img src="{{asset('galio/assets/img/product/product-details-img2.jpg')}}" alt=""/>
                                    </div>
                                    <div class="pro-large-img">
                                        <img src="{{asset('galio/assets/img/product/product-details-img3.jpg')}}" alt=""/>
                                    </div>
                                    <div class="pro-large-img">
                                        <img src="{{asset('galio/assets/img/product/product-details-img4.jpg')}}" alt=""/>
                                    </div>
                                    <div class="pro-large-img">
                                        <img src="{{asset('galio/assets/img/product/product-details-img5.jpg')}}" alt=""/>
                                    </div> --}}
                                </div>
                                <div class="pro-nav slick-padding2 slick-arrow-style_2">
                                    <div class="pro-nav-thumb"><img src="{{asset('galio/assets/img/product/product-details-img1.jpg')}}" alt="" /></div>
                                    @foreach($product->images as $image)
                                    <div class="pro-nav-thumb">
                                        <img src="{{$image->url}}" alt="{{$product->name}}" />
                                    </div>
                                    @endforeach
                                    {{-- <div class="pro-nav-thumb"><img src="{{asset('galio/assets/img/product/product-details-img2.jpg')}}" alt="" /></div>
                                    <div class="pro-nav-thumb"><img src="{{asset('galio/assets/img/product/product-details-img3.jpg')}}" alt="" /></div>
                                    <div class="pro-nav-thumb"><img src="{{asset('galio/assets/img/product/product-details-img4.jpg')}}" alt="" /></div>
                                    <div class="pro-nav-thumb"><img src="{{asset('galio/assets/img/product/product-details-img5.jpg')}}" alt="" /></div> --}}
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="product-details-des mt-md-34 mt-sm-34">
                                    <h3><a href="{{route ('web.product_details',$product)}}">{{$product->name}}</a></h3>
                                    <div class="ratings">
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <div class="pro-review">
                                            <span>1 review(s)</span>
                                        </div>
                                    </div>
                                    <div class="availability mt-10">
                                        <h5>Availability:</h5>
                                        <span>{{$product->stock}}</span>
                                    </div>
                                    <div class="pricebox">
                                        <span class="regular-price">s/. {{$product->sell_price}}</span>
                                    </div>
                                    <p>{{$product->short_description}}</p>
                                    {{-- <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.<br>
                                    Phasellus id nisi quis justo tempus mollis sed et dui. In hac habitasse platea dictumst. Suspendisse ultrices mauris diam. Nullam sed aliquet elit. 
                                    Mauris consequat nisi ut mauris efficitur lacinia.</p> --}}
                                    {!! Form::open(['route'=>['shopping_cart_details.store',$product], 'method'=>'POST']) !!}
                                    <div class="quantity-cart-box d-flex align-items-center mt-20">
                                        {{-- <input type="hidden" name="product_id" value="{{$product->id}}"> --}}
                                        <div class="quantity">
                                            <div class="pro-qty"><input type="text" value="1" name="quantity"></div>
                                        </div>
                                        <div class="action_link">
                                            <button class="buy-btn" type="submit" style="
                                            border: none;
                                            padding: 0"
                                            >add to cart<i class="fa fa-shopping-cart"></i> </button>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details inner end -->
                </div>
            </div>
        </div>
    </div>