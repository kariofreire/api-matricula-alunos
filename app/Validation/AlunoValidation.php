<?php

namespace App\Validation;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class AlunoValidation
{
    /**
     * Realiza validação dos dados do aluno.
     *
     * @param Request $request
     *
     * @return Void
     */
    public static function validate(Request $request) : void
    {
        $rules = [
            "nome"            => ["required"],
            "email"           => ["required", "email"],
            "data_nascimento" => ["required", "date"],
            "curso_id"        => ["required"]
        ];

        $messages = [
            "nome.required"            => "Nome do aluno é um campo obrigatório.",
            "email.required"           => "Email do aluno é um campo obrigatório.",
            "email.email"              => "Email do aluno está no formato inválido.",
            "data_nascimento.required" => "Data de nascimento do aluno é um campo obrigatório.",
            "data_nascimento.date"     => "Data de nascimento do aluno está no formato inválido.",
            "curso_id.required"        => "Curso do aluno é um campo obrigatório.",
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $mensagens = [];

            foreach ($validator->errors()->getMessages() as $message) $mensagens = array_merge($mensagens, $message);

            throw new Exception(implode(" ", $mensagens), Response::HTTP_BAD_REQUEST);
        }
    }
}
