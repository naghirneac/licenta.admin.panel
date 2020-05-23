<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Managementul timpului de lucru ai angajaților</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #e6e6e6;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            a{
                padding: 5px;
                border: 1px solid darkblue;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="links">
                    @auth
                        @if(Auth::user()->isDisabled())
                            <div class="jumbotron" align="center">
                                <h1 class="display-4" style="color: #0b3e6f;">Salut, {{Auth::user()->name}}!</h1>
                                <p class="lead" style="color: #0b3e6f;">Bine ați venit în aplicația „Managementul timpului de lucru ai angajaților”.</p>
                                <hr class="my-4">
                                <p style="color: #0b3e6f;">Profilul Dvs. este <b>deactivat</b>. Adresați-vă la administrator.</p>
                                <strong>
                                    <a href="{{ url('/') }}" style="color: #0b3e6f; text-decoration: none">Acasă</a>
                                </strong>
                        @elseif(Auth::user()->isUser())
                            <div class="jumbotron" align="center">
                                <h1 class="display-4" style="color: #0b3e6f;">Salut, {{Auth::user()->name}}!</h1>
                                <p class="lead" style="color: #0b3e6f;">Bine ați venit în aplicația „Managementul timpului de lucru ai angajaților”.</p>
                                <hr class="my-4">
                                <p style="color: #0b3e6f;">Dumneavoastră v-ați logat în calitate de <b>utilizator</b>.</p>
                                <strong>
                                    <a href="{{ url('/') }}" style="color: #0b3e6f; text-decoration: none">Acasă</a>
                                </strong>
                                <strong>
                                    <a href="{{ url('/user/index') }}" style="color: #0b3e6f; text-decoration: none">Cabinet</a>
                                </strong>
                        @elseif(Auth::user()->isVisitor())
                            <strong>
                                <a href="{{ url('/') }}" style="color: #0b3e6f; text-decoration: none">Acasă</a>
                            </strong>
                        @elseif(Auth::user()->isAdministrator())
                            <div class="jumbotron" align="center">
                                <h1 class="display-4" style="color: #0b3e6f;">Salut, {{Auth::user()->name}}!</h1>
                                <p class="lead" style="color: #0b3e6f;">Bine ați venit în aplicația „Managementul timpului de lucru ai angajaților”.</p>
                                <hr class="my-4">
                                <p style="color: #0b3e6f;">Dumneavoastră v-ați logat în calitate de <b>administrator</b>.</p>
                                <strong>
                                    <a href="{{ url('/') }}" style="color: #0b3e6f; text-decoration: none">Acasă</a>
                                </strong>
                                <strong>
                                    <a href="{{ url('/admin/index') }}" style="color: #0b3e6f; text-decoration: none">Panoul de administrator</a>
                                </strong>
                        @endif

                                <strong>
                                    <a class="dropdown-item" href="{{ route('logout') }}" style="color: #0b3e6f; text-decoration: none"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        Ieșire
                                    </a>
                                </strong>
                            </div>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                            @csrf
                        </form>

                    @else
                        <div class="jumbotron" align="center">
                            <h1 class="display-4" style="color: #0b3e6f;">Bine ați venit!</h1>
                            <p class="lead" style="color: #0b3e6f;">Bine ați venit în aplicația „Managementul timpului de lucru ai angajaților”.</p>
                            <hr class="my-4">
                            <p style="color: #0b3e6f;">Această aplicație gestionează timpul de lucru ai angajaților.
                                <br> Elaborată de Naghirneac Ana. IS31Z. 2020.</p>
                            <strong>
                                <a href="{{ route('login') }}" style="color: #0b3e6f; text-decoration: none">Logare</a>
                            </strong>

                            @if (Route::has('register'))
                                <strong>
                                    <a href="{{ route('register') }}" style="color: #0b3e6f; text-decoration: none">Înregistrare</a>
                                </strong>
                            @endif
                        </div>

                    @endauth
                </div>
            @endif
        </div>
    </body>
</html>
