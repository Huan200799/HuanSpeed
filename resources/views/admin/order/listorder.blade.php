@extends('admin.layout.master')
@section('title','Bán Bánh Bèo')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ trans('message.manageorder')}}</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ trans('message.manageorder')}}</div>
                    @include('common.error')
                    @include('common.success')
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tablelist">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th width="3%">{{ trans('message.id')}}</th>
                                            <th width="3%">{{ trans('message.iduser')}}</th>
                                            <th width="15%">{{ trans('message.nameuser')}}</th>
                                            <th width="22%">{{ trans('message.address')}}</th>
                                            <th width="20%">{{ trans('message.diachi')}}</th>
                                            <th width="8%">{{ trans('message.phone')}}</th>
                                            <th width="8%">{{ trans('message.total_price')}}</th>
                                            <th width="12%">{{ trans('message.status')}}</th>
                                            <th>{{ trans('message.action')}}</th>
                                            <th>Xoá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                        <tr>
                                            <form method="post" action="{{asset('admin/productorder/'.$order->id)}}" enctype="multipart/form-data">
                                                {{csrf_field()}}
                                                @method('PUT')
                                                <td>{{$order->id}}</td>
                                                <td>{{($order->user_id) ? $order->user_id : $order->user->id}}</td>
                                                <td>{{($order->name_user) ? $order->name_user : $order->user->name_user}}</td>
                                                <td>{{($order->email) ? $order->email : $order->user->email}}</td>
                                                <td>{{($order->address) ? $order->address : $order->user->address}}</td>
                                                <td>{{($order->phone) ? $order->phone : $order->user->phone}}</td>
                                                <td>{{number_format($order->total_price,0,)}}</td>
                                                <td scope="row">
                                                    @if($order->status == 'Ordered')
                                                        {{ 'Ordered' }}
                                                    @endif
                                                    @if($order->status == 'Begin Transport')
                                                        {{ 'Begin Transport' }}
                                                    @endif
                                                </td>
                                                <input type="text" name="email" value="{{$order->user->email}}" hidden>
                                                @if($order->status == 'Ordered')
                                                <td >
                                                    <a href=""><input type="submit" name="submit" value="Accept" class="btn btn-primary" id="accept"></a>
                                                </td>
                                                @else
                                                    <td class="btn btn-danger" id="watched" >Watched</td>
                                                @endif
                                            </form>
                                            <form method="post" action="{{asset('admin/productorder/'.$order->id)}}">
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
                                <h3 id="linkscenter">{{ $orders->links() }}</h3>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>  <!--/.main-->
@stop
