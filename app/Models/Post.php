<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'tags', 'video_only', 'wiki_id'];

    protected $casts = [
        'tags' => 'array', // Ensure tags are cast to an array
    ];

    public function wiki()
    {
        return $this->belongsTo(Wiki::class);
    }
}