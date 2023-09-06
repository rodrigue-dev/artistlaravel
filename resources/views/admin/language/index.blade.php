<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Languages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3>Gestion des {{ $resource }}</h3>

                    <ul>
                        <li><a href="{{ route('admin.language.create') }}">Ajouter</a></li>
                    </ul>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Language</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($languages as $language)
                            <tr>
                                <td>{{ $language->language }}</td>
                                <td><a href="{{route('admin.language.artist',['id'=>$language->id])}}" class="btn btn-primary">list artists</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
