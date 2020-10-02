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
                    <div class="panel-heading">Thêm sản phẩm</div>
                    @include('common.error')
                    @include('common.success')
                    <div class="panel-body">
                        <form method="post" action="{{asset('admin/product')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="row" id="xuong">
                                <div class="col-xs-8">
                                    <div class="form-group" >
                                        <label>{{ trans('message.ProductName')}}</label>
                                        <input required type="text" name="product_name" class="form-control">
                                    </div>
                                    <div class="form-group" >
                                        <label>Giá sản phẩm</label>
                                        <input required type="number" name="price" class="form-control">
                                    </div>
                                    <div class="form-group" >
                                        <label>Ảnh sản phẩm</label>
                                        <input required id="img" type="file" name="product_img" class="form-control hidden" onchange="changeImg(this)">
                                        <img id="avatar" class="thumbnail" width="300px" src="img/new_seo-10-512.png">
                                    </div>
                                    <div class="form-group" >
                                        <label>Phụ kiện</label>
                                        <input required type="text" name="accessories" class="form-control">
                                    </div>
                                    <div class="form-group" >
                                        <label>Bảo hành</label>
                                        <input required type="text" name="warranty" class="form-control">
                                    </div>
                                    <div class="form-group" >
                                        <label>Khuyến mãi</label>
                                        <input required type="text" name="promotion" class="form-control">
                                    </div>
                                    <div class="form-group" >
                                        <label>Tình trạng</label>
                                        <input required type="text" name="condition" class="form-control">
                                    </div>
                                    <div class="form-group" >
                                        <label>Trạng thái</label>
                                        <select required name="status" class="form-control">
                                            <option value="Stocking">Còn hàng</option>
                                            <option value="Out Of Stock">Hết hàng</option>
                                        </select>
                                    </div>
                                    <div class="form-group" >
                                        <label>Miêu tả</label>
                                        <textarea class="ckeditor" required name="description"></textarea>
                                        <script type="text/javascript">
                                        var editor = CKEDITOR.replace('description',{
                                            language:'vi',
                                            filebrowserImageBrowseUrl: '../../editor/ckfinder/ckfinder.html?Type=Images',
                                            filebrowserFlashBrowseUrl: '../../editor/ckfinder/ckfinder.html?Type=Flash',
                                            filebrowserImageUploadUrl: '../../editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                            filebrowserFlashUploadUrl: '../../public/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                        });
                                    </script>
                                    </div>
                                    <div class="form-group" >
                                        <label>Phân loại</label>
                                        <select required name="classify" class="form-control">
                                            <option value="Sport">Sport</option>
                                            <option value="Naked">Naked</option>
                                            <option value="Cruiser">Cruiser</option>
                                        </select>
                                    </div>
                                    <div class="form-group" >
                                        <label>Danh mục</label>
                                        <select required name="categories_id" class="form-control">
                                            @foreach($catelist as $cate):
                                            <option value="{{$cate->id}}">{{$cate->categories_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group" >
                                        <label>Sản phẩm nổi bật</label><br>
                                        Có: <input type="radio" name="featured" value="Prominent">
                                        Không: <input type="radio" checked name="featured" value="Not Prominent">
                                    </div>
                                    <input type="submit" name="submit" value="Thêm" class="btn btn-primary">
                                    <a href="#" class="btn btn-danger">Hủy bỏ</a>
                                </div>
                            </div>

                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>  <!--/.main-->
@stop
