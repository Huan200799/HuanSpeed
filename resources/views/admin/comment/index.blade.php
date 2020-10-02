@extends('admin.layout.master')
@section('title','Bán Bánh Bèo')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ trans('message.comment')}}</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ trans('message.comment')}}</div>
                    @include('common.error')
                    @include('common.success')
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tablelist">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th width="3%">{{ trans('message.id')}}</th>
                                            <th width="5%">{{ trans('message.idproduct')}}</th>
                                            <th width="5%">{{ trans('message.rating')}}</th>
                                            <th width="20%">{{ trans('message.address')}}</th>
                                            <th width="15%">{{ trans('message.nameuser')}}</th>
                                            <th width="40%">{{ trans('message.content')}}</th>
                                            <th>Xoá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($comments as $comment)
                                        <tr>
                                            <td>{{$comment->id}}</td>
                                            <td>{{($comment->com_product) ? $comment->com_product : $comment->comment_product->id}}</td>
                                            <td>{{$comment->com_rating}}</td>
                                            <td>{{$comment->com_email}}</td>
                                            <td>{{$comment->com_name}}</td>
                                            <td>{{$comment->com_content}}</td>
                                            <form method="post" action="{{asset('admin/comments/'.$comment->id)}}">
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
                                <h3 id="linkscenter">{{ $comments->links() }}</h3>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>  <!--/.main-->
@stop
