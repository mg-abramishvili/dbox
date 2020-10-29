<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Photoalbum;
use Illuminate\Http\Request;

class FrontPhotoalbumController extends Controller
{
    public function index()
    {
        $settings = Setting::where('id', '1')->first();
        $photoalbums = Photoalbum::get();
        return view('front.photoalbums.index', compact('photoalbums', 'settings'));
    }

    public function show($id)
    {
        $settings = Setting::where('id', '1')->first();
        $photoalbum = Photoalbum::find($id);
        return view('front.photoalbums.show', compact('photoalbum', 'settings'));

    }
}
