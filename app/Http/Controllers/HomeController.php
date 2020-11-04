<?php

namespace App\Http\Controllers;

use App\Compania;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $companias = Compania::simplePaginate(10);
        return view('home')->with([
            'sectionName' => 'Listado General Compañias',
            'companias'    => $companias 
        ]);
    }
}
