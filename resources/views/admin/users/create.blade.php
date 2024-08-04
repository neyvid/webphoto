@extends('admin.layout.master')
@section('page-title')
    ایجاد کاربر
@endsection
@section('content-header')
    ایجاد کاربر جدید
    <a class="btn btn-success" href={{ route('users.show') }}>مشاهده کاربران</a>
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
                    <h3 class="card-title">فرم ایجاد کاربر جدید</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id='formDropzone' method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">

                            <label class="form-label text-muted opacity-75 fw-medium" for="name">نام</label>

                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="نام خود را وارد نمایید" required>
                            @error('name')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                            <div class="invalid-feedback fw-bold">نام خود را وارد نمایید</div>
                        </div>
                        <div class="form-group">
                            <label class="form-label text-muted opacity-75 fw-medium" for="lastaname">نام خانوادگی</label>

                            <input type="text" name="lastname" class="form-control" id="lastaname"
                                placeholder="نام خانوادگی را وارد نمایید" required>
                            @error('lastname')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                            <div class="invalid-feedback fw-bold">نام خانوادگی خود را وارد نمایید</div>

                        </div>
                        <div class="form-group">
                            <label class="form-label text-muted opacity-75 fw-medium" for="phone">شماره تماس</label>

                            <input type="text" name="phone" class="form-control" id="phone"
                                placeholder="کد ملی خود را وارد نمایید" required>
                            @error('phone')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                            <div class="invalid-feedback fw-bold">شماره تماس خود را وارد نمایید</div>

                        </div>
                        <div class="form-group">
                            <label for="email">ایمیل</label>
                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="ایمیل خود را وارد نمایید" required>
                            @error('email')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                            <div class="invalid-feedback fw-bold">ایمیل خود را وارد نمایید</div>

                        </div>
                        <div class="form-group">
                            <label for="mobile">شماره همراه</label>
                            <input type="phone" name="mobile" class="form-control" id="mobile"
                                placeholder="شماره همراه خود را وارد نمایید" required>
                            @error('mobile')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                            <div class="invalid-feedback fw-bold">شماره همراه خود را وارد نمایید</div>

                        </div>

                        <div class="form-group">
                            <label for="national_code">کد ملی</label>
                            <input type="text" name="national_code" class="form-control" id="national_code"
                                placeholder="کد ملی خود را وارد نمایید" required>
                            @error('national_code')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                            <div class="invalid-feedback fw-bold">کد ملی خود را وارد نمایید</div>

                        </div>
                        <div class="form-group">
                            <label for="sex">جنسیت</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sex" value="1" required>
                                <label class="form-check-label">مرد</label>

                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sex" value="0" required>
                                <label class="form-check-label">زن</label>

                            </div>
                            @error('sex')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                            <div class="invalid-feedback fw-bold">جنسیت خود را انتخاب نمایید</div>

                        </div>
                        <div class="form-group">
                            <label for="address">آدرس</label>
                            <textarea type="text" name="address" class="form-control" id="national_code" placeholder="آدرس خود را وارد نمایید"
                                required></textarea>
                            @error('address')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                            <div class="invalid-feedback fw-bold">وارد نمودن آدرس الزامی می باشد</div>
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
                        <button class="btn btn-primary" id="formSubmit">ارسال</button>
                    </div>
                </form>

            </div>
            <!-- /.card -->

        </div>
    </div>

@endsection
@section('Customscript')


<script>
    Dropzone.autoDiscover = false;
    $('#formDropzone').dropzone({
        url: '/panel/user/create',
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
                $('.dropzone-drag-area').removeClass('is-invalid').next(
                    '.invalid-feedback').hide();

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
                console.log('errormultiple');

            });
        },
        success: function(file, response) {
            window.location.replace("{{ route('users.show') }}");

            console.log(response);
        }

    });
    $('#formSubmit').on('click', function(event) {
        event.preventDefault();
        var $this = $(this);

        // show submit button spinner
        $this.children('.spinner-border').removeClass('d-none');

        // validate form & submit if valid
        if ($('#formDropzone')[0].checkValidity() === false || !myDropzone.getQueuedFiles().length >
            0) {
            event.stopPropagation();

            // show error messages & hide button spinner    
            $('#formDropzone').addClass('was-validated');
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
<style>
    div #previews {
        display: inline-table;
    }

    textarea {
        background-position: left calc(.375em + .1875rem) center !important
    }
</style>
