@extends('backend.layout.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cập nhật user</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('backend.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Cập nhật user</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    {{ Form::open(array('route' => ['user.update', $data->id], 'method' => 'PUT')) }}
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin cơ bản</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Họ tên</label>
                                    <input type="text" id="inputName" name="full_name" class="form-control" value="{{ $data->full_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Username</label>
                                    <input type="text" id="inputName" name="user_name" class="form-control" value="{{ $data->user_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Password</label>
                                    <input type="text" id="inputName" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nhập lại mật khẩu</label>
                                    <input type="password" class="form-control" name="repassword" value="">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Email</label>
                                    <input type="text" id="inputName" name="email" class="form-control" value="{{ $data->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Số điện thoại</label>
                                    <input type="text" id="inputName" name="phone" class="form-control" value="{{ $data->phone }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Hình ảnh</h3>
                                </div>
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="image">
                                            <div class="image__thumbnail">
                                                <img src="http://127.0.0.1:8000/backend/img/placeholder.png" data-init="#">
                                                <a href="#" class="image__delete" onclick="urlFileDelete(this)">
                                                    <i class="fa fa-times"></i></a>
                                                <input type="file" hidden id="file4" value="{{ old('image', @$data->image) }}" name="image" />
                                                <label for="file4" class="image__button" onclick="fileSelect(this)">
                                                    <i class="fa fa-upload"></i>
                                                    Upload
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="#" class="btn btn-secondary">Huỷ</a>
                <input type="submit" value="Cập nhật user" class="btn btn-success float-right">
            </div>
        </div>
    </section>
    {{ Form::close() }}
    <!-- /.content -->
@endsection

