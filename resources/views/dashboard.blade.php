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

  <!-- Main Header -->
  @include('layouts.header')
  <!-- Sidebar -->
  @include('layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">Početna strana</li>
      </ol><br>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $count }}</h3>

              <p>Ukupan broj životinja</p>
            </div>
            <div class="icon">
              <i class="ion ion-heart"></i>
            </div>
            <a href="{{ url('animals') }}" class="small-box-footer">Pogledaj listu <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <!-- ./col -->
        @if( Gate::check('isAdmin') || Gate::check('isAuthor') )
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $cusers }}</h3>

              <p>Ukupan broj ljudi</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('users.index') }}" class="small-box-footer">Pogledaj listu <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ Counter::allHits() }}</h3>

              <p>Broj pregleda</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Više informacija <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        @endif
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div>
            <form method="POST" action="{{ route('animals.search') }}">
            {{ csrf_field() }}
              @component('layouts.search', ['title' => 'Pretraga'])
               @component('layouts.two-cols-search-row', ['items' => ['chip'],
               'oldVals' => [isset($searchingVals) ? $searchingVals['chip'] : '']])
               @endcomponent
             @endcomponent
           </form>
         </div>
        </div>
      </div>





      @if( Gate::check('isAdmin') || Gate::check('isAuthor') )
      <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Poslednje</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table class="table no-margin">
                <thead>
                <tr>
                  <th>Čip</th>
                  <th>Starost</th>
                  <th>Ime osobe</th>
                  <th>Ime životinje</th>
                  <th>Datum</th>
                </tr>
                </thead>
                <tbody>
                      @foreach ($animals as $animal)
                <tr>
                  <td><a href="{{ route('animals.edit', ['id' => $animal->id]) }}">{{ $animal->chip}}</a></td>

                  <td><span class="label label-success">{{ $animal->age }}</span></td>
                  <td>
                    <div class="sparkbar" data-color="#00a65a" data-height="20">{{ $animal->pname }}</div>
                  </td>
                  <td>
                    <div class="sparkbar" data-color="#00a65a" data-height="20">{{ $animal->dname }}</div>
                  </td>
                  <td>
                    <div class="sparkbar" data-color="#00a65a" data-height="20">{{ $animal->date }}</div>
                  </td>
                </tr>
              @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer clearfix">
            <a href="{{ route('animals.create') }}" class="btn btn-sm btn-info btn-flat pull-left">Dodaj</a>
            <a href="{{ url('animals') }}" class="btn btn-sm btn-default btn-flat pull-right">Pogledaj sve</a>
          </div>
          <!-- /.box-footer -->
        </div>

        <!-- /.box -->
        @can('isAdmin')
        <div class="col-md-6">
            <!-- USERS LIST -->
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Korisnici</h3>

                <div class="box-tools pull-right">
                  <span class="label label-danger">{{ $cusers }} korisnika</span>
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                  </button> -->
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body no-padding">
                <ul class="users-list clearfix">
                    @foreach ($users as $user)
                  <li>
                    <!-- <img src="dist/img/user1-128x128.jpg" alt="User Image"> -->
                    <a class="users-list-name" href="#">{{ $user -> name}}</a>
                    <!-- <span class="users-list-date">Today</span> -->
                  </li>
                    @endforeach
                </ul>

                <!-- /.users-list -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer text-center">
                <a href="javascript:void(0)" class="uppercase">Pogledaj sve korisnike</a>
              </div>
              <!-- /.box-footer -->
            </div>
            <!--/.box -->
          </div>
          @endcan
          @endif
          <!-- /.col -->
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-gray"><i class="fa fa-th-large"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Kapacitet</span>
                  <span class="info-box-number">{{ $rez }}<small>%</small></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            @if( Gate::check('isAdmin') || Gate::check('isAuthor') )
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-ambulance"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Urgentna lista</span>
                  <span class="info-box-number">0</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            @endif
            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-gray"><i class="fa fa-home"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Udomljeno</span>
                  <span class="info-box-number">0</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            @can('isAdmin')
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-gray"><i class="ion ion-ios-people-outline"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Novi kontatki</span>
                  <span class="info-box-number">0</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            @endcan
            <!-- /.col -->

          </div>




    </section>
    <!-- /.content -->
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
