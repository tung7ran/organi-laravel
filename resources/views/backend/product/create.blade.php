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
{{ Form::open(array('route' => 'product.store', 'enctype' => 'multipart/form-data', 'name'=>'demoform', 'id'=>'demoform', 'class'=>'dropzone')) }}

<section class="content">
    <div class="row">
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
                        <input type="hidden" class="productid" name="productid" id="productid" value="">

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
                        <div id="dropzoneDragArea" class="dz-default dz-message dropzoneDragArea">
                            <span>Upload file</span>
                        </div>
                        <div class="dropzone-previews"></div>
                    </div>
                    <!-- <div class="row">
                        <div class="form-group" style="width: calc(100% / 5); margin: 0 auto;">
                            <label role="button" class="border border-secondary px-3" style="margin-left: 50%; transform: translateX(-50%); width: 70%; text-align: center;" for="product_img">Image <i class="nav-icon fas fa-plus"></i></label>
                            <input type="file" id="product_img" hidden class="form-control" name="image" value="{{ old('image') }}" onchange="loadFile(this)">
                            <div class="preview-image">
                                <img id="output" alt="" style="width: 100%;">
                            </div>
                        </div>
                        <div class="form-group" style="width: calc(100% / 5); margin: 0 auto;">
                            <label role="button" class="border border-secondary px-3" style="margin-left: 50%; transform: translateX(-50%); width: 70%; text-align: center;" for="img_content">Image Content <i class="nav-icon fas fa-plus"></i></label>
                            <input type="file" id="img_content" hidden class="form-control" name="image_content" value="{{ old('image_content') }}">
                        </div>
                        <div class="form-group" style="width: calc(100% / 5); margin: 0 auto;">
                            <label role="button" class="border border-secondary px-3" style="margin-left: 50%; transform: translateX(-50%); width: 70%; text-align: center;" for="image_ingredient">Image Ingredient <i class="nav-icon fas fa-plus"></i></label>
                            <input type="file" id="image_ingredient" hidden class="form-control" name="image_ingredient" value="{{ old('image_ingredient') }}">
                        </div>
                        <div class="form-group" style="width: calc(100% / 5); margin: 0 auto;">
                            <label role="button" class="border border-secondary px-3" style="margin-left: 50%; transform: translateX(-50%); width: 70%; text-align: center;" for="image_use">Image Use <i class="nav-icon fas fa-plus"></i></label>
                            <input type="file" id="image_use" hidden class="form-control" name="image_use" value="{{ old('image_use') }}">
                        </div>
                        <div class="form-group" style="width: calc(100% / 5); margin: 0 auto;">
                            <label role="button" class="border border-secondary px-3" style="margin-left: 50%; transform: translateX(-50%); width: 70%; text-align: center;" for="more_image">More Image <i class="nav-icon fas fa-plus"></i></label>
                            <input type="file" id="more_image" hidden class="form-control" name="more_image" value="{{ old('more_image') }}">
                        </div>
                    </div> -->

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
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

<!-- <script>
    var loadFile = (e) => {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    }
</script> -->
<script>
    Dropzone.autoDiscover = true;
    // Dropzone.options.demoform = false;
    let token = $('meta[name="csrf-token"]').attr('content');
    $(function() {
        var myDropzone = new Dropzone("div#dropzoneDragArea", {
            paramName: "image",
            url: "{{ url('/storeimgae') }}",
            previewsContainer: 'div.dropzone-previews',
            addRemoveLinks: true,
            autoProcessQueue: false,
            uploadMultiple: false,
            parallelUploads: 1,
            maxFiles: 1,
            params: {
                _token: token
            },
            // The setting up of the dropzone
            init: function() {
                var myDropzone = this;
                //form submission code goes here
                $("form[name='demoform']").submit(function(event) {
                    //Make sure that the form isn't actully being sent.
                    event.preventDefault();

                    URL = $("#demoform").attr('action');
                    formData = $('#demoform').serialize();
                    $.ajax({
                        type: 'POST',
                        url: URL,
                        data: formData,
                        success: function(result) {
                            if (result.status == "success") {
                                // fetch the useid
                                var productid = result.user_id;
                                $("#productid").val(productid); // inseting productid into hidden input field
                                //process the queue
                                myDropzone.processQueue();
                            } else {
                                console.log("error");
                            }
                        }
                    });
                });

                //Gets triggered when we submit the image.
                this.on('sending', function(file, xhr, formData) {
                    //fetch the user id from hidden input field and send that productid with our image
                    let productid = document.getElementById('productid').value;
                    formData.append('productid', productid);
                });

                this.on("success", function(file, response) {
                    //reset the form
                    $('#demoform')[0].reset();
                    //reset dropzone
                    $('.dropzone-previews').empty();
                });

                this.on("queuecomplete", function() {

                });

                // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
                // of the sending event because uploadMultiple is set to true.
                this.on("sendingmultiple", function() {
                    // Gets triggered when the form is actually being sent.
                    // Hide the success button or the complete form.
                });

                this.on("successmultiple", function(files, response) {
                    // Gets triggered when the files have successfully been sent.
                    // Redirect user or notify of success.
                });

                this.on("errormultiple", function(files, response) {
                    // Gets triggered when there was an error sending the files.
                    // Maybe show form again, and notify user of error
                });
            }
        });
    });
</script>
