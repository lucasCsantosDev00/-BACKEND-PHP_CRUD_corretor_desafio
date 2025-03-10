<?php

// app/Providers/AppServiceProvider.php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
/**
* Registrar quaisquer serviços da aplicação.
*
* @return void
*/
public function register(): void
{
//
}

/**
* Inicializar quaisquer serviços da aplicação.
*
* @return void
*/
public function boot(): void
{
// Aqui você pode adicionar configurações extras, caso necessário.
}
}
