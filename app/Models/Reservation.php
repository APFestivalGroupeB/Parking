<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public $table = 'reservation';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date_fin',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_fin' => 'datetime',
    ];

    /**
     * Récupère l'utilisateur ayant effectué la demande de reservation.
     */
    public function utilisateur(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Récupère la place attribué pour la reservation.
     */
    public function place(): BelongsTo
    {
        return $this->belongsTo(Place::class);
    }
}
