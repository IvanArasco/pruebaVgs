<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'slug',
    ];

    public function categorias()
    {
        return $this->belongsToMany(Categories::class)->withTimestamps();
    }
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value); // Un método que nos permite redefinir la URL
    }
}