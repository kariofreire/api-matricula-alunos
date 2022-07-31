<?php

namespace Database\Seeders;

use App\Models\Cursos;
use Illuminate\Database\Seeder;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                "titulo"    => "PHP 8 OO",
                "descricao" => "Curso atualizado de PHP 8 - JUL/2022"
            ],

            [
                "titulo"    => "Laravel 9",
                "descricao" => "Curso atualizado de Laravel 9 - JUL/2022"
            ],

            [
                "titulo"    => "Vue JS",
                "descricao" => "Curso atualizado de VUE JS - JUL/2022"
            ],

            [
                "titulo"    => "React JS",
                "descricao" => "Curso atualizado de React JS - JUL/2022"
            ],

            [
                "titulo"    => "React Native",
                "descricao" => "Curso atualizado de React Native - JUL/2022"
            ],

            [
                "titulo"    => "Docker",
                "descricao" => "Curso atualizado de Docker - JUL/2022"
            ],

            [
                "titulo"    => "Javascript",
                "descricao" => "Curso atualizado de Javascript - JUL/2022"
            ],
        ])->each(function ($curso) {
            Cursos::create($curso);
        });
    }
}
