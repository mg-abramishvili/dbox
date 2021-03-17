<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ContentMedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // НАСТРОЙКИ
        DB::table('settings')->insert([
            'id' => '1',
            'theme' => 'med',
            'orientation' => 'horizontal',
            'title' => NULL,
            'logo' => '/img/med-logo.png',
            'module_photoalbums' => 'n',
            'module_videoalbums' => 'n',
            'module_news' => 'y',
            'module_routes' => 'y',
            'module_reviews' => 'y',
        ]);

        // СТРАНИЦЫ
        DB::table('pages')->insert([
        [
            'id' => '1',
            'title' => 'Информация о клинике',
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
            'id' => '6',
            'title' => 'Карточка организации',
            'text' => '<p>ООО «МАРТ»</p>
            <p>Адрес юридического лица: Россия, 199178, город Санкт-Петербург, Малый В.О. проспект, д. 54, корп. 3, лит. Ж</p>
            
            <p>ИНН 7801607657</p>
            
            <ul>
            <li>УПРАВЛЯЮЩИЙ МАРШАК МАРИНА ЕВГЕНЬЕВНА</li><li>ГЛАВНЫЙ ВРАЧ КОЧАТКОВА АННА АЛЕКСАНДРОВНА</li>
            <li>ГЛАВНЫЙ БУХГАЛТЕР ГЛУЩЕНКО ЗОЯ ВАЛЕНТИНОВНА</li>
            <li>СТАРШАЯ СЕСТРА СУЛЕЙМЕНОВА ОЛЬГА СЕРГЕЕВНА</li>
            </ul>
            
            <p><b>ЧАСЫ РАБОТЫ КЛИНИКИ 08.00-22.00</b></p>
            
            <ul>
            <li>ЛИЧНЫЙ ПРИЕМ УПРАВЛЯЮЩИЙ М.Е. МАРШАК – ПОНЕДЕЛЬНИК 15.00-17.00</li>
            <li>ЛИЧНЫЙ ПРИЕМ ГЛАВНЫЙ ВРАЧ А.А. КОЧАТКОВА – СРЕДА 14.00-17.00</li>
            </ul>',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '1',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '7',
            'title' => 'Часы работы',
            'text' => '<p>Все дни недели с 08.00 до 22.00 кабинет МРТ</p>

            <p>Поликлиническое отделение с 08.30 до 21.00</p>
            
            <p>Без обеда</p>
            
            <p>Без выходных</p>
            
            <p><b>Услуги медицинского центра «МАРТ»</b></p>
            
            <ul>
            <li>Магнитно-резонансная томография</li>
            <li>Ультразвуковая диагностика</li>
            <li>Лабораторная диагностика</li>
            <li>Неврология</li>
            <li>Терапия</li>
            <li>Травматология-ортопедия</li>
            <li>Гинекология</li>
            <li>Урология</li>
            <li>Онкология</li>
            <li>Оториноларингология</li>
            <li>Дерматология</li>
            <li>Мануальная терапия</li>
            <li>ЛФК (пассивная суставная гимнастика)</li>
            <li>Физиотерапия</li>
            <li>Рефлексотерапия</li>
            <li>Процедурный кабинет</li>
            </ul>',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '1',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '8',
            'title' => 'Положение о скидках',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => '/img/med/poloz.pdf',
            'excel' => NULL,
            'parent_id' => '1',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '9',
            'title' => 'Правила посещения клиники',
            'text' => '<p>Для вашего удобства мы напоминаем за сутки о намеченном визите звонком или SMS-сообщением.</p>

            <p>Если вы неподтвердили свою запись, мы оставляем за собой право ее отменить.</p>
            
            <p>Если у вас не получается прийти, мы будем Вам очень признательны, за своевременную информацию об этом, и подберем Вам другое удобное время.</p>
            
            <p>В случае вашего опоздания более чем на 15 минут, мы будем вынуждены перенести Вашу запись на другое удобное для Вас время, предоставить Вам сокращенную услугу у того же врача или предложить прием у другого, свободного на данный момент врача.</p>
            
            </p>Пациентам, не приходящим по записи более 2-х раз, будет преджложено обслуживание только по предварительной оплате.</p>         
            
            <p>Мы можем открыться раньше или закрыться позже официального времени, в этом случае стоимость обслуживания повышается на 20%. Скидки и программа лояльности в этом случае не действуют.</p>
            ',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '1',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '10',
            'title' => 'Общество защиты прав потребителей',
            'text' => '<p><b>Общество защиты прав потребителей</b><br>
            Телефон 576-66-62; 576-78-51</p>
            
            <p><b>Комитет по Здравоохранению Администрации Санкт-Петербурга</b></br>
            Телефон 311-09-06</p>
            
            <p><b>Роспотребнадзор</b></br>
            Телефон 764-49-74; 316-68-66</p>
            
            <p>У администратора центра Вы можете получить полную информацию:</p>
            <ul>
            <li>о правилах предоставления мед. организациями платных медицинских услуг</li>
            <li>о правилах внутреннего распорядка для пациентов</li>
            <li>правила ознакомления пациента с медицинской документацией</li>
            <li>порядок подачи обращений граждан</li>
            </ul> 
            <p>Книга жалоб и предложений находится у администратора.</p>',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '1',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '11',
            'title' => 'Лицензия',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => '/img/med/lic.pdf',
            'excel' => NULL,
            'parent_id' => '1',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '2',
            'title' => 'Наши врачи',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => NULL,
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '4',
            'title' => 'МРТ',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '2',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '12',
            'title' => 'Стамат Александра Ивановна',
            'text' => '<p>Врач рентгенолог</p><p>Заведующая кабинетом МРТ</p><p>Стаж более 14 лет</p>',
            'image' => '/img/med/stamat.jpg',
            'gallery' => NULL,
            'image_as_icon' => '1',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => '4',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '3',
            'title' => 'Прейскурант',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => NULL,
            'parent_id' => NULL,
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '13',
            'title' => 'Общий прейскурант',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/med/01.xlsx',
            'parent_id' => '3',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '14',
            'title' => 'МРТ',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/med/02.xlsx',
            'parent_id' => '3',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '15',
            'title' => 'УЗД',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/med/03.xlsx',
            'parent_id' => '3',
            'created_at' => '2021-03-15 00:00:00'
        ],
        [
            'id' => '16',
            'title' => 'Функциональная диагностика',
            'text' => '',
            'image' => NULL,
            'gallery' => NULL,
            'image_as_icon' => '0',
            'pdf' => NULL,
            'excel' => '/img/med/04.xlsx',
            'parent_id' => '3',
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
                'page_id' => '6',
                'type_id' => '1',
            ],
            [
                'page_id' => '7',
                'type_id' => '1',
            ],
            [
                'page_id' => '8',
                'type_id' => '7',
            ],
            [
                'page_id' => '9',
                'type_id' => '1',
            ],
            [
                'page_id' => '10',
                'type_id' => '1',
            ],
            [
                'page_id' => '11',
                'type_id' => '7',
            ],
            [
                'page_id' => '2',
                'type_id' => '6',
            ],
            [
                'page_id' => '12',
                'type_id' => '2',
            ],
            [
                'page_id' => '3',
                'type_id' => '6',
            ],
            [
                'page_id' => '4',
                'type_id' => '6',
            ],
            [
                'page_id' => '13',
                'type_id' => '9',
            ],
            [
                'page_id' => '14',
                'type_id' => '9',
            ],
            [
                'page_id' => '15',
                'type_id' => '9',
            ],
            [
                'page_id' => '16',
                'type_id' => '9',
            ],
            ]);

        // НАСТРОЙКИ
        DB::table('schemes')->insert([
            'id' => '1',
            'title' => 'Этаж 1',
            'image' => '/img/med/plan01.jpg',
        ]);
    }
}
