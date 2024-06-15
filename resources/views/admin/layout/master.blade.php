@include('admin.layout.header')


@include('admin.layout.navbar')

@include('admin.layout.rightsidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
@include('admin.layout.contentheader')
@include('admin.layout.maincontent')
  </div>
  <!-- /.content-wrapper -->
 @include('admin.layout.footer')