<?php

namespace App\Http\Controllers\ModuleController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsfeedController extends Controller
{

    public function newsFeedbreadCrumb()
    {
        return view('modules/newsfeed/breadcrumb-name');
    }

    public function newsfeedMasterImage()
    {
        return view('modules/newsfeed/rentee-masterimage');
    }

    public function newsfeedBottomImage()
    {
        return view('modules/newsfeed/rentee-bottomimage');
    }

    public function newsfeedFooter()
    {
        return view('modules/newsfeed/rentee-footer');
    }

}
