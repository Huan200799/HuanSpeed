@extends('pages.master')
@section('title','Huân Speed')
@section('main')
		<div class="row">
			<div id="wrap-inner">
				<div class="products">
						<h3>sản phẩm nổi bật</h3>
					<div class="product-list row">
						@foreach($prominents as $item)
							<div class="product-item col-md-3 col-sm-6 col-xs-12">
							<a href="#"><img src="{{asset('image/'.$item->product_img)}}" class="img-thumbnail"></a>
							<p><a href="#">{{$item->product_name}}</a></p>
							<p class="price">{{number_format($item->price,0,)}}đ</p>
							<div class="marsk">
								<a href="{{asset('homepage/detail/'.$item->id.'/'.$item->product_name_slug.'.html')}}">Xem chi tiết...</a>
							</div>
                            <div>
                                <p>
                                <?php
                                    $sumcomment = DB::table('comment')->where('com_product', $item->id)->get();
                                    $sumstar = DB::table('comment')->where('com_product', $item->id)->avg('com_rating');
                                ?>
                                @if($sumstar >= 4.5 && $sumstar <= 5)
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                @endif
                                @if($sumstar >= 3.5 && $sumstar < 4.5)
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star "></span>
                                @endif
                                @if($sumstar >= 2.5 && $sumstar < 3.5)
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star "></span>
                                @endif
                                @if($sumstar >= 1.5 && $sumstar < 2.5)
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star "></span>
                                @endif
                                @if($sumstar > 0 && $sumstar < 1.5)
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star "></span>
                                @endif
                                @if(count($sumcomment) ==0 )
                                @else
                                    {{count($sumcomment)}} đánh giá
                                @endif
                                </p>
                            </div>
						</div>
						@endforeach
					</div>
				</div>
				<div class="products">
					<h3 class="mt-5">Tất cả sản phẩm</h3>
					<div class="product-list row">
    					@foreach($notprominents as $item)
    					<div class="product-item col-md-3 col-sm-6 col-xs-12">
    						<a href="#"><img src="{{asset('image/'.$item->product_img)}}" class="img-thumbnail"></a>
    						<p><a href="#">{{$item->product_name}}</a></p>
    						<p class="price">{{number_format($item->price,0,)}}đ</p>
    					    <div class="marsk">
    							<a href="{{asset('homepage/detail/'.$item->id.'/'.$item->product_name_slug.'.html')}}">Xem chi tiết...</a>
    						</div>
                                <p>
                                <?php
                                    $sumcomment = DB::table('comment')->where('com_product', $item->id)->get();
                                    $sumstar = DB::table('comment')->where('com_product', $item->id)->avg('com_rating');
                                ?>
                                @if($sumstar >= 4.5 && $sumstar <= 5)
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                @endif
                                @if($sumstar >= 3.5 && $sumstar < 4.5)
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star "></span>
                                @endif
                                @if($sumstar >= 2.5 && $sumstar < 3.5)
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star "></span>
                                @endif
                                @if($sumstar >= 1.5 && $sumstar < 2.5)
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star "></span>
                                @endif
                                @if($sumstar > 0 && $sumstar < 1.5)
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star "></span>
                                @endif
                                @if(count($sumcomment) ==0 )
                                @else
                                    {{count($sumcomment)}} đánh giá
                                @endif
                                </p>
    					</div>
    					@endforeach
				</div>
			</div>
		</div>
		<!-- end main -->
	</div>

@stop



