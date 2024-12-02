<div class="flex-1 p-6 bg-white">
    @if (session()->has('message'))
        <div class="text-green-500 mb-4">{{ session('message') }}</div>
    @endif


    <form wire:submit.prevent="save">

       
        <div class="mb-4">
            <label for="slug" class="block text-sm font-medium">Slug</label>
            <input type="text" id="slug" wire:model="slug" class="w-full border-gray-300 rounded">
            @error('slug') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium">Title</label>
            <input type="text" id="title" wire:model="title" class="w-full border-gray-300 rounded">
            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium">Description</label>
            <textarea id="description" wire:model="description" class="w-full border-gray-300 rounded"></textarea>
            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="profile_image" class="block text-sm font-medium">Profile Image</label>
            <input type="file" id="profile_image" wire:model="profile_image" class="w-full border-gray-300 rounded">
            @error('profile_image') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="theme_id" class="block text-sm font-medium">Theme</label>
            <select id="theme_id" wire:model="theme_id" class="w-full border-gray-300 rounded">
                <option value="">Select a theme</option>
                @foreach ($themes as $theme)
                    <option value="{{ $theme->id }}">{{ $theme->name }}</option>
                @endforeach
            </select>
            @error('theme_id') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Save</button>
    </form>
</div>

