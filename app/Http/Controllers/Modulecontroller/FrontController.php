<?php

namespace App\Http\Controllers\ModuleController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{

    public function nav()
    {
        return view('modules/navigation/nav');
    }

    public function links()
    {
        return view('modules/front/quicklinks');
    }

    public function carousel()
    {
        return view('modules/front/carousel');
    }

    public function feature()
    {
        return view('modules/front/featured');
    }

}
