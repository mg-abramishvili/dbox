<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\News;
use App\Models\Photoalbum;
use App\Models\Videoalbum;
use App\Models\Setting;
use App\Models\Scheme;
use App\Models\R01route;
use App\Models\Banner;
use App\Http\Resources\R01routeResource;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function settings()
    {
        return Setting::where('id', '1')->first();
    }

    public function pages()
    {
        return Page::orderBy('created_at', 'asc')->where('parent_id', NULL)->get();
    }

    public function pages_all()
    {
        return Page::orderBy('created_at', 'asc')->get();
    }
	
	public function pageItem($id)
    {
        return Page::where('id', $id)->with('types', 'children')->first();
    }

    public function news()
    {
        return News::orderBy('created_at', 'desc')->take(2)->get();
    }
	
	public function newsAll()
    {
        return News::orderBy('created_at', 'desc')->get();
    }
	
	public function newsItem($id)
    {
        return News::where('id', $id)->first();
    }

    public function photoalbums()
    {
        return Photoalbum::orderBy('created_at', 'desc')->get();
    }
	
	public function photoalbumItem($id)
    {
        return Photoalbum::where('id', $id)->first();
    }
	
	public function photoalbumItemLast()
    {
        return Photoalbum::orderBy('created_at', 'desc')->first();
    }

    public function videoalbums()
    {
        return Videoalbum::orderBy('created_at', 'desc')->get();
    }
	
	public function videoalbumItem($id)
    {
        return Videoalbum::where('id', $id)->first();
    }

    public function banners()
    {
        return Banner::orderBy('created_at', 'desc')->get();
    }
	
	public function schemes()
	{
		return Scheme::orderBy('id', 'desc')->get();
	}
	
	public function schemeItem($id)
    {
        return Scheme::where('id', $id)->first();
    }
	
	public function r01routes()
	{
		return R01routeResource::collection(R01route::with('schemes')->orderBy('created_at', 'asc')->get());
	}
	
	public function r01routeItem($id)
    {
        return R01route::where('id', $id)->with('schemes', 'schemes2')->first();
    }
}
