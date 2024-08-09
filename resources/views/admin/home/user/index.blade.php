@extends('admin.layout.master')
@section('content-header')
    پنل کاربری
@endsection

@section('content-breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">صفحه نخست</a></li>
        <li class="breadcrumb-item active">داشبورد 1</li>
    </ol>
@endsection
@section('main-content')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">اطلاعات کاربری</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="name">نام</label>
                                <input type="name" class="form-control" id="name" value="{{ Auth::user()->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="lastname">نام خانوادگی</label>
                                <input type="lastname" class="form-control" id="lastname"
                                    value="{{ Auth::user()->lastname }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="national_code ">کدملی</label>
                                <input type="national_code " class="form-control" id="national_code "
                                    value="{{ Auth::user()->national_code }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sex">جنسیت</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sex" value="1"
                                    {{ Auth::user()->sex == 'مرد' ? 'checked' : '' }}>
                                <label class="form-check-label">مرد</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sex" value="0"
                                    {{ Auth::user()->sex == 'زن' ? 'checked' : '' }}>
                                <label class="form-check-label">زن</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="email">ایمیل</label>
                                <input type="email" class="form-control" id="email" value="{{ Auth::user()->email }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="mobile">موبایل</label>
                                <input type="mobile" class="form-control" id="mobile" value="{{ Auth::user()->mobile }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="phone">شماره تلفن</label>
                                <input type="phone" class="form-control" id="phone" value="{{ Auth::user()->phone }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>نقش کاربر</label>
                            <input class="form-control" type="text" name="role"
                                value={{ Auth::user()->roles[0]['name'] }} disabled>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="address">آدرس</label>
                            <textarea type="text" name="address" class="form-control" id="address" placeholder="آدرس خود را وارد نمایید">{{ Auth::user()->address }}</textarea>
                        </div>
                    </div>
                </div>
                <!-- /.row -->


                <button type="submit" class="btn btn-success btn-lg btn-block">ذخیره تغییرات</button>

            </div>
        </form>

    </div>
@endsection
