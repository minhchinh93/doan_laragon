@extends('clients.layout.app')


@section ('content')

<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">chi tiết sản phẩm</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{ route('home') }}">Home</a> / <span>{{ $products->name }}</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">

                <div class="row">
                    <div class="col-sm-4">
                        <img src="{{asset('/storage/images/'.$products->image)}}" height="250px" alt="">
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <h1 class="big-item-title">{{ $products->name }}</h1>
                            <p class="single-item-price">
                                @if($products->promotion_price!=0)
                                <span>{{ $products->promotion_price }} vnđ</span>
                                @else
                                <span>{{ $products->Unit_price }} vnđ</span>
                                @endif
                            </p>
                        </div>

                        <div class="clearfix"></div>
                        <div class="space20">&nbsp;</div>

                        <div class="single-item-desc">
                            <p>{{ $products->description }}</p>
                        </div>
                        <div class="space20">&nbsp;</div>

                        <p>lựa chọn:</p>
                        <div class="single-item-options">
                            <select class="wc-select" name="qty">
                                <option >Số lượng</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <a class="add-to-cart" href="{{ route('shopping',[$products->id]) }}"><i class="fa fa-shopping-cart"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-description">Mô tả</a></li>
                        <li><a href="#tab-reviews">Reviews (0)</a></li>
                    </ul>

                    <div class="panel" id="tab-description">

                        <p>{{ $products->category->description }} </p>
                    </div>
                    <div class="panel" id="tab-reviews">
                        <p>No Reviews</p>
                    </div>
                </div>
                <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                    <h4>Sản phẩm cùng loại </h4>
                    <div class="row mt-2">
                        @foreach ($newproductss as $newproduct )
                        <div class="col-sm-4 mt-2">
                            <div class="single-item">
                          @if ($newproduct->promotion_price !=0)
                          <div class="ribbon-wrapper">
                            <div class="ribbon sale">Sale</div>
                        </div>
                        @endif
                                <div class="single-item-header">
                                    <a href="{{ route('product',[$newproduct->id]) }}"><img src="{{asset('/storage/images/'.$newproduct->image)}}" height="250px" alt=""></a>
                                </div>
                                <div class="single-item-body">
                                    <p class="single-item-title">{{ $newproduct->name }}</p>
                                    <p class="single-item-price">
                                        @if ($newproduct->promotion_price ==0)
                                        <span class="flash-sale">{{ $newproduct->Unit_price }} vnd</span>
                                        @else
                                        <span class="flash-del">{{ $newproduct->Unit_price }} vnd</span>
                                        <span class="flash-sale">{{ $newproduct->promotion_price }} vnd</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="single-item-caption">
                                    <a class="add-to-cart pull-left" style="color:white" href="{{ route('shopping',[$newproduct->id]) }}"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="beta-btn primary" href="{{ route('product',[$newproduct->id]) }}">Chi Tiết <i class="fa fa-chevron-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div> <!-- .beta-products-list -->
                {{ $newproducts->links() }}
            </div>
            <div class="col-sm-3 aside">
                <div class="widget">
                    <h3 class="widget-title">Bánh mới nhất</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach ($newproducts as $new)
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{ route('product',[$new->id]) }}"><img src="{{asset('/storage/images/'.$new->image)}}" alt=""></a>
                                <div class="media-body">
                                  {{ $new->name }}
                                  @if ($newproduct->promotion_price == 0)
                                  <span class="beta-sales-price">{{ $newproduct->Unit_price }} vnd</span>
                                  @else
                                  <span class="beta-sales-price">{{ $newproduct->promotion_price }} vnd</span>
                                  @endif
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div> <!-- best sellers widget -->

                <div class="widget">
                    <h3 class="widget-title">Bánh bán nhiều nhất</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            <div class="media beta-sales-item">
                                @foreach ($topproducts as $new)
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{ route('product',[$new->id]) }}"><img src="{{asset('/storage/images/'.$new->image)}}" alt=""></a>
                                <div class="media-body">
                                  {{ $new->name }} <br />
                                  @if ($new->promotion_price == 0)
                                  <span class="flash-sale">{{ $new->Unit_price }} vnd</span>
                                  @else
                                  <span class="flash-del">{{ $new->Unit_price }} vnd</span><br/>
                                  <span class="flash-sale">{{ $new->promotion_price }} vnd</span>
                                  @endif

                                </div>
                            </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div> <!-- best sellers widget -->
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->

@endsection
