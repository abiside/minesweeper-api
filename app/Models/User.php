<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\HasHashedPassword;

class User extends Authenticatable
{
    use HasApiTokens,
        HasFactory,
        Notifiable,
        HasHashedPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The recently generated access token for the user
     *
     * @var string
     */
    protected $accessToken = null;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Return the recently generated access token for the user
     *
     * @return string|null
     */
    public function getCurrentAccessTokenAttribute(): ?string
    {
        return $this->accessToken ?? null;
    }

    /**
     * Generate a new token to setup on the user object
     *
     * @return void
     */
    public function generateNewAccessToken(): void
    {
        $this->accessToken = ($this->createToken('general'))->plainTextToken;
    }
}
