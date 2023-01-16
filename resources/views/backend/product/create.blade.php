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
        <div class="col-sm-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="nav-tabs-item">
                        <a href="#activity" class="active" data-toggle="tab" aria-expanded="true">Thông tin sản phẩm</a>
                    </li>
                    <li class="nav-tabs-item ">
                        <a href="#gallery" data-toggle="tab" aria-expanded="true">Thư viện ảnh</a>
                    </li>
                    <li class="nav-tabs-item ">
                        <a href="#setting" data-toggle="tab" aria-expanded="true">Cấu hình seo</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="activity">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" id="product_name" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Giá bán</label>
                                    <input type="number" id="price" class="form-control" name="price" value="{{ old('price') }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Giá khuyến mại ( Nếu có )</label>
                                    <input type="number" id="sale_price" class="form-control" name="sale_price" value="{{ old('sale_price') }}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Mô tả ngắn</label>
                                    <textarea class="form-control" id="editor_desc" name="desc" rows="5" value="{{ old('desc') }}"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <label for="">Mô tả sản phẩm</label>
                                    <textarea name="content" id="editor_desc_product" class="form-control" rows="5" value="{{ old('content') }}"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="">Hình ảnh</label>
                                    <div class="image">
                                        <div class="image__thumbnail">
                                            <img src="http://127.0.0.1:8000/backend/img/placeholder.png" data-init="">
                                            <a href="#" class="image__delete" onclick="urlFileDelete(this)">
                                                <i class="fa fa-times"></i></a>
                                            <input type="file" id="file1" hidden value="{{ old('image_content', @$data->image_content) }}" name="image_content" />
                                            <label class="image__button" for="file1">
                                                <i class="fa fa-upload"></i>
                                                Upload
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <label for="">Cách sử dụng</label>
                                    <textarea class="form-control" id="editor_desc_manual" rows="5" name="content_using"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="">Hình ảnh</label>
                                    <div class="image">
                                        <div class="image__thumbnail">
                                            <img src="http://127.0.0.1:8000/backend/img/placeholder.png" data-init="#">
                                            <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
                                                <i class="fa fa-times"></i></a>
                                            <input type="file" id="file2" hidden name="image_use" />
                                            <label for="file2" class="image__button" onclick="fileSelect(this)">
                                                <i class="fa fa-upload"></i>
                                                Upload
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <label for="">Thành phần hoạt tính</label>
                                    <textarea class="form-control" id="editor_element" rows="5" name="ingredient"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="">Hình ảnh</label>
                                    <div class="image">
                                        <div class="image__thumbnail">
                                            <img src="http://127.0.0.1:8000/backend/img/placeholder.png" data-init="#">
                                            <a href="javascript:void(0)" class="image__delete" onclick="urlFileDelete(this)">
                                                <i class="fa fa-times"></i></a>
                                            <input type="file" hidden id="file3" value="#" name="image_ingredient" />
                                            <label for="file3" class="image__button" onclick="fileSelect(this)">
                                                <i class="fa fa-upload"></i>
                                                Upload
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="gallery">
                        <div class="row">
                            <div class="col-sm-12 image">
                                <button type="button" class="btn btn-success" onclick="fileMultiSelect(this)"><i class="fa fa-upload"></i>
                                    Chọn hình ảnh
                                </button>
                                <br><br>
                                <div class="image__gallery">
                                    <div class="image__thumbnail image__thumbnail--style-1">
                                        <img src="http://127.0.0.1:8000/backend/img/placeholder.png">
                                        <a href="#" class="image__delete" onclick="urlFileMultiDelete(this)">
                                            <i class="fa fa-times"></i>
                                        </a>
                                        <input type="hidden" name="gallery[]" value="{{ @$item }}">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="setting">
                        <div class="form-group">
                            <label>Title SEO</label>
                            <label style="float: right;">Số ký tự đã dùng: <span id="countTitle"></span></label>
                            <input type="text" class="form-control" name="meta_title" value="" id="meta_title">
                        </div>

                        <div class="form-group">
                            <label>Meta Description</label>
                            <label style="float: right;">Số ký tự đã dùng: <span id="countMeta">360</span></label>
                            <textarea name="meta_description" class="form-control" id="meta_description" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Meta Keyword</label>
                            <input type="text" class="form-control" name="meta_keyword">
                        </div>
                        <div class="google-preview">
                            <span class="google__title"><span></span></span>
                            <div class="google__url">
                            </div>
                            <div class="google__description"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Đăng sản phẩm</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label class="custom-checkbox">
                            <input type="checkbox" class="form-control" name="status" value="1" checked> <span>Hiển thị</span>
                        </label>
                        <label class="custom-checkbox">
                            <input type="checkbox" class="form-control" name="hot" value="1"> <span>Sản phẩm nổi bật</span>
                        </label>
                        <label class="custom-checkbox">
                            <input type="checkbox" class="form-control" name="is_sale" value="1"><span>Sản phẩm sale</span>
                        </label>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu lại sản phẩm</button>
                    </div>
                </div>
            </div>
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Danh mục sản phẩm</h3>
                </div>
                <div class="box-body checkboxlist">
                    @foreach($category as $item)
                        <div class="form-group">
                            <label >
                                <input name="productCat_id" type="checkbox" class="fomr-control" value="{{ $item->id }}" ><span>{{ $item->name }}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Ảnh sản phẩm</h3>
                </div>
                <div class="box-body">
                    <div class="form-group" style="text-align: center;">
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
