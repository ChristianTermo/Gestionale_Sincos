<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('/css/newdipendente.css') }}" /> 
        <link rel="stylesheet" href="{{ asset('/css/visualFerie.css') }}" /> 
        <title>Lista richieste ferie </title>
    </head>
    <body>
        @include('navAdm')
        <!-- button container-->
        <section id="main">
            <div class="dimensionb">
                <h1 id="actionname">Lista richieste ferie</h1>
                <h5 id="actionname">Se l'approvazione è 1 la richiesta è stata accettata</h5>
                <table>
                    <tr>
                       <th>Approvazione</th>
                        <th>Data di richiesta</th>
                        <th>Nome</th>
                        <th>Cognome</th>
                        <th>Inizio Ferie </th>
                        <th>Fine Ferie</th>
                        <th>Note</th>
                    </tr>
                    @foreach ($holidaysList as $holidayList)
                        <tr>
                            <td>{{ $holidayList->accepted }}</td>
                            <td>{{ $holidayList->giorno_richiesta }}</td>
                            <td>{{ $holidayList->nome }}</td>
                            <td>{{ $holidayList->cognome}}</td>
                            <td>{{ $holidayList->ferie_da}}</td>
                            <td>{{ $holidayList->ferie_a }}</td>
                            <td>{{ $holidayList->note }}</td>
                        </tr>
                    @endforeach
                    </table>
            </div>
        </section>
    </body>
</html>
