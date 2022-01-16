<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->belongsToMany(User::class,"user_opinion")
            ->withPivot("comment","points")
            ->as('comment');
    }

    public function sumUpVotes():int
    {
        return $this->comments()->wherePivot("points",1)->count('points');
    }

    public function sumDownVotes():int
    {
        return $this->comments()->wherePivot("points",1)->count('points');
    }
}
