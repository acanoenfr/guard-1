@extends("layout.default")
@section("title", $title)

@section("content")
    <h1>Mot de passe oublié</h1>
    <hr>
    @if(Session::has("danger"))
        <div class="alert alert-danger">
            {{ Session::get("danger") }}
        </div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ route('postForget') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="mail">Votre adresse e-mail</label>
            <input type="email" id="mail" name="mail" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> Envoyer le lien de récupération de mot de passe</button>
        </div>
    </form>
@endsection