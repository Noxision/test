<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageControllerFive extends Controller
{
    public function five()
    {
        return asset('assets/images/IMG.JPG');
    }
}
