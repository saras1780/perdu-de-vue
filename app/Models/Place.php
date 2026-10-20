<?php

namespace App\Models;

use App\Enums\PlaceKind;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Place extends Model
{
    /** @use HasFactory<\Database\Factories\PlaceFactory> */
    use HasFactory;

    protected $fillable = ['name', 'kind'];

    protected function casts(): array
    {
        return [
            'kind' => PlaceKind::class,
        ];
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
