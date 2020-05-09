<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'id',
        'name',
        'description'
    ];

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function positions()
    {
        return $this->belongsToMany('App\Models\Position', 'user_positions');
    }

}
