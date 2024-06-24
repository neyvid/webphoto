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
<div class="card card-default">
    <div class="card-header">
      <h3 class="card-title">Select2 (قالب پیشفرض)</h3>

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
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>مینیمال</label>
            <select class="form-control select2" style="width: 100%;">
              <option selected="selected">تهران</option>
              <option>مشهد</option>
              <option>یزد</option>
              <option>اصفهان</option>
              <option>شهر کرد</option>
              <option>ساری</option>
              <option>مازندران</option>
            </select>
          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <label>غیر فعال</label>
            <select class="form-control select2" disabled="disabled" style="width: 100%;">
              <option selected="selected">تهران</option>
              <option>مشهد</option>
              <option>یزد</option>
              <option>کرمان</option>
              <option>بندر عباس</option>
              <option>ساری</option>
              <option>مازندران</option>
            </select>
          </div>
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
        <div class="col-md-6">
          <div class="form-group">
            <label>چند گانه</label>
            <select class="select2" multiple="multiple" data-placeholder="یک استان را انتخاب کنید" style="width: 100%;">
              <option>تهران</option>
              <option>مشهد</option>
              <option>یزد</option>
              <option>کرمان</option>
              <option>بندر عباس</option>
              <option>ساری</option>
              <option>مازندران</option>
            </select>
          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <label>نتیجه غیر فعال</label>
            <select class="form-control select2" style="width: 100%;">
              <option selected="selected">تهران</option>
              <option>مشهد</option>
              <option disabled="disabled">یزد (غیر فعال)</option>
              <option>کرمان</option>
              <option>بندر عباس</option>
              <option>ساری</option>
              <option>مازندران</option>
            </select>
          </div>
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <h5>انواع رنگ ها</h5>
      <div class="row">
        <div class="col-12 col-sm-6">
          <div class="form-group">
            <label>مینیمال (.select2-danger)</label>
            <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
              <option selected="selected">تهران</option>
              <option>مشهد</option>
              <option>یزد</option>
              <option>کرمان</option>
              <option>بندر عباس</option>
              <option>ساری</option>
              <option>مازندران</option>
            </select>
          </div>
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6">
          <div class="form-group">
            <label>چند گانه (.select2-purple)</label>
            <div class="select2-purple">
              <select class="select2" multiple="multiple" data-placeholder="یک استان را انتخاب کنید" data-dropdown-css-class="select2-purple" style="width: 100%;">
                <option>تهران</option>
                <option>مشهد</option>
                <option>یزد</option>
                <option>کرمان</option>
                <option>بندر عباس</option>
                <option>ساری</option>
                <option>مازندران</option>
              </select>
            </div>
          </div>
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
       جهت اطلاعات بیشتر این افزونه مستندات آن را بررسی نمایید:
      <a href="https://select2.github.io/">Select2 documentation</a>
    </div>
  </div>
  @endsection