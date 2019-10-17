@extends('layouts.app-template')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kavezi
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/')  }}"><i class="fa fa-dashboard"></i> Sistem Podesavanje</a></li>
        <li><a href="{{ route('box.index') }}">Kavezi</a></li>
      </ol>
    </section>
    @yield('action-content')
    <!-- /.content -->
  </div>
@endsection
