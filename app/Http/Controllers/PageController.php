<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::get();
        return view('pages.index', compact('pages'));

    }

    public function create()
    {

        return view('pages.create');

    }

    public function edit($id)
    {

        $page = Page::find($id);

        $parentlist = Page::all();

        return view('pages.edit', compact('page', 'parentlist'));


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

        if (request()->file('image')) {
            $file = request()->file('image');

            $filename = md5(time() . rand(1, 100000)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/uploads', $filename);

            return \Response::make('/uploads/' . $filename, 200, [
                'Content-Disposition' => 'inline',
            ]);

        }
        if (request()->file('pdf')) {
            $file = request()->file('pdf');

            $filename = md5(time() . rand(1, 100000)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/uploads', $filename);

            return \Response::make('/uploads/' . $filename, 200, [
                'Content-Disposition' => 'inline',
            ]);

        }
        if (request()->file('gallery')) {
            $file1 = request()->file('gallery');
            for ($i = 0; $i < count($file1); $i++) {

                $file = $file1[$i];
                $filename = md5(time() . rand(1, 100000)) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/uploads', $filename);

                return \Response::make('/uploads/' . $filename, 200, [
                    'Content-Disposition' => 'inline',
                ]);
            }
        }
        if (request()->file('video')) {
            $file = request()->file('video');

            $filename = md5(time() . rand(1, 100000)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/uploads', $filename);

            return \Response::make('/uploads/' . $filename, 200, [
                'Content-Disposition' => 'inline',
            ]);

        }


    }

    public function delete($id)
    {
        $pages = Page::find($id);
        $pages->delete();
        $pages->children()->delete();
        return redirect('/pages');
    }

    public function store()
    {
        $data = request()->all();
        $pages = new Page();
        $pages->page_type = $data['page_type'];
        $pages->title = $data['title'];
        $pages->text = $data['text'];
        $pages->image = $data['image'];
        $pages->image_color = $data['image_color'];

        if (!isset($data['gallery'])) {
            $data['gallery'] = [];
        }
        $pages->gallery = $data['gallery'];

        if (!isset($data['pdf'])) {
            $data['pdf'] = null;
        }
        $pages->pdf = $data['pdf'];

        if (!isset($data['video'])) {
            $data['video'] = null;
        }
        $pages->video = $data['video'];
        
        $pages->save();
        return redirect('/pages');
    }

    public function update()
    {
        $data = request()->all();
        $pages = Page::find($data['id']);
        $pages->page_type = $data['page_type'];
        $pages->title = $data['title'];
        $pages->text = $data['text'];
        $pages->image = $data['image'];
        $pages->image_color = $data['image_color'];

        if (!isset($data['gallery'])) {
            $data['gallery'] = [];
        }
        $pages->gallery = $data['gallery'];

        if (!isset($data['pdf'])) {
            $data['pdf'] = null;
        }
        $pages->pdf = $data['pdf'];

        if (!isset($data['video'])) {
            $data['video'] = null;
        }
        $pages->video = $data['video'];

        if (!isset($data['parent_id'])) {
            $data['parent_id'] = null;
        }
        $pages->parent_id = $data['parent_id'];

        request()->validate([
            'title' => 'required',
            'text' => 'required',
            'image' => 'required',
        ]);
        
        $pages->save();
        return redirect('/pages');

    }
}
