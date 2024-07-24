@extends('admin.layout.master')

@section('page-title')
    مدیریت تصاویر کاربران
@endsection

@section('content-header')
    تصاویر کاربران
@endsection

@section('content-breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">صفحه نخست</a></li>
        <li class="breadcrumb-item active">داشبورد 1</li>
    </ol>
@endsection

@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-header">
                    <h3 class="card-title">لیست تصاویر</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="جستجو">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>کاربر</th>
                                <th>سایز تصویر</th>
                                <th>وضعیت</th>
                                <th>نوع</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($images as $userImage)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $userImage->user->email }}</td>
                                    <td>{{ $userImage->size }}</td>
                                    <td><span style="cursor: pointer"
                                            onclick="changeStatus(this,{{ $userImage->id }},'image/status/change/')"
                                            class="status badge {{ $userImage->status == 'فعال' ? 'bg-success' : 'bg-danger' }}">{{ $userImage->status }}</span>
                                    </td>
                                    <td>{{ $userImage->type }}</td>

                                    <td>
                                        <button type="button" class="badge bg-info border-0" data-toggle="modal"
                                        data-target="#myModal{{ $userImage->id }}">
                                        مشاهده جزییات
                                    </button>
                                    <!-- The Modal For User Detail -->
                                    <div class="modal fade" id="myModal{{ $userImage->id }}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">
                                                        {{ $userImage->name }}
                                                    </h4>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body orderDetailModal text-center">

                                                    <img src={{ asset('/uploads/' . $userImage->user_id . '/' . $userImage->name) }}
                                                        width='650' alt="">

                                                </div>
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">بستن
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                        <a href="{{ route('image.delete') . '?id=' . $userImage->id }}"><span
                                                class="badge bg-danger">حذف</span></a>
                                    </td>
                                 
                                </tr>
                            @endforeach


                        </tbody>

                    </table>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

@section('Customscript')
@endsection
