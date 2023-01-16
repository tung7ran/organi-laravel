@extends('backend.layout.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sản phẩm</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('backend.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Sản phẩm</li>
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
            <h3 class="card-title">Danh sách sản phẩm</h3>

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
            <table class="table table-bordered projects">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Slug
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Content
                        </th>
                        <th>Price</th>
                        <th>Sale Price</th>
                        <th>Category</th>
                        <th>
                            Image
                        </th>
                        <th>
                            Actions
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
                        <td>{{ $value['desc'] }}</td>
                        <td>{{ $value['content'] }}</td>
                        <td>{{ $value['price'] }}</td>
                        <td>{{ $value['sale_price'] }}</td>
                        <td>{{ $value['productCat_id'] }}</td>
                        <td>
                           <img src="{{ asset('uploads/images/'.$value->image) }}" alt="" class="table-avatar rounded-0">
                        </td>
                        <td class="project-actions">
                            <a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-info btn-sm" href="{{ route('product.edit', $value->id) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            {{ Form::open(array('method'=>'DELETE', 'route' => array('product.destroy', $value->id), 'style' => 'display: inline-block;')) }}
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
