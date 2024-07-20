{{-- DropZone 6 --}}
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

@extends('admin.layout.master')
@section('page-title')
    ایجاد کاربر
@endsection
@section('content-header')
    ایجاد کاربر جدید
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
                <form  id='formDropzone' method="POST" enctype="multipart/form-data">
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
                            <textarea type="text" name="address" class="form-control" id="national_code" placeholder="آدرس خود را وارد نمایید" required></textarea>
                            @error('address')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                            <div class="invalid-feedback fw-bold">وارد نمودن آدرس الزامی می باشد</div>
                        </div>

                        <div class="form-group ">
                            <label class="form-label text-muted opacity-75 fw-medium" for="formImage">Image</label>
                            <div class="dropzone-drag-area form-control" id="previews">
                                <div class="dz-message text-muted opacity-50" data-dz-message>
                                    <span>Drag file here to upload</span>
                                </div>
                                <div class="d-none" id="dzPreviewContainer">
                                    <div class="dz-preview dz-file-preview">
                                        <div class="dz-photo">
                                            <img class="dz-thumbnail" data-dz-thumbnail>
                                        </div>
                                        <button class="dz-delete border-0 p-0" type="button" data-dz-remove>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="times">
                                                <path fill="#FFFFFF"
                                                    d="M13.41,12l4.3-4.29a1,1,0,1,0-1.42-1.42L12,10.59,7.71,6.29A1,1,0,0,0,6.29,7.71L10.59,12l-4.3,4.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="invalid-feedback fw-bold">حداقل یک تصویر انتخاب نمایید</div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="previews"></div>

                    <div class="card-footer">
                        <button class="btn btn-primary" id="formSubmit">ارسال</button>
                    </div>
                </form>

            </div>
            <!-- /.card -->

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>


    <script>
        /**
         * Form on submit
         */
        Dropzone.autoDiscover = false;



        $('#formDropzone').dropzone({
            previewTemplate: $('#dzPreviewContainer').html(),
            url: '/panel/user/image',
            method:'POST',
            addRemoveLinks: true,
            autoProcessQueue: false,
            uploadMultiple: false,
            parallelUploads: 1,
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
                // First change the button to actually tell Dropzone to process the queue.
                // this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
                //     // Make sure that the form isn't actually being sent.
                //     e.preventDefault();
                //     e.stopPropagation();
                //     myDropzone.processQueue();
                // });

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
                    console.log('sendingmultiple');
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
                // hide form and show success message
                $('#formDropzone').fadeOut(600);
                setTimeout(function() {
                    $('#successMessage').removeClass('d-none');
                }, 600);
                console.log(response);
            }

        });
        $('#formSubmit').on('click', function(event) {
            event.preventDefault();
            var $this = $(this);

            // show submit button spinner
            $this.children('.spinner-border').removeClass('d-none');

            // validate form & submit if valid
            if ($('#formDropzone')[0].checkValidity() === false || !myDropzone.getQueuedFiles().length > 0) {
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
