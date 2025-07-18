<?php
namespace Pondol\Common;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Blade;
use Pondol\Common\Console\Commands\InstallCommand;
use Pondol\Common\Services\JsonKeyValueService;
use Pondol\Common\View\Components\Navigation;

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
      __DIR__.'/resources/pondol/route.js' => resource_path('pondol/route.js'), // market에서 mix 로 이용
    ]);

    if(!\File::exists(resource_path('views/components/partials/navigation.blade.php'))){
      $this->publishes([
        __DIR__.'/resources/views/components/partials/navigation.blade.php' => resource_path('views/components/partials/navigation.blade.php'),
      ]);
    } 

    $this->commands([
      InstallCommand::class
    ]);

    $this->loadCommonRoutes();

    // Register migrations
    $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

    $this->loadViewsFrom(__DIR__.'/resources/views', 'pondol-common');
    Blade::component('common-navigation', Navigation::class);
  }

  private function loadCommonRoutes()
  {
    $this->loadRoutesFrom(__DIR__ . '/routes/route-url.php');

    $config = config('pondol-common.route_admin');
    Route::prefix($config['prefix'])
      ->as($config['as'])
      ->middleware($config['middleware'])
      ->namespace('Pondol\Common\Http\Controllers\Admin')
      ->group(__DIR__ . '/routes/admin.php');
  }
}
