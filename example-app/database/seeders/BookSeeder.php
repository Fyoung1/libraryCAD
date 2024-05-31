<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    //Добавление в бд книг
    public function run(): void
    {
        DB::table('books')->insert([

            [
                'name' => 'Капитанская дочка',
                'author' => 'Александр Пушкин',
                'year_of_publication' => 1836,
                'availability' => 'Доступно',
                'image'=>'https://cdn.skidka-msk.ru/images/prodacts/250/61740/61740402.jpg'],
            [
                'name' => 'Война и мир',
                'author' => 'Лев Толстой',
                'year_of_publication' => 1869,
                'availability' => 'Доступно',
                'image' => 'https://avatars.mds.yandex.net/get-marketpic/1772279/market_8Kathm5rZtsGslRhB2hQfQ/200x200'
            ],
            [
                'name' => 'Мастер и Маргарита',
                'author' => 'Михаил Булгаков',
                'year_of_publication' => 1966,
                'availability' => 'Доступно',
                'image' => 'https://manuskript-shop.ru/assets/images/products/396160/small/20000242790.jpg'
            ],
            [
                'name' => '1984',
                'author' => 'Джордж Оруэлл',
                'year_of_publication' => 1949,
                'availability' => 'Доступно',
                'image' => 'http://sd-inform.org/images/photos/medium/article1208.jpg'
            ],
            [
                'name' => 'Анна Каренина',
                'author' => 'Лев Толстой',
                'year_of_publication' => 1878,
                'availability' => 'Доступно',
                'image' => 'https://avatars.mds.yandex.net/get-marketpic/907814/market_Pz-wx9H4N4XlrxiKbw5jFQ/200x200'
            ],
            [
                'name' => 'Идиот',
                'author' => 'Федор Достоевский',
                'year_of_publication' => 1869,
                'availability' => 'Доступно',
                'image' => 'https://www.tdkarandash.ru/upload/iblock/674/t52xsxxrkvslfngtrnla10gbrcmo0k4y.jpg'
            ],
            [
                'name' => 'Преступление и наказание',
                'author' => 'Федор Достоевский',
                'year_of_publication' => 1866,
                'availability' => 'Доступно',
                'image' => 'https://comiczera.ru/wa-data/public/shop/products/01/42/14201/images/26241/26241.0x200.jpg'
            ],
            [
                'name' => 'Братья Карамазовы',
                'author' => 'Федор Достоевский',
                'year_of_publication' => 1880,
                'availability' => 'Доступно',
                'image' => 'https://manuskript-shop.ru/assets/images/products/390423/small/20000329850.jpg'
            ],
            ]);
    }
}
