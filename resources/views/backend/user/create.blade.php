@extends('backend.layout.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm user</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('backend.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Thêm user</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
{{ Form::open(array('route' => 'user.store', 'enctype' => 'multipart/form-data')) }}
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
                                <input type="text" id="inputName" name="full_name" class="form-control" value="{{ old('full_name') }}">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Username</label>
                                <input type="text" id="inputName" name="user_name" class="form-control" value="{{ old('user_name') }}">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Password</label>
                                <input type="text" id="inputName" name="password" class="form-control" value="{{ old('password') }}">
                            </div>
                            <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password" class="form-control" name="repassword" value="">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Email</label>
                                <input type="text" id="inputName" name="email" class="form-control" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Số điện thoại</label>
                                <input type="text" id="inputName" name="phone" class="form-control" value="{{ old('phone') }}">
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Giới tính</label>
                                <select id="inputStatus" name="gender" class="form-control custom-select">
                                    <option selected disabled>Chọn</option>
                                    @foreach (\App\Models\User::$listGender as $key => $value)
                                        <option value="{{ $key }}">
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="status" 
                                checked name="status">
                                <label class="form-check-label" for="status">
                                    Kích hoạt
                                </label>
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
            <input type="submit" value="Tạo mới user" class="btn btn-success float-right">
        </div>
    </div>
</section>
{{ Form::close() }}
<!-- /.content -->
@endsection
