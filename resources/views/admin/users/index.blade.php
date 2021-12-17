@extends('admin.app')
@section ('content')
<section id="main-content">
    <section class="wrapper">
<div class="row mt">
    <div class="col-md-12">
        <div class="content-panel">
            <h4><i class="fa fa-angle-right"></i> Manager User </h4><hr><table class="table table-striped table-advance table-hover">
                <button type="button" class="btn btn-theme02 left"><a style="color:white" href="{{ route('addUser') }}" >thêm mới</a></button>
                <div class="row mt">
                    <div class="col-lg-4">
                        <div class="form-panel">
                            <p class="category"><a style="color: gray" href="{{ route('showUser') }}">total user ({{ $index }}) </a> | <a  style="color: rgb(13, 182, 36)" href="{{ route('activeruser') }}">user activer ({{ $activeruser }})</a> | <a style="color:red" href="{{ route('trackuser') }}">user disable ({{ $trackuser }})</a></p>
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
    <form action="{{ route('action') }}" class="form-inline col-lg-4 " role="form">
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
                    <th><i class="fa fa-bullhorn"></i> sad</th>
                    <th><i class="fa fa-bullhorn"></i> EMAIL</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> ROLE</th>
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
                    <td class="hidden-phone">{{ $show->email }}</td>
                    <td>{{ $show->role ==1 ? 'editer' : 'admin' }}</td>
                    <td>
                        @if (  $show->deleted_at ==  null)
                        <span class="label label-info label-mini">active</span></td>
                        @else
                        <span class="label label-danger">disabled</span>
                        @endif
                    <td>
                            @if ( $show->deleted_at != null)
                            <span class="btn btn-success btn-xs">
                                <a style="color:white" href="{{ route('restoreUser',[$show->id]) }}">
                                 <i class="fa fa-check"></i>
                              </a>
                             </span>
                           @endif
                        <span class="btn btn-primary btn-xs"><a style="color:white" class=" w-75 " href="{{ route('editUser',[$show->id]) }}"><i class="fa fa-pencil"></i></span>

                            @if ( $show->id != 1)
                            <button class="btn btn-danger btn-xs">
                            <a style="color:white" href="{{ route('deleteUser',[$show->id]) }}">
                             <i class="fa fa-trash-o "></i>
                            </a>
                        </button>
                            @endif

                    </td>
                </tr>
                @endforeach
                </tbody>
    </form>
            </table>
        </div><!-- /content-panel -->
    </div><!-- /col-md-12 -->
    </div>
  </section><!-- --/wrapper ---->
</section>

@endsection
