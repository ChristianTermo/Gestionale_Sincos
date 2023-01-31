<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('/css/mainmenu.css') }}" />
    <title>Menù</title>
    <!-- script per l'orologio in tempo reale -->
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
            $('#ora').text(addZero(hours) + ":" + addZero(mins));
            $('#giorno').text("del" + " " + day + "/" + month + "/" + year);
        }
        setInterval(init, 1000);
    </script>
</head>

<body>
    <div class="basewrapper">
        <div class="Left">
            <!-- bottone per logout-->
            <form action="{{ route('logout') }}" method="get">
                @csrf
                <div id="forlog">
                    <button id="logout">
                        <svg fill="#000000" width="40%" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 384.971 384.971" xml:space="preserve">
                            <g>
                                <g id="Sign_Out">
                                    <path d="M180.455,360.91H24.061V24.061h156.394c6.641,0,12.03-5.39,12.03-12.03s-5.39-12.03-12.03-12.03H12.03
                                            C5.39,0.001,0,5.39,0,12.031V372.94c0,6.641,5.39,12.03,12.03,12.03h168.424c6.641,0,12.03-5.39,12.03-12.03
                                            C192.485,366.299,187.095,360.91,180.455,360.91z" style="fill: rgb(255,255,255);" />
                                    <path d="M381.481,184.088l-83.009-84.2c-4.704-4.752-12.319-4.74-17.011,0c-4.704,4.74-4.704,12.439,0,17.179l62.558,63.46H96.279
                                            c-6.641,0-12.03,5.438-12.03,12.151c0,6.713,5.39,12.151,12.03,12.151h247.74l-62.558,63.46c-4.704,4.752-4.704,12.439,0,17.179
                                            c4.704,4.752,12.319,4.752,17.011,0l82.997-84.2C386.113,196.588,386.161,188.756,381.481,184.088z" style="fill: rgb(255,255,255); " />
                                </g>
                            </g>
                        </svg>
                    </button>
                </div>
            </form>
            <!-- info utente -->
            <div id="littlecard">
                <div class="imgprof">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="35%" viewBox="0 0 256 256" xml:space="preserve">
                        <defs>
                        </defs>
                        <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                            <path d="M 45 0 C 20.147 0 0 20.147 0 45 c 0 24.853 20.147 45 45 45 s 45 -20.147 45 -45 C 90 20.147 69.853 0 45 0 z M 45 22.007 c 8.899 0 16.14 7.241 16.14 16.14 c 0 8.9 -7.241 16.14 -16.14 16.14 c -8.9 0 -16.14 -7.24 -16.14 -16.14 C 28.86 29.248 36.1 22.007 45 22.007 z M 45 83.843 c -11.135 0 -21.123 -4.885 -27.957 -12.623 c 3.177 -5.75 8.144 -10.476 14.05 -13.341 c 2.009 -0.974 4.354 -0.958 6.435 0.041 c 2.343 1.126 4.857 1.696 7.473 1.696 c 2.615 0 5.13 -0.571 7.473 -1.696 c 2.083 -1 4.428 -1.015 6.435 -0.041 c 5.906 2.864 10.872 7.591 14.049 13.341 C 66.123 78.957 56.135 83.843 45 83.843 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                        </g>
                    </svg>
                </div>
                <div class="nameuser">
                    <p>{{ Auth::user()->nome }} &bull; {{ Auth::user()->cognome }}</p>
                </div>
            </div>
            <!-- ora e data in contemporanea -->
            <div id="littlecard2">
                <div id="clockContainer">
                    Sono le
                    <div id="ora"> </div>
                    <div id="giorno"> </div>
                </div>
            </div>
        </div>
        <!-- Pulsanti prima divisione -->

        <div class="Right">
            <div id="checkin" class="containerbuttons">
                <form action="{{ route('timesheet') }}" method="get">
                    @csrf
                    <button type="submit">Entrate & Uscite</button>
                </form>
            </div>
            <div id="actionsetting" class="containerbuttons">
                <form action="{{ route('panel') }}" method="get">
                    @csrf
                    <button type="submit">Amministrativo</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>