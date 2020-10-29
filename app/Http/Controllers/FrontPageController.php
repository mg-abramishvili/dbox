<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Page;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    public function show($id)
    {

        $settings = Setting::where('id', '1')->first();

        $page = Page::find($id);

        $childs = Page::where('id', $id)->first();

        return view('front.pages.show', compact('page', 'childs', 'settings'));

    }
}
