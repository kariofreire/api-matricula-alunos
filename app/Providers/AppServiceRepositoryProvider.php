<?php

namespace App\Providers;

use App\Repositories\AlunosRepository;
use App\Repositories\Contracts\AlunosRepositoryInterface;
use App\Repositories\Contracts\CursosRepositoryInterface;
use App\Repositories\CursosRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /** Alunos Repository */
        $this->app->bind(AlunosRepositoryInterface::class, AlunosRepository::class);

        /** Cursos Repository */
        $this->app->bind(CursosRepositoryInterface::class, CursosRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
