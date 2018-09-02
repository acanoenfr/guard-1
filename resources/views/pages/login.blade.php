@extends("layout.default")
@section("title", $title)

@section("content")
    <h1>Se connecter</h1>
    <hr>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ route('postLogin') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="mail">Votre adresse e-mail</label>
            <input type="email" id="mail" name="mail" class="form-control">
        </div>
        <div class="form-group">
            <label for="pass">Votre mot de passe</label>
            <input type="password" id="pass" name="pass" class="form-control">
        </div>
        <div class="form-group">
            <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="remember">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Se souvenir de moi</span>
            </label>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fa fa-lock"></i> Se connecter</button>
            <a href="/forget">Mot de passe oublié</a>
        </div>
    </form>
@endsection