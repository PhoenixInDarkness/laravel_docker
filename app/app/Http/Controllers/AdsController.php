<?php

namespace App\Http\Controllers;

use App\Models\Admin\Ad;
use App\Models\Admin\Category;
use App\Models\Admin\PropertyVariant;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdsController extends Controller
{
    public function selectCategory(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::all();

        return view('ads.select', ['categories' => $categories]);
    }

    public function create(Request $request)
    {
        $categoryId = $request->query('category_id');
        $category = Category::find($categoryId);
        $properties = $category->properties()->select(['properties.id', 'properties.name'])->get();

        return view('ads.create', compact('category', 'properties'));
    }

    public function store(Request $request)
    {
        $all = $request->all();
        $adData = [
            'title' => $all['title'],
            'description' => $all['description'],
            'category_id' => $all['category_id'],
            'price' => $all['price'],
            'city' => $all['city'],
            'owner_id' => Auth::user()->id
        ];

        $ad = Ad::create($adData);
        $property_variant = [];
        $properties = [];
        $photos = [];

        $keys = array_keys($all);

        foreach ($keys as $key) {
            if (is_int($key)) {
                $property_variant['property_id'] = $key;
                $property_variant['value'] = $all[$key];
                $property_variant['ad_id'] = $ad->id;

                $pr = PropertyVariant::create($property_variant);
                $properties[] = $pr;
            }
        }

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('public/photos');
                $pathForDatabase = str_replace('public/', '', $path);
                $photo = Photo::create([
                    'ad_id' => $ad->id,
                    'file_path' => $pathForDatabase,
                ]);

                $photos[] = $photo;
            }
        }

        return Redirect::route('ads_view', ['id' => $ad->id]);
    }
}
