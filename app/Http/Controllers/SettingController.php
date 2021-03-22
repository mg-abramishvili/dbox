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
        $data = request()->all();
        $settings = Setting::find($data['id']);
        $settings->theme = $data['theme'];
        $settings->orientation = $data['orientation'];
        $settings->title = $data['title'];

        if (isset($data['logo'])) {
            $settings->logo = $data['logo'];
        }

        if (isset($data['seeder'])) {
            $settings->seeder = $data['seeder'];
        }

        $settings->module_news = $data['module_news'];
        $settings->module_photoalbums = $data['module_photoalbums'];
        $settings->module_videoalbums = $data['module_videoalbums'];
        $settings->module_routes = $data['module_routes'];
        $settings->module_reviews = $data['module_reviews'];

        $settings->save();

        if ($settings->seeder == 'y') {
            if ($settings->theme == 'med') {
                Artisan::call('migrate:fresh --seed');
                Artisan::call('db:seed --class=ContentMedSeeder');
            } elseif ($settings->theme == 'muzei') {
                Artisan::call('migrate:fresh --seed');
                Artisan::call('db:seed --class=ContentMuzeiSeeder');
            }
        }

        return redirect('/');
    }
}
