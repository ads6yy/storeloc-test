<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Store extends Model
{
    use HasFactory;

    /**
     * The roles that belong to the user.
     */
    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class);
    }
}
