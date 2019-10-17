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
                <div class="panel-heading">Dodaj životinju</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('animals.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('pname') ? ' has-error' : '' }} col-md-5">
                            <label for="pname" class="col-md-4 control-label">Ime Korisnika</label>

                            <div class="col-md-8">
                                <input id="pname" type="text" class="form-control" name="pname" value="{{ Auth::user()->name }}" required autofocus>

                                @if ($errors->has('pname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dname') ? ' has-error' : '' }} col-md-5">
                            <label for="dname" class="col-md-4 control-label">Ime životinje</label>

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
                            <label for="avatar" class="col-md-4 control-label" >Slika</label>
                            <div class="col-md-6">
                                <input type="file" id="picture" name="picture" required >
                            </div>
                        </div>

                        <div class="form-group col-md-5">
                            <label class="col-md-4 control-label">Lokacija</label>
                            <div class="col-md-8">
                                <select class="form-control" name="location_id" required>
                                    <option value="-1">Izaberi</option>
                                  @foreach ($locations as $location)
                                        <option value="{{$location->id}}">{{$location->location}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-5">
                            <label class="col-md-4 control-label">Datum unosa</label>
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

                        <div class="form-group col-md-5">
                            <label class="col-md-4 control-label">Datum dolaska</label>
                            <div class="col-md-8">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" value="" name="datein" class="form-control pull-right" id="datein" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }} col-md-5">
                            <label for="address" class="col-md-4 control-label">Adresa</label>

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
                            <label class="col-md-4 control-label">Razlog hvatanja</label>
                            <div class="col-md-8">
                                <select class="form-control" name="reason_id">
                                    <option value="-1">Izaberi</option>
                                   @foreach ($reasons as $reason)
                                        <option value="{{$reason->id}}">{{$reason->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('chip') ? ' has-error' : '' }} col-md-5">
                            <label for="chip" class="col-md-4 control-label">Broj Čipa</label>

                            <div class="col-md-8">
                                <input id="chip" type="text" class="form-control" name="chip" value="{{ old('chip') }}" required>

                                @if ($errors->has('chip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('chip') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }} col-md-5">
                            <label for="age" class="col-md-4 control-label">Starost životinje</label>

                            <div class="col-md-8">
                                <input id="age" type="text" class="form-control" name="age" value="{{ old('age') }}" required>

                                @if ($errors->has('age'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('nacin_id') ? ' has-error' : '' }} col-md-5">
                            <label class="col-md-4 control-label">Način hvatanja</label>
                            <div class="col-md-8">
                                <select class="form-control" name="nacin_id">
                                  <option value="-1">Izaberi</option>
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

                        <div class="form-group col-md-5">
                            <label for="hirurg" class="col-md-4 control-label">Hirurška intervencija</label>

                            <div class="col-md-8">
                                <input id="hirurg" type="text" class="form-control" name="hirurg" value="{{ old('hirurg') }}" required>

                                @if ($errors->has('hirurg'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hirurg') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-5">
                            <label for="tezina" class="col-md-4 control-label">Težina</label>

                            <div class="col-md-8">
                                <input id="tezina" type="text" class="form-control" name="tezina" value="{{ old('tezina') }}" required>

                                @if ($errors->has('tezina'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tezina') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('box_id') ? ' has-error' : '' }} col-md-5">
                            <label class="col-md-4 control-label">Kavez</label>
                            <div class="col-md-8">
                                <select class="form-control" name="box">
                                    @foreach ($boxes as $box)
                                        <option value="{{$box->id}}">{{$box->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('size_id') ? ' has-error' : '' }} col-md-5">
                            <label class="col-md-4 control-label">Veličina</label>
                            <div class="col-md-6">
                                <select class="form-control" name="size">

                                        <option value="1">Mali</option>
                                        <option value="2">Srednji</option>
                                        <option value="2">Veliki</option>

                                </select>
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('location_id') ? ' has-error' : '' }} col-md-5">
                            <label class="col-md-4 control-label">Pol</label>
                            <div class="col-md-6">
                                <select class="form-control" name="gender">
                                      <option value="1">Mužijak</option>
                                      <option value="2">Ženka</option>
                                </select>
                            </div>
                        </div>



                          <div class="form-group{{ $errors->has('sort') ? ' has-error' : '' }} col-md-5">
                              <label class="col-md-4 control-label">Rasa</label>
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
                                </div>

                          </div>

                          <div class="form-group col-md-5">
                              <label for="text" class="col-md-4 control-label">Detalji</label>

                              <div class="col-md-8">
                                  <textarea class="textarea" placeholder="Opis životinje" name="text" style="width: 100%; height: 105px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" value="{{ old('text') }}"></textarea>
                              </div>
                          </div>

                        <div class="form-group col-md-6">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    Unesi
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
