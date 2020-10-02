@extends('admin.layout.master')
@section('title','Bán Bánh Bèo')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ trans('message.gopy')}}</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ trans('message.gopy')}}</div>
                    @include('common.error')
                    @include('common.success')
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tablelist">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th width="1%">{{ trans('message.id')}}</th>
                                            <th width="13%">{{ trans('message.ProductName')}}</th>
                                            <th width="8%">{{ trans('message.Image')}}</th>
                                            <th width="22%">{{ trans('message.description')}}</th>
                                            <th width="5%">{{ trans('message.price')}}</th>
                                            <th width="15%">{{ trans('message.promotion')}}</th>
                                            <th width="20%">{{ trans('message.reason')}}</th>
                                            <th>{{ trans('message.categories_id')}}</th>
                                            <th>{{ trans('message.iduser')}}</th>
                                            <th width="6%">{{ trans('message.action')}}</th>
                                            <th width="4%">Xoá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($suggests as $suggest)
                                        <tr>
                                            <form method="post" action="{{asset('admin/suggests/'.$suggest->id)}}" enctype="multipart/form-data">
                                                {{csrf_field()}}
                                                @method('PUT')
                                                <td>{{$suggest->id}}</td>
                                                <td><input required type="text" name="product_name" class="form-control" value="{{$suggest->product_name}}"></td>
                                                <td><img width="150px" src="{{asset('image/'.$suggest->product_img)}}" class="thumbnail"></td>
                                                <td><input required type="text" name="description" class="form-control" value="{!!$suggest->description!!}"></td>
                                                <td><input required type="text" name="price" class="form-control" value="{{$suggest->price}}"></td>
                                                <td><input required type="text" name="promotion" class="form-control" value="{{$suggest->promotion}}"></td>
                                                <td>{!!$suggest->reason!!}</td>
                                                <td>{{$suggest->categories_id}}</td>
                                                <td>{{$suggest->user_id}}</td>
                                                <input type="text" name="product_img" value="{{$suggest->product_img}}" hidden>
                                                <input type="text" name="condition" value="{{$suggest->condition}}" hidden>
                                                <input type="text" name="warranty" value="{{$suggest->warranty}}" hidden>
                                                <input type="text" name="accessories" value="{{$suggest->accessories}}" hidden>
                                                <input type="text" name="status" value="{{$suggest->status}}" hidden>
                                                <input type="text" name="featured" value="{{$suggest->featured}}" hidden>
                                                <input type="text" name="categories_id" value="{{$suggest->categories_id}}" hidden>
                                                <input type="text" name="classify" value="{{$suggest->classify}}" hidden>
                                                @if($suggest->accept == 'Not Accept')
                                                <td >
                                                    <a href=""><input type="submit" name="submit" value="Not Accept" class="btn btn-primary" id="accept"></a>
                                                </td>
                                                @else
                                                    <td class="btn btn-danger" id="watched" >Accept</td>
                                                @endif
                                            </form>



                                            <form method="post" action="{{asset('admin/suggests/'.$suggest->id)}}">
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
                                <h3 id="linkscenter">{{ $suggests->links() }}</h3>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>  <!--/.main-->
@stop
