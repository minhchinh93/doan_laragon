@extends('clients.layout.app')


@section ('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="index.html">Home</a> / <span>Sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <ul class="aside-menu">
                        @foreach ($menus as $menu)
                        <li><a href="{{ route('product_type',[$menu->id]) }}">{{ $menu->name }}</a></li>
                        @endforeach

                    </ul>
                </div>
                <div class="col-sm-9">
                    <div class="beta-products-list">
                        <h4>{{ $menuID->name  }}</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm tháy {{ count($totalnewproducts ) }} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach ($products as $newproduct )
                            <div class="col-sm-4">
                                <div class="single-item">
                              @if ($newproduct->promotion_price !=0)
                              <div class="ribbon-wrapper">
                                <div class="ribbon sale">Sale</div>
                            </div>
                            @endif
                            <div class="single-item-header">
                                <a href="product.html"><img src="{{asset('/storage/images/'.$newproduct->image)}}"height="250px" alt=""></a>
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
                                <a class="beta-btn primary" href="{{ route('product',[$newproduct->id]) }}">Chi Tiết <i class="fa fa-chevron-right"></i></a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                            @endforeach
                        </div>
                    </div> <!-- .beta-products-list -->
                    {{ $products->links() }}
                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Sản Phẩm Khác</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm tháy {{ count($totaltopproducts ) }} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach ($topproducts as $newproduct )
                            <div class="col-sm-4">
                                <div class="single-item">
                              @if ($newproduct->promotion_price !=0)
                              <div class="ribbon-wrapper">
                                <div class="ribbon sale">Sale</div>
                            </div>
                            @endif
                            <div class="single-item-header">
                                <a href="product.html"><img src="{{asset('/storage/images/'.$newproduct->image)}}" height="250px"  alt=""></a>
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
                        <div class="space40">&nbsp;</div>
                        {{ $topproducts->links() }}
                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->


@endsection
