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

    public function getAllRequests($perpage)
    {
        $requests = $this->startConditions()::withTrashed() //with deleted
                ->join('users', 'requests.user_id', '=', 'users.id')
                ->join('request_types', 'requests.type_id', '=', 'request_types.id')
                ->select('requests.id', 'requests.user_id', 'requests.status', 'requests.created_at',
                    'requests.updated_at', 'users.name', 'request_types.name')
                ->orderBy('requests.status')
                ->orderBy('requests.id')
                ->toBase()
                ->paginate($perpage);

        return $requests;
    }
}
