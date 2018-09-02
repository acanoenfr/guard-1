@extends("layout.default")
@section("title", $title)

@section("content")
    @if(Session::has("success"))
        <div class="alert alert-success">
            {{ Session::get("success") }}
        </div>
    @endif
    <div class="jumbotron">
        <h1>Bienvenue sur Guard-1 !</h1>
        <hr>
        <a href="/login" class="btn btn-outline-primary"><i class="fa fa-sign-in"></i> Accéder au tableau de bord</a>
    </div>
@endsection