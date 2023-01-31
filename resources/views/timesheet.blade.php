<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <link rel="stylesheet" href="/css/formoduli.css" />
  <title>Entrate & Uscite</title>
  <script type="text/javascript">
    window.onload = init;

    function init() {
      let today = new Date();
      let hours = today.getHours();
      let mins = today.getMinutes();
      let seconds = today.getSeconds();
      let day = today.getDate();
      let month = (today.getMonth() + 1);
      let year = today.getFullYear();
      const addZero = num => {
        if (num < 10) {
          return '0' + num
        };
        return num;
      }
      $('#ora').text("All'ora:" + " " + addZero(hours) + ":" + addZero(mins));
      $('#giorno').text("del giorno" + " " + day + "/" + month + "/" + year);
    }
    setInterval(init, 1000);
  </script>
</head>

<body>
  <div class="cardbase">
    <!-- barra in alto -->
    <div class="topper">
      <!-- bottone indietro-->
      <div id="forback">
        <form action="{{ route('dashboard') }}" method="get">
          <button id="back">
            <svg width="40%" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M21 4C21 3.44772 20.5523 3 20 3C19.4477 3 19 3.44772 19 4V11C19 11.7956 18.6839 12.5587 18.1213 13.1213C17.5587 13.6839 16.7956 14 16 14H6.41421L9.70711 10.7071C10.0976 10.3166 10.0976 9.68342 9.70711 9.29289C9.31658 8.90237 8.68342 8.90237 8.29289 9.29289L3.29289 14.2929C2.90237 14.6834 2.90237 15.3166 3.29289 15.7071L8.29289 20.7071C8.68342 21.0976 9.31658 21.0976 9.70711 20.7071C10.0976 20.3166 10.0976 19.6834 9.70711 19.2929L6.41421 16H16C17.3261 16 18.5979 15.4732 19.5355 14.5355C20.4732 13.5979 21 12.3261 21 11V4Z" fill="#000000" />
            </svg>
          </button>
        </form>
      </div>
      <!-- bottone per logout-->
      <div id="forlog">
        <form action="{{ route('logout') }}" method="get">
          <button id="logout">
        </form>
        <svg fill="#000000" width="40%" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 384.971 384.971" xml:space="preserve">
          <g>
            <g id="Sign_Out">
              <path d="M180.455,360.91H24.061V24.061h156.394c6.641,0,12.03-5.39,12.03-12.03s-5.39-12.03-12.03-12.03H12.03
                   C5.39,0.001,0,5.39,0,12.031V372.94c0,6.641,5.39,12.03,12.03,12.03h168.424c6.641,0,12.03-5.39,12.03-12.03
                   C192.485,366.299,187.095,360.91,180.455,360.91z" style="fill: black;" />
              <path d="M381.481,184.088l-83.009-84.2c-4.704-4.752-12.319-4.74-17.011,0c-4.704,4.74-4.704,12.439,0,17.179l62.558,63.46H96.279
                   c-6.641,0-12.03,5.438-12.03,12.151c0,6.713,5.39,12.151,12.03,12.151h247.74l-62.558,63.46c-4.704,4.752-4.704,12.439,0,17.179
                   c4.704,4.752,12.319,4.752,17.011,0l82.997-84.2C386.113,196.588,386.161,188.756,381.481,184.088z" style="fill: black; " />
            </g>
          </g>
        </svg>
        </button>
      </div>
    </div>

    <!-- form per entrate/uscite -->
    <div id="containerform">
      <h1 id="presentation">Registrazione entrate & uscite</h1>
      <form action="{{ route('setTimesheet') }}" method="post">
        @csrf
        <div class="utente">
          <div id="nome">{{ Auth::user()->nome }}</div>
          <div id="cognome">{{ Auth::user()->cognome }}</div>
        </div>
        <div class="orario">
          <div id="clockContainer">
            <div id="ora"> </div>
            <div id="giorno"> </div>
          </div>
        </div>
        <br>
        <div class="row">
          <button class="submit" type="submit" class="btn btn-success">Invia</button>
        </div>
      </form>
    </div>
    @foreach($timesheets as $timesheet)
    <div id="presenzep">
      <h3>Timbrature:</h3>
      <p>{{ $timesheet->orario_ingresso_mattina }}</p>
      <p>{{ $timesheet->orario_uscita_mattina }}</p>
      <p>{{ $timesheet->orario_ingresso_pomeriggio }}</p>
      <p>{{ $timesheet->orario_uscita_pomeriggio }}</p>
    </div>
    @endforeach
  </div>
</body>

</html>

<style>
  #alignform,
  #presenzep {
    display: inline-block;
    padding: 3%;
    margin: 5%;
  }

  #presenzep {
    border-radius: 25px;
    border: 2px solid #73AD21;
  }

  #alignform {
    font-size: 125%;
  }

  #containerform {
    text-align: center;
  }
</style>