<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\ReturnResponse;
use App\Http\Controllers\Controller;
use App\Services\ServiceAlunos;
use App\Services\ServiceCursos;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiAlunosController extends Controller
{
    /** @var ServiceAlunos $service */
    protected ServiceAlunos $service;
    
    /** @var ServiceCursos $service_cursos */
    protected ServiceCursos $service_cursos;

    /**
     * Define o service utilizado neste controller.
     * 
     * @param ServiceAlunos $service_alunos
     * @param ServiceCursos $service_cursos
     * 
     * @return Void
     */
    public function __construct(ServiceAlunos $service_alunos, ServiceCursos $service_cursos)
    {
        $this->service = $service_alunos;
        $this->service_cursos = $service_cursos;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        try {
            return ReturnResponse::success("Dados retornado com sucesso.", $this->service->all());
        } catch (\Exception $e) {
            return ReturnResponse::error("Ocorreu um erro ao retornar os dados.", $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return JsonResponse
     */
    public function create() : JsonResponse
    {
        try {
            return ReturnResponse::success("Dados retornado com sucesso.", $this->service_cursos->all());
        } catch (\Exception $e) {
            return ReturnResponse::error("Ocorreu um erro ao retornar os dados.", $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return JsonResponse
     */
    public function store(Request $request) : JsonResponse
    {
        try {
            $this->service->create($request);

            return ReturnResponse::success("Aluno criado com sucesso.", []);
        } catch (\Exception $e) {
            return ReturnResponse::error("Ocorreu um erro ao criar um aluno.", $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * 
     * @return JsonResponse
     */
    public function show($id) : JsonResponse
    {
        try {
            return ReturnResponse::success("Dados retornado com sucesso.", $this->service->show($id));
        } catch (\Exception $e) {
            return ReturnResponse::error("Ocorreu um erro ao retornar os dados.", $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * 
     * @return JsonResponse
     */
    public function edit($id) : JsonResponse
    {
        try {
            $dados = [
                "alunos" => $this->service->show($id),
                "cursos" => $this->service_cursos->all()
            ];

            return ReturnResponse::success("Dados retornado com sucesso.", $dados);
        } catch (\Exception $e) {
            return ReturnResponse::error("Ocorreu um erro ao retornar os dados.", $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id) : JsonResponse
    {
        try {
            $this->service->update($id, $request);

            return ReturnResponse::success("Aluno atualizado com sucesso.", []);
        } catch (\Exception $e) {
            return ReturnResponse::error("Ocorreu um erro ao atualizar um aluno.", $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * 
     * @return JsonResponse
     */
    public function destroy($id) : JsonResponse
    {
        try {
            $this->service->destroy($id);

            return ReturnResponse::success("Aluno deletado com sucesso.", []);
        } catch (\Exception $e) {
            return ReturnResponse::error("Ocorreu um erro ao deletar um aluno.", $e->getMessage());
        }
    }
}
