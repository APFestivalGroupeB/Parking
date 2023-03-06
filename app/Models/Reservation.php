<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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
        'user_id',
        'place_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_fin' => 'date',
    ];

    public function scopeActive(Builder $query): void
    {
        $query->where('date_fin', '>', date('Y-m-d'));
    }

    public function scopeHistory(Builder $query): void
    {
        $query->where('date_fin', '<=', date('Y-m-d'));
    }

    /**
     * Récupère l'utilisateur ayant effectué la demande de reservation.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Récupère la place attribué pour la reservation.
     */
    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function getDurationAttribute(): int
    {
        return date_diff(date_create($this->date_fin), date_create($this->created_at))->days;
    }

    public function getRemainingTimeAttribute()
    {
        return date_diff(date_create($this->date_fin), date_create(date('Y-m-d H:i:s')));
    }
}
