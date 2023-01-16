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
                    <div class="form-group">
                        <label role="button" class="border border-secondary px-3" for="product_img">Image <i class="nav-icon fas fa-plus"></i></label>
                        <input type="file" id="product_img" hidden class="form-control" name="image" value="{{ $product->image }}" onchange="loadFile(this)">
                        <div class="preview-image">
                            <img id="output" alt="" style="width: 20%; margin: 0 auto;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="product_content">Ảnh Gallery(ảnh upload không quá 5MB)</label>
                        <div class="input-group hdtuto control-group lst increment">
                            <div class="list-input-hidden-upload">
                                <input type="file" name="more_image[]" id="file_upload" class="myfrm form-control hidden">
                            </div>
                            <div class="input-group-btn">
                                <button class="btn btn-success btn-add-image" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>+Add image</button>
                            </div>
                        </div>
                        <div class="list-images">
                            @if (isset($list_images) && !empty($list_images))
                                @foreach (json_decode($list_images) as $key => $img)
                                    <div class="box-image">
                                        <input type="hidden" name="images_uploaded[]" value="{{ $img }}" id="img-{{ $key }}">
                                        <img src="{{ asset('uploads/image-more/'.$img) }}" class="picture-box">
                                        <div class="wrap-btn-delete"><span data-id="img-{{ $key }}" class="btn-delete-image">x</span></div>
                                    </div>
                                @endforeach
                                <input type="hidden" name="images_uploaded_origin" value="{{ $list_images }}">
                                <input type="hidden" name="id" value="{{ $id }}">
                            @endif
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
            <input type="submit" value="Update Product" class="btn btn-success float-right">
        </div>
    </div>
</section>
<!-- /.content -->
{{ Form::close() }}
<!-- /.content -->
@endsection
<script>
    var loadFile = (e) => {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
