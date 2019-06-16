@extends('starost.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">Starost pasa</h3>
        </div>
        <div class="col-sm-4">
          <a class="btn btn-primary" href="">Dodaj novu</a>
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
                <th width="70%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending">Starost Pasa</th>
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Podesavanje</th>
              </tr>
            </thead>
            <tbody>

                <tr role="row" class="odd">
                  <td> 0 god -> 1 god</td>
                  <td>
                    <form class="row" method="POST" action="" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="" class="btn btn-warning col-sm-3 col-xs-5 btn-margin">
                        Update
                        </a>
                        <button type="submit" class="btn btn-danger col-sm-3 col-xs-5 btn-margin">
                          Delete
                        </button>
                    </form>
                  </td>
              </tr>
              <tr role="row" class="odd">
                <td> 1 god -> 4 god</td>
                <td>
                  <form class="row" method="POST" action="" onsubmit = "return confirm('Are you sure?')">
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <a href="" class="btn btn-warning col-sm-3 col-xs-5 btn-margin">
                      Update
                      </a>
                      <button type="submit" class="btn btn-danger col-sm-3 col-xs-5 btn-margin">
                        Delete
                      </button>
                  </form>
                </td>
            </tr>
            <tr role="row" class="odd">
              <td> 4 god -> 8 god</td>
              <td>
                <form class="row" method="POST" action="" onsubmit = "return confirm('Are you sure?')">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <a href="" class="btn btn-warning col-sm-3 col-xs-5 btn-margin">
                    Update
                    </a>
                    <button type="submit" class="btn btn-danger col-sm-3 col-xs-5 btn-margin">
                      Delete
                    </button>
                </form>
              </td>
          </tr>

            </tbody>
            <tfoot>
              <tr>
                <th width="20%" rowspan="1" colspan="1">Starost Pasa</th>
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
