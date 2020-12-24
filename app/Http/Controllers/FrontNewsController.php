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
        $news_nast = News::paginate(3);
        return view('front.news.index', compact('news', 'settings', 'news_nast'));
    }

    public function show($id)
    {
        $settings = Setting::where('id', '1')->first();
        $news = News::find($id);
        return view('front.news.show', compact('news', 'settings'));

    }
}
