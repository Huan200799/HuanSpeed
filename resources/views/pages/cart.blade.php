@extends('pages.master')
@section('title','Chi tiết sản phẩm')
@section('main')
@if(Cart::count() >= 1)
<script type="text/javascript">
    function updateCart(qty,rowId){
        console.log(qty);
        console.log(rowId);
        $.get(
            '{{ route('cart.update') }}',
            {qty:qty,rowId:rowId},
            function(){
                location.reload();
            }
        );
    }
</script>
	<div id="wrap-inner" class="container">
		<div id="list-cart">
			<h3>Giỏ hàng</h3>
            @include('common.error')
			<form method="post">
			@foreach($product_cart as $gio)
				<table class="table table-bordered .table-responsive text-center">
					<tr class="active">
						<td width="11.111%">{{ trans('message.Image')}}</td>
						<td width="22.222%">{{ trans('message.ProductName')}}</td>
						<td width="22.222%">{{ trans('message.soluong')}}</td>
						<td width="16.6665%">{{ trans('message.price')}}</td>
						<td width="16.6665%">Thành tiền</td>
						<td width="11.112%">Xóa</td>
					</tr>
					<tr>
						<td><img class="img-responsive" src="{{asset('image/'.$gio->options->image)}}" style="width: 200px;"></td>
						<td>{{$gio->name}}</td>
						<td>
							<div class="form-group">
						       <input class="form-control" type="number" value="{{$gio->qty}}" onchange="updateCart(this.value, '{{$gio->rowId}}')">
							</div>
						</td>
						<td><span class="price">{{number_format($gio->price, 0)}}đ</span></td>
						<td><span class="price">{{number_format($gio->price*$gio->qty, 0)}}đ</span></td>
						<td><a href="{{route('cart.destroy', $gio->rowId)}}">Xóa</a></td>
					</tr>
				</table>
			@endforeach
			<div class="row" id="total-price">
				<div class="col-md-6 col-sm-12 col-xs-12">
					Tổng thanh toán: <span class="total-price price">{{$total}} đ</span>
				</div>
				<div class="col-md-6 col-sm-12 col-xs-12">
					<a href="{{asset('/')}}" class="my-btn btn">Mua tiếp</a>
					<a href="{{asset('/')}}" class="my-btn btn">Cập nhật</a>
					<a href="{{asset('cart/delete/all')}}" class="my-btn btn">Xóa giỏ hàng</a>
				</div>
			</div>
			</form>
		</div>
		<div id="xac-nhan">
            <h3>Xác nhận mua hàng</h3>
            @if(Auth::check())
            <a href="{{route('order.create')}}"><button class="btn btn-default">Thực hiện đơn hàng</button></a>
            @else
            <a href="{{route('login')}}"><button class="btn btn-default">Thực hiện đơn hàng</button></a>
            @endif
        </div>
	</div>
@else
    <h1>Giỏ hàng rỗng!</h1>
    @include('common.success')
@endif
@stop
