<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\JsonResponse;

class FrontendController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('frontend.index')->with('title', 'Главная страница');
    }

    /**
     * @return View
     */
    public function contact(): View
    {
        return view('frontend.contact')->with('title', 'Контакты');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function changeTheme(Request $request): JsonResponse
    {
        if ($request->input('template')) {
            Cookie::queue(
                Cookie::forever('template', $request->input('template')));
        }

        return response()->json([
            'result' => true
        ]);
    }
}
