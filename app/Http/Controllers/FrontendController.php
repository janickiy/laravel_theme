<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontendController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('frontend.index');
    }

    /**
     * @return View
     */
    public function contact(): View
    {
        return view('frontend.contact');
    }

    public function changeTheme(Request $request)
    {

    }

}
