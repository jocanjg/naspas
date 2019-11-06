<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
    table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
}

      .container {
        width: 100%;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div class="container">
        <div><h1>NASPAS</h1><h2>Profil zivotinje </h2></div>
       <table id="example2" role="grid">
            <thead>
              <tr role="row">
                <th width="15%">Ime</th>
                <th width="20%">Chip</th>
                  <th width="20%">Chip</th>
                <th width="10%">Starost</th>
                <th width="15%">Lokacija</th>
                <th width="15%">Hir. intervencija</th>
                  <th width="15%">Datum</th>
                    <th width="15%">Pol</th>
                      <th width="15%">Tezina</th>


              </tr>
            </thead>
            <tbody>

                <tr role="row" class="odd">
                  <td>{{ $animals['dname'] }} </td>
                  <td><img  src="{{ asset('storage/'.$animals['picture']) }}" class="img-fluid" style="width:100%; height:100%;"/></td>
                  <td>{{ $animals['chip'] }}</td>
                  <td>{{ $animals['age'] }}</td>
                  <td>{{ $animals['address'] }}</td>
                  <td>{{ $animals['hirurg'] }}</td>
                  <td>{{ $animals['date'] }}</td>
                  <td>{{ $animals['gender'] }}</td>
                  <td>{{ $animals['tezina'] }}</td>
              </tr>

            </tbody>
          </table>
    </div>
  </body>
</html>
