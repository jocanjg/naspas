@extends('reason.base')

@section('action-content')
@if (Session::has('success'))
      <div class="alert alert-success" role="alert" id="hideMe">
        {{ Session::get('success') }}
      </div>
    @endif
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dodaj novi</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('reasons.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('sort') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Naziv</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('sort') }}" required autofocus>

                                @if ($errors->has('sort'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sort') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
