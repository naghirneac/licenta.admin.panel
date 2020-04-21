<?php


namespace App\Repositories\Admin;

use App\Repositories\CoreRepository;
use App\Models\Admin\Request as Model;

class RequestRepository extends CoreRepository
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
     * Function returns all requests from db
     * @param $perpage - paginator
     * @return mixed   - requests
     */
    public function getAllRequests($perpage)
    {
        $requests = $this->startConditions()::withTrashed() //with deleted
            ->join('users', 'requests.user_id', '=', 'users.id')
            ->join('request_types', 'requests.type_id', '=', 'request_types.id')
            ->select('requests.id', 'requests.user_id', 'requests.status', 'requests.created_at',
                'requests.updated_at', 'users.name as user_name', 'request_types.name as request_type_name')
            ->orderBy('requests.status')
            ->orderBy('requests.id')
            ->toBase()
            ->paginate($perpage);

        return $requests;
    }

    /**
     * Function returns only one request from db by id
     * @param $id    - id of needed request
     * @return mixed - request from bd
     */
    public function getOneRequest($id)
    {
        $request = $this->startConditions()::withTrashed()
            ->join('users', 'requests.user_id', '=', 'users.id')
            ->join('user_positions', 'users.id', '=', 'user_positions.user_id')
            ->join('positions', 'user_positions.position_id', '=', 'positions.id')
            ->join('request_types', 'requests.type_id', '=', 'request_types.id')
            ->select('requests.*', 'users.name as user_name','positions.name as position_name', 'request_types.name as request_type_name')
            ->where('requests.id', $id)
            ->orderBy('requests.status')
            ->orderBy('requests.id')
            ->toBase()
            ->limit(1)
            ->first();

        return $request;
    }

    /**
     * Function changes status of the request by id in '1' or '0'
     * @param $id    -id of the request
     * @return mixed -result
     */
    public function changeStatusOrder($id)
    {
        $item = $this->getID($id);
        if (!$item) {
            abort(404);
        }

        $item->status = !empty($_GET['status']) ? '1' : '0';
        $result = $item->update();
        return $result;
    }

    /**
     * Function changes status of the request by id in '2'
     * @param $id    -id of the request
     * @return mixed -result
     */
    public function changeStatusOnDelete($id)
    {
        $item = $this->getID($id);
        if (!$item) {
            abort(404);
        }

        $item->status = '2';
        $result = $item->update();
        return $result;
    }
}
