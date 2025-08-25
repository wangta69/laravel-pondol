<?php
namespace Pondol\Common\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Artisan;

use Validator;
use Response;

use App\Http\Controllers\Controller;

class ComponentsController  extends Controller {

  public function __construct() {}

  public function index() {
    return view('pondol-common::admin.component.index');
  }

  public function activate($component) {
    switch($component) {
      case 'auth':
        exec('composer require wangta69/laravel-auth', $output, $returnCode);
        if ($returnCode === 0) {
          Artisan::call('pondol:install-auth');
          return redirect()->route('common.admin.component.index');
        } else {
          echo "실패: " . implode("\n", $output);
        }
        break;
      case 'bbs':
        exec('composer require wangta69/laravel-board', $output, $returnCode);
        if ($returnCode === 0) {
          Artisan::call('pondol:install-bbs');
          return redirect()->route('common.admin.component.index');
        } else {
          echo "실패: " . implode("\n", $output);
        }
        break;
      case 'chart':
        exec('composer require wangta69/laravel-chart', $output, $returnCode);
        if ($returnCode === 0) {
          Artisan::call('pondol:install-chart');
          return redirect()->route('common.admin.component.index');
        } else {
          echo "실패: " . implode("\n", $output);
        }
        break;
    }
  }
}