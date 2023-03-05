<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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

    public function scopeFree(Builder $query): void
    {
        $query->doesnthave('activeReservations');
    }

    /**
     * Récupère l'historique des réservations pour la place.
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function reservation()
    {
        return $this->reservations()->active()->first();
    }

    public function isAssigned(): bool
    {
        return (bool) $this->reservation();
    }

    public function user()
    {
        return $this->isAssigned()
            ? $this->reservation()->user
            : null;
    }
}
