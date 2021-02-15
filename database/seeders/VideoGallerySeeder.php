<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class VideoGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('videoalbums')->insert([
            [
            'title' => 'Возвращение барса (Видеоработа для кинофестиваля «Кадетский взгляд-2019» в номинации «Документальное кино»)',
            'cover' => '/kadet/videoalbums01.jpg',
            'gallery' => '"\/kadet\/videoalbums01.mp4"',
            'created_at' => '2019-09-12 00:00:00'
            ],
            [
            'title' => 'Я вернусь победителем (Видеоработа для кинофестиваля «Кадетский взгляд-2019» в номинации «Игровой короткометражный фильм»)',
            'cover' => '/kadet/videoalbums02.jpg',
            'gallery' => '"\/kadet\/videoalbums02.mp4"',
            'created_at' => '2019-09-13 00:00:00'
            ],
            [
            'title' => 'Фильм Российского военно-исторического общества «Охота на фельдмаршала»',
            'cover' => '/kadet/videoalbums03.jpg',
            'gallery' => '"\/kadet\/videoalbums03.mp4"',
            'created_at' => '2020-01-13 00:00:00'
            ],
            [
            'title' => 'Видео о Северо-Кавказском суворовском военном училище',
            'cover' => '/kadet/videoalbums04.jpg',
            'gallery' => '"\/kadet\/videoalbums04.mp4"',
            'created_at' => '2020-01-29 00:00:00'
            ],
            [
            'title' => 'Возвращение барса (Видеоработа для кинофестиваля «Кадетский взгляд-2019» в номинации «Документальное кино»)',
            'cover' => '/kadet/videoalbums01.jpg',
            'gallery' => '"\/kadet\/videoalbums01.mp4"',
            'created_at' => '2019-09-12 00:00:00'
            ],
            [
            'title' => 'Я вернусь победителем (Видеоработа для кинофестиваля «Кадетский взгляд-2019» в номинации «Игровой короткометражный фильм»)',
            'cover' => '/kadet/videoalbums02.jpg',
            'gallery' => '"\/kadet\/videoalbums02.mp4"',
            'created_at' => '2019-09-13 00:00:00'
            ],
            [
            'title' => 'Фильм Российского военно-исторического общества «Охота на фельдмаршала»',
            'cover' => '/kadet/videoalbums03.jpg',
            'gallery' => '"\/kadet\/videoalbums03.mp4"',
            'created_at' => '2020-01-13 00:00:00'
            ],
            [
            'title' => 'Видео о Северо-Кавказском суворовском военном училище',
            'cover' => '/kadet/videoalbums04.jpg',
            'gallery' => '"\/kadet\/videoalbums04.mp4"',
            'created_at' => '2020-01-29 00:00:00'
            ],
            [
            'title' => 'Возвращение барса (Видеоработа для кинофестиваля «Кадетский взгляд-2019» в номинации «Документальное кино»)',
            'cover' => '/kadet/videoalbums01.jpg',
            'gallery' => '"\/kadet\/videoalbums01.mp4"',
            'created_at' => '2019-09-12 00:00:00'
            ],
            [
            'title' => 'Я вернусь победителем (Видеоработа для кинофестиваля «Кадетский взгляд-2019» в номинации «Игровой короткометражный фильм»)',
            'cover' => '/kadet/videoalbums02.jpg',
            'gallery' => '"\/kadet\/videoalbums02.mp4"',
            'created_at' => '2019-09-13 00:00:00'
            ],
            [
            'title' => 'Фильм Российского военно-исторического общества «Охота на фельдмаршала»',
            'cover' => '/kadet/videoalbums03.jpg',
            'gallery' => '"\/kadet\/videoalbums03.mp4"',
            'created_at' => '2020-01-13 00:00:00'
            ],
            [
            'title' => 'Видео о Северо-Кавказском суворовском военном училище',
            'cover' => '/kadet/videoalbums04.jpg',
            'gallery' => '"\/kadet\/videoalbums04.mp4"',
            'created_at' => '2020-01-29 00:00:00'
            ],
            [
            'title' => 'Возвращение барса (Видеоработа для кинофестиваля «Кадетский взгляд-2019» в номинации «Документальное кино»)',
            'cover' => '/kadet/videoalbums01.jpg',
            'gallery' => '"\/kadet\/videoalbums01.mp4"',
            'created_at' => '2019-09-12 00:00:00'
            ],
            [
            'title' => 'Я вернусь победителем (Видеоработа для кинофестиваля «Кадетский взгляд-2019» в номинации «Игровой короткометражный фильм»)',
            'cover' => '/kadet/videoalbums02.jpg',
            'gallery' => '"\/kadet\/videoalbums02.mp4"',
            'created_at' => '2019-09-13 00:00:00'
            ],
            [
            'title' => 'Фильм Российского военно-исторического общества «Охота на фельдмаршала»',
            'cover' => '/kadet/videoalbums03.jpg',
            'gallery' => '"\/kadet\/videoalbums03.mp4"',
            'created_at' => '2020-01-13 00:00:00'
            ],
            [
            'title' => 'Видео о Северо-Кавказском суворовском военном училище',
            'cover' => '/kadet/videoalbums04.jpg',
            'gallery' => '"\/kadet\/videoalbums04.mp4"',
            'created_at' => '2020-01-29 00:00:00'
            ],
            [
            'title' => 'Возвращение барса (Видеоработа для кинофестиваля «Кадетский взгляд-2019» в номинации «Документальное кино»)',
            'cover' => '/kadet/videoalbums01.jpg',
            'gallery' => '"\/kadet\/videoalbums01.mp4"',
            'created_at' => '2019-09-12 00:00:00'
            ],
            [
            'title' => 'Я вернусь победителем (Видеоработа для кинофестиваля «Кадетский взгляд-2019» в номинации «Игровой короткометражный фильм»)',
            'cover' => '/kadet/videoalbums02.jpg',
            'gallery' => '"\/kadet\/videoalbums02.mp4"',
            'created_at' => '2019-09-13 00:00:00'
            ],
            [
            'title' => 'Фильм Российского военно-исторического общества «Охота на фельдмаршала»',
            'cover' => '/kadet/videoalbums03.jpg',
            'gallery' => '"\/kadet\/videoalbums03.mp4"',
            'created_at' => '2020-01-13 00:00:00'
            ],
            [
            'title' => 'Видео о Северо-Кавказском суворовском военном училище',
            'cover' => '/kadet/videoalbums04.jpg',
            'gallery' => '"\/kadet\/videoalbums04.mp4"',
            'created_at' => '2020-01-29 00:00:00'
            ],
        ]);
    }
}
