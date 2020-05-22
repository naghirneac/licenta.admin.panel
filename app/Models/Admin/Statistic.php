<?php


namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Statistic extends Model
{
    use SoftDeletes;

    protected $table = 'users_worktime';

    protected $fillable = [
        'user_id',
        'worktime',
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

}
