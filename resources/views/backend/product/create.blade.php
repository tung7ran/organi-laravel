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
    <!-- <div class="row">
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
                        <label>???nh n???i dung(???nh upload kh??ng qu?? 2MB):</label>
                        <label role="button" class="border border-secondary px-3" for="product_img">Image <i class="nav-icon fas fa-plus"></i></label>
                        <input type="file" id="product_img" hidden class="form-control" name="image" value="{{ old('image') }}" onchange="loadFile(this)">
                        <div class="preview-image">
                            <img id="output" alt="" style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="product_content">???nh Gallery(???nh upload kh??ng qu?? 2MB)</label>
                        <div id="gallery">
                            <button type="button" class="btn btn-success" onclick="fileMultiSelect(this)"><i class="fa fa-upload"></i>
                                Ch???n h??nh ???nh
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
            </div>
        </div>
    </div> -->

    <div class="row">
        <div class="col-sm-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="nav-tabs-item">
                        <a href="#activity" class="active" data-toggle="tab" aria-expanded="true">Th??ng tin s???n ph???m</a>
                    </li>
                    <li class="nav-tabs-item ">
                        <a href="#gallery" data-toggle="tab" aria-expanded="true">Th?? vi???n ???nh</a>
                    </li>
                    <li class="nav-tabs-item ">
                        <a href="#setting" data-toggle="tab" aria-expanded="true">C???u h??nh seo</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="activity">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>T??n s???n ph???m</label>
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Gi?? b??n</label>
                                    <input type="number" min="0" name="price" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Gi?? khuy???n m???i ( N???u c?? )</label>
                                    <input type="number" min="0" name="sale_price" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">M?? t??? ng???n</label>
                                    <textarea class="form-control" id="editor_desc" name="desc" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <label for="">M?? t??? s???n ph???m</label>
                                    <textarea name="content" id="editor_desc_product" class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="">H??nh ???nh</label>
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
                                    <label for="">C??ch s??? d???ng</label>
                                    <textarea class="form-control" id="editor_desc_manual" rows="5" name="content_using"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="">H??nh ???nh</label>
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
                                    <label for="">Th??nh ph???n ho???t t??nh</label>
                                    <textarea class="form-control" id="editor_element" rows="5" name="ingredient"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="">H??nh ???nh</label>
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
                                    Ch???n h??nh ???nh
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
                            <label style="float: right;">S??? k?? t??? ???? d??ng: <span id="countTitle"></span></label>
                            <input type="text" class="form-control" name="meta_title" value="" id="meta_title">
                        </div>

                        <div class="form-group">
                            <label>Meta Description</label>
                            <label style="float: right;">S??? k?? t??? ???? d??ng: <span id="countMeta">360</span></label>
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
                    <h3 class="box-title">????ng s???n ph???m</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label class="custom-checkbox">
                            <input type="checkbox" class="form-control" name="status" value="1" checked> <span>Hi???n th???</span>
                        </label>
                        <label class="custom-checkbox">
                            <input type="checkbox" class="form-control" name="hot" value="1"> <span>S???n ph???m n???i b???t</span>
                        </label>
                        <label class="custom-checkbox">
                            <input type="checkbox" class="form-control" name="is_sale" value="1"><span>S???n ph???m sale</span>
                        </label>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> L??u l???i s???n ph???m</button>
                    </div>
                </div>
            </div>
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Danh m???c s???n ph???m</h3>
                </div>
                <div class="box-body checkboxlist">
                    <div class="form-group">
                        <label class="custom-checkbox">
                            <input type="checkbox" class="fomr-control"><span> Fresh Berries</span>
                        </label>
                    </div>

                </div>
            </div>
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">???nh s???n ph???m</h3>
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
            <a href="#" class="btn btn-secondary">Hu???</a>
            <input type="submit" value="T???o m???i Product" class="btn btn-success float-right">
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
