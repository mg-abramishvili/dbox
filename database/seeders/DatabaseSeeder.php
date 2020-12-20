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
            //PageKadetSeeder::class,
            //PageKadet2Seeder::class,

            //SettingDetsadSeeder::class,
            //PageDetsadSeeder::class,

            SettingDefaultSeeder::class,
            PageDefaultSeeder::class,

            TypeSeeder::class,
            IconSeeder::class,
            NewsSeeder::class,

            GallerySeeder::class,
            VideoGallerySeeder::class,
        ]);
    }
}
