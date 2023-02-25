<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// convention: singular
class Role extends Model
{
    use HasFactory;

    protected $quarded = [];

    protected $fillable = [
        'slug',
        'name',

    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
