<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/css/formoduli.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <title>Modifica miei dati</title>
  <script type="text/javascript">
    function init() {
      var x = document.getElementById("npassword");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }

    function init2() {
      var x = document.getElementById("npasswordR");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>
</head>

<body>
  <div class="cardbase">
    <!-- barra in alto -->
    <div class="topper">
      <!-- bottone indietro-->
      <div id="forback">
        <form action="{{ route('panel') }}" method="get">
          <button id="back">
        </form>
        <svg width="40%" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M21 4C21 3.44772 20.5523 3 20 3C19.4477 3 19 3.44772 19 4V11C19 11.7956 18.6839 12.5587 18.1213 13.1213C17.5587 13.6839 16.7956 14 16 14H6.41421L9.70711 10.7071C10.0976 10.3166 10.0976 9.68342 9.70711 9.29289C9.31658 8.90237 8.68342 8.90237 8.29289 9.29289L3.29289 14.2929C2.90237 14.6834 2.90237 15.3166 3.29289 15.7071L8.29289 20.7071C8.68342 21.0976 9.31658 21.0976 9.70711 20.7071C10.0976 20.3166 10.0976 19.6834 9.70711 19.2929L6.41421 16H16C17.3261 16 18.5979 15.4732 19.5355 14.5355C20.4732 13.5979 21 12.3261 21 11V4Z" fill="#000000" />
        </svg>
        </button>
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
      <h1 id="bannerintro">Cambia Password</h1>
      <div class="container">
        <form action="{{ route('submitNewPassword') }}" method="post">
          @csrf
          <div class="personald">
            <div class="rowsection">
              <div class="col-25" id="onlyforP2">
                <label for="npassword">Nuova Password</label>
              </div>
              <div class="col-75">
                <input type="password" id="npassword" name="password" placeholder="nuova password">
                <i class="far fa-eye" id="togglePassword" onclick="init()" style="margin-left: -30px; cursor: pointer;"></i>
                </input>
              </div>
              <div class="rowsection">
                <div class="col-25" id="onlyforP">
                  <label for="npasswordR">Ripeti Nuova Password</label>
                </div>
                <div class="col-75">
                  <input type="password" id="npasswordR" name="password_confirmation" placeholder="ripeti password">
                  <i class="far fa-eye" id="togglePassword2" onclick="init2()" style="margin-left: -30px; cursor: pointer;"></i>
                  </input>
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <button class="submit" type="submit" class="btn btn-success">Invia</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>

<style>
  .rowsection {
    text-align: center;
  }


  #onlyforP,
  #onlyforP2,
  #onlyforP3 {
    margin-top: 3%;
  }

  form {
    text-align: center;
  }

  #bannerintro {
    text-align: center;
    font-family: 'Roboto Mono', monospace;
    margin: auto;
  }

  #containerform {
    padding: 3%;
  }

  #vpassword {
    background-color: white;
    color: black;
    border: 2px solid black;
    padding: 15px;
    min-height: 15px;
    min-width: 115px;
    font-size: 100%;
    width: 30%;
    margin: auto;
  }

  #npassword,
  #npasswordR {
    width: 30%;
  }
</style>