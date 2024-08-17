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


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="myTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>نام تصویر</th>
                                <th>سایز تصویر</th>
                                <th>نوع</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($userPhotos as $userPhoto)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $userPhoto->name }}</td>
                                    <td>{{ $userPhoto->size }}</td>
                                    <td>{{ $userPhoto->type }}</td>
                                    <td>
                                        <button type="button" class="badge bg-info border-0" data-toggle="modal"
                                            data-target="#myModal{{ $userPhoto->id }}">
                                            مشاهده تصویر
                                        </button>
                                        <!-- The Modal For User Detail -->
                                        <div class="modal fade" id="myModal{{ $userPhoto->id }}">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">
                                                            {{ $userPhoto->name }}
                                                        </h4>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="modal-body orderDetailModal text-center">

                                                        <img src={{ asset('/uploads/' . $userPhoto->user_id . '/' . $userPhoto->name) }}
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



                                        <button type="button" class="badge bg-success border-0" data-toggle="modal"
                                            data-target="#buy_photo">سفارش خرید</button>


                                        <div class="modal fade" id="buy_photo" tabindex="-1" role="dialog"
                                            aria-labelledby="buy_photo" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="buy_photo">فرم سفارش خرید تصویر</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>

                                                            <div class="form-group">
                                                                <label for="photoSize">سایز تصویر</label>
                                                                <select id="photoSize"
                                                                    class="form-control js-example-basic-single"
                                                                    name="photoSize" onchange="calculatePriceOfPrint(this)">

                                                                    @foreach (Config('photoconfig.photosize') as $photoSize)
                                                                        <option value={{ $photoSize }}>
                                                                            {{ $photoSize }}</option>
                                                                    @endforeach

                                                                </select>

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="printType">نوع چاپ</label>
                                                                <select id="printType"
                                                                    class="form-control js-example-basic-single printOnShasi"
                                                                    name="printType">
                                                                    @foreach (Config('photoconfig.printtype') as $key => $printtype)
                                                                        <option value={{ $key }}>
                                                                            {{ $printtype }}</option>
                                                                    @endforeach

                                                                </select>

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="printGenus">جنس چاپ</label>
                                                                <select id="printGenus"
                                                                    class="form-control js-example-basic-single"
                                                                    name="printGenus">
                                                                    @foreach (Config('photoconfig.printGenus') as $key => $printGenus)
                                                                        <option value={{ $key }}>
                                                                            {{ $printGenus }}</option>
                                                                    @endforeach

                                                                </select>

                                                            </div>
                                                            <div class="form-group">
                                                                <div class="custom-control custom-checkbox d-inline">
                                                                    <input class="custom-control-input " type="checkbox"
                                                                        id="printOnShasi" name="printOnShasi">
                                                                    <label for="printOnShasi"
                                                                        class="custom-control-label ">میخای
                                                                        عکستو برات رو
                                                                        شاسی چاپ کنیم؟</label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group thicknessOfShasi" style="display: none">
                                                                <label for="thickness">ضخامت شاسی</label>
                                                                <select id="thickness"
                                                                    class="form-control js-example-basic-single"
                                                                    name="thickness">
                                                                    @foreach (Config('photoconfig.shasiTickness') as $key => $shasiTickness)
                                                                        <option value={{ $key }}>
                                                                            {{ $shasiTickness }}</option>
                                                                    @endforeach

                                                                </select>

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="recipient-name"
                                                                    class="col-form-label">تعداد</label>

                                                                <input min="1" max="10" value="1"
                                                                    type="number" id="quantity" class="form-control" />

                                                            </div>

                                                            <div class="form-group">
                                                                <label for="message-text">
                                                                    <span>قیمت:
                                                                        <p class='price'></p>
                                                                    </span>

                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Send message</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </td>

                                </tr>
                            @endforeach


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ردیف</th>
                                <th>نام تصویر</th>
                                <th>سایز تصویر</th>
                                <th>نوع</th>
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



    <script type="text/javascript">
        $('.printOnShasi').change(function(e) {
            alert('change');

        });
        $('#printOnShasi').click(function(e) {
            let tag = document.getElementById("printOnShasi")

            if (tag.checked) {
                $('.thicknessOfShasi').show();
            } else {
                $('.thicknessOfShasi').hide();

            }
        });



        function calculatePriceOfPrint(tag) {
            let photoSize = $('#photoSize').val();
            let printType = $('#printType').val();
            let thickness=0;
            let printGenus = $('#printGenus').val();
            let quantity = $('#quantity').val();
            if($('#thickness').val()!=0){
                let thickness = $('#thickness').val();
            }
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/panel/calculatePriceOfPrint',
                type: "POST",
                data: {
                    'photoSize': photoSize,
                    'printType': printType,
                    'thickness': thickness,
                    'quantity': quantity,
                    'printGenus': printGenus,
                    
                   
                },
                success: function(result) {
                   $('.price').html(result);
                },
                error: function(e) {
                    $('.price').html('0 تومان');
                }
            });
        }
    </script>






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
