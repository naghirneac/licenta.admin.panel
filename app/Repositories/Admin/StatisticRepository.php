<?php


namespace App\Repositories\Admin;
use App\Repositories\CoreRepository;
use App\Models\Admin\Statistic as Model;
use Carbon\Carbon;
use Psy\Util\Json;


class StatisticRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Function returns all data about users' work time
     *
     * @param $perpage
     * @return mixed
     */
    public function getAllWorkTime($perpage)
    {
        $worktime = $this->startConditions()::withTrashed() //with deleted
            ->join('users', 'users_worktime.user_id', '=', 'users.id')
            ->select( 'users.id as user_id')
            ->toBase()
            ->get();

        return $worktime;
    }

    /**
     * Function returns all data about work time of one user by user id
     *
     * @param $user_id
     * @return mixed
     */
    public function getOneUserWt($user_id)
    {
        $wt = $this->startConditions()
            ->select('users_worktime.date', 'users_worktime.worktime', 'users_worktime.user_id')
            ->from('users_worktime')
            ->where('users_worktime.user_id', $user_id)
            ->whereMonth('users_worktime.date', date('m'))
            ->get();

        $sum = 0;
        foreach ($wt as $w){
            $hours = Carbon::createFromFormat('H:i:s', $w->worktime)->format('h');
            $minutes = Carbon::createFromFormat('H:i:s', $w->worktime)->format('i');
            $sum = $sum + $hours*60 + $minutes;
        }

        $monthWt = round($sum / 60, 2);

        return $monthWt;
    }

    /**
     * Function returns all data about user name by user id
     *
     * @param $user_id
     * @return float|int
     */
    public function getOneUserName($user_id)
    {
        $name = $this->startConditions()
                ->join('users', 'users_worktime.user_id', '=', 'users.id')
                ->select('users_worktime.user_id', 'users.name as user_name')
                ->where('users_worktime.user_id', $user_id)
                ->limit(1)
                ->get();

        foreach ($name as $w){
            $userName = $w->user_name;
            return $userName;
        }
        return $name;
    }

    /**
     * Returns the current month
     *
     * @return false|string
     */
    public function getCurrentMonth()
    {
        $month = date('m');
        switch ($month) {
            case 1:
                $month = "ianuarie";
                break;
            case 2:
                $month = "februarie";
                break;
            case 3:
                $month = "martie";
                break;
            case 4:
                $month = "aprilie";
                break;
            case 5:
                $month = "mai";
                break;
            case 6:
                $month = "iunie";
                break;
            case 7:
                $month = "iulie";
                break;
            case 8:
                $month = "august";
                break;
            case 9:
                $month = "septembrie";
                break;
            case 10:
                $month = "octombrie";
                break;
            case 11:
                $month = "noiembrie";
                break;
            case 12:
                $month = "decembrie";
                break;
        }

        return $month;
    }
}
