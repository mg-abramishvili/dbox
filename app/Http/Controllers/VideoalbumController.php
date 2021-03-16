<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Videoalbum;
use Illuminate\Http\Request;

class VideoalbumController extends Controller
{
    public function index()
    {
        $settings = Setting::where('id', '1')->first();
        $videoalbums = Videoalbum::get();
        return view('videoalbums.index', compact('videoalbums', 'settings'));

    }

    public function create()
    {
        $settings = Setting::where('id', '1')->first();
        return view('videoalbums.create', compact('settings'));

    }

    public function edit($id)
    {
        $settings = Setting::where('id', '1')->first();
        $videoalbum = Videoalbum::find($id);
        return view('videoalbums.edit', compact('videoalbum', 'settings'));


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

        if (request()->file('cover')) {
            $file = request()->file('cover');

            $filename = md5(time() . rand(1, 100000)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/uploads', $filename);

            return \Response::make('/uploads/' . $filename, 200, [
                'Content-Disposition' => 'inline',
            ]);

        }
        if (request()->file('gallery')) {
            $file = request()->file('gallery');

            $filename = md5(time() . rand(1, 100000)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/uploads', $filename);

            return \Response::make('/uploads/' . $filename, 200, [
                'Content-Disposition' => 'inline',
            ]);

        }


    }

    public function delete($id)
    {
        $videoalbums = Videoalbum::find($id);
        $videoalbums->delete();
        return redirect('/videoalbums');
    }

    public function store()
    {
        $data = request()->all();
        $videoalbums = new Videoalbum();
        $videoalbums->title = $data['title'];
        $videoalbums->cover = $data['cover'];
        $videoalbums->gallery = $data['gallery'];
        $videoalbums->save();
        return redirect('/videoalbums');
    }

    public function update()
    {

        $data = request()->all();
        $videoalbums = Videoalbum::find($data['id']);
        $videoalbums->title = $data['title'];
        $videoalbums->cover = $data['cover'];
        $videoalbums->gallery = $data['gallery'];
        $videoalbums->save();


        $videoalbums->save();
        return redirect('/videoalbums');

    }
}
