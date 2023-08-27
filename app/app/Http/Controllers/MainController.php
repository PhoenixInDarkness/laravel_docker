<?php

namespace App\Http\Controllers;

use App\Models\Admin\Ad;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function search(Request $request)
    {
        $search = strtolower($request->search??'');

        if ($search === '') {
            return redirect('/');
        }

        $ads = Ad::where(DB::raw('lower(title)'), 'like' , "%$search%")
            ->paginate(20)
            ->appends(['search' => $search]);

        return view('main.search')->with(['ads' => $ads, 'search' => $search]);
    }

    public function viewByCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $ads = Ad::where('category_id', $category->id)
            ->paginate(20);

        return view('main.category')->with(['ads' => $ads, 'category' => $category->name]);
    }
}
