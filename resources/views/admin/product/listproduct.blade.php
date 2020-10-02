@extends('admin.layout.master')
@section('title','Bán Bánh Bèo')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">

                <div class="panel panel-primary">
                    <div class="panel-heading">Danh sách sản phẩm</div>
                    @include('common.error')
                    @include('common.success')
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <div class="table-responsive">
                                <a href="{{asset('admin/product/create')}}" class="btn btn-primary">Thêm sản phẩm</a>
                                <table class="table table-bordered" id="tablelist">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th>ID</th>
                                            <th width="30%">Tên Sản phẩm</th>
                                            <th>Giá sản phẩm</th>
                                            <th width="20%">Ảnh sản phẩm</th>
                                            <th>Danh mục</th>
                                            <th>Tùy chọn</th>
                                            <th>Tùy chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->product_name}}</td>
                                            <td>{{number_format($product->price,0,)}}</td>
                                            <td>
                                                <img width="150px" src="{{asset('image/'.$product->product_img)}}" class="thumbnail">
                                            </td>
                                            <td>{{$product->categories_id}}</td>
                                            <td>
                                                <a href="{{asset('admin/product/'.$product->id.'/edit')}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                            </td>
                                            <form method="post" action="{{asset('admin/product/'.$product->id)}}">
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
                            <h3 id="linkscenter">{{ $products->links() }}</h3>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>  <!--/.main-->
@stop
