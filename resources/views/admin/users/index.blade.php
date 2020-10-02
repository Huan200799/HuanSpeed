@extends('admin.layout.master')
@section('title','Bán Bánh Bèo')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ trans('message.manageusers')}}</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ trans('message.manageusers')}}</div>
                    @include('common.error')
                    @include('common.success')
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tablelist">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th width="3%">{{ trans('message.id')}}</th>
                                            <th width="15%">{{ trans('message.nameuser')}}</th>
                                            <th width="22%">{{ trans('message.address')}}</th>
                                            <th width="20%">{{ trans('message.diachi')}}</th>
                                            <th width="8%">{{ trans('message.phone')}}</th>
                                            <th width="20%">{{ trans('message.avatar')}}</th>
                                            <th>Xoá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name_user}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->address}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->avatar}}</td>
                                            <form method="post" action="{{asset('admin/users/'.$user->id)}}">
                                                {{csrf_field()}}
                                                @method('DELETE')
                                                <td>
                                                    <input onclick="return confirm('Bạn có chắc chắn muốn xóa?')" type="submit" name="submit" value="Delete" class="btn btn-danger" id="button">
                                                </td>
                                            </form>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h3 id="linkscenter">{{ $users->links() }}</h3>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>  <!--/.main-->
@stop
