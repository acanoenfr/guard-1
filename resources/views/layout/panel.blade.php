<!DOCTYPE html>
    <html lang="{{ app()->getLocale() }}">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <title>@yield("title") | Guard-1</title>
            <link rel="stylesheet" href="/css/bootstrap.css">
            <link rel="stylesheet" href="/css/font-awesome.css">
            <link rel="stylesheet" href="/css/style.css">
        </head>
        <body>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                <a href="" class="navbar-brand"><i class="fa fa-users"></i> {{ \Session::get('name') }}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="/dashboard" class="nav-link"><i class="fa fa-home"></i> Tableau de bord</a></li>
                        @if(\Session::get('role') === 2)
                            <li class="nav-item"><a href="/users" class="nav-link"><i class="fa fa-lock"></i> Utilisateurs</a></li>
                        @endif
                        @if(\Session::get('role') > 0)
                            <li class="nav-item"><a href="/members" class="nav-link"><i class="fa fa-users"></i> Membres</a></li>
                        @endif
                        <li class="nav-item"><a href="/account" class="nav-link"><i class="fa fa-cogs"></i> Mon compte</a></li>
                        <li class="nav-item"><a href="/logout" class="btn btn-danger"><i class="fa fa-sign-out"></i> Se déconnecter</a></li>
                    </ul>
                </div>
            </nav>
            <div class="template">
                @yield("content")
                <hr>
                <footer class="footer">
                    <p>&copy; Copyright 2017</p>
                </footer>
            </div>
            <script src="/js/jquery.js"></script>
            <script src="/js/popper.js"></script>
            <script src="/js/bootstrap.js"></script>
            <script src="/js/script.js"></script>
        </body>
    </html>