<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * @package App/Repositories
 */

abstract class CoreRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * CoreRopository constructor
     */
    public function __construct ()
    {
        $this->model = app($this->getModelClass());
    }

    /**
     * @return mixed
     */

    abstract protected function getModelClass();

    /**
     * @return Model
     */

    protected function startConditions ()
    {
        return clone $this->model;
    }
}
