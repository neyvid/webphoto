@extends('admin.layout.master')
@section('content-header')
پنل ادمین
@endsection

@section('content-breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">صفحه نخست</a></li>
    <li class="breadcrumb-item active">داشبورد 1</li>
  </ol>
@endsection
@section('main-content')
<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-lg-12 col-12">
   
    <div class="small-box bg-info">
      <div class="inner">
        <h3>150</h3>

        <p>صفحه ادمین</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  
</div>
<!-- /.row -->

@endsection