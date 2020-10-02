@extends('pages.master')
@section('title','Chi tiết sản phẩm')
@section('main')
    <div id="wrap-inner" class="container">
        <div id="list-cart">
            <h3>{{ trans('message.ordered') }}</h3>
            @include('common.error')
            @foreach($orders as $order)
                <table class="table table-bordered .table-responsive text-center">
                    <tr class="active">
                        <td width="11.111%">{{ trans('message.Image') }}</td>
                        <td width="22.222%">{{ trans('message.ProductName') }}</td>
                        <td width="22.222%">{{ trans('message.soluong') }}</td>
                        <td width="16.6665%">{{ trans('message.price') }}</td>
                    </tr>
                    <tr>
                        <td><img class="img-responsive" src="{{asset('image/'.$order->product_img)}}" style="width: 200px;"></td>
                        <td>{{$order->order_product_name}}</td>
                        <td>{{$order->quantity}}</td>
                        <td><span class="price">{{number_format($order->order_product_totalprice, 0)}}đ</span></td>
                    </tr>

                </table>
            @endforeach
            <div class="col-md-6 col-sm-12 col-xs-12">
                <h4>Tổng tiền đã mua hàng: <span class="total-price price">{{number_format($totalprice, 0)}} đ</span></h4>
            </div>
            <h3 id="links">{{ $orders->links() }}</h3>
        </div>
    </div>
@stop
