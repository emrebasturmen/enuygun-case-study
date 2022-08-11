<?php

namespace App\Services;

use App\Models\Developer;

class DeveloperService extends BaseService
{
    /**
     * Model variable.
     *
     * @var Developer
     */
    protected $model;

    /**
     * Constructor.
     *
     * @param Developer $model
     */
    public function __construct(Developer $model)
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
