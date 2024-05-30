<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($category) {
            $category->id = Str::uuid();
        });
    }
}
