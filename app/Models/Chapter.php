<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'images', 'manga_id', 'user_id', 'chapter_no'];
    protected $casts = [
        'images' => 'array'
    ];

    public function manga()
    {
        return $this->belongsTo(Manga::class, 'manga_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'chapter_id');
    }
}
