@extends('admin.layout.master')
@section('page-title')
    اضافه کردن مجوز های مورد نیاز
@endsection

@section('content-header')
    اضافه کردن مجوز های مورد نیاز
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
                    <h3 class="card-title">فرم اضافه کردن مجوز به نقش : 
                        <span class="font-weight-bolder "><u>{{$role->name}}</u></span>
                   
                    </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <form method="POST" action={{ url('panel/roles/' . $role->id . '/give-permission') }}>
                    @csrf
                    @method('PUT')


                    <div class="card-body">
                        <p> مجوز ها:</p>
                        <div class="form-group">
                            @foreach ($permissions as $permission)
                                <div class="custom-control custom-checkbox d-inline">

                                    <input class="custom-control-input" type="checkbox"
                                        id="customCheckbox{{ $permission->id }}" value="{{ $permission->name }}"
                                        name="permission[]" {{ $role->hasPermissionTo($permission->name)? 'checked' : '' }}>
                                    <label for="customCheckbox{{ $permission->id }}"
                                        class="custom-control-label">{{ $permission->name }}</label>


                                    </div>
                                     @endforeach

                               
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
