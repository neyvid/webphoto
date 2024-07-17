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
                <form id='frm' method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">نام </label>
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="نام خود را وارد نمایید">
                            @error('name')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">

                            <label for="lastname">نام خانوادگی</label>
                            <input type="text" name="lastname" class="form-control" id="lastaname"
                                placeholder="نام خانوادگی را وارد نمایید">
                            @error('lastname')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">شماره تماس</label>
                            <input type="text" name="phone" class="form-control" id="phone"
                                placeholder="کد ملی خود را وارد نمایید">
                            @error('phone')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ایمیل">ایمیل</label>
                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="ایمیل خود را وارد نمایید">
                            @error('email')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="mobile">شماره همراه</label>
                            <input type="phone" name="mobile" class="form-control" id="mobile"
                                placeholder="شماره همراه خود را وارد نمایید">
                            @error('mobile')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="national_code">کد ملی</label>
                            <input type="text" name="national_code" class="form-control" id="national_code"
                                placeholder="کد ملی خود را وارد نمایید">
                            @error('national_code')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sex">جنسیت</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sex" value="1">
                                <label class="form-check-label">مرد</label>

                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sex" value="0">
                                <label class="form-check-label">زن</label>

                            </div>
                            @error('sex')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">آدرس</label>
                            <textarea type="text" name="address" class="form-control" id="national_code" placeholder="آدرس خود را وارد نمایید"></textarea>
                            @error('address')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="dropzone" id="uploadform"></div>
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



    <script>
        /**
         * Form on submit
         */
        Dropzone.autoDiscover = false;




        var myDropzone = new Dropzone("#uploadform", {
            url: "/panel/user/image",
            method: "POST",
            paramName: "file",
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 100,
            maxFiles: 100,
            maxFiles: 15,
            maxFilesize: 5,
            acceptedFiles: ".png, .jpg, .gif, .pdf, .doc",
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            init: function() {
                var myDropzone = this;

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
            // success: function(file, response) {
            //     // hide form and show success message
            //     $('#formDropzone').fadeOut(600);
            //     setTimeout(function() {
            //         $('#successMessage').removeClass('d-none');
            //     }, 600);
            // }


        });
        $('#formSubmit').on('click', function(event) {

            event.preventDefault();

            var $this = $(this);

            // show submit button spinner
            $this.children('.spinner-border').removeClass('d-none');

            // validate form & submit if valid
            if ($('#uploadform')[0].checkValidity() === false) {
                event.stopPropagation();

                // show error messages & hide button spinner    
                $('#uploadform').addClass('was-validated');
                $this.children('.spinner-border').addClass('d-none');

                // if dropzone is empty show error message
                if (!myDropzone.getQueuedFiles().length > 0) {
                    $('.dropzone-drag-area').addClass('is-invalid').next('.invalid-feedback').show();
                }
            } else {
            console.log('sdas');
            myDropzone.processQueue();
            $('#frm').submit();
            }
        });
    </script>
@endsection
