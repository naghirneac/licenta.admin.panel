<?php


namespace App\Repositories\Admin;

use App\Models\Position as Model;
use App\Repositories\CoreRepository;

class PositionRepository extends CoreRepository
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
     * Selects all positions from the database
     *
     * @param $perpage
     * @return mixed
     */
    public function getAllPositions($perpage)
    {
        $positions = $this->startConditions()
            ->select('positions.id', 'positions.name', 'positions.description')
            ->toBase()
            ->paginate($perpage);

        return $positions;
    }

}
