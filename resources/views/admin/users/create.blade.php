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
                <form  method="POST" enctype="multipart/form-data">
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
                        <div class="form-group">
                            <label for="exampleInputFile">فایل</label>
                            {{-- <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">بارگزاری</span>
                                </div>
                            </div> --}}
                            <div  class="dropzone"
                            id="my-awesome-dropzone"></div>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">مرا انتخاب کنید</label>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">ارسال</button>
                    </div>
                </form>
                <h5 id="message"></h5>

            </div>
            <!-- /.card -->

        </div>
    </div>

    <form action="/target" class="dropzone" id="my-great-dropzone"></form>

    <script>
        var fileNameUploaded;
        const myDropzone=new Dropzone("#my-great-dropzone",{
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 2, // MB
        url: "/panel/user/image",
        method: "POST",
        addRemoveLinks: true,
        dictRemoveFile: 'حذف تصویر',

        headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
         },
         maxfilesexceeded: function(file) {
            this.removeFile(file);
            // this.removeAllFiles(); 
        },
        sending: function (file, xhr, formData) {
            $('#message').text('Image Uploading...');
        },
        success: function (file, response) {
            $('#message').text(response.success);
            console.log(response.success);
            this.fileNameUploaded=response.filename;
            console.log(file);
        },
        error: function (file, response) {
            $('#message').text('Something Went Wrong! '+response);
            console.log(response);
            return false;
        },
        accept: function(file, done,response) {
          if (file.name == "justinbieber.jpg") {
            done("Naha, you don't.");
          
          }
          else { 
        
       
            done(); }
        },
        
        removedfile: function(file) {
            file.previewElement.remove();
            console.log(this.fileNameUploaded);
            $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
            $.post('image/remove', function (result) {
                
                     console.log(result);
                });
        },
        renameFile:function(file){
            file.fileNameUploaded='sa';
        },
       
        })
      
    </script>

  {{-- <script>
const allowMaxFilesize = 5;
const allowMaxFiles = 5;
const myDropzone = new Dropzone("#my-awesome-dropzone", {
    url: "/panel/user/image",
    method: "POST",
    paramName: "files",
    autoProcessQueue: false,
    acceptedFiles: ".jpeg,.jpg,.png,.gif",
    maxFiles: allowMaxFiles,
    maxFilesize: allowMaxFilesize, // MB
    uploadMultiple: true,
    parallelUploads: 100, // use it with uploadMultiple
    createImageThumbnails: true,
    thumbnailWidth: 120,
    thumbnailHeight: 120,
    addRemoveLinks: true,
    timeout: 180000,
    dictRemoveFileConfirmation: "Are you Sure?", // ask before removing file
    // Language Strings
    dictFileTooBig: `File is to big. Max allowed file size is ${allowMaxFilesize}mb`,
    dictInvalidFileType: "Invalid File Type",
    dictCancelUpload: "Cancel",
    dictRemoveFile: "Remove",
    dictMaxFilesExceeded: `Only ${allowMaxFiles} files are allowed`,
    dictDefaultMessage: "Drop files here to upload",
    headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
}

);


   
  </script> --}}
 
@endsection
