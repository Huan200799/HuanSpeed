@extends('reviews.master')
@section('title','Huân Speed')
@section('main')

 <div class="col-sm-12 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-primary">
                    <h3>Thay Đổi Mật Khẩu</h3>
                    @include('common.error')
                    @include('common.success')
                    <div class="panel-body mt-5">
                        <form method="post" action="{{asset('/changepasswword/'.Auth::user()->id)}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group" >
                                        <label>Password</label>
                                        <input required type="password" name="password" class="form-control">
                                    </div>
                                    <div class="form-group" >
                                        <label>New Password</label>
                                        <input required type="password" name="passwordnew" class="form-control">
                                    </div>
                                    <div class="form-group" >
                                        <label>Config New Password</label>
                                        <input required type="password" name="passwordconfig" class="form-control">
                                    </div>
                                    <input type="submit" name="submit" value="Thay đổi mật khẩu" class="btn btn-primary">
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
