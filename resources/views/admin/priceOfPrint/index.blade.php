@extends('admin.layout.master')

@section('page-title')
    مدیریت تعرفه چاپ
@endsection

@section('content-header')
تعرفه های چاپ
    <a class="btn btn-success" href={{ route('priceOfPrint.create.form') }}>ایجاد تعرفه جدید</a>
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
                                <th>سایز چاپ</th>
                                <th>نوع چاپ</th>
                                <th>جنس چاپ</th>
                                <th>ضخامت شاسی</th>
                                <th>قیمت</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($priceOfPrints as $priceOfPrint)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $priceOfPrint->size }}</td>
                                    <td>{{ $priceOfPrint->printType }}</td>
                                    <td>{{ $priceOfPrint->printGenus }}</td>
                                    <td>{{ $priceOfPrint->shasiTickness }}</td>
                                    <td>{{ $priceOfPrint->price }}</td>

                                  
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ردیف</th>
                                <th>سایز چاپ</th>
                                <th>نوع چاپ</th>
                                <th>جنس چاپ</th>
                                <th>ضخامت شاسی</th>
                                <th>قیمت</th>
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
                 'emptyTable': 'اطلاعاتی در دسترس نیست'
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
