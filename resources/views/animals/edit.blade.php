@extends('animals.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2" style="margin-left: 20px;">
            <div class="panel panel-default">
                <div class="panel-heading">Pogledaj profil životinje</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{route('animals.update', ['id' => $animal->id])}}" enctype="multipart/form-data">
                      <input type="hidden" name="_method" value="PATCH">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group{{ $errors->has('pname') ? ' has-error' : '' }} col-md-5">
                            <label for="pname" class="col-md-4 control-label">Ime Korisnika</label>

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
                            <label for="dname" class="col-md-4 control-label">Ime životinje</label>

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
                            <label class="col-md-4 control-label">Lokacija</label>
                            <div class="col-md-8">
                                <select class="form-control" name="location_id" required>
                                  <option value="-1">Izaberi</option>
                                  @foreach ($locations as $location)
                                        <option {{$animal->location_id == $location->id ? 'selected' : ''}} value="{{$location->id}}">{{$location->location}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-5">
                            <label class="col-md-4 control-label">Datum</label>
                            <div class="col-md-8">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" value="{{ $animal->date}}" name="date" class="form-control pull-right" id="date" required>
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
                                    <input type="text" value="{{ $animal->datein}}" name="datein" class="form-control pull-right" id="datein" required>
                                </div>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }} col-md-5">
                            <label for="address" class="col-md-4 control-label">Adresa</label>

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
                            <label class="col-md-4 control-label">Razlog hvatanja</label>
                            <div class="col-md-6">
                                <select class="form-control" name="reason_id">
                                    <option value="-1">Izaberi</option>
                                   @foreach ($reasons as $reason)
                                        <option {{$animal->reason_id == $reason->id ? 'selected' : ''}} value="{{$reason->id}}">{{$reason->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('chip') ? ' has-error' : '' }} col-md-5">
                            <label for="chip" class="col-md-4 control-label">Broj Čipa</label>

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
                            <label for="age" class="col-md-4 control-label">Starost životinje</label>

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
                            <label class="col-md-4 control-label">Način hvatanja</label>
                            <div class="col-md-6">
                                <select class="form-control" name="nacin_id">
                                  <option value="-1">Izaberi</option>
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


                        <div class="form-group col-md-5">
                            <label for="hirurg" class="col-md-4 control-label">Hirurška intervencija</label>

                            <div class="col-md-8">
                                <input id="hirurg" type="text" class="form-control" name="hirurg" value="{{ $animal->hirurg }}" required>

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
                                <input id="tezina" type="text" class="form-control" name="tezina" value="{{ $animal->tezina }}" required>

                                @if ($errors->has('tezina'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tezina') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('department_id') ? ' has-error' : '' }} col-md-5">
                            <label class="col-md-4 control-label">Kavez</label>
                            <div class="col-md-6">
                                <select class="form-control" name="box">
                                  @foreach ($boxes as $box)
                                      <option {{$animal->box == $box->id ? 'selected' : ''}} value="{{$box->id}}">{{$box->name}}</option>
                                  @endforeach
                                </select>

                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('size_id') ? ' has-error' : '' }} col-md-5">
                            <label class="col-md-4 control-label">Veličina</label>
                            <div class="col-md-6">
                                <select class="form-control" name="size">
                                  @if($animal->size == 1)
                                    <option value="1">Mali</option>
                                  @elseif($animal->size ==2)
                                  <option value="2">Srednji</option>
                                  @else
                                  <option value="3">Veliki</option>
                                  @endif
                                </select>

                            </div>
                        </div>


                      <div class="form-group col-md-5">
                          <label for="avatar" class="col-md-4 control-label" >Slika</label>
                          <div class="col-md-6" >
                            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Pogledaj sliku
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Slika</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" class="width:20%;">
          <img  src="{{ asset('storage/'.$animal->picture) }}" class="img-fluid" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
        <button type="button" class="btn btn-primary">Dodaj</button>
      </div>
    </div>
  </div>
</div>


                          <input type="file" id="picture" name="picture" />
                          </div>
                      </div>

                      <!-- <div class="form-group col-md-5">
                          <label class="col-md-4 control-label">Veterinar</label>
                          <div class="col-md-6">
                          <span class="text">Označi kao HITNO! (Potreban pregled) </span>
                          <input type="checkbox" value="">
                          </div>
                      </div> -->


                        <div class="form-group{{ $errors->has('location_id') ? ' has-error' : '' }} col-md-5">
                            <label class="col-md-4 control-label">Pol</label>
                            <div class="col-md-6">
                                <select class="form-control" name="gender">
                                  @if($animal->gender == 1)
                                  <option value="1">Mužijak</option>
                                  @else
                                  <option value="2">Ženka</option>
                                  @endif
                                </select>

                            </div>
                        </div>






                          <div class="form-group{{ $errors->has('sort') ? ' has-error' : '' }} col-md-5">
                              <label class="col-md-4 control-label">Rasa</label>
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
                                      Sačuvaj Izmene
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
                          Udomljeno
                      </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
