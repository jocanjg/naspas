 <!DOCTYPE html>
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
      td, th {
        border: solid 2px;
        padding: 10px 5px;
      }
      tr {
        text-align: center;
      }
      .container {
        width: 100%;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div class="container">
        <div><h1>NASPAS</h1><h2>Lista unetih životinja od {{$searchingVals['from']}} do {{$searchingVals['to']}}</h2></div>
       <table id="example2" role="grid">
            <thead>
              <tr role="row">
                <th width="15%">Ime Korsinika</th>
                <th width="20%">Čip</th>
                <th width="10%">Starost</th>
                <th width="15%">Lokacija</th>

              </tr>
            </thead>
            <tbody>
            @foreach ($animals as $animal)
                <tr role="row" class="odd">
                  <td>{{ $animal['pname'] }} </td>
                  <td>{{ $animal['chip'] }}</td>
                  <td>{{ $animal['age'] }}</td>
                  <td>{{ $animal['address'] }}</td>


              </tr>
            @endforeach
            </tbody>
          </table>
    </div>
  </body>
</html>
