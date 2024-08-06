@extends('admin.layout.master')
@section('page-title')
    مدیریت مجوز ها
@endsection

@section('content-header')
    مجوز ها
    <a class="btn btn-success" href={{ route('permissions.create') }}>ایجاد مجوز جدید</a>
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


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="myTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>نوع مجوز</th>

                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $permission->name }}</td>
                                    
                                    <td>
                                        <a href="{{ url('panel/permissions/'.$permission->id.'/edit') }}"><span
                                                class="badge bg-warning">ویرایش</span></a>
                                        <a href="{{ url('panel/permissions/'.$permission->id ) }}"><span
                                                class="badge bg-danger">حذف</span></a>

                                    </td>

                                </tr>
                            @endforeach


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ردیف</th>
                                <th>نوع مجوز</th>

                                <th>عملیات</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
