@extends('reason.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">Lista</h3>
          <p>Postojeći razlozi hvatanja i unošenje novih</p>
        </div>
        <div class="col-sm-4">
          <a class="btn btn-primary" href="{{ route('reasons.create') }}">Dodaj novi</a>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      <form method="POST" action="">

      </form>
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th width="70%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending">Razlog</th>
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Podesavanje</th>
              </tr>
            </thead>
            @if(count($reasons) > 0)
             @foreach($reasons as $reason)
            <tbody>

                <tr role="row" class="odd">
                  <td>{{ $reason->name}}</td>
                  <td>
                    <form class="row" method="POST" action="{{ route('reasons.destroy', ['id' => $reason->id]) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="" class="btn btn-warning col-sm-3 col-xs-5 btn-margin">
                        Pogledaj
                        </a>
                        <button type="submit" class="btn btn-danger col-sm-3 col-xs-5 btn-margin">
                          Ukloni
                        </button>
                    </form>
                  </td>
              </tr>
            </tbody>
            @endforeach
           @endif
            <tfoot>
              <tr>
                <th width="20%" rowspan="1" colspan="1">Razlog</th>
                <th rowspan="1" colspan="2">Podesavanje</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">verve</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
          aervaerv
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
