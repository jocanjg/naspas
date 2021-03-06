@extends('animals.base')
@section('action-content')
<section class="content">
  <div class="box">
<div class="box-header">
<div class="row">

    <div class="col-sm-4">
      <h3 class="box-title">Lista udomljenih životinja</h3>
      <p>Pretraži bazu pomoću čipa</p>
      <!-- <li>U slučaju da ne postoji traženi pas ili mačka, kontktiraj lokalno prihvatilište ili azil</li> -->


    </div>

<!--
    <div class="col-md-3">
        <div class="box box-default collapsed-box">
          <div class="box-header with-border">
            <h3 class="box-title">Expandable</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
              </button>
            </div>
          </div>
        <div class="box-body">
        </div>
        </div>
      </div> -->



    <div class="col-sm-4">
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
<!-- /.box-header -->
<div class="box-body">
  <div class="row">
    <div class="col-sm-6"></div>
    <div class="col-sm-6"></div>
  </div>

<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
  <div class="row">
    <div class="col-sm-12">
      <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
        <thead>
          <tr role="row">
            <th width="8%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Picture: activate to sort column descending">Slika</th>
          <th width="10%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending">Ime životinje</th>
            @if( Gate::check('isAdmin') || Gate::check('isAuthor') )<th width="12%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending">Ime vlasnika</th>
            <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthdate: activate to sort column ascending">Prezime</th>
            <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Adresa</th>
            <!-- <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="HiredDate: activate to sort column ascending">Hired Date</th> -->
            <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending">Telefon</th>
            <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Division: activate to sort column ascending">Chip</th>@endif
            <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Opcije</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($udomljeni as $udomljen)

            <tr role="row" class="odd">
              <td><img src="{{ asset('storage/'.$udomljen->picture) }}" width="50px" height="50px"/></td>
              <td class="hidden-xs">{{ $udomljen->dname }}</td>
            @if( Gate::check('isAdmin') || Gate::check('isAuthor') )  <td class="sorting_1">{{ $udomljen->vfirstname }}</td>
              <td class="hidden-xs">{{ $udomljen->vlastname }}</td>
              <td class="hidden-xs">{{ $udomljen->vaddress }}</td>
              <td class="hidden-xs">{{ $udomljen->tel }}</td>
              <td class="hidden-xs">{{ $udomljen->chip }}</td>@endif

              <td>
                <form class="row" method="POST" action="" onsubmit = "return confirm('Are you sure?')">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <a href="{{ route('animals.edit', ['id' => $udomljen->id]) }}" class="btn btn-warning col-sm-4 col-xs-8  btn-margin">
                    Pogledaj
                    </a>
                </form>
              </td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th width="8%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Picture: activate to sort column descending">Slika</th>
            <th width="10%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending">Ime životinje</th>
            @if( Gate::check('isAdmin') || Gate::check('isAuthor') )<th width="12%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending">Ime vlasnika</th>
            <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthdate: activate to sort column ascending">Prezime</th>
            <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Adresa</th>
            <!-- <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="HiredDate: activate to sort column ascending">Hired Date</th> -->
            <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending">Telefon</th>
            <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Division: activate to sort column ascending">Chip</th>@endif
            <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Opcije</th>

          </tr>
        </tfoot>
      </table>
    </div>
  </div>
  <div class="row">
      <div class="col-sm-5">
        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite"> </div>
      </div>
      <div class="col-sm-7">
        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">

        </div>
      </div>
    </div>
</div>
</div>
<!-- /.box-body -->
</div>
</section>
<!-- /.content -->
</div>
@endsection
