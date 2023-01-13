@extends('backend.layout.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Product Add</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('backend.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Add Product</li>
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
                        <input type="text" id="product_name" class="form-control" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" id="slug" class="form-control" name="slug" value="{{ old('slug') }}">
                    </div>
                    <div class="form-group">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" id="price" class="form-control" name="price" value="{{ old('price') }}">
                    </div>
                    <div class="form-group">
                        <label for="sale_price">Sale Price</label>
                        <input type="number" id="sale_price" class="form-control" name="sale_price" value="{{ old('sale_price') }}">
                    </div>
                    <div class="form-group">
                        <label for="product_desc">Project Description</label>
                        <textarea id="product_desc" class="form-control" rows="4" name="desc" value="{{ old('desc') }}"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="product_content">Project Content</label>
                        <textarea id="product_content" class="form-control" rows="4" name="content" value="{{ old('content') }}"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Ảnh nội dung(ảnh upload không quá 2MB):</label>
                        <label role="button" class="border border-secondary px-3" for="product_img">Image <i class="nav-icon fas fa-plus"></i></label>
                        <input type="file" id="product_img" hidden class="form-control" name="image" value="{{ old('image') }}" onchange="loadFile(this)">
                        <div class="preview-image">
                            <img id="output" alt="" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="product_content">Ảnh Gallery(ảnh upload không quá 2MB)</label>
                        <div id="gallery">
                            <button type="button" class="btn btn-success" onclick="fileMultiSelect(this)"><i class="fa fa-upload"></i>
                                Chọn hình ảnh
                            </button>
                            <br><br>
                            <div class="image__gallery">
                                @if (!empty($data->more_image))
                                    <?php $more_image = json_decode($data->more_image) ?>
                                    @foreach ($more_image as $item)
                                        <div class="image__thumbnail image__thumbnail--style-1">
                                            <img src="{{ @$item }}">
                                            <a href="javascript:void(0)" class="image__delete" onclick="urlFileMultiDelete(this)">
                                                <i class="fa fa-times"></i>
                                            </a>
                                            <input type="hidden" name="gallery[]" value="{{ @$item }}">
                                        </div>
                                    @endforeach
                                @endif
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
            <input type="submit" value="Tạo mới Product" class="btn btn-success float-right">
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

