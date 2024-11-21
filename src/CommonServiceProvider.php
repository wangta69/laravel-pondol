<?php

namespace Pondol\Common;

use Illuminate\Support\ServiceProvider;

use Pondol\Common\Console\Commands\InstallCommand;


class CommonServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   */
  public function register()
  {

  }

  /**
   * Bootstrap services.
   */
  public function boot()
  {
    $this->publishes([
      __DIR__.'/resources/pondol/' => public_path('pondol')
    ]);

    $this->commands([
      InstallCommand::class
    ]);

    $this->loadCommonRoutes();

    // Register migrations
    $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

    $this->loadViewsFrom(__DIR__.'/resources/views', 'pondol-common');
  }

  private function loadCommonRoutes()
  {
    $this->loadRoutesFrom(__DIR__ . '/routes/route-url.php');
  }
}
