<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::where('id', '1')->first();
        return view('settings.edit', compact('settings'));
    }

    public function file($type)
    {

        switch ($type) {
            case 'upload':
                return $this->upload();
        }

        return \Response::make('success', 200, [
            'Content-Disposition' => 'inline',
        ]);
    }

    public function upload()
    {
        if (request()->file('logo')) {
            $file = request()->file('logo');

            $filename = md5(time() . rand(1, 100000)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/uploads', $filename);

            return \Response::make('/uploads/' . $filename, 200, [
                'Content-Disposition' => 'inline',
            ]);
        }
    }

    public function update()
    {
        $data0 = request()->all();
        $settings0 = Setting::find($data0['id']);

        if (isset($data0['seeder'])) {
            if($data0['seeder'] == 'y') {
                if($data0['theme'] == 'med') {
                    Artisan::call('migrate:fresh --seed');
                    Artisan::call('db:seed --class=ContentMedSeeder');
                } elseif ($data0['theme'] == 'shkola') {
                    Artisan::call('migrate:fresh --seed');
                    Artisan::call('db:seed --class=ContentShkolaSeeder');
                } elseif ($data0['theme'] == 'muzei') {
                    Artisan::call('migrate:fresh --seed');
                    Artisan::call('db:seed --class=ContentMuzeiSeeder');
                }
            }
        }
        
        $settings0->save();

        $data = request()->all();
        $settings = Setting::find($data['id']);
        $settings->theme = $data['theme'];
        $settings->orientation = $data['orientation'];
        $settings->title = $data['title'];

        if (isset($data['logo'])) {
            $settings->logo = $data['logo'];
        }

        if (isset($data['serial_key'])) {
            $settings->serial_key = $data['serial_key'];
        }

        $settings->module_news = $data['module_news'];
        $settings->module_photoalbums = $data['module_photoalbums'];
        $settings->module_videoalbums = $data['module_videoalbums'];
        $settings->module_routes = $data['module_routes'];
        $settings->module_reviews = $data['module_reviews'];

        if (isset($data['smtp_host'])) {
            $settings->smtp_host = $data['smtp_host'];
        }
        if (isset($data['smtp_port'])) {
            $settings->smtp_port = $data['smtp_port'];
        }
        if (isset($data['smtp_sec'])) {
            $settings->smtp_sec = $data['smtp_sec'];
        }
        if (isset($data['smtp_user'])) {
            $settings->smtp_user = $data['smtp_user'];
        }
        if (isset($data['smtp_password'])) {
            $settings->smtp_password = $data['smtp_password'];
        }
        if (isset($data['email_from'])) {
            $settings->email_from = $data['email_from'];
        }
        if (isset($data['email_to'])) {
            $settings->email_to = $data['email_to'];
        }

        $settings->save();

        return redirect('/');
    }
}
