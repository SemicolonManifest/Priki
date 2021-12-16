<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function practices($slug = null)
    {
        if ($slug == null)
        {
            return $this->hasMany(Practice::class);
        }else{
            return $this->hasMany(Practice::class)->whereHas('publicationState',
                fn($publicationState) => $publicationState->where('slug',"=",$slug));
        }
    }
}
