@extends('admin.layout.master')
@section('page-title')
    ویرایش کاربر
@endsection
@section('content-header')
    ویرایش کاربر
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
                    <h3 class="card-title">فرم ویرایش کاربر</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">نام </label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                                id="name" placeholder="نام خود را وارد نمایید">
                        </div>
                        <div class="form-group">
                            <label for="lastname">نام خانوادگی</label>
                            <input type="text" name="lastname" value="{{ $user->lastname }}" class="form-control"
                                id="lastaname" placeholder="نام خانوادگی را وارد نمایید">
                        </div>
                        <div class="form-group">
                            <label for="phone">شماره تماس</label>
                            <input type="text" name="phone" value="{{ $user->phone }}" class="form-control"
                                id="phone" placeholder="کد ملی خود را وارد نمایید">
                        </div>
                        <div class="form-group">
                            <label for="ایمیل">ایمیل</label>
                            <input type="email" name="email" disabled value="{{ $user->email }}" class="form-control"
                                id="email" placeholder="ایمیل خود را وارد نمایید">
                        </div>
                        <div class="form-group">
                            <label for="mobile">شماره همراه</label>
                            <input type="phone" disabled name="mobile" value="{{ $user->mobile }}" class="form-control"
                                id="mobile" placeholder="شماره همراه خود را وارد نمایید">
                        </div>

                        <div class="form-group">
                            <label for="national_code">کد ملی</label>
                            <input type="text" disabled name="national_code" value="{{ $user->national_code }}"
                                class="form-control" id="national_code" placeholder="کد ملی خود را وارد نمایید">
                        </div>
                        <div class="form-group">
                            <label for="sex">جنسیت</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sex" value="1"
                                    {{ $user->sex == 'مرد' ? 'checked' : '' }}>
                                <label class="form-check-label">مرد</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sex" value="0"
                                    {{ $user->sex == 'زن' ? 'checked' : '' }}>
                                <label class="form-check-label">زن</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">آدرس</label>
                            <textarea type="text" name="address" class="form-control" id="national_code" placeholder="آدرس خود را وارد نمایید">{{ $user->address }}</textarea>
                        </div>
                        <div class="row">
                        @foreach ($user->photos as $userPhoto)
                            <div class="col col-sm-2 text-center">
                                <img src={{ asset('uploads/' . $user->id . '/' . $userPhoto->name) }} width="100"
                                    height="100" alt="">
                                    <a href={{ route('login', ['id'=>$userPhoto->id]) }} class="d-block">حذف تصویر</a>
                            </div>
                        @endforeach
                      </div>
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
@endsection
