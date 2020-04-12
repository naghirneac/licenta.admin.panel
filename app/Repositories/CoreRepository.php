<?php


namespace App\Repositories;


abstract class CoreRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    abstract protected function getModelClass(); //takes the name of the model

    protected function startConditions()
    {
        //clones model
        return clone $this->model;
    }

    public function getID($id)
    {
        return $this->startConditions()->find($id);
    }

    public function getRequestID($get = true, $id = 'id')
    {
        if ($get){
            $data = $_GET;
        } else {
            $data = $_POST;
        }

        $id = !empty($data[$id]) ? (int)$data[$id] : null;

        if (!$id){
            throw new \Exception('Verify ID', 404);
        }
        return $id;
    }
}
