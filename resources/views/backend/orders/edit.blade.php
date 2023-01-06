@extends('backend.layout.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Chỉnh sửa đơn hàng</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('backend.home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Sửa đơn hàng</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
{{ Form::open(array('route' => ['orders.update', $order->id], 'method' => 'PUT')) }}
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Chỉnh sửa đơn hàng</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_customer">ID khách hàng</label>
                        <select id="id_customer" name="id_customer" class="form-control custom-select">
                            <option selected disabled>ID khách hàng</option>
                            @foreach ($user as $item)
                                <option value="{{ $item->id }}" {{$order->id_customer == $item->id ? 'selected' : '' }}>{{ $item->full_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select id="type" name="type" class="form-control custom-select">
                            <option selected disabled>Chọn</option>
                            @foreach (\App\Models\Orders::$payment as $key => $value)
                            <option value="{{ $key }}" {{$order->type == $key ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="total">Total Price</label>
                        <input type="text" id="total" name="total_price" class="form-control" value="{{ $order->total_price }}">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" id="status" name="status" class="form-control" value="{{ $order->status }}">
                    </div>
                    <div class="form-group">
                        <label for="note">Note</label>
                        <textarea name="note" class="form-control" id="note"  rows="4" >{{ $order->note }}</textarea>
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
            <input type="submit" value="Lưu" class="btn btn-success float-right">
        </div>
    </div>
</section>
{{ Form::close() }}
<!-- /.content -->
@endsection
