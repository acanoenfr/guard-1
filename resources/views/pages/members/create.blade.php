@extends("layout.panel")
@section("title", $title)

@section("content")
    <h1>Ajouter un membre</h1>
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
    <form method="post" action="{{ route('members.store') }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-6 form-group">
                <label for="surname">Nom</label>
                <input type="text" id="surname" name="surname" class="form-control">
            </div>
            <div class="col-6 form-group">
                <label for="firstname">Prénom</label>
                <input type="text" id="firstname" name="firstname" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-8 form-group">
                <label for="address">Adresse</label>
                <input type="text" id="address" name="address" class="form-control">
            </div>
            <div class="col-2 form-group">
                <label for="postal_code">Code postal</label>
                <input type="text" id="postal_code" name="postal_code" class="form-control">
            </div>
            <div class="col-2 form-group">
                <label for="city">Ville</label>
                <input type="text" id="city" name="city" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-4 form-group">
                <label for="mail">Adresse e-mail</label>
                <input type="email" id="mail" name="mail" class="form-control">
            </div>
            <div class="col-4 form-group">
                <label for="phone">Téléphone</label>
                <input type="number" id="phone" name="phone" class="form-control">
            </div>
            <div class="col-4 form-group">
                <label for="group">Groupe</label>
                <select name="group" id="group" class="form-control">
                    <option value="" default>-- Choississez le groupe --</option>
                    <option value="0">Non membre</option>
                    <option value="1">Membre</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-4 form-group">
                <label for="formation">Formation</label>
                <select id="formation" name="formation" class="form-control">
                    <option value="" default>-- Choississez la formation --</option>
                    <option value="Systèmes Numériques">Systèmes Numériques</option>
                    <option value="Electrotechnique">Electrotechnique</option>
                    <option value="Contrôle Industriel et Régulation Automatique">Contrôle Industriel et Régulation Automatique</option>
                    <option value="Conception et Realisation de Systèmes Automatiques">Conception et Realisation de Systèmes Automatiques</option>
                </select>
            </div>
            <div class="col-4 form-group">
                <label for="entry_year">Année d'entrée</label>
                <input type="number" id="entry_year" name="entry_year" class="form-control">
            </div>
            <div class="col-4 form-group">
                <label for="obtaining_year">Année d'obtention</label>
                <input type="number" id="obtaining_year" name="obtaining_year" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-4 form-group">
                <label for="study_text">Informations sur les études</label>
                <textarea name="study_text" id="study_text" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <div class="col-4 form-group">
                <label for="enterprise_info">Informations sur l'entreprise</label>
                <textarea name="enterprise_info" id="enterprise_info" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <div class="col-4 form-group">
                <label for="notepad">Bloc-notes</label>
                <textarea name="notepad" id="notepad" cols="30" rows="5" class="form-control"></textarea>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fa fa-user-plus"></i> Ajouter un membre</button>
        </div>
    </form>
@endsection