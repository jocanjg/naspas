@extends('animals.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">

        <div class="col-sm-4">
          <h3 class="box-title">List of Pets</h3>
          <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur</p>
          <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
          <li>Nulla consectetur massa in sem commodo, eget convallis nibh hendrerit.</li>

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
            @component('layouts.search', ['title' => 'Search'])
             @component('layouts.two-cols-search-row', ['items' => ['Chip'],
             'oldVals' => [isset($searchingVals) ? $searchingVals['chip'] : '']])
             @endcomponent
           @endcomponent
      </form>
    </div>

    <div class="col-sm-4">
      <a class="btn btn-lg btn-primary" href="{{ route('animals.create') }}">Add new</a>
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
                <th width="8%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Picture: activate to sort column descending">Picture</th>
                <th width="10%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending">Person</th>
                <th width="12%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending">Animal</th>
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Chip</th>
                <th width="8%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthdate: activate to sort column ascending" aria-sort="ascending">Date</th>
                <!-- <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="HiredDate: activate to sort column ascending">Hired Date</th> -->
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending">Age</th>
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Division: activate to sort column ascending">Location</th>
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Division: activate to sort column ascending">Address</th>
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($animals as $animal)

                <tr role="row" class="odd">
                  <td><img src="{{ asset('storage/'.$animal->picture) }}" width="50px" height="50px"/></td>
                  <td class="sorting_1">{{ $animal->pname }}</td>
                  <td class="hidden-xs">{{ $animal->dname }}</td>
                  <td class="hidden-xs">{{ $animal->chip }}</td>
                  <td class="hidden-xs">{{ $animal->date}}</td>
                  <td class="hidden-xs">{{ $animal->age}}</td>
                  <td class="hidden-xs">{{ $animal->location_id}}</td>
                  <td class="hidden-xs">{{ $animal->address}}</td>
                  <td>
                    <form class="row" method="POST" action="{{ route('animals.destroy', ['id' => $animal->id]) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('animals.edit', ['id' => $animal->id]) }}" class="btn btn-warning col-sm-4 col-xs-5 btn-margin">
                        View/Update
                        </a>

                        <button type="submit"
                         
                           class="btn btn-danger col-sm-3 col-xs-5 btn-margin">
                         Delete
                       </button>

                    </form>
                  </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th width="8%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Picture: activate to sort column descending">Picture</th>
                <th width="10%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending">Person</th>
                <th width="12%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending">Animal</th>
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Chip</th>
                <th width="8%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthdate: activate to sort column ascending" aria-sort="ascending">Date</th>
                <!-- <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="HiredDate: activate to sort column ascending">Hired Date</th> -->
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending">Age</th>
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Division: activate to sort column ascending">Location</th>
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Division: activate to sort column ascending">Address</th>
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Action</th>
              </tr>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <div class="row">
          <div class="col-sm-5">
            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($animals)}} of {{count($animals)}} entries</div>
          </div>
          <div class="col-sm-7">
            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
              {{ $animals->links() }}
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
