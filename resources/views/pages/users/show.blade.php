@extends("layout.panel")
@section("title", $title)

@section("content")
    <h1>Profil de {{ $user['name'] }}</h1>
    <hr>
    <table class="table table-hover">
        <tr>
            <th>Nom</th>
            <td>{{ $user['name'] }}</td>
        </tr>
        <tr>
            <th>Adresse e-mail</th>
            <td>{{ $user['mail'] }}</td>
        </tr>
        <tr>
            <th>Mot de passe</th>
            <td>********</td>
        </tr>
        <tr>
            <th>Rôle</th>
            <td>
                @switch($user['role'])
                    @case(0)
                    Utilisateur standard
                    @break
                    @case(1)
                    Modérateur
                    @break
                    @case(2)
                    Administrateur
                    @break
                @endswitch
            </td>
        </tr>
    </table>
@endsection