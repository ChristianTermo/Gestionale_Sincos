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
            <h1 id="actionname"> Lista richieste ferie</h1>
           <!-- <div class="scletaS">
                <select name="valutato" id="val-select">
                    <option value="ongoing">- da valutare</option>
                    <option value="completed">- valutate</option>
                </select>
            </div>-->
            <form action="{{ route('acceptHolidays') }}" method="post">
                @csrf
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
                    @foreach ($holidays as $holiday)
                    <tr>
                        <td>
                            <!-- <label for="accepted">Si</label>
                                <input type="radio" id="accepted" name="accepted" value="true">
                                <label for="accepted">No</label>
                                <input type="radio" id="accepted" name="accepted" value="false">-->
                            <select name="accepted">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </td>
                        <td>{{ $holiday->giorno_richiesta }}</td>
                        <td>{{ $holiday->nome }}</td>
                        <td>{{ $holiday->cognome}}</td>
                        <td>{{ $holiday->ferie_da}}</td>
                        <td>{{ $holiday->ferie_a }}</td>
                        <td>
                            <textarea name="note" id="" cols="10" rows="5"></textarea>
                        </td>
                    </tr>
                    @endforeach
                </table>

                <div class="row">
                    <button class="submit" type="submit" class="btn btn-success">Invia</button>
                </div>
            </form>
        </div>
    </section>
</body>

</html>