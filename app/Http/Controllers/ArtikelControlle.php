<?php

namespace App\Http\Controllers;

//import Model Artikel
use App\Models\Artikel;

//return type View
use Illuminate\View\View;

use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get artikels
        $artikels = Artikel::latest()->paginate(5);

        //render view with artikels
        return view('artikels.index', compact('artikels'));
    }
}