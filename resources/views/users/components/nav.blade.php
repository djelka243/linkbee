<!-- Top Bar avec infos de contact et réseaux sociaux -->
<nav class="antialiased w-full fixed z-40 top-0 dark:border-none" x-data="{ isOpen: false }">
    <div class=" bg-gradient-to-r from-blue-800 to-indigo-900 max-sm:hidden">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between py-2">
                <!-- Contact Info -->
                <div class="flex items-center">
                    <i class="fas fa-envelope text-white mr-2"></i>
                    <a href="mailto:contact@lofranlelo.com" 
                       class="text-sm text-white hover:text-blue-600 transition-colors duration-300">
                        contact@lofranlelo.com
                    </a>
                </div>

                <!-- Réseaux Sociaux -->
                <div class="flex items-center space-x-4">
                    <a href="#" class="text-white hover:text-blue-600 transition-colors duration-300">
                        <i class="fab fa-facebook w-4 h-4"></i>
                    </a>
                    <a href="#" class="text-blue-400 hover:text-blue-400 transition-colors duration-300">
                        <i class="fab fa-twitter w-4 h-4"></i>
                    </a>
                    <a href="#" class="text-pink-500 hover:text-pink-500 transition-colors duration-300">
                        <i class="fab fa-instagram w-4 h-4"></i>
                    </a>
                    <a href="#" class="text-blue-400 hover:text-blue-400 transition-colors duration-300">
                        <i class="fab fa-linkedin w-4 h-4"></i>
                    </a>
                    <a href="#" class="text-red-500 hover:text-red-500 transition-colors duration-300">
                        <i class="fab fa-youtube w-4 h-4"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Principale -->
    <div class="bg-white dark:bg-gray-800 shadow-sm container md:mx-auto  md:rounded-full">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('users.index') }}">
                        <img src="{{ asset('assets/fati.png') }}" alt="Logo" class="w-16 max-sm:w-12">
                    </a>
                </div>

                <!-- Navigation Desktop -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('users.index') }}" 
                       class="text-gray-600 dark:text-white hover:text-pink-500 transition-colors duration-300 {{ request()->routeIs('home') ? 'text-pink-500' : '' }}">
                        Accueil
                    </a>
                    <a href="{{ route('users.princing') }}" 
                       class="text-gray-600 dark:text-white hover:text-pink-500 transition-colors duration-300 {{ request()->routeIs('price') ? 'text-pink-500' : '' }}">
                        Nos plans
                    </a>
                    <a href="{{ route('users.about') }}" 
                       class="text-gray-600 dark:text-white hover:text-pink-500 transition-colors duration-300 {{ request()->routeIs('about') ? 'text-pink-500' : '' }}">
                        À propos
                    </a>
                </div>

                <!-- Bouton Connexion -->
                <div class="hidden md:flex items-center">
                    <a href="{{ route('users.auth') }}" 
                       class="px-4 py-2 bg-white text-black border border-gray-300 rounded-full hover:bg-gradient-to-r from-purple-500 to-pink-500 hover:text-white font-bold hover:border-transparent transition-all duration-300 shadow-sm hover:shadow-md">
                        Se connecter
                    </a>
                </div>

                <!-- Bouton Menu Mobile -->
                <div class="md:hidden">
                    <button @click="isOpen = !isOpen" 
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 dark:text-white hover:text-blue-600 focus:outline-none">
                        <svg class="h-6 w-6" x-show="!isOpen" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <svg class="h-6 w-6" x-show="isOpen" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Menu Mobile -->
            <div x-show="isOpen" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 transform scale-95"
                 x-transition:enter-end="opacity-100 transform scale-100"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 transform scale-100"
                 x-transition:leave-end="opacity-0 transform scale-95"
                 class="md:hidden" 
                 style="display: none;">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <a href="{{ route('users.index') }}" 
                       class="block px-3 py-2 rounded-md text-gray-600 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 {{ request()->routeIs('home') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                        Accueil
                    </a>
                    <a href="{{ route('users.princing') }}" 
                       class="block px-3 py-2 rounded-md text-gray-600 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 {{ request()->routeIs('price') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                        Nos plans
                    </a>
                    <a href="{{ route('users.about') }}" 
                       class="block px-3 py-2 rounded-md text-gray-600 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 {{ request()->routeIs('about') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                        À propos
                    </a>
                    <a href="{{ route('users.auth') }}" 
                       class="block px-3 py-2 text-center bg-white text-black border border-gray-300 rounded-full hover:bg-red-600 hover:text-white transition-colors duration-300">
                        Se connecter
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
