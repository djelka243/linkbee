<?php

namespace App\Livewire;

use App\Models\BioLink;
use App\Models\Theme;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Bio extends Component
{
    use WithFileUploads;

    public $slug;
    public $title;
    public $description;
    public $profile_image;
    public $theme_id;
    public $active = true;

    public function save()
    {

       $user_model_id = Auth::guard('lofran')->user()->id;
        $this->validate([
            'slug' => 'required|unique:bio_links,slug',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'profile_image' => 'required|image|max:10240', // 1MB max
            'theme_id' => 'required|exists:themes,id',
        ]);


            $image = $this->profile_image;
            $filename = time() . '.' . strtolower($image->getClientOriginalExtension());
            $path = $image->storeAs('profile_bio_images', $filename, 'public'); // Enregistre l'image dans le stockage public
     
            
        BioLink::create([
            'user_model_id' => $user_model_id,
            'slug' => $this->slug,
            'title' => $this->title,
            'description' => $this->description,
            'profile_image' => $path,
            'theme_id' => $this->theme_id,
            'active' => $this->active,
        ]);

        session()->flash('message', 'Bio enregistrée avec succès.');
        $this->reset();
    }
    public function render()
    {
        return view('livewire.bio', [
            'themes' => Theme::all(),
        ]);
    }
}
