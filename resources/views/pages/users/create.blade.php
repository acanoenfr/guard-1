@extends("layout.panel")
@section("title", $title)

@section("content")
    <h1>Ajouter un utilisateur</h1>
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
    <form method="post" action="{{ route('users.store') }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-3 form-group">
                <label for="name">Nom de l'utilisateur</label>
                <input type="text" id="name" name="name" placeholder="Ex: DOE John" class="form-control">
            </div>
            <div class="col-3 form-group">
                <label for="mail">E-mail de l'utilisateur</label>
                <input type="email" id="mail" name="mail" placeholder="Ex: john.doe@example.com" class="form-control">
            </div>
            <div class="col-3 form-group">
                <label for="pass">Mot de passe l'utilisateur</label>
                <input type="password" id="pass" name="pass" class="form-control">
            </div>
            <div class="col-3 form-group">
                <label for="role">Rôle de l'utilisateur</label>
                <select name="role" id="role" class="form-control">
                    <option value="0" default>Utilisateur standard</option>
                    <option value="1">Modérateur</option>
                    <option value="2">Administrateur</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fa fa-user-plus"></i> Ajouter un utilisateur</button>
        </div>
    </form>
@endsection