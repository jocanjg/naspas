<!DOCTYPE html>
<html lang="en">
<head>
  <title>Profil {{ $animals['dname'] }}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
  <style media="screen">
    th {
      background-color:#DCDCDC;
    }
  </style>
<div class="container">
  <div class="raw">
    <div class="col-sm-12">
      <h3>IZJAVA</h3>
      <p>Ovim potvrdjujem da, uz saglasnost Veterinarske ambulante za kucne ljubimce JKP '3 Oktobar', preuzimam na staranje {{ $animals['dname'] }} ( {{ $animals['chip'] }}), koji je u Veterinarskoj ambulanti pri Zoohigijeni prosao trijazni pregled.</p>
      <p>Nad psom je izvrsena dehelmintizacija, sterilizacija, vakcinacija (antirabicna) i obelezavanje (mikro-chip).</p>
      <p>Preuzimanje zivotinja na staranje iz stava 1 ove Izjave, obavezujem se da cu se brinuti o istim i da cu ga redovno, na zahtev nadlezne veterinarske inspekcije, vakcinisati protiv besnila i vrsiti dehelmintizaciju, kao i da cu snositi troskove u vezi sa brigom o njima.</p>
      <p>Takodje izjavljujem da, danom preuzimanja psa, preuzimam odgovornost za stetu koju preuzeti pas pricini na javnim mestima trecim licima.</p>
      <p>Preuzeti pas boravice na adresi {{ $animals['vaddress'] }} ________________, a za slucaj davanja na udomljavanje obavezujem se da cu obezbediti saglasnost nadleznog organa, kao i potpisanu Izjavu novog staraoca</p>
  </div>
    <div class="raw">
  <div class="col-sm-3">
    Zoohigijena
  </div>
  <div class="col-sm-3 float-right">
    Vlasnik
  </div>
</div>
</div>

</body>
</html>
