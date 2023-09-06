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
                    <h3>Create language</h3>
                    <form action="{{ route('admin.language.store') }}" method="post">
                        @csrf
                        <div>
                            <label for="language">Language</label>
                            <input type="text" id="language" name="language"
                                   @if(old('language'))
                                   value="{{ old('language') }}"
                                   @endif
                                   class="@error('language') is-invalid @enderror">

                            @error('language')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button>Ajouter</button>
                        <a href="{{ route('admin.language.index') }}">Annuler</a>
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

                    <nav><a href="{{ route('artist.index') }}">Retour à l'index</a></nav>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
