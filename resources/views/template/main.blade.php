<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="routeHome" content="{{ route('home') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-status-bar-style" content="white">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.8/styles/solarized-light.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.8/highlight.min.js"></script>
    <title>Scratch | @yield('title_text')</title>
</head>
<body>
    @include('template/header')
    <div class="connexion-popup">
        <div class="connexion-popup-content">
            <p>Bienvenue, veuillez saisir vos identifiants :</p>
            <input placeholder="Identifiant" name="name" type="text" class="connexion-name">
            <input placeholder="Mot de passe" type="password" name="mdp" class="connexion-mdp">
            <button route="{{ route('login') }}" class="btn connexion-button">Envoyer</button>
            <p class="errorCon"></p>
            <p><a class="link-txt" href="#">Pas encore inscrit ? Inscrivez vous !</a></p>
        </div>
        <div class="register-popup-content">
            <p>Bienvenue, veuillez choisir vos identifiants :</p>
            <input placeholder="Identifiant" name="name" type="text" class="register-name">
            <input placeholder="Mail" name="mail" type="email" class="register-mail">
            <input placeholder="Mot de passe" type="password" name="mdp" class="register-mdp">
            <button route="{{ route('register') }}" class="btn register-button">Envoyer</button>
            <p class="error"></p>
            <p><a class="link-txt" href="#">Déjà inscrit ? Connectez vous !</a></p>
        </div>
    </div>
    <div class="wrapper">
        @yield('content')
    </div>
    @include('template/footer')
    <script src="{{ asset('js/main.js') }}"></script>
    <script>hljs.initHighlightingOnLoad();</script>
</body>
</html>