<?php

namespace App\Http\Controllers\ModuleController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function profileCover()
    {
        return view('modules/profile/profile-cover');
    }

    public function profileFeatured()
    {
        return view('modules/profile/profile-featured');
    }

    public function profileHeader()
    {
        return view('modules/profile/profile-header');
    }

}
