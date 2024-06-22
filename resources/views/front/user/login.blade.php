@extends('front.layout.master')
@section('main-content')

<section class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 align-self-center p-static order-2 text-center">
                <h1 class="font-weight-bold text-dark">صفحه ورود</h1>
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

    <div class="row justify-content-center  text-end">
        <div class="col-md-6 col-lg-5 mb-5 mb-lg-0">
            <h2 class="font-weight-bold text-5 mb-0">ورود</h2>
            <form action="/login" id="frmSignIn" method="post" class="needs-validation" novalidate >
              @csrf
                <div class="row">
                    <div class="form-group col">
                        <label class="form-label text-color-dark text-3">پست الکترونیک (ایمیل)<span class="text-color-danger">*</span></label>
                        <input type="text" value="" class="form-control form-control-lg text-4" required>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col">
                        <label class="form-label text-color-dark text-3">رمز عبور <span class="text-color-danger">*</span></label>
                        <input type="password" value="" class="form-control form-control-lg text-4" required>
                        
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="form-group col-md-auto">
                        <a class="text-decoration-none text-color-dark text-color-hover-primary font-weight-semibold text-2" href="#">رمزعبور را فراموش کرده اید؟</a>
                    </div>
                    <div class="form-group col-md-auto">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="rememberme">
                            <label class="form-label custom-control-label cur-pointer text-2" for="rememberme">مرا بخاطر بسپار!</label>
                        </div>
                    </div>
   
                </div>
                <div class="row">
                    <div class="form-group col">
                        <button type="submit" class="btn btn-dark btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3" data-loading-text="Loading...">ورود</button>
                        {{-- <div class="divider">
                            <span class="bg-light px-4 position-absolute left-50pct top-50pct transform3dxy-n50">یا</span>
                        </div> --}}
                        {{-- <a href="#" class="btn btn-primary-scale-2 btn-modern w-100 text-transform-none rounded-0 font-weight-bold align-items-center d-inline-flex justify-content-center text-3 py-3" data-loading-text="Loading..."><i class="fab fa-facebook text-5 me-2"></i> ورود با Gmail</a> --}}
                    </div>
                </div>
            </form>
        </div>
     
    </div>

</div>

@endsection