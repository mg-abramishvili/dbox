<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SettingDefaultSeeder extends Seeder
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
            'title' => 'Default',
            'titlecolor' => '#333333',
            'logo' => '/img/sber.png',
            'background' => '/img/_9.jpg',
            'blur' => '0',
            'galcolor' => '#2C9CDB',
            'newscolor' => '#F76325'
        ]);
    }
}
