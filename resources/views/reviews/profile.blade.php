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
                        <form method="post" action="{{asset('/profile/'.Auth::user()->id)}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group" >
                                        <label>{{ trans('message.nameuser')}}</label>
                                        <input required type="text" name="name_user" value="{{Auth::user()->name_user}}" class="form-control">
                                    </div>
                                    <label>Avatar</label>
                                    <div class="form-group" >

                                        <label for="FileInput">
                                            <img src="{{asset('avatar/'.Auth::user()->avatar)}}" id="avatar" width="300px" height="300px"/>
                                        </label>
                                        <input type="file" id="FileInput"/ name="avatar" onchange="showMyImage(this)">
                                        <img id="avatar" class="thumbnil" width="300px" height="=300px" src="">
                                    </div>
                                    <div class="form-group" >
                                        <label>Địa Chỉ</label>
                                        <input required type="text" name="address" value="{{Auth::user()->address}}" class="form-control">
                                    </div>
                                    <div class="form-group" >
                                        <label>Phone</label>
                                        <input required type="number" name="phone" value="{{Auth::user()->phone}}" class="form-control">
                                    </div>
                                    <input type="submit" name="submit" value="Lưu" class="btn btn-primary">
                                    <a href="{{asset('/changepasswword')}}" class="btn btn-info">Thay đổi mật khẩu</a>
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
