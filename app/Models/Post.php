<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body','updated_at','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
