<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Store extends Model
{
    use HasFactory;

    /**
     * The services that belong to the store.
     */
    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class);
    }
}
