@extends('admin.layout.master')

@section('page-title')
    مدیریت تصاویر کاربران
@endsection

@section('content-header')
    تصاویر کاربران
    <a class="btn btn-success" href={{ route('image.create.form') }}>آپلود تصویر جدید</a>
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
                    <table id="myTable" class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>مالک تصویر</th>
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
                                            مشاهده تصویر
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
                                        <a href="{{ route('image.edit') . '?id=' . $userImage->id }}"><span
                                                class="badge bg-warning">ویرایش</span></a>
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
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/2.1.2/css/dataTables.dataTables.css" rel="stylesheet">
<link href="https://editor.datatables.net/extensions/Editor/css/editor.dataTables.css" rel="stylesheet">
<link href="https://cdn.datatables.net/select/2.0.3/css/select.dataTables.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/3.1.0/css/buttons.dataTables.css" rel="stylesheet">
<link href="https://cdn.datatables.net/datetime/1.5.3/css/dataTables.dateTime.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/colreorder/2.0.3/css/colReorder.dataTables.css" rel="stylesheet">






@section('Customscript')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/select/2.0.3/js/select.dataTables.js"></script>
    <script src="https://cdn.datatables.net/select/2.0.3/js/select.dataTables.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.5.3/js/dataTables.dateTime.min.js"></script>
    <script src="https://cdn.datatables.net/colreorder/2.0.3/js/dataTables.colReorder.js"></script>
    <script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.js"></script>
    <script src="https://editor.datatables.net/extensions/Editor/js/editor.dataTables.js"></script>
    <script src="https://cdn.datatables.net/colreorder/2.0.3/js/colReorder.dataTables.js "></script>
    <script src="https://cdn.datatables.net/buttons/3.1.0/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.0/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.0/js/buttons.print.min.js"></script>











    <script>
        $('#myTable').DataTable({
            dom: 'lBfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            "language": {
                "lengthMenu": "نمایش _MENU_ مورد در هر صفحه ",
                "zeroRecords": "متاسفانه موردی یافت نشد!",
                "info": "نمایش صفحه _PAGE_ از _PAGES_",
                "infoEmpty": "موردی در دسترس نیست",
                "infoFiltered": "(فیلترشده از جمع _MAX_ رکورد)",
                'search': 'جستجو  : ',
                "oPaginate": {
                    "sFirst": "اولین",
                    "sPrevious": "قبلی",
                    "sNext": "بعدی",
                    "sLast": "آخرین"
                }
            },
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true,
        });
    </script>
@endsection
