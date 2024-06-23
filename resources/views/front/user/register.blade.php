@extends('front.layout.master')
@section('main-content')
<div class="container py-4">
    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-dark">صفحه ثبت نام</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center">
                        <li><a href="#">Home</a></li>
                        <li class="active">Pages</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="container py-4">

    <div class="row justify-content-center text-end">
        
        <div class="col-md-6 col-lg-5">
            @if($errors->any())
        <div class="alert alert-danger" dir="rtl">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
            <h2 class="font-weight-bold text-5 mb-0">ثبت نام</h2>
            <form action="/register" id="frmSignUp" method="post">
                @csrf
                <div class="row">
                    <div class="form-group col">
                        <label class="form-label text-color-dark text-3">موبایل و یا پست الکترونیک<span class="text-color-danger">*</span></label>
                        <input type="text" name="username" value="" class="form-control form-control-lg text-4" required>
                   
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label class="form-label text-color-dark text-3">رمز عبور <span class="text-color-danger">*</span></label>
                        <input type="password" name="password" value="" class="form-control form-control-lg text-4" required>
                    </div>
                </div>
            
                <div class="row">
                    <div class="form-group col">
                        <button type="submit" class="btn btn-dark btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3" data-loading-text="Loading...">ثبت نام</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>

</div>

@endsection