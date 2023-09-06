<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistLanguage extends Model
{
    use HasFactory;
    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_id', 'id');
    }
    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
