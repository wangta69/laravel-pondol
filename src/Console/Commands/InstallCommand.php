<?php

namespace Pondol\Common\Console\Commands;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Console\Command;

class InstallCommand extends Command
{
  // use InstallsBladeStack;

  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'pondol:install-common {type=full}'; // full | only

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = "Install Pondol's common resources";


  public function __construct()
  {
    parent::__construct();
  }

  public function handle()
  {
    $type = $this->argument('type');
    \Artisan::call('vendor:publish',  [
      '--force'=> true,
      '--provider' => 'Pondol\Common\CommonServiceProvider'
    ]);
    
    \Artisan::call('migrate');
  }

}
