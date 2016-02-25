<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="description" content="">
 <meta name="author" content="">
 <title>ระบบจัดการข้อมูล</title>
 <!-- Bootstrap Core CSS -->
 @include('admin.layouts.inc-stylesheet')
 @yield('stylesheet')

 <link rel="stylesheet" href="{{ asset('foundation/css/foundation.css') }} " />
 <script   src="{{ asset('jquery-2.1.4.min.js') }}"></script>
 <script  src="{{ asset('foundation/js/vendor/jQuery.js') }}"></script>
    <script  src="{{ asset('foundation/js/vendor/modernizr.js') }}"></script>
    <script src="{{ asset('foundation/js/foundation.min.js')}}"></script>
    <script src="{{ asset('jquery-1.12.0.min.js') }}"></script>  <!-- เพิ่มพวกajaxมา -->
</head>
<body>
 <div id="wrapper">
 <!-- Navigation -->
 <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
 <div class="navbar-header">
 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
 <span class="sr-only">Toggle navigation</span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 </button>
 <a class="navbar-brand" href="{{url('admin/index')}}">ระบบจัดการข้อมูล</a>
 </div>
 <!-- /.navbar-header -->
 @include('admin.layouts.inc-header')
 <!-- /.navbar-top-links -->
 @include('admin.layouts.inc-left-sidebar')
 <!-- /.navbar-static-side -->
 </nav>
 <!-- Page Content -->
 <div id="page-wrapper">
 <div class="container-fluid">
 @yield('content')
 <!-- /.row -->
 </div>
 <!-- /.container-fluid -->
 </div>
 <!-- /#page-wrapper -->
 </div>
 <!-- /#wrapper -->
 <!-- jQuery -->
 @include('admin.layouts.inc-scripts')
 @yield('scripts')
</body>
</html>
