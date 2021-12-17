@extends('admin.app')


@section ('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-12">
            <div class="form-panel">
                  <h4 class="mb"><i class="fa fa-angle-right"></i> Add User</h4>
                <form class="form-horizontal style-form" method="POST" action="{{ route('updateCategory',[$shows->id]) }} "enctype='multipart/form-data'>
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="{{ $shows->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">description</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="description" value="{{ $shows->description }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="image" value="{{ $shows->image }}"> <br />
                            <td><img src="{{asset('/storage/'.$shows->image)}}" style="width: 100px;" ></td>
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
</section>

@endsection
