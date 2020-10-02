@extends('admin.layout.master')
@section('title','Bán Bánh Bèo')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ trans('message.childcomment')}}</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ trans('message.childcomment')}}</div>
                    @include('common.error')
                    @include('common.success')
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tablelist">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th width="5%">{{ trans('message.id')}}</th>
                                            <th width="5%">{{ trans('message.idcomment')}}</th>
                                            <th width="20%">{{ trans('message.address')}}</th>
                                            <th width="20%">{{ trans('message.nameuser')}}</th>
                                            <th width="40%">{{ trans('message.content')}}</th>
                                            <th>Xoá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($childcomments as $childcomment)
                                        <tr>
                                            <td>{{$childcomment->id}}</td>
                                            <td>{{($childcomment->childcom_comment) ? $childcomment->childcom_comment : $childcomment->childcom_comment->id}}</td>
                                            <td>{{$childcomment->childcom_email}}</td>
                                            <td>{{$childcomment->childcom_name}}</td>
                                            <td>{{$childcomment->childcom_content}}</td>
                                            <form method="post" action="{{asset('admin/childcomment/'.$childcomment->id)}}">
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
                                <h3 id="linkscenter">{{ $childcomments->links() }}</h3>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>  <!--/.main-->
@stop
