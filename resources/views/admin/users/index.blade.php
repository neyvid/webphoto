@extends('admin.layout.master')
@section('page-title')
    مدیریت کاربران
@endsection
@section('content-header')
    مدیریت کاربران
    <a class="btn btn-success" href={{ route('user.create.form') }}>ساخت کاربر جدید</a>
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
                    <h3 class="card-title">لیست کابران</h3>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="myTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>نام و نام خانوداگی </th>
                                <th>ایمیل</th>
                                <th>موبایل</th>
                                <th>نقش کاربر</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->mobile }}</td>
                                    <td>
                                        @foreach ($user->getRoleNames() as $roleName)
                                            <span class="status badge bg-info">{{ $roleName }}</span>
                                        @endforeach
                                    </td>

                                    <td><span style="cursor: pointer"
                                            onclick="changeStatus(this,{{ $user->id }},'user/status/change/')"
                                            class="status badge {{ $user->status == 'فعال' ? 'bg-success' : 'bg-danger' }}">{{ $user->status }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('user.edit') . '?id=' . $user->id }}"><span
                                                class="badge bg-warning">ویرایش</span></a>
                                        <a onclick="confirmDelete(event,this)"
                                            href="{{ route('user.delete') . '?id=' . $user->id }}"><span
                                                class="badge bg-danger">حذف</span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ردیف</th>
                                <th>نام و نام خانوداگی </th>
                                <th>ایمیل</th>
                                <th>موبایل</th>
                                <th>نقش کاربر</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->


            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>

    </div>
    <script>
        function confirmDelete(e, tag) {
            e.preventDefault();
            let hrefOfTag = $(tag).attr('href');
            Swal.fire({
                title: "آیا از حذف این مورد اطمینان دارید؟",
                text: "درصورت حذف،امکان بازگرداندن نیست!",
                icon: "اخطار",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonText: "خیر",
                cancelButtonColor: "#d33",
                confirmButtonText: "!بله،حذف کن"
            }).then((result) => {
                if (result.isConfirmed) {
                    $(location).attr('href', hrefOfTag);
                }
            });
        }
    </script>
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
                },
                'emptyTable': 'اطلاعاتی در دسترس نیست',
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
