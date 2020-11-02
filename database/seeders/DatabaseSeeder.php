<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            //SettingKadetSeeder::class,
            SettingDetsadSeeder::class,
            NewsSeeder::class,
            //PageKadetSeeder::class,
            PageDetsadSeeder::class,
            GallerySeeder::class,
            VideoGallerySeeder::class,
        ]);
    }
}
