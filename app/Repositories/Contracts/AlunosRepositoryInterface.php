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

    /**
     * Recupera registro pelo id.
     * 
     * @param Int $id
     * 
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static[]|static|null
     */
    public function show(int $id);

    /**
     * Deleta um registro.
     * 
     * @param Int $id
     * 
     * @return Bool
     */
    public function destroy(int $id);

    /**
     * Atualiza um registro.
     * 
     * @param Int $id
     * @param Array $dados
     * 
     * @return Bool
     */
    public function update(int $id, array $dados);

    /**
     * Cria um registro.
     * 
     * @param Array $dados
     * 
     * @return Bool
     */
    public function create(array $dados);
}