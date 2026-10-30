<?php

namespace Pondol\Common\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class UiGuideController extends Controller
{
    public function index()
    {
        return view('pondol-common::admin.ui-guide.index');
    }
}
