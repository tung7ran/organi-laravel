@extends('backend.layout.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Product</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Update Product</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
{{ Form::open(array('route' => ['product.update', $product->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data')) }}

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Product</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input type="text" id="product_name" class="form-control" name="name" value="{{ $product->name }}">
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" id="slug" class="form-control" name="slug" value="{{ $product->slug }}">
                    </div>
                    <div class="form-group">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" id="price" class="form-control" name="price" value="{{ $product->price }}">
                    </div>
                    <div class="form-group">
                        <label for="sale_price">Sale Price</label>
                        <input type="number" id="sale_price" class="form-control" name="sale_price" value="{{ $product->sale_price }}">
                    </div>
                    <div class="form-group">
                        <label for="product_desc">Project Description</label>
                        <textarea id="product_desc" class="form-control" rows="4" name="desc">{{ $product->desc }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="product_content">Project Content</label>
                        <textarea id="product_content" class="form-control" rows="4" name="content">{{ $product->content }}</textarea>
                    </div>
                    <div class="row" style="gap: 5px">
                        <div class="form-group">
                            <label role="button" class="border border-secondary px-3" for="product_img">Image <i class="nav-icon fas fa-plus"></i></label>
                            <input type="file" id="product_img" hidden class="form-control" name="image" value="{{ $product->image }}">
                        </div>
                        <div class="form-group">
                            <label role="button" class="border border-secondary px-3" for="img_content">Image Content <i class="nav-icon fas fa-plus"></i></label>
                            <input type="file" id="img_content" hidden class="form-control" name="image_content" value="{{ $product->image_content }}">
                        </div>
                        <div class="form-group">
                            <label role="button" class="border border-secondary px-3" for="image_ingredient">Image Ingredient <i class="nav-icon fas fa-plus"></i></label>
                            <input type="file" id="image_ingredient" hidden class="form-control" name="image_ingredient" value="{{ $product->image_ingredient }}">
                        </div>
                        <div class="form-group">
                            <label role="button" class="border border-secondary px-3" for="image_use">Image Use <i class="nav-icon fas fa-plus"></i></label>
                            <input type="file" id="image_use" hidden class="form-control" name="image_use" value="{{ $product->image_use }}">
                        </div>
                        <div class="form-group">
                            <label role="button" class="border border-secondary px-3" for="more_image">More Image <i class="nav-icon fas fa-plus"></i></label>
                            <input type="file" id="more_image" hidden class="form-control" name="more_image" value="{{ $product->more_image }}">
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
            <input type="submit" value="Tạo mới Product" class="btn btn-success float-right">
        </div>
    </div>
</section>
<!-- /.content -->
{{ Form::close() }}
<!-- /.content -->
@endsection
