<?php

namespace App\Services;

use App\Models\Task;

class TaskService extends BaseService
{
    /**
     * Model variable.
     *
     * @var Task
     */
    protected $model;

    /**
     * Constructor.
     *
     * @param Task $model
     */
    public function __construct(Task $model)
    {
        $this->model = $model;
        parent::__construct();
    }

    /**
     * Store data into db.
     *
     * @param array $data
     * @return mixed
     * @throws \Exception
     */
    public function store(array $data)
    {
        try {
            return $this->model->create($data);
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage());
        }
    }
}
