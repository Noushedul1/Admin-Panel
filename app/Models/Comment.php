<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'post_id',
        'message'
    ];
    public function frontenduser() {
        return $this->hasMany(Frontenduser::class);
    }
    public function posts() {
        return $this->hasMany(Post::class);
    }
}
