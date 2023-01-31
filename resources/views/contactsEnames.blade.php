<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('/css/newdipendente.css') }}" /> 
        <title>Anagrafica Dipendenti </title>
    </head>
    <body>
        @include('navAdm')
        <!-- button container-->
        <section id="main">
            <div class="dimensionb">
                    <h1 id="actionname">Anagrafica e Contatti</h1>
                    <table>
                        <tr>
                            <th>Matricola</th>
                            <th>Nome</th>
                            <th>Cognome</th>
                            <th>Indirizzo</th>
                            <th>Città</th>
                            <th>Provincia</th>
                            <th>CAP</th>
                            <th>Numero</th>
                            <th>Email personale</th>
                            <th>Email Aziendale</th>
                            <th>Giorni Ferie annuali</th>
                            <th>Ore Permesso annuali</th>
                            <th>Ore Contratto</th>                           
                        </tr>
                          @foreach ($users as $user)
                            <tr>
                                <td>{{$user->matricola}}</td>
                                <td>{{$user->nome}}</td>
                                <td>{{$user->cognome}}</td>
                                <td>{{$user->indirizzo}}</td>
                                <td>{{$user->città}}</td>
                                <td>{{$user->provincia}}</td>
                                <td>{{$user->cap}}</td>
                                <td>{{$user->telefono}}</td>
                                <td>{{$user->email_personale}}</td>
                                <td>{{$user->email_aziendale}}</td>
                                <td>{{$user->giorni_ferie_anno}}</td>
                                <td>{{$user->ore_permesso_annuali}}</td>
                                <td>{{$user->ore_contratto}}</td>
                            </tr>
                          @endforeach
                    </table>
            </div>
        </section>
    </body>
</html>

<style>

.dimensionb{
  width: 85%;
  background-color: #D9E5FF;
  margin: auto;
  margin-top:1%;
  min-height: 86vh;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
}

td input{
  text-align: center;
}

td, th{
  padding:0 5% 0 0; /* Only right padding*/
  border-right: 1px solid black;
}


table{
  width: 80%;
  table-layout:fixed;
  border-collapse: collapse;
  margin: auto;
  margin-bottom: 5%;
  display: block;
  overflow-x: auto;
}

tr:nth-child(even) {
  background-color: white;
}

td  {
  padding: 15px;
  height: 50px;
  overflow: auto;
  word-break: break-word;
}

th  {
  padding: 0 35px 0;
  white-space: nowrap;
}

tr {
  border-bottom: 1px solid black;
}

#val-select{
  border-radius: .2em;

  padding: .5em;
}
h1{
  margin-bottom: 0;
}
#actionname{
  margin-bottom:2%;
}
</style>