<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'images', 'manga_id', 'user_id'];
    protected $casts = [
        'images' => 'array'
    ];

    public function manga()
    {
        return $this->belongsTo(Manga::class, 'manga_id');
    }
}
