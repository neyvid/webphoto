@extends('admin.layout.master')
@section('page-title')
    ویرایش مجوز ها
@endsection

@section('content-header')
     ویرایش مجوز ها
    
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
                    <h3 class="card-title">فرم ویرایش مجوز</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <form method="POST" action={{ route('permissions.update',['permission'=>$permission]) }}>
                    @csrf
                    @method('PUT')
                    
                
                    <div class="card-body">
                        <div class="form-group">
                                
                            <label class="form-label text-muted opacity-75 fw-medium" for="permissionName">نام مجوز</label>

                            <input type="text" name="permissionName" class="form-control" id="permissionName"
                                value="{{ $permission->name }}">
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
