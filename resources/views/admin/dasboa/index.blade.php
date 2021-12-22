@extends('admin.app')


@section ('content')

<section id="main-content">
    <section class="wrapper">
        <div class="row mtbox">
            <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                <div class="box1">
                    <span class="li_heart"></span>
                    <h5>lượng khách hàng đã mua hàng</h5>
                    <h3>{{ $totalcustomer }}</h3>
                </div>
                    <p>{{ $totalcustomer }} người đã đăng ký !</p>
            </div>
            <div class="col-md-2 col-sm-2 box0">
                <div class="box1">
                    <span class="li_cloud"></span>
                    <h5>doanh số thu về</h5>
                    <h3>{{ $totalbill }} vnđ</h3>
                </div>
                    <p>thu về  vnđ.</p>
            </div>
            <div class="col-md-2 col-sm-2 box0">
                <div class="box1">
                    <span class="li_stack"></span>
                    <h5>số lượng sản phẩm đã bán ra</h5>
                    <h3>{{ $totalbill_detaill }}</h3>
                </div>
                    <p>đã bán được {{ $totalbill_detaill }} sản phẩm !</p>
            </div>
            <div class="col-md-2 col-sm-2 box0">
                <div class="box1">
                    <span class="li_news"></span>
                    <h5>số đơn hành thanh toán AtM</h5>
                    <h3>{{ $totalATM }}</h3>
                </div>
                    <p>có {{ $totalATM }} thanh toán trước qua hóa đơn</p>
            </div>
            <div class="col-md-2 col-sm-2 box0">
                <div class="box1">
                    <span class="li_data"></span>
                    <h5>số đơn hàng thanh toán qua COD</h5>
                    <h3>{{ $totalCOD }}</h3>
                </div>
                <p>có {{ $totalCOD }} thanh toán trước qua hóa đơn</p>
            </div>


                <div class="col-md-12">
                    <div class="content-panel">
                        <h4><i class="fa fa-angle-right"></i> Advanced Table</h4><hr><table class="table table-striped table-advance table-hover">


                            <thead>
                            <tr>
                                <th><i class="fa fa-bullhorn"></i> stt</th>
                                <th class="hidden-phone"><i class="fa fa-question-circle"></i> khách hàng</th>
                                <th><i class="fa fa-bookmark"></i> sản phẩm</th>
                                <th><i class=" fa fa-edit"></i> số lượng</th>
                                <th><i class=" fa fa-edit"></i> giá trị</th>
                                <th><i class=" fa fa-edit"></i> trạng thái</th>
                                <th><i class=" fa fa-edit"></i> thời gian</th>
                                <th><i class=" fa fa-edit"></i> tác vụ</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><a href="basic_table.html#">Company Ltd</a></td>
                                <td class="hidden-phone">Lorem Ipsum dolor</td>
                                <td class="hidden-phone">Lorem Ipsum dolor</td>
                                <td class="hidden-phone">Lorem Ipsum dolor</td>
                                <td class="hidden-phone">Lorem Ipsum dolor</td>
                                <td>12000.00$ </td>
                                <td><span class="label label-info label-mini">Due</span></td>
                                <td>
                                    <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                    <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="basic_table.html#">
                                        Dashgum co
                                    </a>
                                </td>
                                <td class="hidden-phone">Lorem Ipsum dolor</td>
                                <td class="hidden-phone">Lorem Ipsum dolor</td>
                                <td class="hidden-phone">Lorem Ipsum dolor</td>
                                <td class="hidden-phone">Lorem Ipsum dolor</td>
                                <td>17900.00$ </td>
                                <td><span class="label label-warning label-mini">Due</span></td>
                                <td>
                                    <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                    <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="basic_table.html#">
                                        Another Co
                                    </a>
                                </td>
                                <td class="hidden-phone">Lorem Ipsum dolor</td>
                                <td class="hidden-phone">Lorem Ipsum dolor</td>
                                <td class="hidden-phone">Lorem Ipsum dolor</td>
                                <td class="hidden-phone">Lorem Ipsum dolor</td>
                                <td>14400.00$ </td>
                                <td><span class="label label-success label-mini">Paid</span></td>
                                <td>
                                    <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                    <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="basic_table.html#">
                                        Dashgum ext
                                    </a>
                                </td>
                                <td class="hidden-phone">Lorem Ipsum dolor</td>
                                <td class="hidden-phone">Lorem Ipsum dolor</td>
                                <td class="hidden-phone">Lorem Ipsum dolor</td>
                                <td class="hidden-phone">Lorem Ipsum dolor</td>
                                <td>22000.50$ </td>
                                <td><span class="label label-success label-mini">Paid</span></td>
                                <td>
                                    <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                    <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="basic_table.html#">Total Ltd</a></td>
                                <td class="hidden-phone">Lorem Ipsum dolor</td>
                                <td class="hidden-phone">Lorem Ipsum dolor</td>
                                <td class="hidden-phone">Lorem Ipsum dolor</td>
                                <td class="hidden-phone">Lorem Ipsum dolor</td>
                                <td>12120.00$ </td>
                                <td><span class="label label-warning label-mini">Due</span></td>

                                <td>
                                    <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                    <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div><!-- /content-panel -->
                </div><!-- /col-md-12 -->

  </section><!-- --/wrapper ---->
</section>
@endsection
