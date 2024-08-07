@extends('admin.layout.master')
@section('page-title')
    ویرایش نقش ها
@endsection

@section('content-header')
    ویرایش نقش ها
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
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-header">
                    <h3 class="card-title">فرم ویرایش نقش</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <form method="POST" action={{ route('roles.update', ['role' => $role]) }}>
                    @csrf
                    @method('PUT')


                    <div class="card-body">
                        <div class="form-group">

                            <label class="form-label text-muted opacity-75 fw-medium" for="roleName">نام نقش</label>

                            <input type="text" name="roleName" class="form-control" id="roleName"
                                value="{{ $role->name }}">
                            @error('roleName')
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
