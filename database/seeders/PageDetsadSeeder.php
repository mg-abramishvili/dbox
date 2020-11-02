<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PageDetsadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
        [
            'page_type' => '6',
            'title' => 'Правовые документы, реквизиты, оплата',
            'text' => 'Текст страницы 2 - Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Ciceros De Finibus Bonorum et Malorum for use in a type specimen book.<br><br>Текст страницы 2 - Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Ciceros De Finibus Bonorum et Malorum for use in a type specimen book.<br><br>Текст страницы 2 - Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Ciceros De Finibus Bonorum et Malorum for use in a type specimen book.',
            'image' => '/img/_2.jpg',
            'pdf' => NULL,
            'parent_id' => NULL,
            'created_at' => '2020-10-02 00:00:00'
        ],
        [
            'page_type' => '7',
            'title' => 'Документ 1',
            'text' => 'Текст страницы 5 - Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Ciceros De Finibus Bonorum et Malorum for use in a type specimen book.<br><br>Текст страницы 5 - Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Ciceros De Finibus Bonorum et Malorum for use in a type specimen book.<br><br>Текст страницы 5 - Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Ciceros De Finibus Bonorum et Malorum for use in a type specimen book.',
            'image' => '/img/Green-Document-Icon.png',
            'pdf' => '/img/pdf-test.pdf',
            'parent_id' => '1',
            'created_at' => '2020-10-05 00:00:00'
        ],
        [
            'page_type' => '6',
            'title' => 'О нашем коллективе',
            'text' => 'Текст страницы 3 - Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Ciceros De Finibus Bonorum et Malorum for use in a type specimen book.<br><br>Текст страницы 3 - Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Ciceros De Finibus Bonorum et Malorum for use in a type specimen book.<br><br>Текст страницы 3 - Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Ciceros De Finibus Bonorum et Malorum for use in a type specimen book.',
            'image' => '/img/_3.jpg',
            'pdf' => NULL,
            'parent_id' => NULL,
            'created_at' => '2020-10-03 00:00:00'
        ],
        [
            'page_type' => '2',
            'title' => 'Иванова Мария Александровна',
            'text' => 'Текст страницы 5 - Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Ciceros De Finibus Bonorum et Malorum for use in a type specimen book.<br><br>Текст страницы 5 - Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Ciceros De Finibus Bonorum et Malorum for use in a type specimen book.<br><br>Текст страницы 5 - Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Ciceros De Finibus Bonorum et Malorum for use in a type specimen book.',
            'image' => '/img/default-user-image.png',
            'pdf' => NULL,
            'parent_id' => '3',
            'created_at' => '2020-10-05 00:00:00'
        ],
        [
            'page_type' => '1',
            'title' => 'Меню в столовой',
            'text' => '<table class="table table-bordered"><tbody><tr><td><br></td><td style="text-align: center;"><b>Понедельник</b></td><td style="text-align: center;"><b>Вторник</b></td><td style="text-align: center;"><b>Среда</b></td><td style="text-align: center;"><b>Четверг</b></td><td style="text-align: center;"><b>Пятница</b></td></tr><tr><td style="text-align: left;">Завтрак</td><td style="text-align: center;">Манная каша</td><td style="text-align: center;">Каша "Дружба"</td><td style="text-align: center;">Рисовая каша</td><td style="text-align: center;">Овсяная каша</td><td style="text-align: center;">Гречневая каша</td></tr><tr><td style="text-align: left;">Обед</td><td style="text-align: center;">Макароны с котлетой</td><td style="text-align: center;">Борщ</td><td style="text-align: center;">Лапша куриная</td><td style="text-align: center;">Рыбные котлеты с гречкой</td><td style="text-align: center;">Пюре с гуляшом</td></tr><tr><td style="text-align: left;">Полдник</td><td style="text-align: center;">Банан</td><td style="text-align: center;">Яблоко</td><td style="text-align: center;">Апельсин</td><td style="text-align: center;">Персик</td><td style="text-align: center;">Йогрут</td></tr><tr><td style="text-align: left;">Ужин</td><td style="text-align: center;">Суп Щи</td><td style="text-align: center;">Рис с котлетой</td><td style="text-align: center;">Пюре с ежиками</td><td style="text-align: center;">Борщ</td><td style="text-align: center;">Пюре с котлетой</td></tr></tbody></table>',
            'image' => '/img/_4.jpg',
            'pdf' => NULL,
            'parent_id' => NULL,
            'created_at' => '2020-10-04 00:00:00'
        ],
        [
            'page_type' => '1',
            'title' => 'Подготовка к школе',
            'text' => 'Текст страницы 5 - Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Ciceros De Finibus Bonorum et Malorum for use in a type specimen book.<br><br>Текст страницы 5 - Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Ciceros De Finibus Bonorum et Malorum for use in a type specimen book.<br><br>Текст страницы 5 - Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Ciceros De Finibus Bonorum et Malorum for use in a type specimen book.',
            'image' => '/img/_5.jpg',
            'pdf' => NULL,
            'parent_id' => NULL,
            'created_at' => '2020-10-05 00:00:00'
        ],
        [
            'page_type' => '1',
            'title' => 'Карта',
            'text' => '<img src="/img/карта.png" style="width: auto; height: 550px; display: block; margin: 0 auto;"/>',
            'image' => '/img/карта.png',
            'pdf' => NULL,
            'parent_id' => NULL,
            'created_at' => '2020-10-05 00:00:00'
        ]
        ]);
    }
}
