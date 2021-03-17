<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Setting;
use Illuminate\Http\Request;

class FrontReviewController extends Controller
{
    public function create() {
        $settings = Setting::where('id', '1')->first();
        return view('front.reviews.create', compact('settings'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'review' => 'required',
        ]);

        $data = request()->all();
        $reviews = new Review();
        if (isset($data['name'])) {
            $reviews->name = $data['name'];
        }
        $reviews->review = $data['review'];
        $reviews->save();
        return redirect('/front-reviews-success');
    }

    public function review_success() {
        $settings = Setting::where('id', '1')->first();
        return view('front.reviews.success', compact('settings'));
    }
}
