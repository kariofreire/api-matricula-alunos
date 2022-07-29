<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\ReturnResponse;
use App\Http\Controllers\Controller;
use App\Services\ServiceCursos;
use Illuminate\Http\JsonResponse;

class ApiCursosController extends Controller
{
    /** @var ServiceCursos $service_cursos */
    protected ServiceCursos $service;

    /**
     * Define o service utilizado neste controller.
     *
     * @param ServiceCursos $service_cursos
     *
     * @return Void
     */
    public function __construct(ServiceCursos $service_cursos)
    {
        $this->service = $service_cursos;
    }

    /**
     * Retorna todos os cursos.
     *
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        try {
            $dados = $this->service->all();

            return ReturnResponse::success("Dados retornado com sucesso.", $dados, count($dados));
        } catch (\Exception $e) {
            return ReturnResponse::error("Ocorreu um erro ao retornar os dados.", $e->getMessage());
        }
    }
}
