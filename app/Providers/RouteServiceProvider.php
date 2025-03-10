<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * O caminho para a página inicial da aplicação.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Registra os serviços de roteamento.
     *
     * @return void
     */
    public function boot(): void
    {
        // Laravel 11 já carrega as rotas automaticamente de routes/api.php e routes/web.php
    }
}
