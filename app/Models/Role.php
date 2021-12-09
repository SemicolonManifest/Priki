<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public $timestamps = false;

    static function idFromSlug($slug){
        self::whereHas(
            'id',
            fn($getId) => $getId->where('slug',"=",$slug)
        );
    }
}
