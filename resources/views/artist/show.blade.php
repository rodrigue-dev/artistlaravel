@extends('layouts.main')

@section('title', 'Fiche d\'un artiste')

@section('content')
    <h1>{{ $artist->firstname }} {{ $artist->lastname }}</h1>
    <h4>Langue parles</h4>
    <table>
        <thead>
        <tr>
            <th>Language</th>
            <th>Level</th>
        </tr>
        </thead>
        <tbody>
        @foreach($artist_languages as $language)
            <tr>
                <th>{{$language->language->language}}</th>
                <th>{{$language->level}}</th>
            </tr>
        @endforeach
        </tbody>

    </table>
    <div><a href="{{ route('artist.edit' ,$artist->id) }}">Modifier</a></div>

    <form method="post" action="{{ route('artist.delete', $artist->id) }}">
		@csrf
		@method('DELETE')
		<button>Supprimer</button>
    </form>

    <nav><a href="{{ route('artist.index') }}">Retour à l'index</a></nav>
@endsection
