<?php

namespace App\Services;

use App\Repositories\Contracts\AlunosRepositoryInterface;

class ServiceAlunos
{
    /** @var AlunosRepositoryInterface $repository */
    protected AlunosRepositoryInterface $repository;

    /**
     * Define o Repository utilizado neste Service.
     * 
     * @param AlunosRepositoryInterface $alunos_repository_interface
     * 
     * @return Void
     */
    public function __construct(AlunosRepositoryInterface $alunos_repository_interface)
    {
        $this->repository = $alunos_repository_interface;
    }
}