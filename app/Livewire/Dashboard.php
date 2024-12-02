<?php

namespace App\Livewire;

use App\Models\BioLink;
use App\Models\BioLinkItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use function PHPSTORM_META\type;

class Dashboard extends Component
{
    
    public $links;
    public $bio_link_id;
    public $type;
    public $position;

    public $title = '';
    public $url = '';
    public $isAddingLink = false;

    protected $rules = [
        'title' => 'required|min:3|max:255',
        'url' => 'required|url',
        'type' => 'required|string'
    ];

    public function mount()
    {
        $this->loadLinks();
    }

    public function loadLinks()
    {
        $this->links = BioLinkItem::orderBy('position')->get();
    }

    public function toggleAddLink()
    {
        $this->isAddingLink = !$this->isAddingLink;
    }


    public function getLinkIcon($url)
{
    $socialIcons = [
        'facebook.com' => 'fab fa-facebook text-blue-600',
        'twitter.com' => 'fab fa-twitter text-blue-400',
        'x.com' => 'fa-brands fa-x-twitter text-black',
        'linkedin.com' => 'fab fa-linkedin text-blue-700',
        'instagram.com' => 'fab fa-instagram text-pink-500',
        'youtube.com' => 'fab fa-youtube text-red-600',
        'tiktok.com' => 'fab fa-tiktok text-black',
        'pinterest.com' => 'fab fa-pinterest text-red-500',
        'snapchat.com' => 'fab fa-snapchat text-yellow-500',
        'reddit.com' => 'fab fa-reddit text-orange-500',
        'whatsapp.com' => 'fab fa-whatsapp text-green-500',
        'telegram.org' => 'fab fa-telegram text-blue-500',
        'discord.com' => 'fab fa-discord text-indigo-600',
        'github.com' => 'fab fa-github text-gray-700',
        'dribbble.com' => 'fab fa-dribbble text-pink-400',
        'tumblr.com' => 'fab fa-tumblr text-blue-600',
        'vimeo.com' => 'fab fa-vimeo text-blue-400',
        'twitch.tv' => 'fab fa-twitch text-purple-600',
        'medium.com' => 'fab fa-medium text-black',
        'quora.com' => 'fab fa-quora text-red-600',
        'wa.me' => 'fab fa-whatsapp text-green-500',
        't.me' => 'fab fa-telegram text-blue-500',
    ];

    foreach ($socialIcons as $domain => $icon) {
        if (strpos($url, $domain) !== false) {
            return $icon;
        }
    }

    // Icône générique pour les autres liens
    return 'fas fa-globe text-gray-600';
}



    public function addLink()
    {
        $this->validate();
        $icon = $this->getLinkIcon($this->url);


       // dd($this->type);
        BioLinkItem::create([
            'title' => $this->title,
            'url' => $this->url,
            'position' => BioLinkItem::max('position') + 1,
            'bio_link_id' => $this->bio_link_id,
            'active' => true,
            'icon' => $icon,
            'type' => $this->type
    
        ]);

        $this->reset(['title', 'url', 'bio_link_id']);
        $this->isAddingLink = false;
        $this->loadLinks();
    }

    public function deleteLink($linkId)
    {
        BioLinkItem::destroy($linkId);
        $this->loadLinks();
    }

    public function updateLinkOrder($orderedIds)
    {
        foreach ($orderedIds as $order => $id) {
            BioLinkItem::where('id', $id)->update(['position' => $order]);
        }
    }
    public function render()
    {
        $user_model_id = Auth::guard('lofran')->user()->id;
        return view('livewire.dashboard', [
            'bios' => BioLink::where('user_model_id', $user_model_id)->get(),
        ]);
    }
}
