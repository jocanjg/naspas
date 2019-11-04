@extends('layouts.app-template')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  @can('isAdmin')  <section class="content-header">
      <h1>
        Psi i Mačke
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
      <a href="{{ url('animals') }}"><li class="active">Lista pasa</li></a>
      </ol>
    </section>@endcan
    @yield('action-content')
    <!-- /.content -->
  </div>
@endsection
