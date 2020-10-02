@extends('admin.layout.master')
@section('title','Bán Bánh Bèo')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh mục sản phẩm</h1>
            </div>
        </div><!--/.row-->
        <div class="row">
            <div class="col-xs-12 col-md-5 col-lg-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Thêm danh mục
                        </div>
                        @include('common.error')
                        @include('common.success')
                        <div class="panel-body">
                            <form method="post" action="{{asset('admin/category/'.$categories->id)}}">
                                @method('PUT')
                            <div class="form-group">
                                <label>Tên danh mục:</label>
                                <input type="text" name="categories_name" class="form-control" placeholder="Tên danh mục..." required
                                value="{{$categories->categories_name}}">
                            </div>
                            <select data-placeholder="Choose a Country..." class="standardSelect mt-3" tabindex="1" name="parent_id">
                                    @if($categories->parent_id != null){
                                        <option value="{{$categories->parent_id}}">{{$categories->parent_id}}</option>
                                        <option value="" label="Null Parent ID"></option>
                                    }
                                    @else
                                    {
                                        <option value="" label="Null Parent ID"></option>
                                    }
                                    @endif
                                    @foreach ($catelist as $cate)
                                        @if($categories->id != $cate->id)
                                        <option value="{{$cate->id}}">{{$cate->categories_name}}</option>
                                        @endif
                                    @endforeach
                            </select>
                            <div class="form-group" id="add">
                                <input type="submit" name="submit" class="form-control btn btn-primary" placeholder="Tên danh mục..." value="Sửa">
                            </div>
                            {{csrf_field()}}
                            </form>
                        </div>
                    </div>
            </div>
            <div class="col-xs-12 col-md-7 col-lg-7">
                <div class="panel panel-primary">
                    <div class="panel-heading">Danh sách danh mục</div>
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>ID</th>
                                        <th>Parent ID</th>
                                        <th>Tên danh mục</th>
                                        <th>Tùy chọn</th>
                                        <th>Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($catelist as $cate)
                                <tr>
                                    <td>{{$cate->id}}</td>
                                    <td>{{$cate->parent_id}}</td>
                                    <td>{{$cate->categories_name}}</td>
                                    <td>
                                        <a href="{{asset('admin/category')}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
                                    </td>
                                    <form method="post" action="{{asset('admin/category/'.$cate->id)}}">
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
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>  <!--/.main-->
@stop
