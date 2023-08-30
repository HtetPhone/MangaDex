<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'summary', 'excerpt', 'cover', 'author_id'];


    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}
