<x-app-layout>
    <div class="max-w-2xl mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-8">Créer un nouveau Thème</h1>

            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <ul class="list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <form action="{{ route('admin.themes.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" name="name" id="name" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div>
                    <label for="colors[background]" class="block text-sm font-medium text-gray-700">Couleur de
                        fond</label>
                    <div class="mt-1 flex items-center">
                        <input type="color" name="colors[background]" id="colors[background]"
                            class="h-10 w-20 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <span class="ml-2 text-sm text-gray-500">Choisir une couleur de fond</span>
                    </div>
                </div>

                <div>
                    <label for="colors[text]" class="block text-sm font-medium text-gray-700">Couleur du texte</label>
                    <div class="mt-1 flex items-center">
                        <input type="color" name="colors[text]" id="colors[text]"
                            class="h-10 w-20 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <span class="ml-2 text-sm text-gray-500">Choisir une couleur de texte</span>
                    </div>
                </div>

                <div>
                    <label for="font" class="block text-sm font-medium text-gray-700">Police</label>
                    <input type="text" name="font" id="font"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div>
                    <label for="background_image" class="block text-sm font-medium text-gray-700">Image de fond</label>
                    <input type="file" name="background_image" id="background_image"
                        class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="active" id="active"
                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="active" class="ml-2 block text-sm text-gray-700">Actif</label>
                </div>

                <div class="pt-4">
                    <button type="submit"
                        class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
