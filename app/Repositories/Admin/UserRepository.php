<?php


namespace App\Repositories\Admin;

use App\Repositories\CoreRepository;
use App\Models\Admin\User as Model;
class UserRepository extends CoreRepository
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
     * Select all users from database
     *
     * @param $perpage
     * @return mixed
     */
    public function getAllUsers($perpage)
    {
        $users = $this->startConditions()
            ->join('user_roles', 'user_roles.user_id', '=', 'users.id')
            ->join('roles', 'user_roles.role_id', '=', 'roles.id')
            ->select('users.id', 'users.name', 'users.idnp', 'users.birth_date', 'users.enrolment_date', 'users.email',
            'roles.name as role')
            ->orderBy('users.id')
            ->toBase()
            ->paginate($perpage);

        return $users;
    }

    /**
     * Select all user's requests by id
     *
     * @param $user_id
     * @param $perpage
     * @return mixed
     */
    public function getUserRequests($user_id, $perpage)
    {
        $requests = $this->startConditions()::withTrashed()
            ->join('requests', 'requests.user_id', '=', 'users.id')
            ->join('request_types', 'requests.type_id', '=', 'request_types.id')
            ->select('requests.id', 'requests.user_id', 'requests.status', 'requests.created_at',
                'requests.updated_at', 'request_types.name as type')
            ->where('user_id', $user_id)
            ->orderBy('requests.status')
            ->orderBy('requests.id')
            ->paginate($perpage);

        return $requests;
    }

    /**
     * Get user's role by id
     *
     * @param $user_id
     * @return mixed
     */
    public function getUserRole($user_id)
    {
        $role = $this->startConditions()
            ->find($user_id)
            ->roles()
            ->first();

        return $role;
    }


    /**
     *  Get user's position by id
     *
     * @param $user_id
     * @return mixed
     */
    public function getUserPosition($user_id)
    {
        $position = \DB::table('user_positions')
            ->where('user_id', $user_id)
            ->get();

        if (count($position) > 1) {
            foreach ($position as $pos) {
                $positionIDs[] = $pos->position_id;
            }
            return $positionIDs;
        } else {
            return $position;
        }
    }

    /**
     * Get user's requests count by id
     *
     * @param $user_id
     * @return int
     */
    public function getCountRequestsPag($user_id)
    {
        $count = \DB::table('requests')
            ->where('user_id', $user_id)
            ->count();

        return $count;
    }

    /**
     * Get user's requests count by id per page
     *
     * @param $user_id
     * @param $perpage
     * @return \Illuminate\Support\Collection
     */
    public function getCountRequests($user_id, $perpage)
    {
        $count = \DB::table('requests')
            ->where('user_id', $user_id)
            ->limit($perpage)
            ->get();

        return $count;
    }

}
