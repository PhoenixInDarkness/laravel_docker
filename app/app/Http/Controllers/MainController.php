<?php

namespace App\Http\Controllers;

use App\Models\Admin\Ad;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        $ads = Ad::orderBy('id', 'desc')->paginate(20);
        $categories = Category::where('id', '<=', 9)->get();

        return view('main.index', compact('ads', 'categories'));
    }

    public function view($slug)
    {
        $ad = Ad::where('slug', $slug)->first();
        $user = $ad->owner()->first();
        $propertyVariants = $ad->propertyVariants()->get();
        $photos = $ad->getAllPhotos();

        return view('main.view', compact('ad', 'user', 'propertyVariants', 'photos'));
    }
}
