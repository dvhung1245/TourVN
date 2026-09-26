<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tour extends Model
{
    protected $guarded = ['id'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(TourCategory::class, 'category_id');
    }

    public function itineraries(): HasMany
    {
        return $this->hasMany(TourItinerary::class);
    }

    public function departures(): HasMany
    {
        return $this->hasMany(Departure::class);
    }
}
