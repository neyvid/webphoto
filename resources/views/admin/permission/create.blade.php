@extends('admin.layout.master')
@section('page-title')
    مدیریت مجوز ها
@endsection

@section('content-header')
    مجوز ها
    <a class="btn btn-success" href={{ route('image.create.form') }}>ایجاد مجوز جدید</a>
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
                    <h3 class="card-title">فرم ایجاد مجوز جدید</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <form method="post" action={{ route('permissions.store') }}>
                    @csrf
                    <div class="card-body">
                        <div class="form-group">

                            <label class="form-label text-muted opacity-75 fw-medium" for="permissionName">نام مجوز</label>

                            <input type="text" name="permissionName" class="form-control" id="permissionName"
                                placeholder="نام مجوز مورد نظر را وارد نمایید">
                            @error('permissionName')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                            <div class="invalid-feedback fw-bold">نام خود را وارد نمایید</div>
                        </div>



                    </div>
                    <!-- /.card-body -->


                    <div class="card-footer">
                        <button class="btn btn-primary">ارسال</button>
                    </div>
                </form>

            </div>
            <!-- /.card -->

        </div>
    </div>
@endsection
