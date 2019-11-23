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

  <div class="col-sm-5 float-right">
  <img src="{{ asset('storage/'.$animals['picture']) }}" alt="" width="100%">

    <h4>Opis</h4>
    <p>{{ $animals['text'] }}</p>
  

  </div>

<div class="col-sm-6">
  <table class="table">
  <thead>
    <tr>
      <th scope="col" style="background-color:#605ca8; color:white;">Informacije o životinji</th>
            <th scope="col" style="background-color:#605ca8; color:white;"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row" style="background-color:#DCDCDC;">Ime životinje</th>
      <td>{{ $animals['dname'] }}</td>
    </tr>
    <tr>
      <th scope="row" >Chip</th>
      <td>{{ $animals['chip'] }}</td>
    </tr>
    <tr>
      <th scope="row" >Starost</th>
      <td>{{ $animals['age'] }} god</td>
    </tr>
    <tr>
      <th scope="row" >Adresa</th>
      <td>{{ $animals['address'] }}</td>
    </tr>
    <tr>
      <th scope="row" >Hirurška intervencija</th>
      <td>{{ $animals['hirurg'] }}</td>
    </tr>
    <tr>
      <th scope="row" >Težina</th>
      <td>{{ $animals['tezina'] }}</td>
    </tr>
    <tr>
      <th scope="row" >Velicina</th>
      <td>{{ $animals['size'] }}</td>
    </tr>

  </tbody>
  </table>
</div>

<div class="col-sm-6">
  <table class="table">
  <thead>
    <tr>
      <th scope="col" style="background-color:#605ca8; color:white;">Informacije o vlasniku</th>
            <th scope="col" style="background-color:#605ca8; color:white;"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row" style="background-color:#DCDCDC;">Ime</th>
      <td>{{ $animals['vfirstname'] }}</td>
    </tr>
    <tr>
      <th scope="row" >Prezime</th>
      <td>{{ $animals['vlastname'] }}</td>
    </tr>
    <tr>
      <th scope="row" >Adresa</th>
      <td>{{ $animals['vaddress'] }}</td>
    </tr>
    <tr>
      <th scope="row" >Telefon</th>
      <td>{{ $animals['tel'] }}</td>
    </tr>
  </tbody>
  </table>
</div>

  </div>
</div>

</body>
</html>
