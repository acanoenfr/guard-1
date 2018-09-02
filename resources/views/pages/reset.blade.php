@extends("layout.default")
@section("title", $title)

@section("content")
    <h1>Réinitialiser votre mot de passe</h1>
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
    <form method="post" action="{{ route('postReset', $token) }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="new_password">Nouveau mot de passe</label>
            <input type="password" id="new_password" name="new_password" class="form-control">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Nouveau mot de passe</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fa fa-refresh"></i> Réinitialiser le mot de passe</button>
        </div>
    </form>
@endsection