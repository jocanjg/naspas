<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>NASPAS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link href="{{ asset("/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
   <link href="{{ asset("/bower_components/AdminLTE/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
   <link href="{{ asset("/bower_components/AdminLTE/dist/css/skins/_all-skins.min.css")}}" rel="stylesheet" type="text/css" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- mobile specific metas
  ================================================== -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="theme-color" content="#605ca8">
      <!-- Windows Phone -->
      <meta name="msapplication-navbutton-color" content="#605ca8">
      <!-- iOS Safari -->
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta name="apple-mobile-web-app-status-bar-style" content="#605ca8">

</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="sidebar-mini skin-purple-light sidebar-collapse fixed">
<div class="wrapper">

  @include('layouts.header0')

  <!-- Sidebar -->
@include('layouts.naspasbar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="height:100%;"><br>
    <!-- Content Header (Page header) -->
@foreach ($animals as $animal)
<div class="col-md-3">

  <!-- Profile Image -->
  <div class="box box-primary">
    <div class="box-body box-profile">
      <!-- <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture"> -->
      <img  src="{{ asset('storage/'.$animal->picture) }}" class="img-fluid" style="width:100%; height:100%;"/>
      <h3 class="profile-username text-center">{{ $animal->dname}}</h3>



      <ul class="list-group list-group-unbordered">
        <li class="list-group-item">
          <b>Status</b> <a class="pull-right">
            @if($animal->status_id == 0 && empty($animal->vfirstname))
            U prihvatilištu
            @elseif($animal->status_id == 1 && empty($animal->vfirstname))
            CNVR
            @elseif($animal->status_id == 2 && empty($animal->vfirstname))
            Uginulo
            @elseif(!empty($animal->vfirstname))
            Udomljeno
            @endif</a>
        </li>
        <li class="list-group-item">
          <b>Pol</b> <a class="pull-right">
            @if($animal->gender == 1)
            <option value="1">Mužijak</option>
            @else
            <option value="2">Ženka</option>
            @endif
        </a>
        </li>
        <li class="list-group-item">
          <b>Težina</b> <a class="pull-right">{{ $animal->tezina }} kg</a>
        </li>
        <li class="list-group-item">
          <b>Starost</b> <a class="pull-right">{{ $animal->age }} god</a>
        </li>
      </ul>


    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

  <!-- About Me Box -->
  <!-- /.box -->
</div>

@endforeach

</div>
  <!-- /.content-wrapper -->

  <!-- Footer -->
  @include('layouts.footer')

<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

 <!-- jQuery 2.1.3 -->
<script src="{{ asset ("/bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>

<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset ("/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>

<!-- AdminLTE App -->
<script src="{{ asset ("/bower_components/AdminLTE/dist/js/app.min.js") }}" type="text/javascript"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
