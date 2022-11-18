<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'photosProduct' => 'array',
    ];

    protected $guarded = [];

    public function users() {
        return $this->belongsToMany('App\Models\User');
    }
}
