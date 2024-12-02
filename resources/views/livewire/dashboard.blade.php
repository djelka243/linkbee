<div class="min-h-screen flex bg-white">
    <!-- Sidebar -->
    <div class="w-16 bg-gray-900 flex flex-col items-center py-4 space-y-8">
        <div class="flex items-center justify-center">
            <img src="{{ asset('assets/fati.png') }}" alt="Logo" class="w-8 h-8">
        </div>
        <nav class="flex flex-col items-center space-y-4">
            <a href="#" class="p-2 bg-gray-800 text-white rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </a>
            <a href="#" class="p-2 text-gray-400 hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
            </a>


            <a href="#" class="p-2 text-gray-400 hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                </svg>
            </a>
        </nav>
    </div>

    <!-- Main content -->
    <div class="flex-1 flex flex-col">
        <!-- Header -->
        <header class="bg-white border-b border-gray-200">
            <div class="px-6 py-4 flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <h1 class="text-xl text-gray-800">
                        Salut {{ Auth::guard('lofran')->user()->prenom }}, Welcome to Linktree
                    </h1>
                    <form action="{{ route('payment.process') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-green-400 text-white font-extrabold  p-2 rounded-full border">Passer Pro</button>
                    </form>
                </div>
                <div class="flex items-center space-x-4">
                    @if ($bios->count() > 0)
                        <span
                            class="text-gray-600">{{ config('app.url', 'Laravel') }}/bio/{{ $bios->first()->slug }}</span>
                        <button class="p-2 hover:bg-gray-100 rounded-lg"
                            onclick="navigator.clipboard.writeText('{{ config('app.url', 'Laravel') }}/bio/{{ $bios->first()->slug }}')">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                            </svg>
                        </button>
                    @endif
                </div>
            </div>

            <!-- Tabs -->
            <nav class="px-6 flex space-x-4">
                <a onclick="showTab('bio')" class="tab-link px-3 py-4 text-sm font-medium cursor-pointer"
                    data-tab="bio">
                    Bio
                </a>
                <a onclick="showTab('links')" class="tab-link px-3 py-4 text-sm font-medium cursor-pointer"
                    data-tab="links">
                    Links
                </a>

                <a onclick="showTab('analytics')" class="tab-link px-3 py-4 text-sm font-medium cursor-pointer"
                    data-tab="analytics">
                    Analytics
                </a>
                <a onclick="showTab('settings')" class="tab-link px-3 py-4 text-sm font-medium cursor-pointer"
                    data-tab="settings">
                    Settings
                </a>
            </nav>
        </header>

        <div class="flex-1 p-6">

            <div id="bio" class="tab-content hidden">
                @include('users.bio', ['bios' => $bios])
            </div>
            <div id="links" class="tab-content">
                @include('users.link')
            </div>

            <div id="analytics" class="tab-content hidden">
                {{-- @include('users.analytics') --}}
            </div>

            <div id="settings" class="tab-content hidden">
                {{-- @include('users.settings') --}}
            </div>
        </div>

    </div>
</div>

<script>
    function showTab(tabId) {
        // Cacher tous les contenus
        document.querySelectorAll('.tab-content').forEach(content => {
            content.classList.add('hidden');
        });

        // Afficher le contenu sélectionné
        document.getElementById(tabId).classList.remove('hidden');

        // Mettre à jour les styles des onglets
        document.querySelectorAll('.tab-link').forEach(tab => {
            if (tab.dataset.tab === tabId) {
                tab.classList.add('text-cyan-500', 'border-b-2', 'border-cyan-500');
                tab.classList.remove('text-gray-500', 'hover:text-gray-700');
            } else {
                tab.classList.remove('text-cyan-500', 'border-b-2', 'border-cyan-500');
                tab.classList.add('text-gray-500', 'hover:text-gray-700');
            }
        });
    }

    // Afficher l'onglet Links par défaut au chargement
    document.addEventListener('DOMContentLoaded', function() {
        showTab('bio');
    });
</script>
