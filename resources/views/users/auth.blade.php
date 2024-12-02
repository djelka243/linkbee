<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-4xl bg-white rounded-lg shadow-lg flex">
            <!-- Form Section -->
            <div class="w-1/2 p-8">
                <div class="flex flex-col items-start space-y-4">
                    <!-- Logo -->


                    <!-- Title and Subtitle -->
                    <h2 class="mt-6 text-2xl font-semibold text-gray-900 text-center">Connectez-vous à votre compte
                        linkbee</h2>

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
             

                    <form class="py-6 w-full space-y-4" method="POST" action="{{ route('users.auths') }}">
                        @csrf

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Adresse e-mail</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                            @if ($errors->has('email'))
                                <span class="text-red-500 text-sm">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                            <input type="password" name="password" value="{{ old('password') }}"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                            @if ($errors->has('password'))
                                <span class="text-red-500 text-sm">{{ $errors->first('password') }}</span>
                            @endif
                        </div>


                        <!-- Remember me and Forgot Password -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-gray-600">
                                <input type="checkbox" name="remember" class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                <span class="ml-2 text-sm">Se souvenir de moi</span>
                            </div>
                            <a href="#" class="text-sm text-indigo-600 hover:underline">Mot de passe oublié?</a>
                        </div>

                        <!-- Sign in Button -->
                        <button type="submit"
                            class="w-full py-2 px-4 bg-indigo-600 text-white font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Se connecter
                        </button>
                        <!-- Sign up Button -->
                        <a href="/signup" class="flex justify-center text-indigo-600">
                            S'inscrire
                        </a>
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
