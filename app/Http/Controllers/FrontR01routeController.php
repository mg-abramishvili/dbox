<?php

namespace App\Http\Controllers;

use App\Models\R01route;
use App\Models\Setting;
use App\Models\Scheme;
use App\Models\Store;
use Illuminate\Http\Request;

class FrontR01routeController extends Controller
{
    public function index()
    {
        $r01routes = R01route::get();
        return view('front.routes.index', compact('r01routes'));
    }

    public function show($id)
    {
        $settings = Setting::where('id', '1')->first();
        $route = R01route::find($id);
        return view('front.routes.show', compact('route', 'settings'));
    }

}
