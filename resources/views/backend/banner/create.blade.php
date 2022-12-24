@extends('backend.layout.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Banner Add</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Add Banner</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
{{ Form::open(array('route' => 'product.store', 'enctype' => 'multipart/form-data')) }}
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Banner</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputName">Banner Title</label>
                        <input type="text" id="inputName" class="form-control" name="banner_title" value="{{ old('banner_title') }}">
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Banner Description</label>
                        <textarea id="inputDescription" class="form-control" rows="4" name="product_description" value="{{ old('product_description') }}"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputClientCompany">Image</label>
                        <input type="file" id="inputClientCompany" class="form-control" class="product_image" value="{{ old('product_image') }}">
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
            <input type="submit" value="Tạo mới Product" class="btn btn-success float-right">
        </div>
    </div>
</section>
<!-- /.content -->
{{ Form::close() }}
<!-- /.content -->
@endsection
