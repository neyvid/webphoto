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
                <form method="POST" enctype="multipart/form-data">
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
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">بارگزاری</span>
                                </div>
                            </div>
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
            </div>
            <!-- /.card -->

        </div>
    </div>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <form action="/file-upload"
    class="dropzone"
    id="my-awesome-dropzone"></form>
  
 
@endsection
