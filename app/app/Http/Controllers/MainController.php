<?php

namespace App\Http\Controllers;

use App\Models\Admin\Ad;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $ads = Ad::all();

        return view('main.index');
    }
}
