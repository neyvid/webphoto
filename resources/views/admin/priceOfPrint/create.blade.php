@extends('admin.layout.master')
@section('page-title')
    تعریف قیمت چاپ ها
@endsection
@section('content-header')
    تعریف تعرفه جدید برای چاپ
    <a class="btn btn-success" href={{ route('priceOfPrint.index') }}>مشاهده تعرفه های چاپ</a>
@endsection

@section('content-breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">صفحه نخست</a></li>
        <li class="breadcrumb-item active">داشبورد 1</li>
    </ol>
@endsection
@section('main-content')
    <div class="row">

        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">فرم ایجاد تعرفه جدید چاپ</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="printSize">سایز چاپ تصویر</label>
                            <select id="exampleFormControlSelect1" class="form-control js-example-basic-single"
                                name="printSize">
                                @foreach (Config('photoconfig.photosize') as $photoSize)
                                    <option value={{ $photoSize }}>{{ $photoSize }}</option>
                                @endforeach

                            </select>


                        </div>
                        <div class="form-group">
                            <label for="printType">نوع چاپ تصویر</label>
                            <select id="exampleFormControlSelect1" class="form-control js-example-basic-single"
                                name="printType">
                                @foreach (Config('photoconfig.printtype') as $key => $photoType)
                                    <option value={{ $key }}>{{ $photoType }}</option>
                                @endforeach

                            </select>

                        </div>
                        <div class="form-group">
                            <label for="printGenus">جنس چاپ تصویر</label>
                            <select onchange="changeGenus(this)" id="printGenus" class="form-control js-example-basic-single"
                                name="printGenus">
                                @foreach (Config('photoconfig.printGenus') as $key => $printGenus)
                                    <option value={{ $key }}>{{ $printGenus }}</option>
                                @endforeach

                            </select>

                        </div>
                   
                        <div class="form-group thicknessOfShasi" style="display: none">
                            <label for="thicknessOfShasi">ضخامت شاسی (در صورتیکه قصد چاپ روی شاسی را دارید وارد
                                نمایید.)</label>
                            <select id="thicknessOfShasi" class="form-control js-example-basic-single"
                                name="thicknessOfShasi">
                                @foreach (Config('photoconfig.shasiTickness') as $key => $shasiTickness)
                                    <option value={{ $key }}>{{ $shasiTickness }}</option>
                                @endforeach

                            </select>

                        </div>
                        <div class="form-group">
                            <label for="price">قیمت</label>
                            <input type="price" name="price" class="form-control" id="price"
                                placeholder="قیمت را وارد نمایید" required>
                            @error('price')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                            <div class="invalid-feedback fw-bold">قیمت مد نظر را وارد نمایید</div>

                        </div>


                    </div>
                    <!-- /.card-body -->


                    <div class="card-footer">
                        <button class="btn btn-primary">ارسال</button>
                    </div>
                </form>

            </div>
            <!-- /.card -->

        </div>
    </div>
@endsection

@section('Customscript')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
    <script>
        function changeGenus(tag) {
            if(tag.value=='shasi'){
                $('.thicknessOfShasi').show();
            }else{
                $('.thicknessOfShasi').hide();
            }
        }


    
    </script>
@endsection
<style>
    div #previews {
        display: inline-table;
    }

    textarea {
        background-position: left calc(.375em + .1875rem) center !important
    }
</style>
