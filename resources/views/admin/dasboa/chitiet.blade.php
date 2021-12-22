@extends('admin.app')


@section ('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-md-12 mt">
                <div class="content-panel">
                    <h4><i class="fa fa-angle-right"></i> chi tiết khác hàng:<b> {{ $customer->name }} </b>đã mua</h4><hr><table class="table table-hover">
                        <thead>
                            <tr>
                                <th>stt</th>
                                <th><i class="fa fa-bullhorn"></i>tên sản phẩm</th>
                                <th><i class="fa fa-bullhorn"></i> số lượng </th>
                                <th><i class="fa fa-bullhorn"></i> giá </th>
                                <th><i class="fa fa-bullhorn"></i> hình ảnh </th>
                                <th><i class="fa fa-bullhorn"></i> ngày oder</th>

                                <th></th>
                            </tr>

                        </thead>
                        <tbody>
                            @php
                            $t=0;
                        @endphp

                        @foreach ($tables as $table)
                            @php
                            $t+=1;
                        @endphp
                        <tr>
                            <td>{{ $t }}</td>
                            <td>{{ $table->name_product }}</td>
                            <td> {{ $table->quantity }}</td>
                            <td> {{ $table->unit_price }}</td>
                            <td><img src="{{asset('/storage/images/'.$table->image)}}" style="width: 100px;" ></td>
                            <td> {{ $table->date_order }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-round btn-warning"><a style="color:white" href="{{ route('showdasboa')}}">trở lại trang chủ</a></button>
                  </div><!-- --/content-panel ---->
            </div>
        </div>
    </section>
</section>

@endsection
