<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CGIS</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
                <a href="{{ url('/home') }}">Citas</a>
            @else
                <a href="{{ url('/login') }}">INICIAR SESIÓN</a>
                <a href="{{ url('/register') }}">REGISTRARSE</a>
            @endif
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            <a href="{{ route('login') }}"><img src={{ asset('CitasAdvancedLogo.PNG') }} title="AskForHealth" alt="Logo de Gestión de Citas Avanzado"></a>        </div>
        <div>
            AskforHealth es una herramienta para la gestión de citas hospitalarias. <br> <br>
        </div>

        <div class="links">
            <a href="https://ev.us.es/webapps/blackboard/execute/modulepage/view?course_id=_34532_1&cmp_tab_id=_81279_1&mode=view" target="_blank">Codificación y Gestión de la información Sanitaria</a>
            <a href="https://www.us.es/" target="_blank">UNIVERSIDAD DE SEVILLA</a>
            <div align="right">
                Ana Rodríguez Gualda
            </div>
        </div>
    </div>
</div>
</body>
</html>
