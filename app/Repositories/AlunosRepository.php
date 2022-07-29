<?php

namespace App\Repositories;

use App\Models\Alunos;
use App\Repositories\Contracts\AlunosRepositoryInterface;

class AlunosRepository implements AlunosRepositoryInterface
{
    /** @var Alunos $entity */
    protected Alunos $entity;

    /**
     * Define o Model utilizado neste Repository.
     * 
     * @param Alunos $model
     * 
     * @param Void
     */
    public function __construct(Alunos $model)
    {
        $this->entity = $model;
    }

    /**
     * Recupera todos os registos em paginação.
     * 
     * @return \Illuminate\Contracts\Pagination\Paginator
     */
    public function all()
    {
        return $this->entity::with("curso")->simplePaginate();
    }
}