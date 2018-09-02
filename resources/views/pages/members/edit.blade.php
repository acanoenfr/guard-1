@extends("layout.panel")
@section("title", $title)

@section("content")
    <h1>Editer un membre</h1>
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
    <form method="post" action="{{ route('members.update', $member['id']) }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="row">
            <div class="col-6 form-group">
                <label for="surname">Nom</label>
                <input type="text" id="surname" name="surname" class="form-control" value="{{ $member['surname'] }}" readonly>
            </div>
            <div class="col-6 form-group">
                <label for="firstname">Prénom</label>
                <input type="text" id="firstname" name="firstname" class="form-control" value="{{ $member['firstname'] }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-8 form-group">
                <label for="address">Adresse</label>
                <input type="text" id="address" name="address" class="form-control" value="{{ $member['address'] }}">
            </div>
            <div class="col-2 form-group">
                <label for="postal_code">Code postal</label>
                <input type="text" id="postal_code" name="postal_code" class="form-control" value="{{ $member['postal_code'] }}">
            </div>
            <div class="col-2 form-group">
                <label for="city">Ville</label>
                <input type="text" id="city" name="city" class="form-control" value="{{ $member['city'] }}">
            </div>
        </div>
        <div class="row">
            <div class="col-4 form-group">
                <label for="mail">Adresse e-mail</label>
                <input type="email" id="mail" name="mail" class="form-control" value="{{ $member['mail'] }}">
            </div>
            <div class="col-4 form-group">
                <label for="phone">Téléphone</label>
                <input type="number" id="phone" name="phone" class="form-control" value="{{ $member['phone'] }}">
            </div>
            <div class="col-4 form-group">
                <label for="group">Groupe</label>
                <select name="group" id="group" class="form-control">
                    <option value="{{ $member['group'] }}">Conserver le groupe</option>
                    <option value="0">Non membre</option>
                    <option value="1">Membre</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-4 form-group">
                <label for="formation">Formation</label>
                <input type="text" id="formation" name="formation" value="{{ $member['formation'] }}" class="form-control" readonly>
            </div>
            <div class="col-4 form-group">
                <label for="entry_date">Date d'entrée</label>
                <input type="number" id="entry_date" name="entry_year" value="{{ $member['entry_year'] }}" class="form-control" readonly>
            </div>
            <div class="col-4 form-group">
                <label for="obtaining_date">Date d'obtention</label>
                <input type="number" id="obtaining_date" name="obtaining_year" value="{{ $member['obtaining_date'] }}" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-4 form-group">
                <label for="study_text">Informations sur les études</label>
                <textarea name="study_text" id="study_text" cols="30" rows="5" class="form-control">{{ $member['study_text'] }}</textarea>
            </div>
            <div class="col-4 form-group">
                <label for="enterprise_info">Informations sur l'entreprise</label>
                <textarea name="enterprise_info" id="enterprise_info" cols="30" rows="5" class="form-control">{{ $member['enterprise_info'] }}</textarea>
            </div>
            <div class="col-4 form-group">
                <label for="notepad">Bloc-notes</label>
                <textarea name="notepad" id="notepad" cols="30" rows="5" class="form-control">{{ $member['notepad'] }}</textarea>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Editer un membre</button>
        </div>
    </form>
@endsection