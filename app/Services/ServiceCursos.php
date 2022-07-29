<?php

namespace App\Services;

use App\Repositories\Contracts\CursosRepositoryInterface;

class ServiceCursos
{
    /** @var CursosRepositoryInterface $repository */
    protected CursosRepositoryInterface $repository;

    /**
     * Define o Repository utilizado neste Service.
     * 
     * @param CursosRepositoryInterface $cursos_repository_interface
     * 
     * @return Void
     */
    public function __construct(CursosRepositoryInterface $cursos_repository_interface)
    {
        $this->repository = $cursos_repository_interface;
    }

    /**
     * Recupera todos os registos em collect.
     * 
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return $this->repository->all();
    }
}