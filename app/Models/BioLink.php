<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BioLink extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_model_id', 
        'slug',
        'title',
        'description',
        'profile_image',
        'theme_id',
        'active',
    ];

    public function usermodel()
    {
        return $this->belongsTo(UserModel::class, 'user_model_id');
    }

    public function biolinkitems()
    {
        return $this->hasMany(BioLinkItem::class);
    }

    public function theme()
    {
        return $this->belongsTo(Theme::class, 'theme_id');
    }

      // Utiliser le slug comme clé de route
      public function getRouteKeyName()
      {
          return 'slug';
      }
}
