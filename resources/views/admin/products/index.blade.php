@extends('admin.app')


@section ('content')

<section id="main-content">
    <section class="wrapper">
<div class="row mt">
    <div class="col-md-12">
        <div class="content-panel">
            <h4><i class="fa fa-angle-right"></i> Manager User </h4><hr><table class="table table-striped table-advance table-hover">
                <button type="button" class="btn btn-theme02 left"><a style="color:white" href="{{ route('addProduct') }}" >thêm mới</a></button>
                <div class="row mt">
                    <div class="col-lg-4">
                        <div class="form-panel">
                            <p class="category"><a style="color: gray" href="{{ route('ProductList') }}">total categori ({{ $index ?? null }}) </a> | <a  style="color: rgb(13, 182, 36)" href="{{ route('activerProduct') }}">category activer ({{ $activeruser ?? null }})</a> | <a style="color:red" href="{{ route('trackProduct') }}">category disable ({{ $trackuser ?? null }})</a></p>
                            <form class="form-inline" role="form">
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail2">tim kiem</label>
                        <input type="text" class="form-control" name="keyword" aria-label=" Search" id="exampleInputEmail2" value="{{ request()->keyword }}" placeholder="tim kiem">
                    </div>
                    <button type="submit" class="btn btn-theme">tim kiem</button>
                </form>
            </div><!-- /form-panel -->
        </div><!-- /col-lg-12 -->
        <div class="col-lg-4">
            <div class="form-panel">
    <form action="{{ route('productaction') }}" class="form-inline col-lg-4 " role="form">
        <select class="col-lg-4 form-control "  id="cars" name="action">
            <option >chon</option>
            <option value="disabled">disabled</option>
            <option value="restore">restore</option>
            <option value="delete">delete</option>
          </select> <br /><br /><br />
          <button type="submit" class="btn btn-theme mt-1">Submit</button>
        </div><!-- /form-panel -->
    </div><!-- /col-lg-12 -->
</div>
                <thead>
                <tr>
                    <th><input type="checkbox" name="checkall" value=""></th>
                    <th>ID</th>
                    <th><i class="fa fa-bullhorn"></i> Name</th>
                    <th><i class="fa fa-bullhorn"></i> danh mục</th>
                    <th><i class="fa fa-bullhorn"></i> description</th>
                    <th><i class="fa fa-bullhorn"></i> image</th>
                    <th><i class="fa fa-bullhorn"></i> Unit_price</th>
                    <th><i class="fa fa-bullhorn"></i> promotion_price</th>
                    <th><i class="fa fa-bullhorn"></i> unit</th>
                    <th><i class="fa fa-bullhorn"></i> new</th>
                    <th><i class=" fa fa-edit"></i> Status</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @php
                    $i=0
                    @endphp
                    @foreach ($shows as $show )
                    @php
                    $i++
                    @endphp
                <tr>
                    <td ><input type="checkbox" name="checkbox[]"  value="{{ $show->id }}"></td>
                    <td>{{ $i }}</td>
                    <td class="hidden-phone">{{ $show->name }}</td>
                    <td class="hidden-phone">{{ $show->category->name }}</td>
                    <td class="hidden-phone" style="width: 400px;">{{ $show->description }}</td>
                    <td><img src="{{asset('/storage/images/'.$show->image)}}" style="width: 100px;" ></td>
                    <td class="hidden-phone">{{ $show->Unit_price }}</td>
                    <td class="hidden-phone">{{ $show->promotion_price }}</td>
                    <td class="hidden-phone">{{ $show->unit }}</td>
                    <td class="hidden-phone">{{ $show->new }}</td>
                    <td>
                        @if (  $show->deleted_at ==  null)
                        <span class="label label-info label-mini">active</span></td>
                        @else
                        <span class="label label-danger">disabled</span>
                        @endif
                    <td>
                            <span class="btn btn-primary btn-xs">
                                <a class=" w-75 " style="color:white" href="{{ route('updatetemplateProduct',[$show->id]) }}"><i class="fa fa-pencil"></i></a>
                              </a>
                             </span>
                             @if ( $show->deleted_at != null)
                             <span class="btn btn-primary btn-xs">
                             <a style="color:white" href="{{ route('restoreProduct',[$show->id]) }}">
                                  <i class="fa fa-trash-o "></i>
                               </a>
                            </span>
                            @endif
                            <span class="btn btn-danger btn-xs">
                                <a style="color:white" href="{{ route('deleteProduct',[$show->id]) }}"> <i class="fa fa-trash-o "></i></a>
                            </span>
                    </td>
                </tr>
                @endforeach
                </tbody>
    </form>
            </table>
        </div><!-- /content-panel -->
    </div><!-- /col-md-12 -->
    {{ $shows->links() }}
    </div>
  </section><!-- --/wrapper ---->
</section>

@endsection
