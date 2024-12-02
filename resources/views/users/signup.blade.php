<x-guest-layout>
    <div class="flex items-center justify-centern min-h-screenn bg-whiten">
        <div class="w-full max-w-8xln bg-white rounded-lg shadow-lg flex">
            <!-- Form Section -->
            <div class="w-1/2 p-8">
                <div class="flex flex-col items-start space-y-4">
                    <h2 class="mt-6 text-2xl font-semibold text-gray-900 text-center">Créer votre compte
                        linkbee</h2>
                        <form class="py-6 w-full space-y-4" method="POST" action="{{ route('users.store') }}">
                            @csrf
                            <div>
                                <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
                                <input type="text" name="prenom" id="prenom" value="{{ old('prenom') }}"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('prenom') border-red-500 @enderror">
                                @error('prenom')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        
                            <div>
                                <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                                <input type="text" name="nom" id="nom" value="{{ old('nom') }}"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('nom') border-red-500 @enderror">
                                @error('nom')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Adresse e-mail</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('email') border-red-500 @enderror">
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                                <input type="password" name="password" id="password"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('password') border-red-500 @enderror">
                                @error('password')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        
                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        
                   
                        
                            <button type="submit"
                                class="w-full py-2 px-4 bg-indigo-600 text-white font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                S'inscrire
                            </button>
                        </form>



                    <!-- Divider -->
                    <div class="w-full border-t border-gray-300">
                        <p class="text-center text-sm text-gray-500 mt-4">Ou continuer avec</p>
                    </div>

                    <!-- Social Login Buttons -->
                    <div class="flex space-x-4 w-full">
                        <button
                            class="flex items-center justify-center w-1/2 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                            <img src="https://img.icons8.com/color/24/000000/google-logo.png" alt="Google logo"
                                class="mr-2">
                            Google
                        </button>
                        <button
                            class="flex items-center justify-center w-1/2 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                            <img src="https://img.icons8.com/ios-glyphs/24/000000/github.png" alt="GitHub logo"
                                class="mr-2">
                            GitHub
                        </button>
                    </div>
                </div>
            </div>

            <!-- Image Section -->
            <div class="w-1/2 relative">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-800 to-indigo-900 z-0"></div>
                <img src="{{ asset('assets/fati.png') }}" class="relative z-10 w-full h-full object-cover">
            </div>
        </div>
    </div>
</x-guest-layout>
