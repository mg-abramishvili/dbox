<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PageTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('page_type')->insert([
        [
            'page_id' => '1',
            'type_id' => '6',
        ],
        [
            'page_id' => '6',
            'type_id' => '7',
        ],
        [
            'page_id' => '2',
            'type_id' => '6',
        ],
        [
            'page_id' => '7',
            'type_id' => '2',
        ],
        [
            'page_id' => '3',
            'type_id' => '1',
        ],
        [
            'page_id' => '4',
            'type_id' => '1',
        ],
        [
            'page_id' => '5',
            'type_id' => '4',
        ]
        ]);
    }
}
