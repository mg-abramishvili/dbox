<?php

namespace App\Http\Controllers;

use App\Models\R01route;
use App\Models\Setting;
use App\Models\Scheme;
use App\Models\Store;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FrontR01routeController extends Controller
{
    public function index()
    {
        $settings = Setting::where('id', '1')->first();
        $r01routes = R01route::with('schemes')->orderBy('created_at', 'asc')->get()->groupBy('scheme_id');
        $schemes = Scheme::orderBy('created_at', 'asc')->first();
        return view('front.routes.index', compact('r01routes', 'settings', 'schemes'));
        //dd($r01routes);
    }

    public function show($id)
    {
        $settings = Setting::where('id', '1')->first();
        $route = R01route::find($id);
        return view('front.routes.show', compact('route', 'settings'));
    }

}
