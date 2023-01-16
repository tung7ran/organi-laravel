@extends('backend.layout.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Post category</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('backend.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Post category</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Post category</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0" style="overflow-x:auto;">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            slug
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data as $key => $value)
                    <tr>
                        <td>
                            {{ $key + 1 }}
                        </td>
                        <td>
                            {{ $value['name'] }}
                        </td>
                        <td>{{ $value['slug'] }}</td>
                       
                        <td class="project-actions">
                            <a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-folder"></i>
                                View
                            </a>
                            <a class="btn btn-info btn-sm" href="{{ route('post-category.edit', $value->id) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            {{ Form::open(array('method'=>'DELETE', 'route' => array('post-category.destroy', $value->id), 'style' => 'display: inline-block;')) }}
                            <button onclick="return confirm('Bạn có chắc chắn muốn xóa?');" class="btn btn-danger btn-sm" data-original-title="Xóa" data-toggle="m-tooltip">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                            {{ Form::close() }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
@endsection
