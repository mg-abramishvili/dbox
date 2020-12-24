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
        $videoalbums_nast = Videoalbum::orderBy('created_at', 'desc')->paginate(4);
        return view('front.videoalbums.index', compact('videoalbums', 'settings', 'videoalbums_nast'));
    }

    public function show($id)
    {
        $settings = Setting::where('id', '1')->first();
        $videoalbum = Videoalbum::find($id);
        return view('front.videoalbums.show', compact('videoalbum', 'settings'));

    }
}
