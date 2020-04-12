<?php


namespace App\Repositories\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\CoreRepository;

class MainRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Function returns count of users from DB
     * @return int -count of users
     */
    public static function getCountUsers()
    {
        $users = \DB::table('users')->get()->count();
        return $users;
    }

    /**
     * Function returns count of requests from DB
     * @return int -count of requests
     */
    public static function getCountRequests()
    {
        $requests = \DB::table('requests')->get()->count();
        return $requests;
    }

    /**
     * Function returns count of positions from DB
     * @return int -count of positions
     */
    public static function getCountPositions()
    {
        $positions = \DB::table('positions')->get()->count();
        return $positions;
    }
}
