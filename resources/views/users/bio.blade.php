<x-guest-layout>
    <main class="bg-white flex-1 p-6">
        <div class="" x-data="{ open: false }">
            <div class="flex space-x-4 mb-6">
                <button id="modalAdd" title="enregistrer un nouvel emploiyé" @click="open = !open""
                    class="bg-gray-900 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-gray-800 transition-colors">
                    Add New Bio Profile
                </button>
            </div>
            <div class="inset-0">
                <div @keydown.window.escape="open = false" x-show="open"
                    class="fixed inset-0 overflow-y-auto flex items-center justify-center" aria-labelledby="modal-title"
                    x-ref="dialogMission" aria-modal="true" x-cloak>

                    <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                        x-description="Background backdrop, show/hide based on modal state."
                        class="fixed inset-0 bg-gray-600 bg-opacity-75 transition-opacity"></div>

                    <div class="fixed inset-0 overflow-y-auto">
                        <div class="fixed inset-0 overflow-y-auto">
                            <div
                                class="flex items-end sm:items-center justify-center min-h-full max-sm:min-h-[20rem] max-sm:mt-24 md:p-4 text-center sm:p-0 mt-4">
                                <div x-show="open" x-transition:enter="ease-out duration-300"
                                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                    x-transition:leave="ease-in duration-200"
                                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                    x-description="Modal panel, show/hide based on modal state."
                                    class="relative bg-white dark:bg-gray-900 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-[52rem] h-[45rem] sm:w-full"
                                    @click.away="open = false">
                                    <div class="px-6 py-6 lg:px-8">
                                        <h3 class=" font-medium text-gray-900 dark:text-white md:text-center ">
                                            My new bio profile</h3>
                                        <hr class="mt-6 mb-6 border-b-1 border-blueGray-300">
                                        @livewire('bio')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  
        <div class="space-y-4">
            @forelse($bios as $bio)
                <div class="bg-white rounded-lg p-4 flex items-center space-x-4 shadow-sm hover:shadow transition-shadow">
                    <div class="cursor-move">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="font-medium text-gray-900 truncate">{{ $bio->title }}</h3>
                        <p class="text-sm text-gray-500 truncate">{{ $bio->url }}</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button onclick="window.open('http://127.0.0.1:8000/bio/{{ $bio->slug }}', '_blank')" class="p-2 text-gray-400 hover:text-gray-600 rounded-lg hover:bg-gray-100">
                            @if ($bio->active)
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            @else
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                </svg>
                            @endif
                        </button>
        
                        <!-- Bouton pour supprimer -->
                        <button onclick="deleteBio({{ $bio->id }})"
                            class="p-2 text-gray-400 hover:text-red-600 rounded-lg hover:bg-gray-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                </div>
                @empty
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No bios yet</h3>
                    <p class="mt-1 text-sm text-gray-500">Get started by creating a new bio.</p>
                 
                </div>
            @endforelse
        </div>
        

    </main>

</x-guest-layout>
