<x-user-layout>
    <div class="relative h-screen flex items-center justify-center overflow-hidden">
        <img src="/storage/{{ $bio->theme->background_image }}" alt="{{ $bio->theme->background_image }}"
            class="absolute inset-0 w-full h-full object-cover -z-10">

        <div class="shadow-lg rounded-lg w-11/12 md:w-3/4 lg:w-1/2 p-8 relativen card-background"
            style="background-color: {{ $bio->theme->colors['background'] ?? '' }}; color: {{ $bio->theme->colors['text'] ?? '' }};">
    
            <div class="flex flex-col items-center">
                <div class="relative w-64 h-64 rounded-full overflow-hidden mb-4">
                    <img src="/storage/{{ $bio->profile_image }}" alt="profile" class="w-full h-full object-cover">
                </div>
                <h2 class="text-2xl font-bold mb-2">{{ $bio->usermodel->prenom }} {{ $bio->usermodel->nom }}</h2>
                <p class=" font-bold mb-4 italic">{{ $bio->title }}</p>
                <p class=" mb-4">{{ $bio->description }}</p>

                <div class="flex space-x-4 mb-6">
                    @if ($bio->biolinkitems->count() > 0)
                        @foreach ($bio->biolinkitems as $biolinkitem)
                            @if ($biolinkitem->type === 'social')
                                <a href="{{ $biolinkitem->url }}" class="text-blue-500 hover:text-blue-700 ">
                                    <i class="{{ $biolinkitem->icon }} fa-3x" style="size: 20px"></i>
                                </a>
                            @endif
                        @endforeach
                    @endif
                </div>


                <div class="max-h-80 w-full overflow-y-auto">
                    @if ($bio->biolinkitems->count() > 0)
                        @foreach ($bio->biolinkitems as $biolinkitem)
                            @if ($biolinkitem->type === 'other')
                                <div
                                    class="mb-2 hover:animate-background rounded-xl bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 p-0.5 shadow-2xl transition hover:bg-[length:400%_400%] hover:shadow-sm hover:[animation-duration:_4s]">
                                    <div class="rounded-[10px] bg-blackd p-2 sm:p-6">

                                        <a href="" class="flex items-center justify-between">
                                            <i class="{{ $biolinkitem->icon }} fa-2x mr-4 text-white" style="size: 20px"></i>

                                            <h3 class="mt-0.5 text-lg text-white font-extrabold">
                                                {{ $biolinkitem->title }}
                                            </h3>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>

            </div>

        </div>


    </div>
    </div>
    </div>
    </div>

    <style>
      .card-background::before {
    content: "Filigrane " "Filigrane " "Filigrane " "Filigrane " "Filigrane "; /* Texte du filigrane */
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    font-size: 20px; /* Taille du texte, ajustez selon vos besoins */
    color: rgba(0, 0, 0, 0.05); /* Couleur avec transparence pour un effet discret */
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    transform: rotate(90deg); /* Rotation de 90 degrés */
    opacity: 0.1; /* Légère transparence pour le fond de texte */
    pointer-events: none; /* Empêche les interactions avec le filigrane */
    overflow: hidden;
    z-index: -1; /* Place le filigrane derrière le contenu */
}

    </style>
</x-user-layout>
