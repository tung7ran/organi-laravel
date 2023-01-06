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
{{ Form::open(array('route' => ['post.update', $post->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data')) }}

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
                        <input type="text" id="post-name" class="form-control" name="name" value="{{ $post->name }}">
                    </div>
                    <div class="form-group">
                        <label for="post-slug">Slug</label>
                        <input type="text" id="post-slug" class="form-control" name="slug" value="{{ $post->slug }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" class="form-control" rows="4" name="desc">{{ $post->desc }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea id="content" class="form-control" rows="4" name="content">{{$post->content}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="post-image">Image</label>
                        <input type="file" id="post-image" class="form-control" name="image" value="{{ $post->image }}">
                    </div>
                    <div class="form-group">
                        <label for="post-type">Type</label>
                        <select id="post-type" class="form-control custom-select" name="type" value="{{ $post->type }}">
                            <option selected disabled>Select one</option>
                            @foreach (\App\Models\Post::$postType as $key => $value)
                            <option value="{{ $key }}">
                                {{ $value }}
                            </option>
                            @endforeach
                        </select>
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
