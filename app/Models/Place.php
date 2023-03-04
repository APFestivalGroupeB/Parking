<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    public $table = 'place';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'numero',
    ];

    /**
     * Récupère l'historique des réservations pour la place.
     */
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    public function reservation(): Reservation
    {
        return $this->reservations()->orderBy('id', 'desc')->first();
    }

    public function isAssigned(): bool
    {
        return 0;
    }

    public function remainingTime(): int
    {
        // nb jours restants
        return 0;
    }
}
