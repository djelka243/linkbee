<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    // Affiche la liste des thèmes
    public function index()
    {
        $themes = Theme::all();
        return view('admin.themes.index', compact('themes'));
    }

    // Affiche le formulaire pour créer un thème
    public function create()
    {
        return view('admin.themes.create');
    }

    // Stocke un nouveau thème
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'colors' => 'nullable|array',
            'colors.background' => 'nullable|string|max:7',
            'colors.text' => 'nullable|string|max:7',
            'font' => 'nullable|string|max:255',
            'background_image' => 'nullable|image'
        ]);

        $data = $request->all();
        // Convertir la valeur 'on' du checkbox en booléen
        $data['active'] = $request->has('active');
        // dd($data);

        // Gestion de l'upload de l'image de fond
        if ($request->hasFile('background_image')) {
            $image = $request->file('background_image');
            $filename = time() . '.' . strtolower($image->getClientOriginalExtension());
            $image->storeAs('themes', $filename, 'public');
        }

        Theme::create($data);

        return redirect()->route('admin.themes.index')->with('success', 'Thème créé avec succès.');
    }

    // Affiche le formulaire d'édition pour un thème spécifique
    public function edit(Theme $theme)
    {
        return view('admin.themes.edit', compact('theme'));
    }

    // Met à jour un thème spécifique
    public function update(Request $request, Theme $theme)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'background_color' => 'required|string|max:7',
            'text_color' => 'required|string|max:7',
        ]);

        $theme->update($request->all());

        return redirect()->route('admin.themes.index')->with('success', 'Thème mis à jour avec succès.');
    }

    // Supprime un thème spécifique
    public function destroy(Request $request, Theme $theme)
    {
        $theme = Theme::findOrFail($request->id);
        if ($theme) {
            $theme->delete();
            return redirect()->route('admin.themes.index')->with('success', 'Thème supprimé avec succès.');
        } else {
            return redirect()->route('admin.themes.index')->with('error', 'Thème introuvable');
        }
    }
}
