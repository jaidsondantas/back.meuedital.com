<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

/**
 * Class User
 * @package App
 *
 * @property mixed name
 * @property mixed email
 * @property mixed email_verified_at
 * @property mixed password
 * @property mixed password_confirmation
 * @property mixed remember_token
 * @property mixed created_at
 * @property mixed client_id
 * @property mixed auto_part_id
 *
 */
class User extends Authenticatable
{
    use  HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'firebase_uid', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return array
     */
    public function getFillable(): array
    {
        return $this->fillable;
    }



}
