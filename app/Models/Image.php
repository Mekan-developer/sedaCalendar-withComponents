<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'status',
        'order'
    ];

    public function getImage(){
        if(file_exists(public_path('/storage/uploads/gallery/'.$this->image)) && !is_null($this->image)){
            return asset('/storage/uploads/gallery/'.$this->image);
        }else{
            return asset('icons/logo.png');
        }
    }

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
