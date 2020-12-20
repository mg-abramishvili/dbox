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
            [
            'title' => 'Участие Суворовцев СК СВУ во Всероссийском открытом уроке в День занний',
            'cover' => '/kadet/ph1_01.jpg',
            'gallery'=> '["\/kadet\/ph1_01.jpg","\/kadet\/ph1_02.jpg","\/kadet\/ph1_03.jpg","\/kadet\/ph1_04.jpg","\/kadet\/ph1_05.jpg","\/kadet\/ph1_06.jpg","\/kadet\/ph1_07.jpg","\/kadet\/ph1_08.jpg","\/kadet\/ph1_09.jpg","\/kadet\/ph1_10.jpg","\/kadet\/ph1_11.jpg","\/kadet\/ph1_12.jpg","\/kadet\/ph1_13.jpg","\/kadet\/ph1_14.jpg","\/kadet\/ph1_15.jpg","\/kadet\/ph1_16.jpg","\/kadet\/ph1_17.jpg","\/kadet\/ph1_18.jpg","\/kadet\/ph1_19.jpg","\/kadet\/ph1_20.jpg"]',
            'created_at' => '2020-09-01 00:00:00'
            ],
            [
            'title' => 'Торжественная церемония открытия нового современного комплекса зданий Северо-Кавказского суворовского военного училища',
            'cover' => '/kadet/ph2_01.jpg',
            'gallery'=> '["\/kadet\/ph2_01.jpg","\/kadet\/ph2_02.jpg","\/kadet\/ph2_03.jpg","\/kadet\/ph2_04.jpg","\/kadet\/ph2_05.jpg","\/kadet\/ph2_06.jpg","\/kadet\/ph2_07.jpg","\/kadet\/ph2_08.jpg","\/kadet\/ph2_09.jpg","\/kadet\/ph2_10.jpg"]',
            'created_at' => '2020-09-04 00:00:00'
            ],
            [
            'title' => 'Участие Суворовцев СК СВУ во Всероссийском открытом уроке в День занний',
            'cover' => '/kadet/ph1_01.jpg',
            'gallery'=> '["\/kadet\/ph1_01.jpg","\/kadet\/ph1_02.jpg","\/kadet\/ph1_03.jpg","\/kadet\/ph1_04.jpg","\/kadet\/ph1_05.jpg","\/kadet\/ph1_06.jpg","\/kadet\/ph1_07.jpg","\/kadet\/ph1_08.jpg","\/kadet\/ph1_09.jpg","\/kadet\/ph1_10.jpg","\/kadet\/ph1_11.jpg","\/kadet\/ph1_12.jpg","\/kadet\/ph1_13.jpg","\/kadet\/ph1_14.jpg","\/kadet\/ph1_15.jpg","\/kadet\/ph1_16.jpg","\/kadet\/ph1_17.jpg","\/kadet\/ph1_18.jpg","\/kadet\/ph1_19.jpg","\/kadet\/ph1_20.jpg"]',
            'created_at' => '2020-09-01 00:00:00'
            ],
            [
            'title' => 'Торжественная церемония открытия нового современного комплекса зданий Северо-Кавказского суворовского военного училища',
            'cover' => '/kadet/ph2_01.jpg',
            'gallery'=> '["\/kadet\/ph2_01.jpg","\/kadet\/ph2_02.jpg","\/kadet\/ph2_03.jpg","\/kadet\/ph2_04.jpg","\/kadet\/ph2_05.jpg","\/kadet\/ph2_06.jpg","\/kadet\/ph2_07.jpg","\/kadet\/ph2_08.jpg","\/kadet\/ph2_09.jpg","\/kadet\/ph2_10.jpg"]',
            'created_at' => '2020-09-04 00:00:00'
            ],
            [
            'title' => 'Участие Суворовцев СК СВУ во Всероссийском открытом уроке в День занний',
            'cover' => '/kadet/ph1_01.jpg',
            'gallery'=> '["\/kadet\/ph1_01.jpg","\/kadet\/ph1_02.jpg","\/kadet\/ph1_03.jpg","\/kadet\/ph1_04.jpg","\/kadet\/ph1_05.jpg","\/kadet\/ph1_06.jpg","\/kadet\/ph1_07.jpg","\/kadet\/ph1_08.jpg","\/kadet\/ph1_09.jpg","\/kadet\/ph1_10.jpg","\/kadet\/ph1_11.jpg","\/kadet\/ph1_12.jpg","\/kadet\/ph1_13.jpg","\/kadet\/ph1_14.jpg","\/kadet\/ph1_15.jpg","\/kadet\/ph1_16.jpg","\/kadet\/ph1_17.jpg","\/kadet\/ph1_18.jpg","\/kadet\/ph1_19.jpg","\/kadet\/ph1_20.jpg"]',
            'created_at' => '2020-09-01 00:00:00'
            ],
            [
            'title' => 'Торжественная церемония открытия нового современного комплекса зданий Северо-Кавказского суворовского военного училища',
            'cover' => '/kadet/ph2_01.jpg',
            'gallery'=> '["\/kadet\/ph2_01.jpg","\/kadet\/ph2_02.jpg","\/kadet\/ph2_03.jpg","\/kadet\/ph2_04.jpg","\/kadet\/ph2_05.jpg","\/kadet\/ph2_06.jpg","\/kadet\/ph2_07.jpg","\/kadet\/ph2_08.jpg","\/kadet\/ph2_09.jpg","\/kadet\/ph2_10.jpg"]',
            'created_at' => '2020-09-04 00:00:00'
            ],
            [
            'title' => 'Участие Суворовцев СК СВУ во Всероссийском открытом уроке в День занний',
            'cover' => '/kadet/ph1_01.jpg',
            'gallery'=> '["\/kadet\/ph1_01.jpg","\/kadet\/ph1_02.jpg","\/kadet\/ph1_03.jpg","\/kadet\/ph1_04.jpg","\/kadet\/ph1_05.jpg","\/kadet\/ph1_06.jpg","\/kadet\/ph1_07.jpg","\/kadet\/ph1_08.jpg","\/kadet\/ph1_09.jpg","\/kadet\/ph1_10.jpg","\/kadet\/ph1_11.jpg","\/kadet\/ph1_12.jpg","\/kadet\/ph1_13.jpg","\/kadet\/ph1_14.jpg","\/kadet\/ph1_15.jpg","\/kadet\/ph1_16.jpg","\/kadet\/ph1_17.jpg","\/kadet\/ph1_18.jpg","\/kadet\/ph1_19.jpg","\/kadet\/ph1_20.jpg"]',
            'created_at' => '2020-09-01 00:00:00'
            ],
            [
            'title' => 'Торжественная церемония открытия нового современного комплекса зданий Северо-Кавказского суворовского военного училища',
            'cover' => '/kadet/ph2_01.jpg',
            'gallery'=> '["\/kadet\/ph2_01.jpg","\/kadet\/ph2_02.jpg","\/kadet\/ph2_03.jpg","\/kadet\/ph2_04.jpg","\/kadet\/ph2_05.jpg","\/kadet\/ph2_06.jpg","\/kadet\/ph2_07.jpg","\/kadet\/ph2_08.jpg","\/kadet\/ph2_09.jpg","\/kadet\/ph2_10.jpg"]',
            'created_at' => '2020-09-04 00:00:00'
            ],
            [
            'title' => 'Участие Суворовцев СК СВУ во Всероссийском открытом уроке в День занний',
            'cover' => '/kadet/ph1_01.jpg',
            'gallery'=> '["\/kadet\/ph1_01.jpg","\/kadet\/ph1_02.jpg","\/kadet\/ph1_03.jpg","\/kadet\/ph1_04.jpg","\/kadet\/ph1_05.jpg","\/kadet\/ph1_06.jpg","\/kadet\/ph1_07.jpg","\/kadet\/ph1_08.jpg","\/kadet\/ph1_09.jpg","\/kadet\/ph1_10.jpg","\/kadet\/ph1_11.jpg","\/kadet\/ph1_12.jpg","\/kadet\/ph1_13.jpg","\/kadet\/ph1_14.jpg","\/kadet\/ph1_15.jpg","\/kadet\/ph1_16.jpg","\/kadet\/ph1_17.jpg","\/kadet\/ph1_18.jpg","\/kadet\/ph1_19.jpg","\/kadet\/ph1_20.jpg"]',
            'created_at' => '2020-09-01 00:00:00'
            ],
            [
            'title' => 'Торжественная церемония открытия',
            'cover' => '/kadet/ph2_01.jpg',
            'gallery'=> '["\/kadet\/ph2_01.jpg","\/kadet\/ph2_02.jpg","\/kadet\/ph2_03.jpg","\/kadet\/ph2_04.jpg","\/kadet\/ph2_05.jpg","\/kadet\/ph2_06.jpg","\/kadet\/ph2_07.jpg","\/kadet\/ph2_08.jpg","\/kadet\/ph2_09.jpg","\/kadet\/ph2_10.jpg"]',
            'created_at' => '2020-09-04 00:00:00'
            ],
            [
            'title' => 'Участие Суворовцев СК СВУ во Всероссийском открытом уроке в День занний',
            'cover' => '/kadet/ph1_01.jpg',
            'gallery'=> '["\/kadet\/ph1_01.jpg","\/kadet\/ph1_02.jpg","\/kadet\/ph1_03.jpg","\/kadet\/ph1_04.jpg","\/kadet\/ph1_05.jpg","\/kadet\/ph1_06.jpg","\/kadet\/ph1_07.jpg","\/kadet\/ph1_08.jpg","\/kadet\/ph1_09.jpg","\/kadet\/ph1_10.jpg","\/kadet\/ph1_11.jpg","\/kadet\/ph1_12.jpg","\/kadet\/ph1_13.jpg","\/kadet\/ph1_14.jpg","\/kadet\/ph1_15.jpg","\/kadet\/ph1_16.jpg","\/kadet\/ph1_17.jpg","\/kadet\/ph1_18.jpg","\/kadet\/ph1_19.jpg","\/kadet\/ph1_20.jpg"]',
            'created_at' => '2020-09-01 00:00:00'
            ],
            [
            'title' => 'Торжественная церемония открытия нового современного комплекса зданий Северо-Кавказского суворовского военного училища',
            'cover' => '/kadet/ph2_01.jpg',
            'gallery'=> '["\/kadet\/ph2_01.jpg","\/kadet\/ph2_02.jpg","\/kadet\/ph2_03.jpg","\/kadet\/ph2_04.jpg","\/kadet\/ph2_05.jpg","\/kadet\/ph2_06.jpg","\/kadet\/ph2_07.jpg","\/kadet\/ph2_08.jpg","\/kadet\/ph2_09.jpg","\/kadet\/ph2_10.jpg"]',
            'created_at' => '2020-09-04 00:00:00'
            ],
        ]);
    }
}
