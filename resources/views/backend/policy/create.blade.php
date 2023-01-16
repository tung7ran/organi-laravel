@extends('backend.layout.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chính Sách</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('backend.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Thêm Chính Sách</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
{{ Form::open(array('route' => 'policy.store', 'enctype' => 'multipart/form-data')) }}

<section class="content">
    <div class="row">
        <div class="col-sm-9">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thêm mới</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">name</label>
                        <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="slug">slug</label>
                        <input type="text" id="slug" class="form-control" name="slug" value="{{ old('slug') }}">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea id="content" class="form-control" rows="4" name="content" value="{{ old('content') }}"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="route">status</label>
                        <input type="text" id="status" class="form-control" name="status" value="{{ old('status') }}">
                    </div>
                    <div class="row">
                        <div class="form-group" style="width: calc(100% / 5); ">
                            <label for="banner" class="border border-secondary px-5" style="width: 70%; text-align: center;">Banner <i class="nav-icon fas fa-plus"></i></label>
                            <input type="file" hidden id="banner" class="form-control" name="banner" value="{{ old('banner') }}" onchange="loadFileBanner(this)">
                            <div class="preview-image">
                                <img id="output_banner" alt="" style="width: 100%;">
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-sm-3">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Đăng bài viết</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label class="custom-checkbox">
                            <input type="checkbox" class="form-control" name="status" value="1" checked> <span>Hiển thị</span>
                        </label>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu lại bài viết</button>
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
    var loadFileBanner = (e) => {
        var output_banner = document.getElementById('output_banner');
        output_banner.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
