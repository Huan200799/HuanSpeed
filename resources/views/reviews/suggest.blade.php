@extends('reviews.master')
@section('title','Huân Speed')
@section('main')
    <div class="col-sm-12 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-primary">
                    <h3>Thêm Gợi Ý</h3>
                    @include('common.error')
                    @include('common.success')
                    <div class="panel-body mt-5">
                        <form method="post" action="{{asset('/suggest')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group" >
                                        <label>{{ trans('message.ProductName')}}</label>
                                        <input required type="text" name="product_name" class="form-control">
                                    </div>
                                    <div class="form-group" >
                                        <label>{{ trans('message.price')}}</label>
                                        <input required type="number" name="price" class="form-control">
                                    </div>
                                    <div class="form-group" >
                                        <label>{{ trans('message.Image')}}</label>
                                        <input required id="img" type="file" name="product_img" class="form-control hidden" onchange="showMyImage(this)">
                                        <img id="avatar" class="thumbnil" width="300px" src="">
                                    </div>
                                    <div class="form-group" >
                                        <label>{{ trans('message.accessories')}}</label>
                                        <input required type="text" name="accessories" class="form-control">
                                    </div>
                                    <div class="form-group" >
                                        <label>{{ trans('message.warranty')}}</label>
                                        <input required type="text" name="warranty" class="form-control">
                                    </div>
                                    <div class="form-group" >
                                        <label>{{ trans('message.promotion')}}</label>
                                        <input required type="text" name="promotion" class="form-control">
                                    </div>
                                    <div class="form-group" >
                                        <label>{{ trans('message.condition')}}</label>
                                        <input required type="text" name="condition" class="form-control">
                                    </div>
                                    <div class="form-group" >
                                        <label>{{ trans('message.description')}}</label>
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
                                    <div class="form-group" >
                                        <label>Lý do nên thêm sản phẩm này</label>
                                        <textarea class="ckeditor" required name="reason"></textarea>
                                        <script type="text/javascript">
                                        var editor = CKEDITOR.replace('reason',{
                                            language:'vi',
                                            filebrowserImageBrowseUrl: '../../editor/ckfinder/ckfinder.html?Type=Images',
                                            filebrowserFlashBrowseUrl: '../../editor/ckfinder/ckfinder.html?Type=Flash',
                                            filebrowserImageUploadUrl: '../../editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                            filebrowserFlashUploadUrl: '../../public/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                        });
                                    </script>
                                    </div>
                                    <input type="submit" name="submit" value="Thêm" class="btn btn-primary">
                                    <a href="{{asset('/')}}" class="btn btn-danger">Hủy bỏ</a>
                                </div>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>
@stop
