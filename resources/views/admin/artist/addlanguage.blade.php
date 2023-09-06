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
                    <h3>Add language to artist</h3>
                    <form  method="post">
                        @csrf
                        <div>
                            <label for="language">Language</label>
                            <select type="text" id="language" name="language_id">
                                @foreach($languages as $language)
                                <option value="{{$language->id}}">{{$language->language}}</option>
                                @endforeach
                            </select>

                            @error('language')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="language">Level</label>
                            <select type="text" id="language" name="level">

                                    <option value="langue maternelle">Langue martenelle</option>
                                <option value="Débutant">Debutant</option>
                                <option value="intermediare">Intermediare</option>
                                <option value="Courant">Courant</option>

                            </select>

                            @error('language')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button>Ajouter</button>
                    </form>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <h2>Liste des erreurs de validation</h2>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <hr style="margin-top: 25px">
                    <table style="width: 100%;margin-top: 25px;text-align: center">
                        <thead>
                        <tr>
                            <th>Language</th>
                            <th>Level</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lanugauge_artist as $artist)
                            <tr>
                                <td>{{ $artist->language->language }}</td>
                                <td>{{ $artist->level }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

