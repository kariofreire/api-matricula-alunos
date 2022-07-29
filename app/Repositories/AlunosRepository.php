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

    /**
     * Recupera registro pelo id.
     * 
     * @param Int $id
     * 
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static[]|static|null
     */
    public function show(int $id)
    {
        return $this->entity::with("curso")->find($id);
    }

    /**
     * Deleta um registro.
     * 
     * @param Int $id
     * 
     * @return Bool
     */
    public function destroy(int $id) : bool
    {
        return $this->entity->find($id)->delete() ? true : false;
    }

    /**
     * Atualiza um registro.
     * 
     * @param Int $id
     * @param Array $dados
     * 
     * @return Bool
     */
    public function update(int $id, array $dados) : bool
    {
        return $this->entity->find($id)->update($dados) ? true : false;
    }

    /**
     * Cria um registro.
     * 
     * @param Array $dados
     * 
     * @return Bool
     */
    public function create(array $dados) : bool
    {
        return $this->entity->create($dados) ? true : false;
    }
}