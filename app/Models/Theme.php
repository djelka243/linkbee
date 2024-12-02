<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'colors',
        'font',
        'background_image',
        'active',
    ];


    protected $casts = [
        'colors' => 'array',    // Pour traiter 'colors' comme un tableau associatif JSON
        'active' => 'boolean',
    ];
    public function bioLinks()
    {
        return $this->hasMany(BioLink::class);
    }
}
