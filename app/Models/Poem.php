<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_tm',
        'name_ru',
        'text_tm',
        'text_ru',
        'author_tm',
        'author_ru',
        'status',
        'order'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Find the current highest order number
            $maxOrder = static::max('order');

            // Set the order field to be the highest order number + 1
            $model->order = $maxOrder + 1;
        });
    }
}
