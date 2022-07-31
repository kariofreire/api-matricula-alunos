<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();

            $table->string("nome")->nullable(false)->comment("Nome do aluno.");
            $table->string("email")->nullable(false)->comment("Email do aluno.");
            $table->date("data_nascimento")->nullable(false)->comment("Data de nascimento do aluno.");

            $table->integer("curso_id")->nullable(false)->comment("ID de referência do curso.");

            $table->timestamps();
        });

        Schema::table("alunos", function (Blueprint $table) {
            $table->foreign("curso_id")->references("id")->on("cursos");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alunos');
    }
}
