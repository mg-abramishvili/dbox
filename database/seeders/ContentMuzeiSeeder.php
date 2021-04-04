<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ContentMuzeiSeeder extends Seeder
{
    public function run()
    {
        // НАСТРОЙКИ
        DB::table('settings')->where('id', '1')->update([
            'theme' => 'muzei',
            'orientation' => 'vertical',
            'title' => 'Название музея',
            'logo' => '/img/sber.png',
        ]);

        // СТРАНИЦЫ
        DB::table('pages')->insert([
        [
            'id' => '1',
            'title' => 'О музее',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => NULL,
            'created_at' => '2021-03-14 00:00:00'
        ],
        [
            'id' => '2',
            'title' => 'Общая информация',
            'text' => '<p>Текст общей информации</p>',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '1',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '3',
            'title' => 'История музея',
            'text' => '<p>Текст истории музея',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '1',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '4',
            'title' => 'Документ PDF',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => '/img/pdf-test2.pdf',
            'excel' => NULL,
            'parent_id' => '1',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '5',
            'title' => 'Стоимость билетов',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/med/01.xlsx',
            'parent_id' => NULL,
            'created_at' => '2021-03-15 00:00:00'
        ],
        ]);

        // СТРАНИЦЫ->ТИПЫ_СТРАНИЦ
        DB::table('page_type')->insert([
            [
                'page_id' => '1',
                'type_id' => '6',
            ],
            [
                'page_id' => '2',
                'type_id' => '1',
            ],
            [
                'page_id' => '3',
                'type_id' => '1',
            ],
            [
                'page_id' => '4',
                'type_id' => '7',
            ],
            [
                'page_id' => '5',
                'type_id' => '9',
            ],
            ]);

        // СХЕМЫ
        DB::table('schemes')->insert([
            'id' => '1',
            'title' => 'Этаж 1',
            'image' => '/img/med/plan01.png',
        ]);
    }
}
