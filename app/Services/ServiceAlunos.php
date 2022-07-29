<?php

namespace App\Services;

use App\Http\Requests\StoreAlunosRequest;
use App\Repositories\Contracts\AlunosRepositoryInterface;
use Illuminate\Http\Request;

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

    /**
     * Recupera todos os registos em paginação.
     * 
     * @return \Illuminate\Contracts\Pagination\Paginator
     */
    public function all()
    {
        return $this->repository->all();
    }

    /**
     * Retorna registro por id.
     * 
     * @param Int $id
     * 
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static[]|static|null
     */
    public function show(int $id)
    {
        return $this->repository->show($id);
    }

    /**
     * Deleta um registro.
     * 
     * @param Int $id
     * 
     * @return Bool
     */
    public function destroy(int $id)
    {
        return $this->repository->destroy($id);
    }

    /**
     * Atualiza um registro.
     * 
     * @param Int $id
     * @param Request $dados
     * 
     * @return Bool
     */
    public function update(int $id, StoreAlunosRequest $request)
    {
        $dados = $request->safe()->only([
            "nome",
            "email",
            "data_nascimento",
            "curso_id"
        ]);

        return $this->repository->update($id, $dados);
    }

    /**
     * Cria um registro.
     * 
     * @param Request $request
     * 
     * @return Bool
     */
    public function create(StoreAlunosRequest $request)
    {
        $dados = $request->safe()->only([
            "nome",
            "email",
            "data_nascimento",
            "curso_id"
        ]);

        return $this->repository->create($dados);
    }
}