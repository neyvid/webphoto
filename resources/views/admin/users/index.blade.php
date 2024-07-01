@extends('admin.layout.master')
@section('page-title')
مدیریت کاربران
@endsection
@section('content-header')
مدیریت کاربران
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
              <th>نام و نام خانوداگی </th>
              <th>ایمیل</th>
              <th>موبایل</th>
              <th>وضعیت</th>
              <th>عملیات</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user )
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->mobile }}</td>
              
              <td><span style="cursor: pointer"  onclick="showCitiesOfState(this,{{$user->id}})" class="status badge {{ $user->status=='فعال'? "bg-success" : "bg-danger" }}">{{ $user->status }}</span></td>
              <td>
                <a  href="{{ route('user.edit').'?id='.$user->id }}"><span class="badge bg-warning">ویرایش</span></a>
                <a href="{{ route('user.delete').'?id='.$user->id }}"><span class="badge bg-danger">حذف</span></a>
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
<script>
   function showCitiesOfState(tag,userId) {
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                
                                $.get('user/status/change/'+userId, function (result) {
                            
                                   if($(tag).hasClass('bg-danger')){
                                    $(tag).removeClass('bg-danger');
                                    $(tag).addClass('bg-success');
                                    $(tag).html('فعال');
                                   }else{
                                   $(tag).removeClass('bg-success');
                                   $(tag).addClass('bg-danger');
                                   $(tag).html('غیر فعال');
                                   }
                                   console.log(result);
                                });

                            }

</script>
@endsection