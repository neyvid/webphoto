@extends('admin.layout.master')

@section('page-title')
    ویرایش تصویر کاربران
@endsection

@section('content-header')
    ویرابش تصویر کاربر
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
                <form method="POST" action={{ route('image.update', ['id' => $imageOfUser->id]) }}
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">نام </label>
                            <input dir="ltr" disabled type="text" name="name" value="{{ $imageOfUser->name }}" class="form-control"
                                id="name" placeholder="نام خود را وارد نمایید">
                        </div>
                        <div class="form-group">
                            <label for="name">کاربر صاحب تصویر </label>
                            <select  id="exampleFormControlSelect1" class="form-control js-example-basic-single" name="imageOwnerId">
                               @foreach ($allUser as $user )
                                   
                               <option  value={{ $user->id }} {{ $user->id == $imageOfUser->user_id ? 'selected' : '' }}>{{ $user->email }}</option>
                               @endforeach
                               
                            </select>

                        </div>
                        {{-- <div class="row">
                        @foreach ($user->photos as $userPhoto)
                            <div class="col col-sm-2 text-center">
                                <img src={{ asset('uploads/' . $user->id . '/' . $userPhoto->name) }} width="100"
                                    height="100" alt="">
                                <a onclick="userImageRemove(event,this)"
                                    href={{ route('user.remove.image', ['imageId' => $userPhoto->id]) }}
                                    class="d-block">حذف تصویر</a>
                            </div>
                        @endforeach
                    </div> --}}
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
@endsection

@section('Customscript')
 
@endsection
