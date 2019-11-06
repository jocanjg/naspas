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

<div class="jumbotron text-center">

  <img src="{{ asset('storage/'.$animals['picture']) }}" alt="">

</div>

<div class="container">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Informacije</th>
            <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Ime životinje</th>
      <td>{{ $animals['dname'] }}</td>
    </tr>
    <tr>
      <th scope="row">Chip</th>
      <td>{{ $animals['chip'] }}</td>
    </tr>
    <tr>
      <th scope="row">Starost</th>
      <td>{{ $animals['age'] }}</td>
    </tr>
    <tr>
      <th scope="row">Adresa</th>
      <td>{{ $animals['address'] }}</td>
    </tr>
    <tr>
      <th scope="row">Hirurška intervencija</th>
      <td>{{ $animals['hirurg'] }}</td>
    </tr>
    <tr>
      <th scope="row">Težina</th>
      <td>{{ $animals['tezina'] }}</td>
    </tr>
  </tbody>
</table>
</div>

</body>
</html>
