@extends('backend.layout.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cập nhật Post</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('backend.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Cập nhật Post</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
{{ Form::open(array('route' => ['orders-detail.update', $ordersDetail->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data')) }}

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Cập nhật Post</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="Id_order">Id_order</label>
                        <input type="text" id="post-name" class="form-control" name="id_order" value="{{ $ordersDetail->id_order }}">
                    </div>
                    <div class="form-group">
                        <label for="Id_product">Id_product</label>
                        <input type="text" id="post-slug" class="form-control" name="id_product" value="{{ $ordersDetail->id_product }}">
                    </div>
                    <div class="form-group">
                        <label for="Price">Price</label>
                        <input id="description" class="form-control" rows="4" name="price">{{ $ordersDetail->price }}
                    </div>
                    <div class="form-group">
                        <label for="Quantities">Quantities</label>
                        <input id="content" class="form-control" rows="4" name="qty">{{$ordersDetail->qty}}
                    </div>
                    <div class="form-group">
                        <label for="total">total</label>
                        <input id="content" class="form-control" rows="4" name="total">{{$ordersDetail->total}}
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="#" class="btn btn-secondary">Cancel</a>
            <input type="submit" value="Update new Project" class="btn btn-success float-right">
        </div>
    </div>
</section>
{{ Form::close() }}

<!-- /.content -->
@endsection
