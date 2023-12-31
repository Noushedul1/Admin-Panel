<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Front extends Model
{
    use HasFactory;
    protected $guard = "front";
    protected $fillable = [
        'name',
        'email',
        'password'
    ];
}
