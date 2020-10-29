<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('photoalbums')->insert([
            'title' => 'Галерея 1',
            'cover' => '/img/_1.jpg',
            'gallery'=> '["\/img\/_1.jpg","\/img\/_2.jpg","\/img\/_3.jpg"]',
            'created_at' => '2020-10-10 00:00:00'
        ]);
    }
}
