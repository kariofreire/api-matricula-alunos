<?php

namespace App\Repositories;

use App\Models\Cursos;

class CursosRepository
{
    /** @var Cursos $entity */
    protected Cursos $entity;

    /**
     * Define o Model utilizado neste Repository.
     * 
     * @param Cursos $model
     * 
     * @return Void
     */
    public function __construct(Cursos $model)
    {
        $this->entity = $model;
    }

    /**
     * Recupera todos os registos em collect.
     * 
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return $this->entity::query()->get();
    }
}