<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Request extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'user_id',
        'type_id',
        'status',
        'message',
        'created_at',
        'updated_at',
        'deleted_at',
        ];
}
