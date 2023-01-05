@extends('backend.layout.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Page</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('backend.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Edit Page</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
{{ Form::open(array('route' => ['pages.update', $pages->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data')) }}
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Page</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="post-type">Type</label>
                        <select id="post-type" class="form-control custom-select" name="type">
                            <option selected disabled>Select one</option>
                            @foreach (\App\Models\Pages::$pageType as $key => $value)
                                <option value="{{ $key }}" {{$pages->type == $key ? 'selected' : '' }}> {{ $value }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="page-name">Name Page</label>
                        <input type="text" id="page-name" class="form-control" name="name_page" value="{{ $pages->name_page }}">
                    </div>
                    <div class="form-group">
                        <label for="title_h1">Title H1</label>
                        <input type="text" id="title_h1" class="form-control" name="title_h1" value="{{ $pages->title_h1 }}">
                    </div>
                    <div class="form-group">
                        <label for="route">Route</label>
                        <input type="text" id="route" class="form-control" name="route" value="{{ $pages->route }}">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea id="content" class="form-control" rows="4" name="content">{{ $pages->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" id="meta_title" class="form-control" name="meta_title" value="{{ $pages->meta_title }}">
                    </div>
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <input type="text" id="meta_description" class="form-control" name="meta_description" value="{{ $pages->meta_description }}">
                    </div>
                    <div class="form-group">
                        <label for="meta_keyword">Meta Keyword</label>
                        <input type="text" id="meta_keyword" class="form-control" name="meta_keyword" value="{{ $pages->meta_keyword }}">
                    </div>
                    <div class="row">
                        <div class="form-group" style="width: calc(100% / 5); margin-right: 10px;">
                            <label for="page-image" class="border border-secondary px-5" style="width: 70%; text-align: center;">Image <i class="nav-icon fas fa-plus"></i></label>
                            <input type="file" hidden id="page-image" class="form-control" name="image" value="{{ $pages->image }}" onchange="loadFileImage(this)">
                            <div class="preview-image">
                                <img id="output" alt="" style="width: 100%;">
                            </div>
                        </div>
                        <div class="form-group" style="width: calc(100% / 5); ">
                            <label for="banner" class="border border-secondary px-5" style="width: 70%; text-align: center;">Banner <i class="nav-icon fas fa-plus"></i></label>
                            <input type="file" hidden id="banner" class="form-control" name="banner" value="{{ $pages->banner }}" onchange="loadFileBanner(this)">
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
            <input type="submit" value="Create new Project" class="btn btn-success float-right">
        </div>
    </div>
</section>
{{ Form::close() }}
<!-- /.content -->
@endsection
<script>
    var loadFileImage = (e) => {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    }
    var loadFileBanner = (e) => {
        var output_banner = document.getElementById('output_banner');
        output_banner.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
