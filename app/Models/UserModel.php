<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model implements Authenticatable
{
    use HasFactory;
    use AuthenticatableTrait;

    protected $fillable = [
        'prenom',
        'nom',
        'email',
        'password',
        'remember',
    ];

    protected $hidden = [
        'password',
        'remember',
    ];

    public function bioLinks(){

        return $this->hasMany(BioLink::class, 'user_model_id');
    }
}
