<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    public $timestamps = false;
    protected $fillable = [
        'title'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}