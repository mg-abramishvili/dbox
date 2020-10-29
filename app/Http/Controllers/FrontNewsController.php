<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\News;
use Illuminate\Http\Request;

class FrontNewsController extends Controller
{
    public function index()
    {
        $settings = Setting::where('id', '1')->first();
        $news = News::get();
        return view('front.news.index', compact('news', 'settings'));
    }

    public function show($id)
    {
        $settings = Setting::where('id', '1')->first();
        $news = News::find($id);
        return view('front.news.show', compact('news', 'settings'));

    }
}
