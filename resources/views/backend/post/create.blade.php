@extends('backend.layout.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Bài viết</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('backend.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Post Add</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
{{ Form::open(array('route' => 'post.store', 'enctype' => 'multipart/form-data')) }}

<section class="content">

    <div class="row">
        <div class="col-sm-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="nav-tabs-item">
                        <a href="#activity" class="active" data-toggle="tab" aria-expanded="true">Bài viết</a>
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
                                    <label>Tiêu đề</label>
                                    <input type="text" id="post-name" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Mô tả ngắn</label>
                                    <textarea class="form-control" id="editor_desc" name="desc" rows="4" value="{{ old('desc') }}"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Nội dung</label>
                                    <textarea name="content" id="editor_desc_product" class="form-control" rows="4" value="{{ old('content') }}"></textarea>
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
                    <h3 class="box-title">Đăng bài viết</h3>
                </div>
                <div class="box-body">

                    @foreach(\App\Models\Post::$postType as $key => $value)
                        <div class="form-group">
                            <label >
                                <input name="type" type="checkbox" class="fomr-control" value="{{ $key }}" ><span>{{ $value }}</span>
                            </label>
                        </div>
                    @endforeach
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu lại bài viết</button>
                    </div>
                </div>
            </div>
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Danh mục bài viết</h3>
                </div>
                <div class="box-body checkboxlist">
                    @foreach($catePost as $item)
                    <div class="form-group">
                        <label class="custom-checkbox">
                            <input name="category_id" type="checkbox" class="fomr-control" value="{{ $item->id }}"><span>{{ $item->name }}</span>
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
            <a href="#" class="btn btn-secondary">Cancel</a>
            <input type="submit" value="Create new Project" class="btn btn-success float-right">
        </div>
    </div>
</section>
{{ Form::close() }}
<!-- /.content -->
@endsection
<script>
    var loadFile = (e) => {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
