<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wiki extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'collection'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}