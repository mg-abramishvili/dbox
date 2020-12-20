<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
        [
            'type' => 'Тип 1',
            'image' => '/img/no-image.jpg',
        ],
        [
            'type' => 'Тип 2',
            'image' => '/img/no-image2.jpg',
        ],
        ]);
    }
}
