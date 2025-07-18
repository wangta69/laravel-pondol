<?php
namespace Pondol\Common\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Validator;
use Response;
use Pondol\Common\Models\ManageMenu;

use App\Http\Controllers\Controller;

class ManageMenuController  extends Controller {

  public function __construct() {

  }

  public function index() {

    $items = ManageMenu::orderBy('order')->get();
    return view('pondol-common::admin.manage-menu.index', compact('items'));
  }

  public function store(Request $request) {
    $menu = new ManageMenu;

    $menu->type='lnb';
    $menu->title= $request->title;
    $menu->component= $request->component;
    $menu->order= $request->order;
    $menu->is_default= 0;
    $menu->save();
    
    return redirect()->route('common.admin.menu.index');
  }

  public function destroy(ManageMenu $menu) {
    $menu->delete();
    return response()->json(['result'=>true, "code"=>"000"], 200);
  }

  public function updateOrder(ManageMenu $menu, Request $request) {
    $menu->order = $request->order;
    $menu->save();
    return response()->json(['result'=>true, "code"=>"000"], 200);
  }
 
}