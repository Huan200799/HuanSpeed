@extends('pages.master')
@section('title','Chi tiết sản phẩm')
@section('main')
	<div id="wrap-inner">
		<div id="product-info">
				<div class="clearfix"></div>
					<h3>{{$products->product_name}}</h3>
				<div class="row">
					<div id="product-img" class="col-xs-12 col-sm-12 col-md-5">
						<img src="{{asset('image/'.$products->product_img)}}">
					</div>
    				<div id="product-details" class="col-xs-12 col-sm-12 col-md-7">
    					<p>Giá: <span class="price">{{number_format($products->price,0,)}}đ</span></p>
    					<p>Bảo hành: {{$products->warranty}}</p>
    					<p>Công Nghệ: {{$products->accessories}}</p>
    					<p>Tình trạng: {{$products->condition}}</p>
    					<p>Khuyến mại: {{$products->promotion}}</p>
    					@if($products->status == 'Stocking')
    						<p>Còn hàng: Còn hàng</p>
    					@endif
                        @if($products->status == 'Out Of Stock')
    						<p>Hết hàng: Hết hàng</p>
    					@endif
    						<p class="add-cart text-center"><a href="{{ route('cart.show', $products->id)}}">Đăt Hàng Sản Phẩm</a></p>
    				</div>
				</div>
			</div>
		<div id="product-detail" style="border-bottom: 1px solid #acacac">
			<h3>Chi tiết sản phẩm</h3>
			<p class="text-justify">{!!$products->description!!}</p>
		</div>
        @include('common.error')
        <div class="container mt-5 col-md-12" style="border: 1px solid #acacac;">
            <div class="row">
                    <div class="col-xs-12 col-md-2">
                        <div class="well well-sm">
                            <div class="row">
                                <div class="col-xs-12 col-md-6 text-center ml-5 mt-3">
                                    <h1 class="rating-num">{{number_format($commentrating,1,)}}<span class="fa fa-star checked"></span></h1>
                                    <div class="rating">
                                        <span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">
                                        </span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">
                                        </span><span class="glyphicon glyphicon-star-empty"></span>
                                    </div>
                                    <div>
                                        <span class="glyphicon glyphicon-user">{{count($comments)}} TOTAl</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="row rating-desc mt-3">
                                <div class="col-xs-3 col-md-3 text-right">
                                    5<span class="fa fa-star checked"></span>
                                </div>
                                <div class="col-xs-8 col-md-9">
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                            <span>{{$commentrating5}} đánh giá</span>
                                        </div>
                                    </div>
                                </div>
                                                <!-- end 5 -->
                                    <div class="col-xs-3 col-md-3 text-right">
                                        4<span class="fa fa-star checked"></span>
                                    </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                    aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                        <span>{{$commentrating4}} đánh giá</span>
                                    </div>
                                </div>
                            </div>
                                                <!-- end 4 -->
                            <div class="col-xs-3 col-md-3 text-right">
                                3<span class="fa fa-star checked"></span>
                            </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        <span>{{$commentrating3}} đánh giá</span>
                                    </div>
                                </div>
                            </div>
                                                <!-- end 3 -->
                            <div class="col-xs-3 col-md-3 text-right">
                                2<span class="fa fa-star checked"></span>
                            </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span>{{$commentrating2}} đánh giá</span>
                                    </div>
                                </div>
                            </div>
                                                <!-- end 2 -->
                            <div class="col-xs-3 col-md-3 text-right">
                                1<span class="fa fa-star checked"></span>
                            </div>
                            <div class="col-xs-8 col-md-9">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                        <span>{{$commentrating1}} đánh giá</span>
                                   </div>
                                </div>
                            </div>
                                                <!-- end 1 -->
                            </div>
                                            <!-- end row -->
                            </div>
                                <div class="col-xs-12 col-md-4 mt-5 ">
                                    <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" class="btn btn-primary mt-1 ml-5">
                                            Thảo luận
                                    </a>
                                </div>
                            </div>
                        </div>

                    <div class="collapse" id="collapseExample">
                         <h3>Bình luận</h3>
                        <div class="col-md-12 comment">
                            <form method="post" action="{{route('comment.store')}}">
                                {{csrf_field()}}
                                <br>
                                <div id="rating">
                                    <input type="radio" id="star5" name="rating" value="5" />
                                    <label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                    <input type="radio" id="star4" name="rating" value="4" />
                                    <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                    <input type="radio" id="star3" name="rating" value="3" />
                                    <label class = "full" for="star3" title="Meh - 3 stars" value="3"></label>
                                    <input type="radio" id="star2" name="rating" value="2" />
                                    <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                    <input type="radio" id="star1" name="rating" value="1" />
                                    <label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                </div>
                                <div class="form-group" style="margin-top: 90px;">
                                    <label for="email">Email:</label>
                                    <input required type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="form-group" hidden>
                                    <input required type="text" class="form-control" value="{{$products->id}}" name="com_product" >
                                </div>
                                <div class="form-group">
                                    <label for="name">Tên:</label>
                                    <input required type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="cm">Bình luận:</label>
                                    <textarea required rows="10" id="cm" class="form-control" name="content"></textarea>
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-default">Gửi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="comment-list" class="mt-5">
                        @foreach($comments as $comment)
                        <ul>
                            <li class="com-title">
                                {{$comment->com_name}}
                                <br>
                                <span>{{date('d/m/Y H:i',strtotime($comment->created_at))}}</span>
                            </li>
                            <li class="com-details">
                                <div id="ratingcom">
                                    @if($comment->com_rating == 5)
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    @endif
                                    @if($comment->com_rating == 4)
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                    @endif
                                    @if($comment->com_rating == 3)
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    @endif
                                    @if($comment->com_rating == 2)
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    @endif
                                    @if($comment->com_rating == 1)
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    @endif
                                </div>
                                    <p>{{$comment->com_content}}</p>
                                @foreach($childcomment as $child)
                                    @if($child->childcom_comment == $comment->id)
                                        <ul style="margin-left: 5%; border-left: 2px solid #acacac;">
                                            <li class="com-title" style="margin-left: 1%;">{{$child->childcom_name}}
                                                <br>
                                                <span>{{date('d/m/Y H:i',strtotime($child->created_at))}}</span>
                                            </li>
                                            <li class="com-details" style="margin-left: 1%;">{{$child->childcom_content}}</li>
                                        </ul>
                                    @endif
                                @endforeach
                                    </li>
                                    <a data-toggle="collapse" href="#collapseExample{{$comment->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    Thảo luận
                                    </a>
                                <div class="collapse" id="collapseExample{{$comment->id}}" style="width: 500px;">
                                    <form method="post" action="{{route('childcomment.store')}}">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input required type="email" class="form-control" id="email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Tên:</label>
                                            <input required type="text" class="form-control" id="name" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="cm">Bình luận:</label>
                                            <textarea required rows="10" id="cm" class="form-control" name="content"></textarea>
                                        </div>
                                        <div hidden>
                                            <input required type="text" class="form-control" id="com_id" name="com_id" value="{{$comment->id}}">
                                        </div>
                                        <div class="form-group text-right">
                                            <button type="submit" class="btn btn-default">Gửi</button>
                                        </div>
                                    </form>
                                </div>
                            </ul>
                        @endforeach
                    </div>
                </div>
@stop
