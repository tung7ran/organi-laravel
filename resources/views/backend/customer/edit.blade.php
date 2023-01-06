@extends('backend.layout.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cập nhật người dùng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('backend.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Cập nhật người dùng</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    {{ Form::open(array('route' => ['customers.update', $data->id], 'method' => 'PUT')) }}
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
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Tên</label>
                            <input type="text" id="inputName" name="name" class="form-control" value="{{ $data->name }}">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Số điện thoại</label>
                            <input type="text" id="inputName" name="phone" class="form-control" value="{{ $data->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="inputName">email</label>
                            <input type="text" id="inputName" name="email" class="form-control" value="{{ $data->email }}">
                        </div>
                        <div class="form-group">
                            <label for="inputName">address</label>
                            <input type="text" id="inputName" name="address" class="form-control" value="{{ $data->address }}">
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

