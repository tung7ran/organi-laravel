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
{{ Form::open(array('route' => ['policy.update', $policy->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data')) }}

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
                        <label for="post-name">Name</label>
                        <input type="text" id="post-name" class="form-control" name="name" value="{{ $policy->name }}">
                    </div>
                    <div class="form-group">
                        <label for="post-slug">Slug</label>
                        <input type="text" id="post-slug" class="form-control" name="slug" value="{{ $policy->slug }}">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea id="content" class="form-control" rows="4" name="content">{{ $policy->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input id="status" class="form-control" rows="4" name="status">{{ $policy->Status }}
                    </div>
                    <div class="form-group">
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
<script>
    var loadFileBanner = (e) => {
        var output_banner = document.getElementById('output_banner');
        output_banner.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
