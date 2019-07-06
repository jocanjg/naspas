@extends('animals.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2" style="margin-left: 20px;">
            <div class="panel panel-default">
                <div class="panel-heading">Add new pet</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{route('animals.update', ['id' => $animal->id])}}" enctype="multipart/form-data">
                      <input type="hidden" name="_method" value="PATCH">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group{{ $errors->has('pname') ? ' has-error' : '' }} col-md-5">
                            <label for="pname" class="col-md-4 control-label">Persons Name</label>

                            <div class="col-md-8">
                                <input id="pname" type="text" class="form-control" name="pname" value="{{ $animal->pname }}" required autofocus>

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
                                <input id="dname" type="text" class="form-control" name="dname" value="{{ $animal->dname}}" required>

                                @if ($errors->has('dname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group col-md-5">
                            <label class="col-md-4 control-label">Location</label>
                            <div class="col-md-8">
                                <select class="form-control" name="location_id" required>
                                  <option value="-1">Please select</option>
                                  @foreach ($locations as $location)
                                        <option {{$animal->location_id == $location->id ? 'selected' : ''}} value="{{$location->id}}">{{$location->location}}</option>
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
                                    <input type="text" value="{{ $animal->date}}" name="date" class="form-control pull-right" id="date" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }} col-md-5">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-8">
                                <input id="address" type="text" class="form-control" name="address" value="{{ $animal->address }}" required>

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
                                        <option {{$animal->reason_id == $reason->id ? 'selected' : ''}} value="{{$reason->id}}">{{$reason->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('chip') ? ' has-error' : '' }} col-md-5">
                            <label for="chip" class="col-md-4 control-label">Chip number</label>

                            <div class="col-md-6">
                                <input id="chip" type="text" class="form-control" name="chip" value="{{ $animal->chip }}" required>

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
                                <input id="age" type="text" class="form-control" name="age" value="{{ $animal->age }}" required>

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
                                        <option {{$animal->nacin_id == $nacin->id ? 'selected' : ''}} value="{{$nacin->id}}">{{$nacin->name}}</option>
                                    @endforeach
                                </select>
                                 @if ($errors->has('nacin_id'))
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
                                      <option {{$animal->box == $box->id ? 'selected' : ''}} value="{{$box->id}}">{{$box->name}}</option>
                                  @endforeach
                                </select>

                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('size_id') ? ' has-error' : '' }} col-md-5">
                            <label class="col-md-4 control-label">Size</label>
                            <div class="col-md-6">
                                <select class="form-control" name="size">
                                  @if($animal->size == 1)
                                    <option value="1">Small</option>
                                  @elseif($animal->size ==2)
                                  <option value="2">Medium</option>
                                  @else
                                  <option value="3">Large</option>
                                  @endif
                                </select>

                            </div>
                        </div>


                      <div class="form-group col-md-5">
                          <label for="avatar" class="col-md-4 control-label" >Picture</label>
                          <div class="col-md-6" >
                            <img  src="{{ asset('storage/'.$animal->picture) }}" width="160px" height="130px"/>
                          <input type="file" id="picture" name="picture" />
                          </div>
                      </div>

                      <div class="form-group col-md-5">
                          <label class="col-md-4 control-label">Hospital</label>
                          <div class="col-md-6">
                          <span class="text">Mark as URGENT! (doctor needed) </span>
                          <input type="checkbox" value="">
                          </div>
                      </div>


                        <div class="form-group{{ $errors->has('location_id') ? ' has-error' : '' }} col-md-5">
                            <label class="col-md-4 control-label">Gender</label>
                            <div class="col-md-6">
                                <select class="form-control" name="gender">
                                  @if($animal->gender == 1)
                                  <option value="1">Male</option>
                                  @else
                                  <option value="2">Female</option>
                                  @endif
                                </select>

                            </div>
                        </div>






                          <div class="form-group{{ $errors->has('sort') ? ' has-error' : '' }} col-md-5">
                              <label class="col-md-4 control-label">Race</label>
                              <div class="col-md-6">
                                  <select class="form-control" name="sort">
                                    @foreach ($sorts as $sort)
                                         <option {{$animal->sort == $sort->id ? 'selected' : ''}} value="{{$sort->id}}">{{$sort->name}}</option>
                                     @endforeach
                                  </select>

                              </div><br><br><br>

                          </div>

                          <div class="form-group col-md-6">
                              <div class="col-md-12 col-md-offset-4">
                                  <button type="submit" class="btn btn-primary">
                                      Update
                                  </button>

                              </div>
                          </div>

                          <div class="form-group col-md-6">
                          <div>
                            <textarea class="textarea" placeholder="" name="text" id="text" style="width: 100%; height: 105px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $animal->text }}</textarea>
                          </div>
                          </div>


                    </form>
                    <a href="{{ url('adopted') }}">
                      <button type="" class="btn btn-success">
                          Adopted
                      </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
