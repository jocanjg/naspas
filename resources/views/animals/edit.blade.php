@extends('animals.base')

@section('action-content')
<div class="container">
    <div class="row"><br>
@can('isUser')
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
      <div class="box box-info">
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

          @if(empty($animal->vfirstname))
          <strong><i class="fa fa-book margin-r-5"></i> Status</strong>
          <select class="form-control" name="status_id">
            <option value="-1">U prihvatilistu</option>
              @foreach ($statuses as $status)
                    <option {{$animal->status_id == $status->id ? 'selected' : ''}} value="{{$status->id}}">{{$status->name}}</option>
                @endforeach
          </select>
          <hr>
          <strong> Adresa</strong>

          <p class="text-muted">{{ $animal->address }}</p>

          @endif

          <hr>

          <strong> Chip</strong>

          <p class="text-muted">{{ $animal->chip }}</p>



        </div>
        <!-- /.box-body -->
      </div>
        </div>



        <div class="col-md-3">
          @if(!empty($animal->vfirstname))
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Podaci o vlasniku</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

        @if(!empty($animal->vfirstname))
              <strong> Lokacija</strong>

              <p class="text-muted">{{ $animal->vaddress }}</p>

              <strong> Telefon</strong>

              <p class="text-muted">{{ $animal->tel }}</p>

              <strong>Ime vlasnika</strong>

              <p class="text-muted">{{ $animal->vfirstname }}</p>


              <strong>Prezime</strong>

              <p class="text-muted">{{ $animal->vlastname }}</p>

        @endif


            </div>
            <!-- /.box-body -->
          </div>
          @endif

      </div>

@endcan


@if( Gate::check('isAdmin') || Gate::check('isAuthor') )

        <div class="col-md-10 col-md-offset-2" style="margin-left: 20px;">
            <div class="panel panel-default">
                <div class="panel-heading">Izmeni profil životinje</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{route('animals.update', ['id' => $animal->id])}}" enctype="multipart/form-data">
                      <input type="hidden" name="_method" value="PATCH">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="col-md-6" ><img  src="{{ asset('storage/'.$animal->picture) }}" class="img-fluid" style="width:100%; height:100%;"/>
                        <!-- Button trigger modal -->
                      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal">
                      Pogledaj sliku
                      </button>

                      <div class="form-group{{ $errors->has('udomljen') ? ' has-error' : '' }} col-md-6">

                          <!-- <div class="col-md-3">

                                  @if($animal->vfirstname)
                            <i class="fa fa-circle-o text-green">   Udomljen</i>
                                @else
                                <i class="fa fa-circle-o text-red">   Nije Udomljen</i>
                                @endif


                          </div> -->
                      </div>
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
                      <div class="form-group col-md-5">
                          <label class="col-md-4 control-label">Status</label>
                          <div class="col-md-8">
                            @if($animal->vfirstname)
                            <h3>UDOMLJEN</h3>
                              <select class="form-control" name="status_id" required style="display:none;">
                                <option value="-1">Izaberi</option>
                                @foreach ($statuses as $status)
                                      <option {{$animal->status_id == $status->id ? 'selected' : ''}} value="{{$status->id}}">{{$status->name}}</option>
                                  @endforeach
                              </select>
                              @else
                              <select class="form-control" name="status_id" required >
                                <option value="0">U Prihvatilištu</option>
                                @foreach ($statuses as $status)
                                      <option {{$animal->status_id == $status->id ? 'selected' : ''}} value="{{$status->id}}">{{$status->name}}</option>
                                  @endforeach
                              </select>
                              @endif
                          </div>
                      </div>
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

                                  <option {{$animal->gender == 1 ? 'selected' : ''}} value="1">Mužijak</option>

                                  <option {{$animal->gender == 2 ? 'selected' : ''}} value="2">Ženka</option>

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


                      <!-- <div class="form-group col-md-5">
                          <label for="avatar" class="col-md-4 control-label" >Slika</label>

                      </div> -->

                      <!-- <div class="form-group col-md-5">
                          <label class="col-md-4 control-label">Veterinar</label>
                          <div class="col-md-6">
                          <span class="text">Označi kao HITNO! (Potreban pregled) </span>
                          <input type="checkbox" value="">
                          </div>
                      </div> -->








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

                            <a class="btn btn-app" data-toggle="modal" data-target="#exampleModal2">
                              <!-- <span class="badge bg-purple">Udomljen</span> -->
                              <i class="fa fa-users" ></i> Udomljen
                            </a>
                            <a class="btn btn-app" data-toggle="modal" data-target="#exampleModal3">
                              <!-- <span class="badge bg-purple">Udomljen</span> -->
                              <i class="fa fa-ambulance" ></i> Veterinar
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
                                    <div class="form-group{{ $errors->has('vfirstname') ? ' has-error' : '' }} col-md-5">
                                        <label for="vfirstname" class="col-md-4 control-label">Ime</label>

                                        <div class="col-md-12">
                                            <input id="vfirstname" type="text" class="form-control" name="vfirstname" value="{{ $animal->vfirstname }}" >

                                            @if ($errors->has('vfirstname'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('vfirstname') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('vlastname') ? ' has-error' : '' }} col-md-5">
                                        <label for="vlastname" class="col-md-4 control-label">Prezime</label>

                                        <div class="col-md-12">
                                            <input id="vlastname" type="text" class="form-control" name="vlastname" value="{{ $animal->vlastname }}">

                                            @if ($errors->has('vlastname'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('vlastname') }}</strong>
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





                                    <div class="form-group{{ $errors->has('vaddress') ? ' has-error' : '' }} col-md-8">
                                        <label for="vaddress" class="col-md-4 control-label">Adresa</label>

                                        <div class="col-md-8">
                                            <input id="vaddress" type="text" class="form-control" name="vaddress" value="{{ $animal->vaddress }}">

                                            @if ($errors->has('vaddress'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('vaddress') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>





                                    <div class="form-group{{ $errors->has('idcard') ? ' has-error' : '' }} col-md-8">
                                        <label for="idcard" class="col-md-4 control-label">Broj lične karte</label>

                                        <div class="col-md-8">
                                            <input id="idcard" type="text" class="form-control" name="idcard" value="{{ $animal->idcard }}" >

                                            @if ($errors->has('idcard'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('idcard') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }} col-md-8">
                                        <label for="tel" class="col-md-4 control-label">Broj telefona</label>

                                        <div class="col-md-8">
                                            <input id="tel" type="text" class="form-control" name="tel" value="{{ $animal->tel }}">

                                            @if ($errors->has('tel'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('tel') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                  </div>
                                  <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button> -->

                                  </div>
                                </div>
                              </div>
                            </div>



                            <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModal3Label">Veterinar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body" class="width:40%;">
                                    <div class="box-body">


                                    <div class="form-group">
                                      <label>Opis problema</label>
                                      <input type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                      <label>Kada se problem javio</label>
                                      <input type="text" class="form-control" placeholder="">
                                    </div>

                                    <!-- textarea -->
                                    <div class="form-group">
                                      <label>Detaljniji opis</label>
                                      <textarea class="form-control" rows="3" placeholder="Da li postoji gubitak dlake, promene boje dlake i koze ... "></textarea>
                                    </div>

                                    <!-- input states -->
                                    <div class="form-group has-success">
                                      <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Dijagnoza</label>
                                      <input type="text" class="form-control" id="inputSuccess" placeholder="Enter ...">
                                      <span class="help-block"></span>
                                    </div>
                                    <div class="form-group has-warning">
                                      <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Anamneza</label>
                                      <input type="text" class="form-control" id="inputWarning" placeholder="Enter ...">
                                      <span class="help-block"></span>
                                    </div>
                                    <div class="form-group has-error">
                                      <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Ektoparazit</label>
                                      <input type="text" class="form-control" id="inputError" placeholder="Enter ...">
                                      <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                      <label>Intervencija</label>
                                      <textarea class="form-control" rows="3" placeholder="Dati medicinski preparati... "></textarea>
                                    </div>

                                    <!-- checkbox -->
                                    <div class="form-group">
                                      <label>Životinja se:</label>
                                      <div class="checkbox">
                                        <label>
                                          <input type="checkbox">
                                          Češe
                                        </label>
                                      </div>

                                      <div class="checkbox">
                                        <label>
                                          <input type="checkbox">
                                          Grize
                                        </label>
                                      </div>
                                      <div class="checkbox">
                                        <label>
                                          <input type="checkbox">
                                          Liže
                                        </label>
                                      </div>
                                      <div class="checkbox">
                                        <label>
                                          <input type="checkbox">
                                          Češe lice
                                        </label>
                                      </div>
                                      <div class="checkbox">
                                        <label>
                                          <input type="checkbox">
                                          Grize šape
                                        </label>
                                      </div>


                                    </div>

                                    <!-- radio -->
                                    <div class="form-group">
                                      <div class="radio">
                                        <label>
                                          <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                          Počelo je naglo
                                        </label>
                                      </div>
                                      <div class="radio">
                                        <label>
                                          <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                          Počelo je postepeno
                                        </label>
                                      </div>

                                    </div>

                                    <!-- select -->
                                    <div class="form-group">
                                      <label>Javlja se</label>
                                      <select class="form-control">
                                        <option>Danju</option>
                                        <option>Noću</option>
                                        <option>Unutra</option>
                                        <option>Napolju</option>

                                      </select>
                                    </div>

                                  </div>
                                </div>
                                  <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button> -->

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

        @endif
    </div>
</div>
@endsection
