<?php
//Admin User
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use SoftDeletes; //deletes, but in database record is solved
    use Notifiable;

    protected $fillable = [
        'name',
        'idnp',
        'birth_date',
        'enrolment_date',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'user_roles');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function positions()
    {
        return $this->belongsToMany('App\Models\Position', 'user_positions');
    }
}
