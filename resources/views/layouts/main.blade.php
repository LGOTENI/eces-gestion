<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link
            rel="shortcut icon"
            href="{{ asset('assets/images/favicon1.ico') }}"
        />
        <link
            rel="stylesheet"
            href="{{ asset('assets/bootstrap/main.css') }}"
        />
        <link
            rel="stylesheet"
            href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}"
        />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link
            rel="stylesheet"
            href="//cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"
        />
        <title>GESTION FACTURE</title>
    </head>
    <body id="body-pd">
        <header class="header" id="header">
            <div class="header_toggle">
                <i class="bx bx-menu" id="header-toggle"></i>
            </div>
            <div>
                <div>

                </div>
            </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="" class="nav_logo">
                        <i class="bx bx-layer nav_logo-icon"> </i>
                        <span class="nav_logo-name">GESTION</span>
                    </a>
                    <div class="nav_list">
                        <a
                            href="{{ route('index') }}"
                            class="{{ Route::current()->getName() == 'index' ? 'nav_link active': 'nav_link' }}"
                        >
                            <i class="bx bx-grid-alt nav_icon"></i>
                            <span class="nav_name">ACCUEIL</span>
                        </a>
                        <a
                            href="{{ route('client.index') }}"
                            class="{{ Route::current()->getName() == 'client.index' ? 'nav_link active': 'nav_link' }}"
                        >
                            <i class="bx bx-user nav_icon"></i>
                            <span class="nav_name">CLIENTS </span>
                        </a>
                        <a href="" class="{{ Route::current()->getName() == 'stats' ? 'nav_link active': 'nav_link' }} ">
                            <i class="bx bx-bar-chart-alt-2 nav_icon"></i>
                            <span class="nav_name">STATS</span>
                        </a>
                    </div>

                    </div>
                </div>

            </nav>
        </div>
        <!--Container Main start-->
        <div class="">
            <div class="container center">@yield("contenue")</div>
        </div>
        <script src="{{ asset('assets/js/main2.js') }}"></script>
        <script src="{{
                asset('/assets/bootstrap/js/bootstrap.bundle.js')
            }}"></script>
        <script src="{{
                asset('assets/bootstrap/js/bootstrap.min.js')
            }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </body>
</html>
