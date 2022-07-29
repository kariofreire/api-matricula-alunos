<?php

namespace App\Repositories\Contracts;

interface AlunosRepositoryInterface
{
    /**
     * Recupera todos os registos em paginação.
     * 
     * @return \Illuminate\Contracts\Pagination\Paginator
     */
    public function all();
}