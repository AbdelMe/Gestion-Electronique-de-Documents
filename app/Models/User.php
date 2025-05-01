<?php

namespace App\Models;

use App\Notifications\CustomResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements CanResetPassword
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'entreprise_id',
        'profile_image',
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'city',
        'postal_code',
        'blocked',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
        ];
    }
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::needsRehash($value) ? Hash::make($value) : $value;
    }

    public function typeUtilisateur()
    {
        return $this->belongsTo(TypeUtilisateur::class);
    }
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function sendPasswordResetNotification($token)
{
    $this->notify(new CustomResetPassword($token));
}
}

