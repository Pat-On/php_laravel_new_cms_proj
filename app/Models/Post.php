<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //accessor
    // public function setPostImageAttribute($value){
    //     $this->attributes['post_image'] = asset($value);
    // }

    // mutators
    public function getPostImageAttribute($value)
    {
        // return asset($value);
        if (strpos($value, 'https://') !== false || strpos($value, 'http://') !== false) {
            return $value;
        }

        return asset('storage/'.$value);
    }
}
