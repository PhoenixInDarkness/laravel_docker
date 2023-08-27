<?php

namespace App\Http\Controllers;

use App\Models\Admin\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        $ads = Ad::orderBy('id', 'desc')->paginate(20);

        return view('main.index', compact('ads'));
    }

    public function view($adId)
    {
        $ad = Ad::find($adId);
        $user = $ad->owner()->first();
        $propertyVariants = $ad->propertyVariants()->get();
        $photos = $ad->getAllPhotos();

        return view('main.view', compact('ad', 'user', 'propertyVariants', 'photos'));
    }
}
