<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
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
     * Function returns users' roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    /**
     * Function returns users' positions
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function positions()
    {
        return $this->belongsToMany(Position::class, 'user_positions');
    }

    /**
     * Function verifies if admin exists
     *
     * @return bool - result (true/false)
     */
    public function isAdministrator()
    {
        return $this->roles()->where('name', 'admin')->exists();
    }

    /**
     * Function verifies if user exists
     *
     * @return string - "user" if exists
     */
    public function isUser()
    {
        $user = $this->roles()->where('name', 'user')->exists();
        if ($user) return "user";
    }

    /**
     * Function verifies if disabled user exists
     *
     * @return string - "disabled" if exists
     */
    public function isDisabled()
    {
        $disabled = $this->roles()->where('name', 'disabled')->exists();
        if ($disabled) return "disabled";
    }

    /**
     * Function verifies if user exists
     *
     * @return string - "user" if exists
     */
    public function isVisitor()
    {
        $user = $this->roles()->where('name', '')->exists();
        if ($user) return "user";
    }
}
