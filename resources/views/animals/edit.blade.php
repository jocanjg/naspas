@extends('animals.base')

@section('action-content')
<div class="container">
    <div class="row"><br>
@cannot('isAdmin')
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
            <!-- <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture"> -->
            <img  src="{{ asset('storage/'.$animal->picture) }}" class="img-fluid" style="width:100%; height:100%;"/>
            <h3 class="profile-username text-center">{{ $animal->dname}}</h3>



            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Pol</b> <a class="pull-right">
                  @if($animal->gender == 1)
                  <option value="1">Mužijak</option>
                  @else
                  <option value="2">Ženka</option>
                  @endif
              </a>
              </li>
              <li class="list-group-item">
                <b>Težina</b> <a class="pull-right">{{ $animal->tezina }} kg</a>
              </li>
              <li class="list-group-item">
                <b>Starost</b> <a class="pull-right">{{ $animal->age }} god</a>
              </li>
            </ul>


          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- About Me Box -->
        <!-- /.box -->
      </div>
      <div class="col-md-3">


      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Info</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <strong><i class="fa fa-book margin-r-5"></i> Opis</strong>

          <p class="text-muted">
            {{ $animal->text }}
          </p>

          <hr>

          <strong><i class="fa fa-map-marker margin-r-5"></i> Lokacija</strong>

          <p class="text-muted">{{ $animal->address }}</p>

          <hr>


        </div>
        <!-- /.box-body -->
      </div>
        </div>

@endcannot


@can('isAdmin')

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
                                    <input type="text" value="{{ $animal->datein}}" name="datein" value="{{ $animal->datein}}" class="form-control pull-right" id="datein" required>
                                </div>
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



                        <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }} col-md-3">
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

                        <div class="form-group col-md-3">
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


                        <div class="form-group{{ $errors->has('department_id') ? ' has-error' : '' }} col-md-3">
                            <label class="col-md-4 control-label">Kavez</label>
                            <div class="col-md-6">
                                <select class="form-control" name="box">
                                  @foreach ($boxes as $box)
                                      <option {{$animal->box == $box->id ? 'selected' : ''}} value="{{$box->id}}">{{$box->name}}</option>
                                  @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('location_id') ? ' has-error' : '' }} col-md-3">
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
                          <div class="col-md-6" ><img  src="{{ asset('storage/'.$animal->picture) }}" class="img-fluid" style="width:100%; height:100%;"/>
                            <!-- Button trigger modal -->
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal">
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
          <img  src="{{ asset('storage/'.$animal->picture) }}" class="img-fluid" style="width:100%; height:100%;"/>
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


                        <div class="form-group{{ $errors->has('location_id') ? ' has-error' : '' }} col-md-3">
                            <label class="col-md-4 control-label">Udomljen</label>
                            <div class="col-md-6">
                                <select class="form-control" name="gender">

                                  <option value="1">Da</option>

                                  <option value="2">Ne</option>

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







                          <div class="form-group col-md-3">
                            <a class="btn btn-app" href="{{ route('animals.pdf', ['id' => $animal->id]) }}">
                              <i class="fa fa-save"></i>   Preuzmi PDF
                            </a>

                            <a class="btn btn-app">
                              <!-- <span class="badge bg-purple">Udomljen</span> -->
                              <i class="fa fa-users" data-toggle="modal" data-target="#exampleModal2"></i> Udomljen
                            </a>

                            <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModal2Label">Vlasnik</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body" class="width:20%;">
                                    <div class="form-group{{ $errors->has('pname') ? ' has-error' : '' }} col-md-5">
                                        <label for="firstname" class="col-md-4 control-label">Ime</label>

                                        <div class="col-md-8">
                                            <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required autofocus>

                                            @if ($errors->has('firstname'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('firstname') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }} col-md-5">
                                        <label for="lastname" class="col-md-4 control-label">Prezime</label>

                                        <div class="col-md-8">
                                            <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required>

                                            @if ($errors->has('lastname'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('lastname') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- <div class="form-group col-md-5">
                                        <label for="avatar" class="col-md-4 control-label" >Picture</label>
                                        <div class="col-md-6">
                                            <input type="file" id="picture" name="picture" required >
                                        </div>
                                    </div> -->



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





                                    <div class="form-group{{ $errors->has('idcard') ? ' has-error' : '' }} col-md-5">
                                        <label for="idcard" class="col-md-4 control-label">ID card number</label>

                                        <div class="col-md-6">
                                            <input id="idcard" type="text" class="form-control" name="idcard" value="{{ old('idcard') }}" required>

                                            @if ($errors->has('idcard'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('idcard') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>

                                  </div>
                                </div>
                              </div>
                            </div>


                          </div>


                          <div class="form-group col-md-6">
                          <div>
                            <textarea class="textarea" placeholder="" name="text" id="text" style="width: 100%; height: 105px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $animal->text }}</textarea>
                          </div>
                          </div>
                          <div class="col-md-3 col-md-offset-1">
                              <button type="submit" class="btn btn-success">
                                  Sačuvaj Izmene
                              </button>
                          </div>

                    </form>

                </div>


            </div>
        </div>

        @endcan
    </div>
</div>
@endsection
