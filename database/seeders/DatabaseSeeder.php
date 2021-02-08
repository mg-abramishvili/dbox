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
            SettingSeeder::class,
            PageSeeder::class,
            TypeSeeder::class,
            IconSeeder::class,
            NewsSeeder::class,
            GallerySeeder::class,
            VideoGallerySeeder::class,
        ]);
    }
}
