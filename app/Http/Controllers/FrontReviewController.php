<?php

namespace App\Http\Controllers;
use Config;
use App\Models\Review;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Mail\SendReview;
use Illuminate\Support\Facades\Mail;

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

        $smtp = Setting::where('id', '1')->first();

        Config::set('mail.mailers.smtp.host', $smtp->smtp_host);
        Config::set('mail.mailers.smtp.username', $smtp->smtp_user);
        Config::set('mail.mailers.smtp.password', $smtp->smtp_password);
        Config::set('mail.mailers.smtp.encryption', $smtp->smtp_sec);
        Config::set('mail.mailers.smtp.port', $smtp->smtp_port);
        Config::set('mail.from.address', $smtp->email_from);

        $review = Review::latest()->first();
        Mail::to($smtp->email_to)->send(new SendReview($review));

        return redirect('/front-reviews-success');
    }

    public function review_success() {
        $settings = Setting::where('id', '1')->first();
        return view('front.reviews.success', compact('settings'));
    }
}
