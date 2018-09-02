@extends("layout.panel")
@section("title", $title)

@section("content")
    <h1>Mon compte</h1>
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
    <form method="post" action="{{ route('postAccount') }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="row">
            <div class="form-group col-4">
                <label for="actual_password">Mot de passe actuel</label>
                <input type="password" id="actual_password" name="actual_password" class="form-control">
            </div>
            <div class="form-group col-4">
                <label for="new_password">Nouveau mot de passe</label>
                <input type="password" id="new_password" name="new_password" class="form-control">
            </div>
            <div class="form-group col-4">
                <label for="password_confirmation">Confirmation du mot de passe</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> Modifier mon mot de passe</button>
        </div>
    </form>
@endsection