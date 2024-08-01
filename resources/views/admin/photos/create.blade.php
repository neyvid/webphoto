@extends('admin.layout.master')
@section('page-title')
    آپلود تصویر
@endsection
@section('content-header')
    آپلود تصویر جدید برای کاربر
    <a class="btn btn-success" href={{ route('users.images.show') }}>مشاهده تصاویر</a>
@endsection

@section('content-breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">صفحه نخست</a></li>
        <li class="breadcrumb-item active">داشبورد 1</li>
    </ol>
@endsection
@section('main-content')
    <div class="row">

        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">فرم آپلود تصویر جدید</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <form id='imageFormDropzone' method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name">کاربر صاحب تصویر </label>
                            <select id="exampleFormControlSelect1" class="form-control js-example-basic-single"
                                name="imageOwnerId">
                                @foreach ($allUser as $user)
                                    <option value={{ $user->id }}>{{ $user->email }}</option>
                                @endforeach

                            </select>

                        </div>

                        <div class="form-group dropzone">
                            <label class="form-label text-muted opacity-75 fw-medium" for="formImage">Image</label>
                            <div class="dropzone-drag-area form-control dropzone" id="previews">
                                <div class="dz-message text-muted opacity-50 " data-dz-message>
                                    <span>Drag file here to upload</span>
                                </div>
                                <div class="d-none" id="dzPreviewContainer">
                                    <div class="dz-preview dz-file-preview">
                                        <div class="dz-photo">
                                            <img class="dz-thumbnail" data-dz-thumbnail>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invalid-feedback fw-bold">حداقل یک تصویر انتخاب نمایید</div>
                        </div>

                    </div>
                    <!-- /.card-body -->


                    <div class="card-footer">
                        <button class="btn btn-primary" id="imageFormSubmit">ارسال</button>
                    </div>
                </form>

            </div>
            <!-- /.card -->

        </div>
    </div>



    <script>
        /**
         * Form on submit
         */
        Dropzone.autoDiscover = false;
        $('#imageFormDropzone').dropzone({
            url: '/panel/image/create',
            method: 'POST',
            addRemoveLinks: true,
            autoProcessQueue: false,
            parallelUploads: 100,
            uploadMultiple: true,
            acceptedFiles: '.jpeg, .jpg, .png, .gif',
            thumbnailWidth: 900,
            thumbnailHeight: 600,
            previewsContainer: "#previews",
            timeout: 0,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            init: function() {

                myDropzone = this;

                // when file is dragged in
                this.on('addedfile', function(file) {
                    $('.dropzone-drag-area').removeClass('is-invalid').next('.invalid-feedback').hide();

                });

                // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
                // of the sending event because uploadMultiple is set to true.
                this.on("addedfile", function() {

                    // Gets triggered when the form is actually being sent.
                    // Hide the success button or the complete form.
                    console.log('addedfile');
                });
                this.on("sendingmultiple", function() {


                    // Gets triggered when the form is actually being sent.
                    // Hide the success button or the complete form.
                });
                this.on("successmultiple", function(files, response) {
                    // Gets triggered when the files have successfully been sent.
                    // Redirect user or notify of success.
                    console.log('successmultiple');

                });
                this.on("successmultiple", function(files, response) {
                    // Gets triggered when the files have successfully been sent.
                    // Redirect user or notify of success.
                    console.log(response);

                });
                this.on("errormultiple", function(files, response) {
                    // Gets triggered when there was an error sending the files.
                    // Maybe show form again, and notify user of error
                    console.log(response);

                });
            },
            success: function(file, response) {
              
                window.location.replace("{{route('users.images.show')}}");

                console.log(response);
            }

        });
        $('#imageFormSubmit').on('click', function(event) {
            event.preventDefault();
            var $this = $(this);

            // show submit button spinner
            $this.children('.spinner-border').removeClass('d-none');

            // validate form & submit if valid
            if ($('#imageFormDropzone')[0].checkValidity() === false || !myDropzone.getQueuedFiles().length > 0) {
                event.stopPropagation();

                // show error messages & hide button spinner    
                $('#imageFormDropzone').addClass('was-validated');
                $this.children('.spinner-border').addClass('d-none');

                // if dropzone is empty show error message
                if (!myDropzone.getQueuedFiles().length > 0) {
                    console.log('ax bezar');
                    $('.dropzone-drag-area').addClass('is-invalid').next('.invalid-feedback').show();
                }
            } else {
                // if everything is ok, submit the form

                myDropzone.processQueue();
                
            }

        });
    </script>
@endsection
@section('Customscript')
    <script src={{ asset('select2/js/select2.full.min.js') }}></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection
<style>
    div #previews {
        display: inline-table;
    }

    textarea {
        background-position: left calc(.375em + .1875rem) center !important
    }
</style>
