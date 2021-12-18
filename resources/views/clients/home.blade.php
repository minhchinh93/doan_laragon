@extends('clients.layout.app')


@section ('content')

<div class="rev-slider">
    <div class="fullwidthbanner-container">
        <div class="fullwidthbanner">
            <div class="bannercontainer">
                <div class="banner">
                    <ul>
                        @foreach ($slides as $slide)


                        <!-- THE FIRST SLIDE -->
                        <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined"
                                data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                                <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="{{asset('/storage/images/'.$slide->image)}}" data-src="{{asset('/storage/images/'.$slide->image)}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('{{asset('/storage/images/'.$slide->image)}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                </div>
                            </div>

                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="tp-bannertimer"></div>
        </div>
    </div>
    <!--slider-->
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>Bánh Mới Ra</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm tháy {{ count($totalnewproducts ) }} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach ($newproducts as $newproduct )
                            <div class="col-sm-3 mt-2">
                                <div class="single-item">
                              @if ($newproduct->promotion_price !=0)
                              <div class="ribbon-wrapper">
                                <div class="ribbon sale">Sale</div>
                            </div>
                            @endif
                                    <div class="single-item-header">
                                        <a href="product.html"><img src="{{asset('/storage/images/'.$newproduct->image)}}" height="250px" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{ $newproduct->name }}</p>
                                        <p class="single-item-price">
                                            <span class="flash-del">{{ $newproduct->Unit_price }} vnd</span>
                                            <span class="flash-sale">{{ $newproduct->promotion_price }} vnd</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" style="color:white" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="product.html">Chi Tiết <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    {{ $newproducts->links() }}
                    <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Sản phẩm sale</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm tháy {{ count($totaltopproducts ) }} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach ($topproducts as $topproduct )
                            @if ($topproduct->promotion_price != 0)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">HOT</div>
                                    </div>
                                    <div class="single-item-header">
                                        <a href="product.html"><img src="{{asset('/storage/images/'.$topproduct->image)}}"  height="250px" alt=""></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{ $topproduct->name }}</p>
                                        <p class="single-item-price">
                                            <span class="flash-del">{{ $topproduct->Unit_price }} vnd</span>
                                            <span class="flash-sale">{{ $topproduct->promotion_price }} vnd</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" style="color:white" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="product.html">Chi Tiết <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                                   {{ $topproducts->links() }}
                    </div>
                    <!-- .beta-products-list -->
                </div>
            </div>
            <!-- end section with sidebar and main content -->


        </div>
        <!-- .main-content -->
    </div>
    <!-- #content -->
</div>

@endsection
