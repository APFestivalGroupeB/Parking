<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'est_valide',
        'est_admin',
        'position',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function lastPosition(): int
    {
        $last = self::whereNotNull('position')->orderBy('position', 'desc')->first();

        return $last ? $last->position : 0;
    }

    /**
     * Récupère l'ensemble des réservations demandé par un utilisateur.
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function reservation()
    {
        return $this->reservations()->active()->first();
    }

    public function place()
    {
        return $this->hasPlace()
            ? $this->reservation()->place
            : null;
    }

    public function hasPlace(): bool
    {
        return (bool) $this->reservation();
    }

    public function wait()
    {
        if (!$this->isWaiting()) {
            $this->position = self::lastPosition() + 1;

            $this->save();
        }
    }

    public function isWaiting(): bool
    {
        return (bool) $this->position;
    }
}
