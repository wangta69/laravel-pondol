<?php
/**
 * 생성된 bbs 리스트를 자동으로 출력
 */

namespace Pondol\Common\View\Components;

use Illuminate\View\Component;
use Pondol\Common\Models\JsonKeyValue;

class Navigation extends Component
{
  public function __construct() {
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {

    $items = JsonKeyValue::where('key', 'like', 'lnb.enable.%')->where('v', '1')->get();
    return view('pondol-common::components.partials.common-navigation', compact('items'));
  }
}
