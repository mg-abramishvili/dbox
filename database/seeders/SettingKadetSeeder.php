<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SettingKadetSeeder extends Seeder
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
            'theme' => 'kadet',
            'title' => 'Северо-Кавказское суворовское военное училище',
            'logo' => '/logo-h.png',
        ]);
    }
}
