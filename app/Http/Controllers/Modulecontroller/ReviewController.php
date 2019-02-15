<?php

namespace App\Http\Controllers\ModuleController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function reviewImage()
    {
        return view('modules/reviews/image-review');
    }

}
