@extends("layout.panel")
@section("title", $title)

@section("content")
    <h1>Liste des membres</h1>
    <a href="/members/create" class="btn btn-outline-success"><i class="fa fa-plus"></i> Ajouter un membre</a>
    <hr>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Adresse</th>
            <th scope="col">Code postal</th>
            <th scope="col">Ville</th>
            <th scope="col">E-mail</th>
            <th scope="col">Téléphone</th>
            <th scope="col">Groupe</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($members as $member)
            <tr>
                <td>{{ $member['id'] }}</td>
                <td>{{ $member['surname'] }} {{ $member['firstname'] }}</td>
                <td>{{ $member['address'] }}</td>
                <td>{{ $member['postal_code'] }}</td>
                <td>{{ $member['city'] }}</td>
                <td>{{ $member['mail'] }}</td>
                <td>{{ $member['phone'] }}</td>
                <td>
                    @switch($member['group'])
                        @case(0)
                        Non membre
                        @break
                        @case(1)
                        Membre
                        @break
                    @endswitch
                </td>
                <td>
                    <a href="/members/{{ $member['id'] }}" class="btn btn-outline-primary"><i class="fa fa-user"></i> Afficher</a>
                    <a href="/members/{{ $member['id'] }}/edit" class="btn btn-outline-warning"><i class="fa fa-edit"></i> Modifier</a>
                    <form method="post" action="{{ route('members.destroy', $member['id']) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-outline-danger"><i class="fa fa-remove"></i> Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection