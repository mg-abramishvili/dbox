<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SettingDetsadSeeder extends Seeder
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
            'theme' => 'detsad',
            'title' => 'Детский сад №210',
            'titlecolor' => '#333333',
            'logo' => '/logo-h.png',
            'background' => '/img/_9.jpg',
            'blur' => '0',
            'galcolor' => '#2C9CDB',
            'newscolor' => '#F76325'
        ]);
    }
}
