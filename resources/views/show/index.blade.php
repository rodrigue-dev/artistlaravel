@extends('layouts.phantom-main')

@section('title', 'Liste des {{ $resource }}')

@section('content')
    <h1>Liste des {{ $resource }}</h1>

    <ul>
        <li><a href="{{ route('show.create') }}">Ajouter</a></li>    
    </ul>

    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
        @foreach($shows as $show)
            <tr>
                <td>{{ $show->slug }}</td>
                <td>
                    <a href="{{ route('show.show', $show->id) }}">{{ $show->slug }}</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
