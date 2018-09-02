@extends("email.layout")

@section("content")
    <div class="container">
        <h1>Réinitialisation de votre mot de passe</h1>
        <p>Une demande a été récemment effectué pour réinitialiser votre mot de passe, cliquez ci-dessous pour effectuer ce changement.</p>
        <hr>
        <a href="http://localhost/reset/{{ $token }}" class="btn btn-outline-success btn-lg">Procéder au changement</a>
    </div>
@endsection