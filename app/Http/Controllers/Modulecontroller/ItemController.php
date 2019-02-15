<?php

namespace App\Http\Controllers\ModuleController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function breadCrumb()
    {
        return view('modules/items/breadcrumb-name');
    }

    public function itemDescription()
    {
        return view('modules/items/item-description');
    }

    public function itemFooter()
    {
        return view('modules/items/item-footer');
    }

}
