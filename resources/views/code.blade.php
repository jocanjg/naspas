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
