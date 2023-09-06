<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Artist') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3>Gestion des {{ $resource }}</h3>

                    <ul>
                        <li><a href="{{ route('admin.artist.create') }}">Ajouter</a></li>
                    </ul>

                    <table>
                        <thead>
                            <tr>
                                <th>Firstname</th>
                                <th>Lastname</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($artists as $artist)
                            <tr>
                                <td>{{ $artist->firstname }}</td>
                                <td>
                                    <a href="{{ route('artist.show', $artist->id) }}">{{ $artist->lastname }}</a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.artist.addlanguage', $artist->id) }}">add language</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
