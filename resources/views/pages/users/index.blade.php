@extends("layout.panel")
@section("title", $title)

@section("content")
    <h1>Liste des utilisateurs</h1>
    <a href="/users/create" class="btn btn-outline-success"><i class="fa fa-plus"></i> Ajouter un utilisateur</a>
    <hr>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">E-mail</th>
                <th scope="col">Rôle</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user['id'] }}</td>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['mail'] }}</td>
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
                    <td>
                        <a href="/users/{{ $user['id'] }}" class="btn btn-outline-primary"><i class="fa fa-user"></i> Profil</a>
                        <a href="/users/{{ $user['id'] }}/edit" class="btn btn-outline-warning"><i class="fa fa-edit"></i> Modifier</a>
                        <form method="post" action="{{ route('users.destroy', $user['id']) }}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-outline-danger"><i class="fa fa-remove"></i> Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection