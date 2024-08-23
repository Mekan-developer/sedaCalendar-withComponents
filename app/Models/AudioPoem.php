<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioPoem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_tm',
        'name_ru',
        'audio',
        'status',
        'order'
    ];


    public function getAudio(){
        if(file_exists(public_path('/storage/uploads/audio/'.$this->audio)) && !is_null($this->audio)){
            return asset('/storage/uploads/audio/'.$this->audio);
        }else{
            return null;
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
