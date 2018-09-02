@extends("layout.panel")
@section("title", $title)

@section("content")
    @if(Session::has("success"))
        <div class="alert alert-success">
            {{ Session::get("success") }}
        </div>
    @endif
    <h1>Tableau de bord</h1>
    <hr>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Groupe</th>
            <th scope="col">E-mail</th>
            <th scope="col">Téléphone</th>
            <th scope="col">Formation</th>
        </tr>
        </thead>
        <tbody>
        @foreach($members as $member)
            <tr>
                <td>{{ $member['surname'] }} {{ $member['firstname'] }}</td>
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
                <td>{{ $member['mail'] }}</td>
                <td>{{ $member['phone'] }}</td>
                <td>{{ $member['formation'] }} ({{ $member['entry_year'] }} - {{ $obtaining }})</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection