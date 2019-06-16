@extends('animals.base')

@section('action-content')
@if (Session::has('success'))
      <div class="alert alert-success" role="alert" id="hideMe">
        {{ Session::get('success') }}
      </div>
    @endif
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2" style="margin-left: 0;">
            <div class="panel panel-default">
                <div class="panel-heading">Add new pet</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('animals.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('pname') ? ' has-error' : '' }} col-md-5">
                            <label for="pname" class="col-md-4 control-label">Persons Name</label>

                            <div class="col-md-8">
                                <input id="pname" type="text" class="form-control" name="pname" value="{{ old('pname') }}" required autofocus>

                                @if ($errors->has('pname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dname') ? ' has-error' : '' }} col-md-5">
                            <label for="dname" class="col-md-4 control-label">Dogs Name</label>

                            <div class="col-md-8">
                                <input id="dname" type="text" class="form-control" name="dname" value="{{ old('dname') }}" required>

                                @if ($errors->has('dname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-5">
                            <label for="avatar" class="col-md-4 control-label" >Picture</label>
                            <div class="col-md-6">
                                <input type="file" id="picture" name="picture" required >
                            </div>
                        </div>

                        <div class="form-group col-md-5">
                            <label class="col-md-4 control-label">Location</label>
                            <div class="col-md-8">
                                <select class="form-control" name="location_id" required>
                                    <option value="-1">Please select</option>
                                  @foreach ($locations as $location)
                                        <option value="{{$location->id}}">{{$location->location}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-5">
                            <label class="col-md-4 control-label">Date</label>
                            <div class="col-md-8">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" value="<?php  $mytime = Carbon\Carbon::now();
                                     echo $mytime->toDateTimeString(); ?>" name="date" class="form-control pull-right" id="date" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }} col-md-5">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-8">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group col-md-5">
                            <label class="col-md-4 control-label">Reason for catching</label>
                            <div class="col-md-6">
                                <select class="form-control" name="reason_id">
                                    <option value="-1">Please select</option>
                                   @foreach ($reasons as $reason)
                                        <option value="{{$reason->id}}">{{$reason->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('chip') ? ' has-error' : '' }} col-md-5">
                            <label for="chip" class="col-md-4 control-label">Chip number</label>

                            <div class="col-md-6">
                                <input id="chip" type="text" class="form-control" name="chip" value="{{ old('chip') }}" required>

                                @if ($errors->has('chip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('chip') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }} col-md-5">
                            <label for="age" class="col-md-4 control-label">Age</label>

                            <div class="col-md-6">
                                <input id="age" type="text" class="form-control" name="age" value="{{ old('age') }}" required>

                                @if ($errors->has('age'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('nacin_id') ? ' has-error' : '' }} col-md-5">
                            <label class="col-md-4 control-label">Way of catching</label>
                            <div class="col-md-6">
                                <select class="form-control" name="nacin_id">
                                  <option value="-1">Please select</option>
                                    @foreach ($nacins as $nacin)
                                        <option value="{{$nacin->id}}">{{$nacin->name}}</option>
                                    @endforeach
                                </select>
                                 @if ($errors->has('size_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nacin_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('department_id') ? ' has-error' : '' }} col-md-5">
                            <label class="col-md-4 control-label">Box</label>
                            <div class="col-md-6">
                                <select class="form-control" name="box">
                                    @foreach ($boxes as $box)
                                        <option value="{{$box->id}}">{{$box->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('size_id') ? ' has-error' : '' }} col-md-5">
                            <label class="col-md-4 control-label">Size</label>
                            <div class="col-md-6">
                                <select class="form-control" name="size">

                                        <option value="1">Small</option>
                                        <option value="2">Medium</option>
                                        <option value="2">Large</option>

                                </select>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('location_id') ? ' has-error' : '' }} col-md-5">
                            <label class="col-md-4 control-label">Gender</label>
                            <div class="col-md-6">
                                <select class="form-control" name="gender">
                                      <option value="1">Male</option>
                                      <option value="2">Female</option>
                                </select>
                            </div>
                        </div>

                          <div class="form-group{{ $errors->has('sort') ? ' has-error' : '' }} col-md-5">
                              <label class="col-md-4 control-label">Race</label>
                              <div class="col-md-6">
                                  <select class="form-control" name="sort">
                                      @foreach ($sorts as $sort)
                                          <option value="{{$sort->id}}">{{$sort->name}}</option>
                                      @endforeach
                                  </select>
                                   @if ($errors->has('name'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                  @endif
                                </div><br><br><br>
                                <div>
                                  <textarea class="textarea" placeholder="Message" name="text" style="width: 100%; height: 105px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>
                          </div>

                        <div class="form-group col-md-6">
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
