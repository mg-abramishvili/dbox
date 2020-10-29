<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
        [
            'title' => 'Новость 1',
            'text' => 'Текст новости 1 - Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Ciceros De Finibus Bonorum et Malorum for use in a type specimen book.',
            'image' => '/img/_2.jpg',
            'created_at' => '2020-10-10 00:00:00'
        ],
        [
            'title' => 'Новость 2',
            'text' => 'Текст новости 2 - Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Ciceros De Finibus Bonorum et Malorum for use in a type specimen book.',
            'image' => '/img/_2.jpg',
            'created_at' => '2020-10-10 00:00:00'
        ],
        [
            'title' => 'Новость 3',
            'text' => 'Текст новости 3 - Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Ciceros De Finibus Bonorum et Malorum for use in a type specimen book.',
            'image' => '/img/_2.jpg',
            'created_at' => '2020-10-10 00:00:00'
        ],
        [
            'title' => 'Новость 4',
            'text' => 'Текст новости 4 - Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Ciceros De Finibus Bonorum et Malorum for use in a type specimen book.',
            'image' => '/img/_2.jpg',
            'created_at' => '2020-10-10 00:00:00'
        ],
        [
            'title' => 'Новость 5',
            'text' => 'Текст новости 5 - Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Ciceros De Finibus Bonorum et Malorum for use in a type specimen book.',
            'image' => '/img/_2.jpg',
            'created_at' => '2020-10-10 00:00:00'
        ],
        [
            'title' => 'Новость 6',
            'text' => 'Текст новости 6 - Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Ciceros De Finibus Bonorum et Malorum for use in a type specimen book.',
            'image' => '/img/_2.jpg',
            'created_at' => '2020-10-10 00:00:00'
        ],
        [
            'title' => 'Новость 7',
            'text' => 'Текст новости 7 - Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Ciceros De Finibus Bonorum et Malorum for use in a type specimen book.',
            'image' => '/img/_2.jpg',
            'created_at' => '2020-10-10 00:00:00'
        ],
        [
            'title' => 'Новость 8',
            'text' => 'Текст новости 8 - Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Ciceros De Finibus Bonorum et Malorum for use in a type specimen book.',
            'image' => '/img/_2.jpg',
            'created_at' => '2020-10-10 00:00:00'
        ],
        [
            'title' => 'Новость 9',
            'text' => 'Текст новости 9 - Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Ciceros De Finibus Bonorum et Malorum for use in a type specimen book.',
            'image' => '/img/_2.jpg',
            'created_at' => '2020-10-10 00:00:00'
        ],
        [
            'title' => 'Новость 10',
            'text' => 'Текст новости 10 - Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Ciceros De Finibus Bonorum et Malorum for use in a type specimen book.',
            'image' => '/img/_2.jpg',
            'created_at' => '2020-10-10 00:00:00'
        ]
        ]);
    }
}
