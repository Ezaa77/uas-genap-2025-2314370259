<?php

// app/Models/Like.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['article_id'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}