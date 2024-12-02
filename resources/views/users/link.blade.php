<x-guest-layout>
    <!-- Main area -->
    <main class="flex-1 p-6 bg-white">
        <div class="flex space-x-4 mb-6">
            <button wire:click="toggleAddLink"
                class="bg-gray-900 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-gray-800 transition-colors">
                Add New Link
            </button>
            <button
                class="bg-cyan-500 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-cyan-600 transition-colors">
                Add Social Icons
            </button>
        </div>

        @if ($isAddingLink)
            <div class="bg-gray-100 rounded-lg p-6 mb-6 shadow-sm">
                <form wire:submit.prevent="addLink">
                    <div class="space-y-4">
                        <div class="mb-4">
                            <label for="bio_link_id" class="block text-sm font-medium">Bio profile</label>
                            <select id="bio_link_id" wire:model="bio_link_id" class="w-full border-gray-300 rounded">
                                <option value="">Select a Bio profile</option>
                                @foreach ($bios as $bio)
                                    <option value="{{ $bio->id }}">{{ $bio->title }}</option>
                                @endforeach
                            </select>
                            @error('bio_link_id') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="type" class="block text-sm font-medium">Type</label>
                            <select id="type" wire:model="type" class="w-full border-gray-300 rounded">
                                <option value="">Select a type</option>
                                    <option value="social">social</option>
                                    <option value="other">other</option>
                        
                            </select>
                            @error('type') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" id="title" wire:model="title"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500"
                                placeholder="Enter link title">
                            @error('title')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
                            <input type="url" id="url" wire:model="url"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500"
                                placeholder="https://example.com">
                            @error('url')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex justify-end space-x-2 pt-4">
                            <button type="button" wire:click="toggleAddLink"
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200 transition-colors">
                                Cancel
                            </button>
                            <button type="submit"
                                class="px-4 py-2 text-sm font-medium text-white bg-cyan-500 rounded-md hover:bg-cyan-600 transition-colors">
                                Add Link
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        @endif

        <!-- Links list -->
        <div wire:sortable="updateLinkOrder" class="space-y-4">
            @forelse($links as $link)
                <div wire:sortable.item="{{ $link->id }}" wire:key="link-{{ $link->id }}"
                    class="bg-white rounded-lg p-4 flex items-center space-x-4 shadow-sm hover:shadow transition-shadow">
                    <div wire:sortable.handle class="cursor-move">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="font-medium text-gray-900 truncate">{{ $link->title }}</h3>
                        <p class="text-sm text-gray-500 truncate">{{ $link->url }}</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button wire:click="toggleLinkVisibility({{ $link->id }})"
                            class="p-2 text-gray-400 hover:text-gray-600 rounded-lg hover:bg-gray-100">
                            @if ($link->active)
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
                        <button wire:click="deleteLink({{ $link->id }})"
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
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No links yet</h3>
                    <p class="mt-1 text-sm text-gray-500">Get started by creating a new link.</p>
                    <div class="mt-6">
                        <button wire:click="toggleAddLink"
                            class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-cyan-600 hover:bg-cyan-700">
                            <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            Add New Link
                        </button>
                    </div>
                </div>
            @endforelse
        </div>
    </main>
</x-guest-layout>
