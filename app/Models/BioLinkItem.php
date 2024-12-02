<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BioLinkItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'bio_link_id',
        'type',
        'title',
        'url',
        'position',
        'active',
        'icon'
    ];


    public function biolink()
    {
        return $this->belongsTo(BioLink::class);
    }
}
