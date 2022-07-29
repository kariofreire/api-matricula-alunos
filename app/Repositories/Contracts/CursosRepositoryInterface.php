<?php

namespace App\Repositories\Contracts;

interface CursosRepositoryInterface
{
    /**
     * Recupera todos os registos em collect.
     * 
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all();
}