<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageControllerFive extends Controller
{
    public function five()
    {
        return view('pages.five')->with('five', 'give five');
    }

    public function six()
    {
        return view('pages.six')->with('six', 'give six');
    }
}
