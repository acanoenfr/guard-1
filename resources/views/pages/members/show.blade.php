@extends("layout.panel")
@section("title", $title)

@section("content")
    <h1>Profil de {{ $member['surname'] }} {{ $member['firstname'] }}</h1>
    <hr>
    <table class="table table-hover">
        <tr>
            <th>Groupe</th>
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
        </tr>
        <tr>
            <th>Adresse</th>
            <td>{{ $member['address'] }}<br>{{ $member['postal_code'] }} {{ $member['city'] }}</td>
        </tr>
        <tr>
            <th>Adresse e-mail</th>
            <td>{{ $member['mail'] }}</td>
        </tr>
        <tr>
            <th>Téléphone</th>
            <td>{{ $member['phone'] }}</td>
        </tr>
        <tr>
            <th>Formation</th>
            <td>{{ $member['formation'] }} ({{ $member['entry_year'] }} - {{ $obtaining }})</td>
        </tr>
        <tr>
            <th>Informations sur les études</th>
            <td>{{ $member['study_text'] }}</td>
        </tr>
        <tr>
            <th>Informations sur l'entreprise</th>
            <td>{{ $member['enterprise_info'] }}</td>
        </tr>
        <tr>
            <th>Bloc-notes</th>
            <td>{{ $member['notepad'] }}</td>
        </tr>
    </table>
@endsection