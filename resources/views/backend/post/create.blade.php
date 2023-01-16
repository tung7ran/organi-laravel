@extends('backend.layout.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Post Add</h1>
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
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Post</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="post-name">Name</label>
                        <input type="text" id="post-name" class="form-control" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="post-slug">Slug</label>
                        <input type="text" id="post-slug" class="form-control" name="slug" value="{{ old('slug') }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" class="form-control" rows="4" name="desc" value="{{ old('desc') }}"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea id="content" class="form-control" rows="4" name="content" value="{{ old('content') }}"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="post-type">Type</label>
                        <select id="post-type" class="form-control custom-select" name="type">
                            <option selected disabled>Select one</option>
                            @foreach (\App\Models\Post::$postType as $key => $value)
                            <option value="{{ $key }}">
                                {{ $value }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category" class="form-label">Category:</label>
                        <select name="category_id" class="form-control" id="category">
                            <option value="">-- Select Category --</option>
                                @foreach($catePost as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group" style="width: calc(100% / 5); ">
                        <label for="post-image" class="border border-secondary px-5" style="width: 70%; text-align: center;">Image <i class="nav-icon fas fa-plus"></i></label>
                        <input type="file" hidden id="post-image" class="form-control" name="image" value="{{ old('image') }}" onchange="loadFile(this)">
                        <div class="preview-image">
                            <img id="output" alt="" style="width: 100%;">
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
    var loadFile = (e) => {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
