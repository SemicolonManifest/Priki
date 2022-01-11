<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class Practice extends Model
{
    use HasFactory;

    public static function allPublished(): Builder
    {
        return Practice::whereHas(
            'publicationState',
            fn($publicationState) => $publicationState->where('slug',"=","PUB")
        );
    }


    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function opinions()
    {
        return $this->hasMany(Opinion::class);
    }

    final public function publicationState(): BelongsTo
    {
        return $this->belongsTo(PublicationState::class);
    }
    final public static function lastUpdates(int $days = 1): Collection|array
    {
        $dateSubDay = Carbon::now()->subDays($days);
        return Practice::where('updated_at', '>=', $dateSubDay)->get();
    }

}
