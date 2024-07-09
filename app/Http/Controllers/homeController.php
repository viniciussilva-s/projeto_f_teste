<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imovel;

use Alert;
use Auth;

class homeController extends Controller
{
    public function home(Request $req)
    {
        return view('pages.home.index');
    }

    public function index()
    {
        return view('pages.dashboard');
    }
}
