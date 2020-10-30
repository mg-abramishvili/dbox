<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Videoalbum;
use Illuminate\Http\Request;

class FrontVideoalbumController extends Controller
{
    public function index()
    {
        $settings = Setting::where('id', '1')->first();
        $videoalbums = Videoalbum::orderBy('created_at', 'desc')->get();
        return view('front.videoalbums.index', compact('videoalbums', 'settings'));
    }

    public function show($id)
    {
        $settings = Setting::where('id', '1')->first();
        $videoalbum = Videoalbum::find($id);
        return view('front.videoalbums.show', compact('videoalbum', 'settings'));

    }
}
