<?php
namespace Pondol\Common;

use Illuminate\Support\ServiceProvider;

use Pondol\Common\Console\Commands\InstallCommand;
use Pondol\Common\Services\JsonKeyValueService;

class CommonServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   */
  public function register()
  {
    $this->app->bind('jsonkeyvalue-facade', function () {
      return new JsonKeyValueService();
    });
  }

  /**
   * Bootstrap services.
   */
  public function boot()
  {
    // Publish config file and merge
    if (!config()->has('pondol-common')) {
      $this->publishes([
        __DIR__ . '/config/pondol-common.php' => config_path('pondol-common.php'),
      ], 'config');  
    } 
      
    $this->mergeConfigFrom(
      __DIR__ . '/config/pondol-common.php',
      'pondol-common'
    );

    $this->publishes([
      __DIR__.'/resources/pondol/' => public_path('pondol'),
      __DIR__.'/resources/views/components/partials/navigation.blade.php' => resource_path('views/components/partials/navigation.blade.php'),
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
