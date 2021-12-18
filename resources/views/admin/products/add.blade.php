@extends('admin.app')


@section ('content')

<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-12">
            <div class="form-panel">
                  <h4 class="mb"><i class="fa fa-angle-right"></i> Add User</h4>
                <form class="form-horizontal style-form"  method="post" action="{{ route('postProduct') }}" enctype='multipart/form-data'>
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">danh muc</label>
                        <div class="col-sm-10">
                            <select name="id_type"  class="form-control">
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>d
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">description</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="description" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Unit_price</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Unit_price" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">promotion_price</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="promotion_price" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">new</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="new" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">unit</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="unit" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="image" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-success">submit</button>
                        </div>
                    </div>
                </form>
            </div>
            </div><!-- col-lg-12-->
        </div>
    </section>
@endsection
