<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'id' => '1',
            'theme' => 'default',
            'orientation' => 'horizontal',
            'title' => 'Заголовок',
            'logo' => '/img/sber.png',
            'module_photoalbums' => 'y',
            'module_videoalbums' => 'y',
            'module_news' => 'y',
        ]);
    }
}
